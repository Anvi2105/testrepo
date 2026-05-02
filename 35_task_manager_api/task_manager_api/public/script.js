const API = "/api/tasks";

async function fetchTasks() {
  const res = await fetch(API);
  const data = await res.json();

  const list = document.getElementById("taskList");
  list.innerHTML = "";

  data.forEach(t => {
    const div = document.createElement("div");
    div.className = "task";

    if (t.status === "completed") div.classList.add("completed");

    div.innerHTML = `
      ${t.title}
      <div>
        <button onclick="doneTask(${t.id})">✔</button>
        <button onclick="deleteTask(${t.id})">❌</button>
      </div>
    `;

    list.appendChild(div);
  });
}

async function addTask() {
  const input = document.getElementById("taskInput");

  await fetch(API, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ title: input.value })
  });

  input.value = "";
  fetchTasks();
}

async function doneTask(id) {
  await fetch(`${API}/${id}`, { method: "PUT" });
  fetchTasks();
}

async function deleteTask(id) {
  await fetch(`${API}/${id}`, { method: "DELETE" });
  fetchTasks();
}

fetchTasks();