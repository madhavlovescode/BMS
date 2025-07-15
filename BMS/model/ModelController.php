<?php

declare(strict_types=1);

class UserModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function registerUser(string $name, string $username, string $password)
    {
        $sql = "INSERT INTO blogger (name, email, password) VALUES ('$name', '$username', '$password')";
        return $this->conn->query($sql);
    }

    public function checkLogin(string $username, string $password)
    {
        $sql = "SELECT * FROM blogger WHERE email = '$username' AND password = '$password'";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    public function createBlog(string $bloggerId, string $title, string $description, string $date, string $category,string $keywords,string $imagepath, string $status)
    {
        $sql = "INSERT INTO blog (blogger_id, title, description,created_on, category, keyword, imagepath, status)
                VALUES ('$bloggerId', '$title', '$description', '$date', '$category', '$keywords', '$imagepath','$status')";
        return $this->conn->query($sql);
    }

    public function getAllBlogid($id)
    {
        $sql = "SELECT * FROM blog where blogger_id ='$id'";
        return $this->conn->query($sql);
    }
    public function getAllBlog()
    {
        $sql = "SELECT * FROM blog";
        return $this->conn->query($sql);
    }
    public function deleteBlog(string $id)
    {
        $sql = "DELETE FROM blog WHERE blog_id = '$id'";
        return $this->conn->query($sql);
    }
//update page by blogger
    public function getBlogById($id)
    {
        $sql = "SELECT * FROM blog WHERE blog_id = '$id'";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }
  public function UpdateBlog($blog_Id,$blogger_id,$title,$description,$created_on,$category ,$keyword,$status)
  {
      $sql="UPDATE blog SET blog_id = '$blog_Id', blogger_id = '$blogger_id', title = '$title',description = '$description',created_on = '$created_on',category='$category', keyword='$keyword', status = '$status' WHERE blog_id = '$blog_Id'";
        return $this->conn->query($sql);

    }

    public function AdmUpdateBlog($blog_Id,$blogger_id,$title,$description,$created_on,$category ,$keyword,$status)
  {
      $sql="UPDATE blog SET blog_id = '$blog_Id', blogger_id = '$blogger_id', title = '$title',description = '$description',created_on = '$created_on',category='$category', keyword='$keyword', status = '$status' WHERE blog_id = '$blog_Id'";
        return $this->conn->query($sql);

    }

    //viewer page data
    public function ViewPageBlog()
    {
        $sql = "SELECT * FROM blog where status='approved'";
        return $this->conn->query($sql);
    }

    


}
