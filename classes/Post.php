<?php

require_once "Database.php";

class Post {

    public $postTitle;
    public $postAuthorId;
    public $postAuthor;
    public $postCategoryId;
    public $postCategory;
    public $postContent;
    public $postDate;
    public $postTagId;
    public $postTag;

    private $database;

    function __construct(){

        $this->database = new Database();
    }

    public function FetchPosts(){
        $query = "SELECT u.username, c.title, p.* FROM user u LEFT OUTER JOIN posts p ON u.id = p.userId LEFT OUTER join category c ON p.catId = c.id";
        $selectAllPosts = $this -> database -> connection -> query($query);

            while($row = mysqli_fetch_assoc($selectAllPosts)){

                $postTitle = $row['title'];
                $postAuthor = $row['username'];
                $postCategory = $row['catTitle'];
                $postImage = $row['image'];
                $postContent = $row['content'];
                $postDate = $row['dateCreated'];
                //$postTag = $row['tagId'];


                // echo "<div class='row'>";
                echo "<div class='panel panel-primary'>";
                echo "<div class ='panel-body'><h3><a href='#'>";
                echo $postTitle . "</a></h3><hr>";
                echo "<img class='img-responsive' src='images/{$postImage}' alt=''>";
                echo "<p class='lead'>" . $postContent . "</p>";
                echo "</div><div class='panel-footer'><p>";
                echo "<span class='glyphicon glyphicon-time'></span> "  . $postDate;
                echo " by " .$postAuthor . " | Kategorie: <a href='#'>" . $postCategory . "</a></p></div></div>";

            }

    }

    public function ViewPostsTable(){
        $query = "SELECT u.username, c.catTitle, p.* FROM user u INNER JOIN posts p ON u.id = p.userId INNER join category c ON p.catId = c.id";

        $selectAllPosts = $this->database->connection->query($query);

            while($row = mysqli_fetch_assoc($selectAllPosts)){

                $postId = $row['id'];
                $postTitle = $row['title'];
                $postDate = $row['dateCreated'];
                $postCategory = $row['catTitle'];

                echo "<tr>";
                echo "<td>" . $postId . "</td>";
                echo "<td>" . $postTitle . "</td>";
                echo "<td>" . $postDate . "</td>";
                echo "<td>" . $postCategory . "</td>";
                echo "<td>";
                echo "<div class='btn-group'>";
                echo "<button type='button' class='btn alert-warning'>EDIT</button>";
                echo "<a href='index.php?delete={$postId}' class='btn alert-danger'>DELETE</a>";
                echo "</div>";
                echo "</td>";
                echo "</tr>";


            }
            $this->DeletePost();
    }

    private function DeletePost()
    {
        if(isset($_GET['delete'])){
            $postIdToBeDeleted = $_GET['delete'];

            $query = "DELETE FROM posts WHERE id = {$postIdToBeDeleted}";
            $deleteQuery = $this->database->connection->query($query);

            if(!$deleteQuery){
                die("Query FAILED" . mysqli_error($this->database->connection));

            }

            header("Location: index.php");
        }
    }
}
?>