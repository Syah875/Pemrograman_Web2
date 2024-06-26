<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'database/db.php';

// Fetch all inventory items
$sql = "SELECT * FROM inventory";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventory</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="navbar">
        <a href="inventory.php" class="active">Inventory</a>
        <a href="detail.php">Detail</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="inventory-container">
        <h2>Inventory</h2>
        <div class="add-button">
            <button onclick="location.href='add_item.php'">Add Item</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Last Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                        <td><?php echo htmlspecialchars($row['updated_at']); ?></td>
                        <td>
                            <button onclick="location.href='edit_item.php?id=<?php echo $row['id']; ?>'">Edit</button>
                            <button onclick="location.href='delete_item.php?id=<?php echo $row['id']; ?>'">Delete</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
