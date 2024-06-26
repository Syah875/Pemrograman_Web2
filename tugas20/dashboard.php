<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'database/db.php';

$sql = "SELECT * FROM inventory";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="navbar">
        <a href="dashboard.php" class="active">Dashboard</a>
        <a href="detail.php">Detail</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="container">
        <h2>Inventory</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Last Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['updated_at']; ?></td>
                        <td>
                            <a href="edit_item.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a href="delete_item.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="add_item.php">Add New Item</a>
    </div>
</body>
</html>
