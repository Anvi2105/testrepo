<!DOCTYPE html>
<html>
<head>
    <title>Waste Collection System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="card">
        <h1>Waste Collection Request</h1>
        <p class="subtitle">Report plastic, paper or other waste for collection</p>

        <form action="submit.php" method="POST">
            <label>Your Name</label>
            <input type="text" name="name" required>

            <label>Phone Number</label>
            <input type="text" name="phone" required>

            <label>Waste Type</label>
            <select name="waste_type" required>
                <option value="">Select Waste Type</option>
                <option value="Plastic">Plastic</option>
                <option value="Paper">Paper</option>
                <option value="Metal">Metal</option>
                <option value="Organic Waste">Organic Waste</option>
                <option value="Other">Other</option>
            </select>

            <label>Quantity</label>
            <input type="text" name="quantity" placeholder="Example: 2 bags, 5 kg" required>

            <label>Location</label>
            <textarea name="location" placeholder="Enter exact location" required></textarea>

            <label>Description</label>
            <textarea name="description" placeholder="Additional details"></textarea>

            <button type="submit">Submit Request</button>
        </form>

        <a class="admin-link" href="admin.php">Authority Login / View Requests</a>
    </div>
</div>

</body>
</html>