<?php

require_once "./controller/logincontroller.php";

$controller=new logincontroller();
$controller->login();
require_once "./view/login.php";
?>