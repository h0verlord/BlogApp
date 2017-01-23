<?php

require "Database.php";

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
        $query = "SELECT p.*, u.username, c.catTitle FROM posts p, users u, category c WHERE p.userId = u.id || u.id = c.id";
        $selectAllPosts = $this->database->connection->query($query);

            while($row = mysqli_fetch_assoc($selectAllPosts)){                  

                $postTitle = $row['title'];    
                $postAuthor = $row['username'];
                $postCategory = $row['catTitle'];
                $postContent = $row['content'];
                $postDate = $row['dateCreated'];
                // $postTagId = ConvertBetweenTables("title", "tags", $row['tagId']);                  
                
                
                echo "<div class='row'>";
                echo "<div class='jumbotron'>";
                echo "<h3><a href='#'>";
                echo $postTitle . "</a></h3>";
                echo "<p class='lead'>" . $postContent . "</p>";
                echo "<hr /><p class='blog-post-meta'>";
                echo "<span class='glyphicon glyphicon-time'></span> "  . $postDate;                         
                echo " by " .$postAuthor . "</p></div></div>";
                      
            }
        
    }
    
    private function ConvertBetweenTables($name, $table, $id){
        
        $IdToTitle = "SELECT $name FROM $table WHERE id = $id";
        $selectPostName = $this->database->connection->query($IdToTitle);                        
        while($row = $selectPostName->fetch_assoc()){                  
        $title = $row['$name'];  
        }
    }
}
?>