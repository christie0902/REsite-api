@extends('admin.layout.layout')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/list.css') }}">
@endpush

@section('content')
  @if(session('success_message'))
  <div class="alert alert-success">
      {{ session('success_message') }}
  </div>
  @endif

  <div class="top-bar">
    {{-- Search bar --}}
    <form action="{{ route('admin.products.index') }}" method="get">
      <input type="text" id="search-product" name="search-product" placeholder="Search in products" value="{{ request()->input('search-product') }}">
      <button type="submit">Search</button>

    {{-- Sorting selection --}}
      <div class="sort-selection" style="margin-left: 20px; display: inline-block; margin-top: 10px;">
        <select name="sort" id="sort">
          <option value="updated_at">Sort by Date</option>
          <option value="name" {{ request()->input('sort') == 'name' ? 'selected' : '' }}>Sort by Name</option>
          <option value="category" {{ request()->input('sort') == 'category' ? 'selected' : '' }}>Sort by Category</option>
        </select>
        <select name="order" id="order">
          <option value="asc" {{ request()->input('order') == 'asc' ? 'selected' : '' }}>Ascending</option>
          <option value="desc" {{ request()->input('order') == 'desc' ? 'selected' : '' }}>Descending</option>
        </select>
        <button type="submit">Sort</button>
      </div>
</form>

    <button id="add-product" onclick="window.location='{{ route('admin.products.add') }}'">+ Add Product</button>
  </div>

  @if(request()->has('search-product') && !empty(request()->input('search-product')))
      <p>{{ $products->total() }} results for "{{ request()->input('search-product') }}"</p>
  @else
      <p>Showing all products ({{ $products->total() }})</p>
  @endif

  <table>
    <thead>
      <tr>
        <th></th>
        <th>Product</th>
        <th>Category</th>
        <th class="stock">Stock</th>
        <th class="price">Price</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <!-- Product block -->
    @foreach ($products as $product)
        <tr>
            
            <td>
              <img src={{$product["image_url"]}} alt="Product Image" class="product-image">
              {{ htmlspecialchars($product["name"]) }}
          </td>
            <td>{{$product["category"]["name"]}}</td>
            <td class="stock">{{htmlspecialchars($product["stock_quantity"])}}</td>
            <td class="price">${{htmlspecialchars($product["price"])}}</td>
            <td>
                <div class="action-icons">
                    {{-- Edit --}}
                    <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}" style="display: inline-block; line-height: 0;">
                      <img src="{{ asset('icon-img/edit-icon.png') }}" alt="Edit" title="Edit" class="icon" />
                    </a>

                    {{-- Delete logic --}}
                    <form action="{{ route('admin.products.delete', $product->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this product?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="icon-button" style="background: none; border: none; padding: 0; cursor: pointer;">
                          <img src="{{ asset('icon-img/delete-icon.png') }}" alt="Delete" title="Delete" class="icon" />
                      </button>
                  </form>

                </div>
            </td>
        </tr>
    @endforeach
    <!-- End of block -->
  </tbody>
</table>
<div class="pagination">
    {{ $products->links() }} <!-- Pagination links -->
  </div>
@endsection