<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
 
    $sql = "UPDATE users SET name='$name', email='$email', age=$age WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Fetch data based on the ID from the URL
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
$row = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>

<h2>Edit User</h2>

<form action="" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
    <br>
    <label for="age">Age:</label>
    <input type="number" name="age" value="<?php echo $row['age']; ?>" required>
    <br>
    <input type="submit" value="Save Changes">
</form>

<br>

<a href="index.php">Back to User List</a>

</body>
</html>