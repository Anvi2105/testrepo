import React from "react";
import { useDispatch, useSelector } from "react-redux";
import { setCategory, setPrice } from "../features/filters/filterSlice";

const Filter = () => {
  const dispatch = useDispatch();
  const { category, price } = useSelector((state) => state.filters);

  return (
    <div className="filter-container">
      <h2>Filters</h2>

      <select
        value={category}
        onChange={(e) => dispatch(setCategory(e.target.value))}
      >
        <option value="All">All</option>
        <option value="Electronics">Electronics</option>
        <option value="Fashion">Fashion</option>
        <option value="Accessories">Accessories</option>
      </select>

      <input
        type="range"
        min="0"
        max="1000"
        value={price}
        onChange={(e) => dispatch(setPrice(Number(e.target.value)))}
      />

      <p>Max Price: ₹{price}</p>
    </div>
  );
};

export default Filter;