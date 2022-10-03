
<?php

require_once './dbConnection.php';



?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="styleAdmin.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Add User</title>
</head>
<body>
<form method="post">
<label class =" label" >
    User Name: 
<span class="textInputWrapper">
<input name="name" type="text" class="textInput">

</span>

</label>

<label class =" label" >
    User Email: 
<span class="textInputWrapper">
<input name="email" type="text"  class="textInput">

</span>

</label>
<label class =" label" >
    User Phone: 
<span class="textInputWrapper">
<input name="phone" type="text"  class="textInput">

</span>

</label>
</label>
<label class =" label" >
    User Password: 
<span class="textInputWrapper">
<input name="pwd" type="password"  class="textInput">

</span>

</label>
<label class =" label" >
    User Address: 
<span class="textInputWrapper">
<input name="address" type="text" class="textInput">
<span class="input-border"></span>

</span>

</label>

<button type="submit" name="add_user" class="edit_record">Save changes</button>


</form>
<!-- ///////////////////// SCRIPTS ///////////////////// -->
<script src="./dashboardJs.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/8b42dcad4f.js" crossorigin="anonymous"></script>
</body>
</html>
<?php 

if(isset($_POST['add_user']))
{
    // echo 'ggggggggggggggggggg';
  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $address=$_POST['address'];
  $pwd=$_POST['pwd'];


  $sql="INSERT INTO users (name, email, phone ,pass,address) VALUES (:name,:email,:phone,:pwd,:address)";
 
  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':name',$name,PDO::PARAM_STR);
  $stmt->bindParam(':email',$email,PDO::PARAM_STR);
  $stmt->bindParam(':phone',$phone,PDO::PARAM_STR);
  $stmt->bindParam(':pwd',$pwd,PDO::PARAM_STR);
  $stmt->bindParam(':address',$address,PDO::PARAM_STR);
//   $stmt->bindParam(':id',$user->id,PDO::PARAM_STR);

  $stmt->execute();
  header("location: admin.php");

}

?>