import React from "react";
import Stars from "../review/Stars.jsx";
import { useContext, useState } from "react";
import Context from "../../store/Context.js";
import CustomButton from "../buttons/CustomButton.jsx";
import ProductDetails from "./ProductDetails.jsx";
import { Link } from "react-router-dom";

const BasicCard = ({ productData }) => {
    const { state, dispatch } = useContext(Context);
    // const [showDetails, setShowDetails] = useState(false);
    const {
        id,
        image_url,
        name,
        discount_rate,
        price,
        discount_price,
        rating,
        review_count,
        sizes,
        editions,
        colors,
    } = productData;
    const defaultSize = sizes?.length > 0 ? sizes[0] : undefined;
    const defaultColor =sizes?.length > 0 ? colors[0] : undefined;
    const defaultEdition =editions?.length > 0 ? editions[0] : undefined;


    return (
       
        <div className="mx-auto max-w-xs transition-transform duration-200 hover:scale-105 hover:border-red-500">
           
            <div className="relative mb-5 flex w-full max-w-xs flex-col overflow-hidden rounded-lg backdrop-blur-md bg-white/10 border border-gray-500/50 shadow-lg">
                <Link to={`/product/details/${id}`}>
                <a
                    className="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl"
                    href="#"
                >
                    <img
                        className="object-cover ml-auto mr-auto my-auto "
                        src={image_url}
                        alt="product"
                    />
                    <span className="absolute top-0 left-0 m-2 rounded-full bg-black px-2 text-center text-sm font-medium text-white">
                        {discount_rate ? `${discount_rate}%` : ""}
                    </span>
                </a>
                </Link>
                <div className="mt-4 px-5 pb-5">
                <Link to={`/product/details/${id}`}>
                    <a href="#">
                        <h5 className="text-xl tracking-tight text-yellow-600 font-bold ellipsis">
                            {name}
                        </h5>
                    </a>
                    <div className="mt-2 mb-5 flex items-center justify-between">
                        <p>
                            <span className="text-3xl font-bold text-white">
                                ${price}
                            </span>
                            <span className="text-sm text-slate-900 line-through">
                                {discount_price ? `${discount_price}` : ""}
                            </span>
                        </p>
                        <div className="flex items-center ml-4">
                            <Stars
                                rating={rating}
                                review_count={review_count}
                            />
                        </div>
                    </div>
                </Link>
                  
                    <div className="w-full flex justify-center">
                        <CustomButton
                            type="static"
                            title="Add To Cart"
                            customStyles="w-full mx-3"
                            handleClick={() => {
                            
                                dispatch({
                                    type: "product/cart-add",
                                    payload: {
                                        ...productData,
                                        quantity: 1,
                                        selectedSize: defaultSize,
                                        selectedColor: defaultColor,
                                        selectedEdition: defaultEdition,
                                    },
                                });
                            }}
                        />
                        <Link to={`/product/details/${id}`}>
                            <CustomButton
                                type="outline"
                                title="See Details"
                                customStyles="w-full"
                                // handleClick={() => setShowDetails(true)}
                            />
                        </Link>
                    </div>
                    {/* {showDetails && <ProductDetails productId={id} />} */}
                </div>
            </div>
        </div>
    );
};

export default BasicCard;
