<?php
require_once './dbConnection.php';

$id = $_REQUEST["id"];
$sql = "DELETE FROM products where id = :id";
$query = $conn->prepare($sql);
$query->bindParam(":id", $id, PDO::PARAM_STR);
$query->execute();

$sql = "DELETE FROM products where id = :id";
$query = $conn->prepare($sql);
$query->bindParam(":id", $id, PDO::PARAM_STR);
$query->execute();
header("Location: admin.php");

?>