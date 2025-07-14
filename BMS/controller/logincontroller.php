<?php
 require_once "./model/modelcontroller.php";
 require_once "./config/db.php";
 session_start();

class logincontroller{
	public function login(){
		if($_SERVER['REQUEST_METHOD']=== 'POST'){
			$username=$_POST['username'];
			$password=$_POST['password'];
			$adminid="admin";
			$adminpass="admin";

			if($username===$adminid && $password===$adminpass){
				header('location:./view/admdashboard.php');
				exit();
			}

			$model = new UserModel($GLOBALS['conn']);
            $userData = $model->checkLogin($username, $password);
            $_SESSION['id'] = $userData['id'];
             if ($userData) {
                $_SESSION['id'] = $userData['id'];
                header('Location: view/bloggerdashboard.php');
                exit();
            } else {
                echo 'Invalid Credentials';
            }
            $result = $this->conn->query($query);

			
		}
	}

}
?>