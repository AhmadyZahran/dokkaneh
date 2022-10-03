<?php
include 'connect.php';

$userid = $_GET['id'];
try {
    // sql to delete a record
    $sql = "DELETE FROM users WHERE id = $userid";
    $stmt = $conn->prepare($sql);

    // Execute the prepared statement
    $stmt->execute();
} catch (PDOException $e) {
    die("ERROR: not able to execute $sql. " . $e->getMessage());
}


header("Location: http://localhost/dokkaneh/admin.php");
exit();
