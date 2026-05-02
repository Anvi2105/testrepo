import React, { useState } from "react";
import "./App.css";

function App() {
  const [dollars, setDollars] = useState("");
  const [rupees, setRupees] = useState(0);

  const conversionRate = 83; // 1 USD = 83 INR (approx)

  const handleChange = (e) => {
    setDollars(e.target.value);
  };

  const convertCurrency = () => {
    const result = dollars * conversionRate;
    setRupees(result);
  };

  return (
    <div className="container">
      <h1>Currency Converter</h1>

      <div className="card">
        <label>Enter Amount in Dollars ($):</label>

        <input
          type="number"
          value={dollars}
          onChange={handleChange}
          placeholder="Enter USD"
        />

        <button onClick={convertCurrency}>
          Convert to Rupees
        </button>

        <h2>₹ {rupees}</h2>
      </div>
    </div>
  );
}

export default App;