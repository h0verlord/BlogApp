<?php

class Category {

private $database;

    function __construct(){

        $this->database = new Database();
    }

    public function ShowNavigationCategories(){
        $query = "SELECT * FROM category";
        $selectAllCategories = $this->database->connection->query($query);
              
              while($row = $selectAllCategories->fetch_assoc()){                  
                  $catTitle = $row['catTitle'];                  
                  echo "<li><a href='#'>{$catTitle}</a></li>";
              }

    }

}


?>