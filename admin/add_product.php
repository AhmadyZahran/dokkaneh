
<?php

require_once './dbConnection.php';

$sql="SELECT * FROM categories ";
$getData= $conn->query($sql);
$category=$getData->fetchAll(PDO::FETCH_OBJ);




?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="styleAdmin.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Admin Dashboard</title>
</head>
<body>
<form method="post">
<label class =" label" >
    Product Name: 
<span class="textInputWrapper">
<input name="name" type="text" class="textInput">

</span>

</label>

<label class =" label" >
    Product Discount: 
<span class="textInputWrapper">
<input name="discount" type="text"  class="textInput">

</span>

</label>
<label class =" label" >
    Product Image: 
<span class="textInputWrapper">
<input name="image" type="file"  class="textInput">

</span>

</label>
<label class =" label" >
    Product Price: 
<span class="textInputWrapper">
<input name="price" type="text"  class="textInput">
<span class="input-border"></span>

</span>

</label>
<label class =" label" >
    Product Category: 
<span class="textInputWrapper">
<select name="category" >
<?php
foreach ($category as $name){
?>
<option value="<?php echo $name->name;?>
"></option>
<?php }?>

</select>

</span>

</label>
<label class =" label" >
    Product Discount %: 
<span class="textInputWrapper">
<input name="discount" type="number"  class="textInput">
<span class="input-border"></span>

</span>

</label>

<button type="submit" name="update_user" class="edit_record">Save changes</button>


</form>
<!-- ///////////////////// SCRIPTS ///////////////////// -->
<script src="./dashboardJs.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/8b42dcad4f.js" crossorigin="anonymous"></script>
</body>
</html>
<?php 

if(isset($_POST['update_user']))
{
    // echo 'ggggggggggggggggggg';
  $name=$_POST['name'];
  $discount=$_POST['discount'];
  $image=$_POST['image'];
  $price=$_POST['price'];

  $sql="UPDATE products 
  SET name=:name,discount=:discount,image=:image,price=:price 
  WHERE id=$id";
 
  $stmt=$conn->prepare($sql);
  $stmt->bindParam(':name',$name,PDO::PARAM_STR);
  $stmt->bindParam(':discount',$discount,PDO::PARAM_STR);
  $stmt->bindParam(':image',$image,PDO::PARAM_STR);
  $stmt->bindParam(':price',$price,PDO::PARAM_STR);
//   $stmt->bindParam(':id',$user->id,PDO::PARAM_STR);

  $stmt->execute();
  header("location: admin.php");

}

?>