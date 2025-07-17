<?php

class UserModel
{
    private $conn;
    /**
    * This constructor is used to initialize the database connection.
    * @param $conn
    * 
    */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    //RegisterUser code
    /**
    * This function is used to register new blogger user
    * @param string $name
    * @param string $username
    * @param string $password
    *
    * 
    * @return bool 
    */
    public function registerUser(string $name, string $username, string $password)
    {
        $sql = "INSERT INTO blogger (name, email, password) VALUES ('$name', '$username', '$password')";
        return $this->conn->query($sql);
    }

    // Login page
    /**
     * This functions is used to check login credentials 
     * @param string $username
     * @param string $password
     * 
     * @return 
     */
    public function checkLogin(string $username, string $password)
    {
        $sql = "SELECT * FROM blogger WHERE email = '$username' AND password = '$password'";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    // CreateBlog page
    /**
     * This functions is used for creating a blog post by blogger
     * @param string $bloggerId
     * @param string $title
     * @param string $description
     * @param string $date
     * @param string $category
     * @param string $keywords
     * @param string $imagepath
     * @param string $status
     * 
     * @return bool if login successfull
     */
    public function createBlog(string $bloggerId, string $title,$description, string $date, string $category,string $keywords,string $imagepath, string $status)
    {
        $sql = "INSERT INTO blog (blogger_id, title, description,created_on, category, keyword, imagepath, status)
            VALUES ('$bloggerId', '$title', '$description', '$date', '$category', '$keywords', '$imagepath','$status')";
        return $this->conn->query($sql);
    }

    /**
     * This functions is used to get data from datbase to editblogblogger page
     * @param string $id
     * 
     * 
     * @return mysqli_result | result
     */
    public function getAllBlogid($id)
    {
        $sql = "SELECT * FROM blog where blogger_id ='$id' ORDER BY blog_id desc";
        return $this->conn->query($sql);
    }

    /**
     * This functions is used to retrieve all blog post used by (adminview page)
     * 
     * 
     * 
     * @return mysqli_result object | false on failure
     */
    public function getAllBlog()
    {
        $sql = "SELECT * FROM blog";
        return $this->conn->query($sql);
    }


    /**
     * This functions delete blog post by blog id.
     * 
     * 
     * @return bool Returns true on successful deletion,
     */
    public function deleteBlog(string $id)
    {
        $sql = "DELETE FROM blog WHERE blog_id = '$id'";
        return $this->conn->query($sql);
    }
    
    // Update page by blogger
    /**
     *  Retrieves a single blog post by its ID.
     * @param string $id
     * 
     * 
     * @return array | result
     */

    public function getBlogById($id)
    {
        $sql = "SELECT * FROM blog WHERE blog_id = '$id'";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    // Admin edit page
    /**
     * This functions is used to Update/approve  blog post from admin side
     * @param string $blog_id
     * @param string $blogger_id
     * @param string $title
     * @param string $description
     * @param string $created_on
     * @param string $category
     * @param string $keyword
     * @param string $imagepath
     * @param string $status
     * 
     * @return bool Returns true on successful update
     */
    public function AdmUpdateBlog($blog_Id,$blogger_id,$title,$description,$created_on,$category ,$keyword,$status)
    {
      $sql="UPDATE blog SET blog_id = '$blog_Id', blogger_id = '$blogger_id', title = '$title',description = '$description',created_on = '$created_on',category='$category', keyword='$keyword', status = '$status' WHERE blog_id = '$blog_Id'";
        return $this->conn->query($sql);

    }

    // Bloger edit page
    /**
     * This functions is used to Update date from blogger side
     * @param string $blog_id
     * @param string $blogger_id
     * @param string $title
     * @param string $description
     * @param string $created_on
     * @param string $category
     * @param string $keyword
     * @param string $imagepath
     * @param string $status
     * 
     * @return bool Returns true on successful update
     */
    public function BlgUpdateBlog($blog_Id, $blogger_id, $title, $description, $created_on, $category, $keyword, $image, $status)
    {
    $sql = "UPDATE blog SET blogger_id = '$blogger_id', title = '$title', description = '$description', created_on = '$created_on', category = '$category', keyword = '$keyword', imagepath = '$image', status = '$status' WHERE blog_id = '$blog_Id'";
    return $this->conn->query($sql);
    }

    // Viewer page data
    /**
     * Retrieves all approved blog posts for public viewer page.
     *
     * 
     * @return mysqli_result | result
     */
    public function ViewPageBlog()
    {
        $sql = "SELECT * FROM blog where status='approved'";
        return $this->conn->query($sql);
    }

}
