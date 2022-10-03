<?php
// controller, class that takes input from user
class RegisterContr extends Register
{

    private $fullName;
    private $email;
    private $password;
    private $phone;

    public function __construct($fullName, $email, $password, $phone)
    {
        $this->fullName = $fullName;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
    }

    public function registerUser()
    {
        if ($this->emailTakenCheck() == false) {
            // email taken
            $this->err = "This email is already registered";            return;
        }

        $this->setUser($this->fullName, $this->email, $this->password, $this->phone);
        $this->getUser($this->email);
        $this->location = "index.php";
    }
    // error handlers
    private function emailTakenCheck()
    {
        if (!$this->checkUser($this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
