<?php

print_r($_POST);
var_dump($_POST);
$data = $_POST;
$data = $_POST;
$id=1;
// validate required fields
$errors = [];
foreach (['fullName', 'address1', 'phone', 'email'] as $field) {
    if (empty($data[$field])) {
        $errors[] = sprintf('The %s is a required field', $field);
    }
}
if (!empty($errors)) {
    echo implode('<br/>', $errors);
    exit;
}
$email = $data['email'];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'invalid email format';
    exit;
    # code...
}
require_once('Connection.php');

$stmt = $conn->prepare('UPDATE `users` SET
  phone=:phone,
  address=:address,
  email=:email,
 name=:fullName
 WHERE id =:id');
 var_dump($stmt);
    $stmt->execute(array(
        ':phone'=>$data["phone"],
        ':address'=>$data["address1"],
        ':email'=>$data["email"],
        ':name'=>$data["fullName"]
    ));
//  echo "user updated";




//  $stmt = $conn->prepare("INSERT INTO  `cart` values

//  WHERE `cart_id` =:id");
//     $stmt->execute(array(
//         ":phone"=>$data['phone'],
//         ":address"=>$data['address1'],
//         ":email"=>$data['email'],
//         ":name"=>$data['fullName']
//     ));
//  echo "user updated";

    
// if (isset($_GET['id']) && isset($_POST['checkform'])) {
    // $id=1;
    // $cart_id=2;
    // // $id = $_GET['id'];
    // $name = $_POST['fullName'];
    // $address = $_POST['address'];
    // $phone = $_POST['phone'];
    // $email = $_POST['email'];
    // $sql = "UPDATE `users` SET
    //  `phone	`='$phone',
    //  `address`='$address',
    //  `email`='  $email'
    //  'name'='$name'
    //  WHERE `id` =$id";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute([$name, $address, $phone, $email]);
    // $sql2 = "INSERT INTO `orders`( `payment`, `user_id`) VALUES ('',$cart_id)";


    // $stmt = $pdo->prepare($sql2);
    // $stmt->execute([$payment, $user_id]);

    // require 'index.php';
    // echo " Confirmation Successfull";
// } else {
//     echo "Invalid";
// }