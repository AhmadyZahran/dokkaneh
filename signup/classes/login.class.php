<?php

// Model, query into the database -> extend to the database
class Login extends Dbh
{
    public $location;
    public $err;
    protected $admin;

    protected function getUser($email, $password)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ?;');


        if (!$stmt->execute(array($email))) {
            $stmt = null;
            $this->location = "index.php?error=stmtfailed";
            // exit();
            return;
        }


        if ($stmt->rowCount() == 0) {
            $stmt = null;
            $this->err = "email not found";
            // exit();
            return;
        }

        $userInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($password, $userInfo[0]['pass']);

        if ($checkPwd == false) {
            $stmt = null;
            $this->err = "wrong password";
            return;
        } else {

            if (!$stmt->execute(array($email))) {
                $stmt = null;
                $this->location = "signup.php?error=stmtfailed";
                // exit();
                return;
            }


            $stmt = null;

            if ($userInfo[0]['role'] == 'admin') {
                $this->admin = true;
            } else {
                $this->admin = false;
            }

            session_start();
            $_SESSION['email'] = $userInfo[0]['email'];

            $stmt = null;
        }


        $stmt = null;
    }
}