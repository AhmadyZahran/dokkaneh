<?php
$email = $_POST['loggedEmail'];

include "../classes/dbh.class.php";

include '../classes/logout.class.php';

$statusChange = new Logout();
$statusChange->changestatusUser($email);


session_start();
session_unset();
session_destroy();

// Go back to index
// echo not header because JS
echo "signup.php";