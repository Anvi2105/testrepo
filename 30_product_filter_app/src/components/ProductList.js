import React from "react";
import { useSelector } from "react-redux";
import products from "../data/products";

const ProductList = () => {
  const { category, price } = useSelector((state) => state.filters);

  const filteredProducts = products.filter((product) => {
    return (
      (category === "All" || product.category === category) &&
      product.price <= price
    );
  });

  return (
    <div className="product-container">
      {filteredProducts.map((product) => (
        <div key={product.id} className="card">
          <h3>{product.name}</h3>
          <p>{product.category}</p>
          <p>₹{product.price}</p>
        </div>
      ))}
    </div>
  );
};

export default ProductList;