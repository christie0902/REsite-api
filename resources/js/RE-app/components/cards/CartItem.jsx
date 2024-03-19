import React, { useContext, useState } from "react";
import productImg from "../../assets/website-design/product.png";
import deleteIcon from "../../assets/website-design/delete.svg";
import Context from "../../store/Context";

const CartItem = ({productData}) => {
  const {
    image_url,
    name,
    size,
    quantity,
    price,
    id
  } = productData
  const {state, dispatch} = useContext(Context)


  return (
    <div className="flex items-start justify-between p-2 pt-3 bg-gray-100 bg-opacity-40 rounded-lg shadow-xl backdrop-filter backdrop-blur-lg">
      {/* Product Image */}
      <img
        src={image_url}
        alt="product"
        className="w-20 h-20 rounded-lg object-contain"
      />

      {/* Product Details */}
      <div className="flex-grow ml-2">
        <h2 className="text-lg font-bold text-gray-900">{name}</h2>
        {size && <p className="text-sm text-gray-700"><strong>Size: </strong> {size}</p>}
      </div>

      <div className="flex flex-col justify-between">
        <div className="flex items-center mb-10 ml-10">
          <button
            className="cursor-pointer rounded-l bg-gray-600 py-1 px-3 hover:bg-red-700 hover:text-white"
            aria-label="Decrease quantity"
            onClick={() => {
              dispatch({type: "product/cart-setQuantity", payload:{
                id: id,
                quantity: (quantity - 1)
               }})
            }}
          >
            -
          </button>
          <input
            type="text"
            id="quantity-input"
            data-input-counter
            data-input-counter-min="1"
            data-input-counter-max="50"
            className="bg-gray-50 border-x-0 border-gray-300 h-8 text-center text-gray-900 text-sm focus:ring-red-500 focus:border-red-500 block w-8 py-2.5"
            placeholder="999"
            value={quantity}
            onInput={(e) => {
             dispatch({type: "product/cart-setQuantity", payload:{
              id: id,
              quantity: e.target.value
             }})
            }}
            required
          />
          <button
            className="cursor-pointer rounded-r bg-gray-600 py-1 px-3 hover:bg-red-700 hover:text-white"
            aria-label="Increase quantity"
            onClick={() => {
              dispatch({type: "product/cart-setQuantity", payload:{
                id: id,
                quantity: (quantity + 1)
               }});
            }}
          >
            +
          </button>
        </div>

        {/* Price and Delete Icon */}
        <div className="flex items-center">
          <p className="text-lg font-bold text-yellow-800 mr-4">
            {state.currency + price }
          </p>
          <button className="text-red-700 ml-auto"
            aria-label="Remove item"
            id="delete-item"
            onClick={() => {
              dispatch({type: "product/cart-remove", payload: id})
            }}
          >
            Remove
          </button>
        </div>
      </div>
    </div>
  );
};
export default CartItem;