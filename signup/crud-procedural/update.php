<?php
include 'connect.php';

$userid = $_GET['userid'];


$sql = "SELECT * FROM users WHERE userid = $userid";
$stmt = $conn->prepare($sql);
$stmt->execute();
$user =   $stmt->fetch();


?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">



</head>

<body>



    <!-- Form -->

    <main>
        <form class="mx-1 mx-md-4" id="registrationForm" action="update.func.php" method="post">
            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="name-registration">Full Name</label>
                    <div class="d-flex flex-wrap" id="flex-name">
                        <input type="text" name="fname" id="fname-registration" class="form-control" value="<?php echo explode(' ', trim($user["fullname"]))[0]; ?>" />

                        <input type="text" name="sname" id="sname-registration" class="form-control" value="<?php echo explode(' ', trim($user["fullname"]))[1]; ?>" />

                        <input type="text" name="tname" id="tname-registration" class="form-control" value="<?php echo explode(' ', trim($user["fullname"]))[2]; ?>" />

                        <input type="text" name="lname" id="lname-registration" class="form-control" value="<?php echo explode(' ', trim($user["fullname"]))[3]; ?>" />
                        <small id="name-small"></small>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="email-registration">Your Email</label>
                    <input type="text" name="email" id="email-registration" class="form-control" value="<?php echo $user['email']; ?>" />
                    <small></small>
                </div>
            </div>
            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="phone-registration">Phone Number</label>
                    <input type="tel" name="phone" id="phone-registration" class="form-control" value="<?php echo $user['phone']; ?>" />
                    <small></small>
                </div>
            </div>
            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="dob-registration">Date of Birth</label>
                    <input type="date" name="dob" id="dob-registration" class="form-control" value="<?php echo $user['dob']; ?>" />
                    <small></small>
                </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="password-registration">Password</label>
                    <input name="password" type="password" id="password-registration" class="form-control" />
                    <small></small>
                </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                    <label class="form-label" for="role">Role</label>
                    <input type="text" name="role" id="role" class="form-control" value="<?php echo $user['role']; ?>" />
                    <small></small>
                </div>
            </div>
            <input type="text" hidden name="id" value="<?php echo $userid ?> ">
            <input type="submit" name="submit">
        </form>
    </main>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>