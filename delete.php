<?php
include 'config.php';

// 1. Get the item ID from the URL
$id = $_GET['id'];

// 2. Write and execute the delete query
$sql = "DELETE FROM products WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    // 3. Redirect back to the table immediately
    header("Location: read.php");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}
?>