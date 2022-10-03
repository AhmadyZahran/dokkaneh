<?php
require_once './dbConnection.php';

$id = $_REQUEST["id"];
try{
    $sql_order = "DELETE FROM orders where user_id = :id";
    $stmt = $conn->prepare($sql_order);
    $stmt->bindParam(":id", $id, PDO::PARAM_STR);
    $stmt->execute();

    $sql = "DELETE FROM users where id = :id";
$query = $conn->prepare($sql);
$query->bindParam(":id", $id, PDO::PARAM_STR);
$query->execute();
header("Location: admin.php");

}
catch(PDOException $e){
    // $sql = "DELETE FROM orders where user_id = :id";
    // $stmt = $conn->prepare($sql);
    // $stmt->bindParam(":id", $id, PDO::PARAM_STR);
    // $stmt->execute();
    // header("Location: adminDashboard.php");
echo 'erooooooooooooorr'. $e->getMessage();
}
?>