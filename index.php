<?php
global $conn;
include 'db_connection.php';

// Fetch contacts from the database
$query = "SELECT * FROM contacts_table";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Phone Book Management</title>
</head>
<body>
<h1>Phone Book Management</h1>
<table border="1">
    <tr>
        <th>Name</th>
        <th>Phone Number</th>
        <th>Action</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['phone_number']; ?></td>
            <td>
                <a href="edit_contact.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete_contact.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
<br>
<a href="add_contact.php">Add Contact</a>
</body>
</html>