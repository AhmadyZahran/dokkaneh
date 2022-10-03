<?php 

require_once './connection.php'; 

$id= $_GET['id'];

$sql = "SELECT * FROM users where id=$id" ;  

$stmt=$conn->query($sql);

$result = $stmt->fetch(PDO::FETCH_OBJ);                                                                                                                

$sql2 = "SELECT * FROM orders where user_id = 1" ;  

$stmt2=$conn->query($sql2);

$result2 = $stmt2->fetchAll(PDO::FETCH_OBJ); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a48380e5b0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./profile.css">
    <style>
        
    </style>
</head>

<body>
    <h1>Profile</h1>
            <button type="button" data-bs-target="#exampleModal" data-bs-toggle="modal"
            class="btn btn-primary profile_info" id='orders_button' data-toggle="modal" data-target="#exampleModal">
                Profile
            </button>
            <button type="button" data-bs-target="#exampleModal" data-bs-toggle="modal"
            class="btn btn-primary user_orders" id='profile_button' data-toggle="modal" data-target="#exampleModal">
                My Orders
            </button>
        <form  method="post" class="container">
     </div> <div class="forms"> <div class="inputs"> <span>First Name</span> <input type="text"  value="<?php echo $result->name;?>"></div> 
     <div class="inputs"> <span>Address</span> <input type="text"  value="<?php echo $result->address;?>"> </div> <div class="inputs"> 
        <span>Email</span> 
     <input type="text"  value="<?php echo $result->email;?> "></div> <div class="inputs">
         <span>Phone</span> <input type="text"  value="<?php echo $result->phone;?> ">
         <div class="inputs">
         <span>Password</span> <input type="text"  value="<?php echo $result->pass?>"></div>  
         <div class="button">
            <input name="submit" type="submit">
                            <input type="hidden" name="id" value="<?php echo $result->id?>" > 
        </div>
</form>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Payment</th>
                <th>User ID</th>
                <th>Current Date</th>
          </tr>
          
            <?php foreach ($result2 as $order) {?>
                <tr>
                 <td><?php echo $order->id?></td>
                 <td><?php echo $order->payment?></td>
                 <td><?php echo $order->user_id?></td>
                 <td><?php echo $order->currentdate?></td>
                </tr>
           <?php }?>
        
        </table>
    <?php
    if(isset($_POST["submit"])) {
        $name= $_POST["name"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        $id = $_POST["id"];


        $sql = "UPDATE users SET name=:name ,email=:email , address=:address , phone=:phone ,pass=:password   WHERE id=$id";
        echo "<meta http-equiv='refresh' content='0'>";

  // Prepare statement
  $stmt = $conn->prepare($sql); 
  
  //bindparam//
$stmt->bindParam(':name',$name, PDO::PARAM_STR);
$stmt->bindParam(':email',$email, PDO::PARAM_STR);
$stmt->bindParam(':address',$address, PDO::PARAM_STR);
$stmt->bindParam(':phone',$phone, PDO::PARAM_STR);
$stmt->bindParam(':password',$password, PDO::PARAM_STR);
// $stmt->bindParam(':id',$id, PDO::PARAM_STR);
  

  // execute the query
   $stmt->execute();
   
   
   

    }
    ?>


        <script>
            const profileButton = document.getElementById('profile_button');
            const info = document.getElementById('info');
            const ordersButton = document.getElementById('orders_button');
            const ordersTable = document.querySelector('table');

            profileButton.addEventListener('click', ()=>{
                info.style.display='block';
                ordersTable.style.display='none';
                profileButton.style.fontWeight='bold';
                ordersButton.style.fontWeight='normal';
            });
            ordersButton.addEventListener('click', ()=>{
                ordersTable.style.display='block';
                info.style.display='none';
                ordersButton.style.fontWeight='bold';
                profileButton.style.fontWeight='normal';
            })
        </script>
</body>

</html>
