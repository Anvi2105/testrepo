const API = "http://localhost:3000/blogs";

// Load blogs
async function loadBlogs() {
    const res = await fetch(API);
    const data = await res.json();

    const container = document.getElementById("blogs");
    container.innerHTML = "";

    data.forEach(blog => {
        container.innerHTML += `
            <div class="blog">
                <h3>${blog.title}</h3>
                <p>${blog.content}</p>
                <div class="actions">
                    <button onclick="editBlog(${blog.id})">Edit</button>
                    <button onclick="deleteBlog(${blog.id})">Delete</button>
                </div>
            </div>
        `;
    });
}

// Add blog
async function addBlog() {
    const title = document.getElementById("title").value;
    const content = document.getElementById("content").value;

    await fetch(API, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ title, content })
    });

    loadBlogs();
}

// Delete blog
async function deleteBlog(id) {
    await fetch(`${API}/${id}`, { method: "DELETE" });
    loadBlogs();
}

// Edit blog
async function editBlog(id) {
    const newTitle = prompt("New Title:");
    const newContent = prompt("New Content:");

    await fetch(`${API}/${id}`, {
        method: "PUT",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ title: newTitle, content: newContent })
    });

    loadBlogs();
}

loadBlogs();