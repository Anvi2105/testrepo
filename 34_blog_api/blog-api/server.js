const express = require("express");
const cors = require("cors");

const app = express();
app.use(cors());
app.use(express.json());
app.use(express.static("public"));

let blogs = [];
let id = 1;

// CREATE
app.post("/blogs", (req, res) => {
    const { title, content } = req.body;

    const newBlog = {
        id: id++,
        title,
        content
    };

    blogs.push(newBlog);
    res.json(newBlog);
});

// READ ALL
app.get("/blogs", (req, res) => {
    res.json(blogs);
});

// UPDATE
app.put("/blogs/:id", (req, res) => {
    const blog = blogs.find(b => b.id == req.params.id);

    if (!blog) return res.status(404).json({ message: "Not found" });

    blog.title = req.body.title;
    blog.content = req.body.content;

    res.json(blog);
});

// DELETE
app.delete("/blogs/:id", (req, res) => {
    blogs = blogs.filter(b => b.id != req.params.id);
    res.json({ message: "Deleted" });
});

app.listen(3000, () => {
    console.log("Server running on http://localhost:3000");
});