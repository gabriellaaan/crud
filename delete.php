<?php
include('config.php');

// Fetch ID from the URL
$id = $_GET['id'];

// Delete data from the database
$sql = "DELETE FROM users WHERE id=$id";
if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
    exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>