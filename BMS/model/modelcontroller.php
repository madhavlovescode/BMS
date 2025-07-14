<?php

class usermodel{
	private $conn;

	public function __construct($conn)
	{
		$this->conn=$conn;
	}

	public function registeruser($name, $username, $password)
    {
        $sql = "INSERT INTO blogger (name, email, password) VALUES ('$name', '$username', '$password')";
        return $this->conn->query($sql);
    }

    public function checklogin($username,$password)
    {
    	$sql="SELECT * FROM blogger WHERE email = '$username' AND password = '$password'";
    	$result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }
    public function createblog($blogger_id,$title,$description,$date,$category,$status){
    	$sql="INSERT into blog (blogger_id,title,description,created_on,category,status) VALUES ('$blogger_id','$title','$description','$date','$category','$status')";
    	return $this->conn->query($sql);
    }
    public function getallblog(){
    	$sql="SELECT * from blog";
    	return $this->conn->query($sql);
       }

    public function deleteblog($id){
    	$sql="DELETE FROM blog WHERE blog_id = '$id'";
        return $this->conn->query($sql);
    }

    //update page code by blogger

    public function getblogbyid($id)
    {
        $sql = "SELECT * FROM employee WHERE id = '$id'";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }
}
?>