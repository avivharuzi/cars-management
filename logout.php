<?php

require_once("auth/config.php");

session_destroy();
setcookie("userName", "", time() - 3600);
setcookie("password", "", time() - 3600);

header("Location: login.php");
exit();

?>
