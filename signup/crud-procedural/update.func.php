<?php
include 'connect.php';

try {
    $userid = $_POST['id'];


    $fullname = $fname . " " . $sname . " " . $tname . " " . $lname;
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $hashedpwd = password_hash(
        $password,
        PASSWORD_DEFAULT
    );

    if ($password == "") {
        $sql = "UPDATE users SET name='$fullname', email='$email', phone='$phone', role='$role' WHERE id=$userid";
    } else {

        $sql = "UPDATE users SET name='$fullname', email='$email', phone='$phone', pass='$hashedpwd',  role='$role' WHERE id=$userid";
    }

    $stmt = $conn->prepare($sql);

    // Execute the prepared statement
    $stmt->execute();
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

header("Location: http://localhost/dokkaneh/admin.php");
exit();
