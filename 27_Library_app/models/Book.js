const mongoose = require("mongoose");

const bookSchema = new mongoose.Schema({
  book_id: Number,
  title: String,
  author: String,
  year: Number
});

module.exports = mongoose.model("Book", bookSchema);