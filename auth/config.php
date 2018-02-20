<?php

session_start();

date_default_timezone_set("Israel");

require_once("auth/restrict.php");
require_once("connection/db.php");
require_once("models/user.php");
require_once("models/car.php");
require_once("models/upload.php");
require_once("handlers/db-handler.php");
require_once("handlers/auth-handler.php");
require_once("handlers/validation-handler.php");
require_once("handlers/car-handler.php");
require_once("handlers/message-handler.php");
require_once("handlers/user-handler.php");

?>
