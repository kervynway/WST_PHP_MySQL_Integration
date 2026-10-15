<?php
include 'config.php';

// 1. Get the item ID from the URL
$id = $_GET['id'];

// 2. Fetch the current data for this specific item
$result = $conn->query("SELECT * FROM products WHERE id = $id");
$row = $result->fetch_assoc();

// 3. Update the data if the form is submitted
if (isset($_POST['update'])) {
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "UPDATE products SET item_name='$item_name', quantity='$quantity', price='$price' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Automatically redirect back to the inventory table
        header("Location: read.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error updating: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Stock</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow" style="max-width: 500px; margin: auto;">
            <div class="card-header bg-warning">
                <h4>Edit Stock Item</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label class="form-label">Item Name</label>
                        <!-- Notice the value attribute pre-fills the input with existing data -->
                        <input type="text" name="item_name" class="form-control" value="<?php echo $row['item_name']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" value="<?php echo $row['quantity']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price (₱)</label>
                        <input type="number" step="0.01" name="price" class="form-control" value="<?php echo $row['price']; ?>" required>
                    </div>
                    <button type="submit" name="update" class="btn btn-warning w-100">Update Item</button>
                    <a href="read.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>