import React from "react";
import Filter from "./components/Filter";
import ProductList from "./components/ProductList";
import "./App.css";

function App() {
  return (
    <div className="app">
      <h1>Product Filter App</h1>
      <Filter />
      <ProductList />
    </div>
  );
}

export default App;