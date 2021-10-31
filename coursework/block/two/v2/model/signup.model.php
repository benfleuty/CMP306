<?php

class Signup extends DatabaseHandler
{
    protected function user_exists($username)
    {
        $sql = 'select id from CMP306BlockTwoUsers where username = ?;';
        $stmt = $this->connect()->prepare($sql);

        if (!$stmt->execute($username)) {
            $stmt = null;
            //redirect?
            exit();
        }

        return $stmt->num_rows() > 0;
    }

    // Set User

    protected function set_user($username, $password, $first_name, $last_name)
    {
        $sql = "insert into CMP306BlockTwoUsers (username, password, first_name, last_name) VALUES (?,?,?,?);";
        $stmt = $this->connect()->prepare($sql);

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bind_param("ssss",$username,$hashed_password,$first_name,$last_name);

        // if the query fails
        if (!$stmt->execute()) {
            // error to user
            $stmt = null;
            session_start();
            $_SESSION["errors"]["create_user"] = "failed";
            exit();
        }

        $stmt = null;
    }
}