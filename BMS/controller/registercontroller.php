<?php
require_once "./model/modelcontroller.php";
require_once './config/db.php';

class registercontroller{
	public function register(){
		if($_SERVER['REQUEST_METHOD']==='POST'){
			$name=$_POST['name'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$model=new usermodel($GLOBALS['conn']);
			
			if($model->registeruser($name,$email,$password)){
				echo "registration successfull.<a href='index.php'>Login Now </a>";
			}

		}
	}
}

?>