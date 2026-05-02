<?php
require "db.php";

$result = mysqli_query($conn, "SELECT * FROM waste_requests ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Authority Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard">
    <h1>Authority Dashboard</h1>
    <p class="subtitle">Waste collection requests from users</p>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Waste Type</th>
            <th>Quantity</th>
            <th>Location</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['waste_type']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['location']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td>
                <span class="status">
                    <?php echo $row['status']; ?>
                </span>
            </td>
            <td>
                <form action="update_status.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <select name="status">
                        <option value="Pending">Pending</option>
                        <option value="Assigned">Assigned</option>
                        <option value="Collected">Collected</option>
                        <option value="Managed">Managed</option>
                    </select>
                    <button class="small-btn" type="submit">Update</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>

    <a class="back-link" href="index.php">Back to User Form</a>
</div>

</body>
</html>