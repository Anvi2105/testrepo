const express = require("express");
const mongoose = require("mongoose");
const bodyParser = require("body-parser");
const cors = require("cors");

const Book = require("./models/Book");

const app = express();

// Middleware
app.use(cors());
app.use(bodyParser.json());
app.use(express.static("public"));

// ✅ MongoDB Connection (UPDATED)
mongoose.connect("mongodb://127.0.0.1:27017/libraryDB")
  .then(() => console.log("MongoDB Connected"))
  .catch(err => console.log(err));

// ➤ Add Book
app.post("/add-book", async (req, res) => {
  try {
    const book = new Book(req.body);
    await book.save();
    res.json({ message: "Book added successfully" });
  } catch (err) {
    res.status(500).json({ error: err.message });
  }
});

// ➤ Get Books
app.get("/books", async (req, res) => {
  const books = await Book.find();
  res.json(books);
});

// Start server
app.listen(5000, () => {
  console.log("Server running on http://localhost:5000");
});