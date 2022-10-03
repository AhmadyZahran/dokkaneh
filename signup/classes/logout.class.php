<?php

class Logout extends Dbh
{
    public function changestatusUser($email)
    {

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            exit();
        }


        $stmt = null;
    }
}
