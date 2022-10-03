<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">


</head>

<body>
    <button id="logout">Logout</button>

    <h1>Hello</h1>
    <h2>Admin:
        <?php
        include './classes/dbh.class.php';
        $dbh = new Dbh();
        $stmt = $dbh->connect()->prepare("SELECT * FROM users;");

        $stmt->execute();

        $users = $stmt->fetchAll();


        session_start();

        if (isset($_SESSION['email'])) {
        ?>
            <span id="loggedEmail"> <?php echo $_SESSION['email']; ?></span>
        <?php
        }

        ?>
    </h2>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Password</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $user) {
            ?>

                <tr>
                    <th scope="row"><?php echo $user['id'] ?></th>
                    <td><?php echo $user['name'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td><?php echo $user['phone'] ?></td>
                    <td><?php echo $user['pass'] ?></td>
                    <td><?php echo $user['role'] ?></td>
                    <td>
                        <a href="./crud-procedural/update.php?userid=<?php echo $user['userid']; ?>" class="btn btn-small btn-primary" style="background-color:#1e2367; border:none"><i class="fa fa-pencil-alt"></i></a>
                        <a href="./crud-procedural/delete.php?userid=<?php echo $user['userid']; ?>" class="btn btn-danger" style="background-color:#75312D; border:none"><i class="fa fa-times"></i></a>

                    </td>

                </tr>

            <?php
            }
            ?>

        </tbody>
    </table>
    <script src="./js/app.logout.js"></script>
</body>

</html>