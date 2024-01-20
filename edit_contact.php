<?php
session_start();
if (!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}

include 'db_connection.php';
$phoneManagement = new PhoneManagement();
if (!isset($_GET['id'])){
    header('Location: dashboard.php');
    exit;
}

$contactId = $_GET['id'];
$phoneNum = $phoneManagement->getPhoneNumById($contactId);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $phoneManagement->updatePhoneNum($contactId,$name,$phone);

    header('Location: dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contact</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Contact</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name"
                   name="name" value="<?php echo $phoneNum['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" class="form-control" id="phone"
                   name="phone" value="<?php echo $phoneNum['phone']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Contact</button>
    </form>
</div>
</body>
</html>

