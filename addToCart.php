<?php
require_once("connection.php");


if (isset($_GET['id'])) {
  global $conn;
  $id = $_GET['id'];
  $sql = "SELECT * FROM products WHERE id = $id";
  $stmt = $conn->query($sql);
  $item = $stmt->fetch(PDO::FETCH_ASSOC);

  $sql2 = "INSERT INTO cart (products_id , quantity, total)
  VALUES ($id, 1, 1)";
  $conn->exec($sql2);
  header("Location:index.php");
}
