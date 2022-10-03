<?php
// controller, class that takes input from user
class LoginContr extends Login
{

    private $email;
    private $password;


    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function loginUser()
    {

        $this->getUser($this->email, $this->password);

        if ($this->admin) {
            $this->location = "admin.php";
        } else {

            $this->location = "index.php";
        }
        
    }
}