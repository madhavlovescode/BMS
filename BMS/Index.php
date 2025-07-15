<?php
require_once './controller/LoginController.php';

$controller = new LoginController();
$controller->login();

require_once './view/Login.php';
