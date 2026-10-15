<?php
// Connect to the database
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini Mart Inventory</title>
    <!-- Bootstrap styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Mini Mart Stock Inventory</h4>
                <!-- Button to go back to the add item form -->
                <a href="create.php" class="btn btn-primary btn-sm">Add New Item</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Price (₱)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // 1. Write the query to select all products
                        $sql = "SELECT * FROM products";
                        $result = $conn->query($sql);

                        // 2. Check if there are any rows in the table
                        if ($result->num_rows > 0) {
                            // 3. Loop through each row of data
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row['id'] . "</td>
                                        <td>" . $row['item_name'] . "</td>
                                        <td>" . $row['quantity'] . "</td>
                                        <td>₱" . number_format($row['price'], 2) . "</td>
                                        <td>
                                            <!-- These buttons pass the specific item ID to the update and delete pages -->
                                            <a href='update.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                                            <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a>
                                        </td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>No stock found in the database.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>