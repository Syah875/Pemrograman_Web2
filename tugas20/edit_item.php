<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'database/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE inventory SET name = ?, quantity = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $name, $quantity, $id);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Error: " . $conn->error;
    }
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM inventory WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="navbar">
        <a href="dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="container">
        <h2>Edit Item</h2>
        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form action="edit_item.php?id=<?php echo $id; ?>" method="post">
            <input type="text" name="name" placeholder="Item Name" value="<?php echo htmlspecialchars($item['name']); ?>" required>
            <input type="number" name="quantity" placeholder="Quantity" value="<?php echo htmlspecialchars($item['quantity']); ?>" required>
            <button type="submit">Update Item</button>
        </form>
    </div>
</body>
</html>
