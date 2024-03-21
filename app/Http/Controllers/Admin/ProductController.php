<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Discount;
use App\Models\ProductVariant;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search_query = $request->input('search-product');

        $products = Product::with('category');

        if (!empty($search_query)) {
            $products = $products->where('name', 'LIKE', "%{$search_query}%")
                ->orWhere('description', 'LIKE', "%{$search_query}%")
                ->orWhereHas('category', function ($query) use ($search_query) {
                    $query->where('name', 'LIKE', "%{$search_query}%");
                })
                ->orWhereHas('variants', function ($query) use ($search_query) {
                    $query->where('variant_type', 'LIKE', "%{$search_query}%")
                        ->orWhere('variant_value', 'LIKE', "%{$search_query}%");
                });
        }

        $products = $products->paginate(10);

        return view('admin.products.list', ['products' => $products]);
    }

    // Create
    public function create()
    {
        $categories = Category::whereNull('parent_id')
        ->with('children')
        ->get();
        $discounts = Discount::all();
        return view('admin.products.add', compact('categories', 'discounts'));
    }

    //Edit function
    public function edit($id = null)
    {
        if ($id) {
            $product = Product::with('category', 'images', 'variants')->findOrFail($id);
        } else {
            $product = new Product;
        }
        $images = $product->images;
        $variants = $product->variants;
        
        return view('admin.products.edit', compact('product', 'images', 'variants'));
    }

    // store/save function
    public function store(Request $request, $id = null)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'price' => 'required|numeric|between:0,9999.99',
            'hasSizes' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
            'product_images' => 'required',
            'product_images.*' => 'mimes:jpg,jpeg,png|max:2048',
            'stock_quantity' => 'required|integer|min:0',
            'sku' => 'required|string|max:50|unique:products,sku,' . ($id ?: 'NULL') . ',id',
            'discount_id' => 'nullable|exists:discounts,id',
            'promotion_start_date' => 'nullable|date',
            'promotion_end_date' => 'nullable|date|after_or_equal:promotion_start_date',
            'status' => 'required|in:active,inactive',
        ], [
            'name.required' => 'The product name is required.',
            'description.max' => 'The description must not exceed 500 characters.',
            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a number.',
            'hasSizes.required' => 'Please specify if the product has sizes.',
            'category.required' => 'Please select a category for the product.',
            'image_url.url' => 'The image URL format is invalid.',
            'stock_quantity.required' => 'The stock quantity is required.',
            'stock_quantity.integer' => 'The stock quantity must be a whole number.',
            'stock_quantity.min' => 'The stock quantity must be at least 0.',
            'sku.required' => 'The SKU is required.',      
            'status.required' => 'The status is required.',
        ]);
        DB::transaction(function () use ($request, $id) {
                if ($id) {
                    $product = Product::with('category', 'images', 'variants')->findOrFail($id);
                } else {
                    $product = new Product;
                }
                $images = $product->images;
                $variants = $product->variants;

                $product->name = $request->name;
                $product->description = $request->description;
                $product->category_id = $request->category_id;
                $product->price = $request->price;
                $product->hasSizes = $request->hasSizes;
                $product->stock_quantity = $request->stock_quantity;
                $product->sku = $request->sku;
                $product->status = $request->status;
                $product->discount_id = $request->input('discount_id'); 
                $product->promotion_start_date = $request->promotion_start_date ?? null;
                $product->promotion_end_date = $request->promotion_end_date ?? null;
            
                $product->save();
            
                // Handle variants
                if ($request->has('variants')) {
                    foreach ($request->variants as $variantData) {
                        $variant = new ProductVariant;
                        $variant->product_id = $product->id;
                        $variant->size = $variantData['size'];
                        $variant->color = $variantData['color'];
                        $variant->save();
                    }
                }

                // Using cloudinary
                if ($request->hasFile('product_images')) {
                    foreach ($request->file('product_images') as $index => $file) {
                        // Upload the image and get the URL
                        $uploadedFileUrl = Cloudinary::upload($file->getRealPath())->getSecurePath();
            
                        // Save the first uploaded image URL as the primary image URL
                        if ($index === 0) {
                            $product->image_url = $uploadedFileUrl;
                            $product->images()->create(['url' => $uploadedFileUrl , 'is_primary' => 1]);
                            $product->save();
                        } else {
                            $product->images()->create(['url' => $uploadedFileUrl]);
                        }
            
                        // Save the image to the images table
                        
                    }
                }
        });

        // Handle the product images upload and store it in public of the server
    //     if ($request->hasfile('product_images')) {
    //         foreach ($request->file('product_images') as $file) {
    //             $name = time().rand(1,100).'.'.$file->extension();
    //             $file->move(public_path('images'), $name);  
    //             $product->images()->create(['file_path' => 'images/'.$name]);
    //     }

        return redirect()->back()->with('success_message', 'Product data saved successfully.');
    }

    
//delete function
    public function delete($id)
    {
        $product = Product::with('category', 'images', 'variants')->findOrFail($id);

        $product->images()->delete();
        $product->variants()->delete();
        $product->delete();

        session()->flash('success_message', 'Product has been deleted!');
        return redirect()->back();
    }
}
