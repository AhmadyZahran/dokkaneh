<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body>
    <button id="logout">Logout</button>

    <h1>Hello</h1>
    <h2>Your email is:
        <?php
        include './crud-procedural/connect.php';
        session_start();
        $email =  $_SESSION['email'];
        if (isset($email)) {
        ?>
            <span id="loggedEmail"> <?php echo $email; ?></span>
        <?php
        }
        ?>
    </h2>
    <form action="#" method="post" enctype="multipart/form-data">
        <label class="form-label" for="image-registration">Upload Your Image</label>
        <input type="file" name="image" id="image-registration" class="form-control" />
        <input type="submit" value="submit" name="submit">
    </form>

    <?php

    $sql = "SELECT img FROM users WHERE email = '$email'";
    $stmt = $conn->prepare($sql);

    // Execute the prepared statement
    $stmt->execute();
    $img = $stmt->fetch();
    $path = "./images/";
    // print_r($img);
    ?>

    <div>
        <img src="<?php echo $path . $img['img']; ?>" alt="" width="200px">
    </div>
    <script src="./js/app.logout.js"></script>
</body>

</html>

<?php


if (isset($_POST['submit'])) {
    // print_r($_FILES);
    $image = $_FILES["image"]["name"];


    $sql = "UPDATE users SET img='$image' WHERE email = '$email'";
    $stmt = $conn->prepare($sql);

    // Execute the prepared statement
    $stmt->execute();
}




?>