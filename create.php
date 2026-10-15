<?php
// 1. Connect to the database
include 'config.php';
$message = "";

// 2. Check if the form was submitted
if (isset($_POST['submit'])) {
    // 3. Grab the data from the form fields
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // 4. Write the SQL query to insert the data
    $sql = "INSERT INTO products (item_name, quantity, price) VALUES ('$item_name', '$quantity', '$price')";

    // 5. Execute the query and check if it worked
    if ($conn->query($sql) === TRUE) {
        $message = "<div class='alert alert-success'>New product added successfully!</div>";
    } else {
        $message = "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Stock</title>
    <!-- Importing Bootstrap for instant styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow" style="max-width: 500px; margin: auto;">
            <div class="card-header bg-primary text-white">
                <h4>Add New Stock Item</h4>
            </div>
            <div class="card-body">
                
                <!-- Display success or error messages -->
                <?php echo $message; ?>

                <!-- The Form -->
                <form method="POST" action="">
                    <div class="mb-3">
                        <label class="form-label">Item Name</label>
                        <input type="text" name="item_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price (₱)</label>
                        <input type="number" step="0.01" name="price" class="form-control" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-100">Save Item</button>
                    <a href="read.php" class="btn btn-secondary w-100 mt-2">View Inventory</a>
                </form>

            </div>
        </div>
    </div>
</body>
</html>