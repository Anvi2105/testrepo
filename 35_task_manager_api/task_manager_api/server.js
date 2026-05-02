const express = require("express");
const cors = require("cors");
const path = require("path");

const app = express();
const PORT = 5000;

app.use(cors());
app.use(express.json());
app.use(express.static(path.join(__dirname, "public")));

let tasks = [];
let id = 1;

// ADD TASK
app.post("/api/tasks", (req, res) => {
  const { title } = req.body;

  if (!title) {
    return res.status(400).json({ message: "Task title required" });
  }

  const newTask = {
    id: id++,
    title,
    status: "pending"
  };

  tasks.push(newTask);
  res.json(newTask);
});

// GET ALL TASKS
app.get("/api/tasks", (req, res) => {
  res.json(tasks);
});

// UPDATE TASK
app.put("/api/tasks/:id", (req, res) => {
  const task = tasks.find(t => t.id == req.params.id);

  if (!task) return res.status(404).json({ message: "Not found" });

  task.status = "completed";
  res.json(task);
});

// DELETE TASK
app.delete("/api/tasks/:id", (req, res) => {
  tasks = tasks.filter(t => t.id != req.params.id);
  res.json({ message: "Deleted" });
});

app.listen(PORT, () => {
  console.log(`Server running at http://localhost:${PORT}`);
});