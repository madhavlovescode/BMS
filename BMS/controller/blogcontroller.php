<?php
require_once "../model/modelcontroller.php";
require_once "../config/db.php";


class blogcontroller{
	public function createblog(){
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$blogger_id = $_POST['blogger_id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $date= $_POST['date'];
            $category = $_POST['category'];
            $keyword= $_POST['keywords'];
            $status = $_POST['status'];

           $model = new UserModel($GLOBALS['conn']);

        if ($model->createblog($blogger_id, $title, $description, $date, $category,$keyword,$status)) {
                echo 'blog created successfully.Now wait for the admin to approve.';
                header('Location: blviewblog.php');
            } else {
                echo 'Error during task creation';
            }

	}
	}
}
?>