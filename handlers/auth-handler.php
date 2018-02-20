<?php

class AuthHandler {
    private function __construct() {
    }

    public static function checkIfExists($table, $field, $value) {
        $result = DatabaseHandler::whereOne($table, $field, $value);

        if ($result) {
            return true;
        } else {
            return false;
        }    
    }

    public static function register() {
        if (isset($_POST["register"])) {
            $regUserName = "/^[A-Za-z0-9_]{3,20}$/";
            $regFullName = "/^[a-zA-Z]*$/";
            $regEmail    = "/^([\w-]+(?: \.[\w-]+)*)@((?: [\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?: \.[a-z]{2})?)$/";
            $regPassword = "/^[A-Za-z0-9!@#$%^&*()_]{6,20}$/";
        
            if (!ValidationHandler::validateInputs($_POST["userName"], $regUserName)) {
                $errors[] = "Username is invalid";
            } else {
                $userName = ValidationHandler::testInput(strtolower($_POST["userName"]));
            }
        
            if (!ValidationHandler::validateInputs($_POST["firstName"], $regFullName)) {
                $errors[] = "First name is invalid";
            } else {
                $firstName = ValidationHandler::testInput(strtolower($_POST["firstName"]));
            }
        
            if (!ValidationHandler::validateInputs($_POST["lastName"], $regFullName)) {
                $errors[] = "Last name is invalid";
            } else {
                $lastName = ValidationHandler::testInput(strtolower($_POST["lastName"]));
            }
        
            if (!ValidationHandler::validateInputs($_POST["email"], $regEmail)) {
                $errors[] = "Email is invalid";
            } else {
                $email = ValidationHandler::testInput(strtolower($_POST["email"]));
            }
        
            if (!ValidationHandler::validateInputs($_POST["password"], $regPassword)) {
                $errors[] = "Password is invalid";
            } else {
                $password = ValidationHandler::testInput($_POST["password"]);
            }
        
            if (!ValidationHandler::validateInputs($_POST["confirmPassword"], $regPassword)) {
                $errors[] = "Confirm password is invalid";
            } else {
                $confirmPassword = ValidationHandler::testInput($_POST["confirmPassword"]);
            }
        
            if ($_POST["password"] !== $_POST["confirmPassword"]) {
                $errors[] = "Passwords are not matched";
            }

            if (self::checkIfExists('User', 'UserName', $userName)) {
                $errors[] = "Username is already in used";
            }

            if (self::checkIfExists('User', 'Email', $email)) {
                $errors[] = "Email is already in used";
            }

            if (empty($errors)) {
                $userName     = DatabaseHandler::escape($userName);
                $email        = DatabaseHandler::escape($email);
                $firstName    = DatabaseHandler::escape($firstName);
                $lastName     = DatabaseHandler::escape($lastName);
                $hashPassword = DatabaseHandler::escape(password_hash($password, PASSWORD_DEFAULT));
        
                $user = new User(null, $userName, $email, $firstName, $lastName, $hashPassword, null);
                $user->setUser();

                $user->goToHome();
            } else {
                return MessageHandler::error($errors);
            }
        }
    }

    public static function login() {
        if (isset($_POST["login"])) {
            $userName = DatabaseHandler::escape(strtolower($_POST["userName"]));
            $password = DatabaseHandler::escape($_POST["password"]);

            $user = DatabaseHandler::whereOne('User', 'UserName', $userName);

            if ($user && password_verify($password, $user->getPassword()) == 1) {
                if (isset($_POST["remember"]) && $_POST["remember"] == true) {
                    $user->setCookie();
                } else {
                    $user->setSession();
                }

                $user->goToHome();
            } else {
                return MessageHandler::error("You have entered an invalid username or password");
            }
        }
    }
}

?>
