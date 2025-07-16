<?php
require_once './controller/RegisterController.php';

$controller = new RegisterController();
$controller->register();

include './view/Register.php';
