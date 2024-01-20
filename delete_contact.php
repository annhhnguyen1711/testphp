<?php
global $conn;
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $contact_id = $_GET['id'];

    // Delete contact
    $query = "DELETE FROM contacts_table WHERE ID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $contact_id);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>
