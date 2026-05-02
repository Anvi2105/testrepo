import { createSlice } from "@reduxjs/toolkit";

const initialState = {
  category: "All",
  price: 1000,
};

const filterSlice = createSlice({
  name: "filters",
  initialState,
  reducers: {
    setCategory: (state, action) => {
      state.category = action.payload;
    },
    setPrice: (state, action) => {
      state.price = action.payload;
    },
  },
});

export const { setCategory, setPrice } = filterSlice.actions;
export default filterSlice.reducer;