<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Example</title>
</head>

<body>

    <h2>User List</h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Action</th>
        </tr>

        <?php
        // Include database connection
        include('config.php');
        // Fetch data from the database
        $result = mysqli_query($conn, "SELECT * FROM users");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>
        <a href='edit.php?id=" . $row['id'] . "'>Edit</a>
        <a href='delete.php?id=" . $row['id'] . "'>Delete</a>
        </td>";
            echo "</tr>";
        }
        ?>

    </table>

    <br>

    <a href="add.php">Add New User</a>

</body>
</htm