<?php

if (!(basename($_SERVER["SCRIPT_FILENAME"], ".php") === "login") && !(basename($_SERVER["SCRIPT_FILENAME"], ".php") === "register")) {
    isLoggedIn();
    userId();
}

function isLoggedIn() {
    if (!isset($_SESSION["isLoggedIn"]) && !isset($_SESSION["user"]) && !isset($_SESSION["id"]) && !isset($_COOKIE["userName"]) && !isset($_COOKIE["password"])) {
        header("Location: login.php");
        exit();
    }
    
    if (!isset($_SESSION["isLoggedIn"]) && !isset($_SESSION["user"]) && !isset($_SESSION["id"]) && isset($_COOKIE["userName"]) && isset($_COOKIE["password"])) {
        $userName = $_COOKIE["userName"];
        $password = $_COOKIE["password"];
        $sql = "SELECT * FROM User WHERE UserName = '$userName' LIMIT 1";
        global $conn;
        $result = $conn->getSingleData($sql, "User");
    
        if ($result && $result->getPassword() == $password) {
            $_SESSION["isLoggedIn"] = true;
            $_SESSION["user"]       = $result->getUserName();
            $_SESSION["id"]         = $result->getId();
        }
    }    
}

function userId() {
    if (isset($_SESSION["id"])) {
        global $userId;
        $userId = $_SESSION["id"];
    }
}

?>
