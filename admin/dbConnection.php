



<?php
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbName="dokkaneh";

  $dsn="mysql:host=$servername;dbname=$dbName";
  
  try{
    $conn=new PDO($dsn,$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo 'connected';
}
  catch(PDOException $e){

echo 'connection failed'. $e->getMessage();
  }

?>
