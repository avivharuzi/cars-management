<?php

class User {
    private $Id;
    private $UserName;
    private $Email;
    private $FirstName;
    private $LastName;
    private $Password;
    private $ProfileImage;
    
    public function __construct() {
        if (func_num_args() > 0) {
            $this->Id           = func_get_arg(0);
            $this->UserName     = func_get_arg(1);
            $this->Email        = func_get_arg(2);
            $this->FirstName    = func_get_arg(3);
            $this->LastName     = func_get_arg(4);
            $this->Password     = func_get_arg(5);
            $this->ProfileImage = func_get_arg(6);
        }
    }

    public function getId() {
        return $this->Id;
    }

    public function getUserName() {
        return $this->UserName;
    }

    public function getEmail() {
        return $this->Email;
    }

    public function getFirstName() {
        return $this->FirstName;
    }

    public function getLastName() {
        return $this->LastName;
    }
    
    public function getPassword() {
        return $this->Password;
    }

    public function getProfileImage() {
        if ($this->ProfileImage === "default-profile.png") {
            return "assets/images/defaults/" . $this->ProfileImage;
        } else {
            return "assets/images/uploads/profiles/" . $this->ProfileImage;
        }
        
    }

    public function setUser() {
        $sql = "INSERT INTO User (UserName, Email, FirstName, LastName, Password)
        VALUES ('$this->UserName', '$this->Email', '$this->FirstName', '$this->LastName', '$this->Password')";
        $id = DatabaseHandler::insert($sql);
        $_SESSION["isLoggedIn"] = true;
        $_SESSION["user"]       = $this->UserName;
        $_SESSION["id"]         = $id;
    }

    public function setCookie() {
        $_SESSION["isLoggedIn"] = true;
        $_SESSION["user"]       = $this->UserName;
        $_SESSION["id"]         = $this->Id;
        setcookie("userName", $this->UserName, time() + (86400 * 365));
        setcookie("password", $this->Password, time() + (86400 * 365));
    }

    public function setSession() {
        $_SESSION["isLoggedIn"] = true;
        $_SESSION["user"]       = $this->UserName;
        $_SESSION["id"]         = $this->Id;
    }

    public function goToHome() {
        header("Location: index.php");
        exit();
    }
}

?>
