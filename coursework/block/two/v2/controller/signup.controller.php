<?php

class SignupController
{

    private $username;
    private $password;
    private $password_repeat;
    private $first_name;
    private $last_name;

    private $is_errors = null;
    private $errors = [
        "action" => "signup",
        "username" => [
            "empty" => null,
            "invalid" => null,
            "taken" => null
        ],
        "password" => [
            "empty" => null,
            "match" => null
        ],
        "first_name" => [
            "empty" => null,
            "invalid" => null
        ],
        "last_name" => [
            "empty" => null,
            "invalid" => null
        ]
    ];

    public function __construct($username, $password, $password_repeat, $first_name, $last_name)
    {
        $this->username = trim($username);
        $this->password = trim($password);
        $this->password_repeat = trim($password_repeat);
        $this->first_name = trim($first_name);
        $this->last_name = trim($last_name);
    }

    // Data Validation

    /**
     * @return bool
     * TRUE if there are no errors, otherwise true
     */
    private function validate_username(): bool
    {
        $this->errors["username"]["empty"] = (empty($this->username));
        $this->errors["username"]["invalid"] = !preg_match("/^[a-zA-Z0-9]*$/", $this->username);
        // todo check taken when getUser is implemented
        $this->errors["username"]["taken"] = null;
        // todo implement check when getUser is implemented
        $invalid = $this->errors["username"]["empty"] || $this->errors["username"]["invalid"]; // || $this->errors["username"]["taken"]
        return !$invalid;
    }

    /**
     * @return bool
     * TRUE if there are no errors, otherwise true
     */
    private function validate_password(): bool
    {
        $this->errors["password"]["empty"] = (empty($this->password));
        $this->errors["password"]["no_match"] = $this->password !== $this->password_repeat;
        $invalid = $this->errors["password"]["empty"] || $this->errors["password"]["no_match"];
        return !$invalid;
    }

    /**
     * @return bool
     * TRUE if there are no errors, otherwise true
     */
    private function validate_first_name(): bool
    {
        $this->errors["first_name"]["empty"] = (empty($this->first_name));
        $this->errors["first_name"]["invalid"] = !preg_match("/^[a-zA-Z0-9 ]*$/", $this->first_name);
        $invalid = $this->errors["first_name"]["empty"] || $this->errors["first_name"]["invalid"];
        return !$invalid;
    }

    /**
     * @return bool
     * TRUE if there are no errors, otherwise true
     */
    private function validate_last_name(): bool
    {
        $this->errors["last_name"]["empty"] = (empty($this->last_name));
        $this->errors["last_name"]["invalid"] = !preg_match("/^[a-zA-Z0-9 ]*$/", $this->last_name);
        $invalid = $this->errors["last_name"]["empty"] || $this->errors["last_name"]["invalid"];
        return !$invalid;
    }

    /**
     * @return bool
     * TRUE if there are no errors, otherwise true
     */
    private function valid(): bool
    {
        return
            $this->validate_username() &
            $this->validate_password() &
            $this->validate_first_name() &
            $this->validate_last_name();
    }

    // Sign Up User

    public function sign_up_user()
    {
        // if any of the input is invalid
        // reload the page with any error messages
        if (!$this->valid()) {
            session_start();
            $_SESSION["errors"] = $this->errors;
            header("Location: ../view/index.php");
        }

        // Otherwise, there is good input
        // therefore, the user can be signed up
        $this->set_user();

    }

}