<?php
global $conn;
include 'db_connection.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];

    // Check if name or phone number is empty
    if(empty($name) || empty($phone_number)){
        echo "All fields are required.";
    } else {
        // Insert new contact into the database
        $stmt = $conn->prepare("INSERT INTO contacts_table (name, phone_number) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $phone_number);
        $stmt->execute();
        $stmt->close();

        // Redirect to index.php page
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
<h1>Add Contact</h1>
<form method="post" action="">
    <label>Name:</label>
    <input type="text" name="name" required>
    <br>
    <label>Phone Number:</label>
    <input type="text" name="phone_number" required>
    <br>
    <input type="submit" name="submit" value="Add">
</form>
</body>
</html>