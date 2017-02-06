<?php

require_once "Database.php";


class Category {

    public $postTitle;
    public $catAuthorId;
    public $catAuthor;
    public $CategoryId;
    public $catDate;
    public $catTitle;


    //private $conn = Database::$connection;

    public function QueryCategories($limit){

        $rows = Database::select("SELECT * FROM category ". $limit);
        return $rows;

    }

    public function QueryCategoryTable(){
        $rows = Database::select("SELECT c.id ,c.catTitle, c.dateCreated, u.username FROM category c INNER JOIN users u ON c.userId = u.id");
        return $rows;
        }

    public function AddCategory(){

        $date = date("Y-m-d");

        if(isset($_POST['catTitle'])){
            $newCatTitle = $_POST['catTitle'];

            if($newCatTitle == "" || empty($newCatTitle )){
                $this->NoEmptyField();
            } else {

                $insertCategory = Database::query("INSERT INTO category(catTitle, userId, dateCreated) VALUE ('{$newCatTitle}', '1', '{$date}')");

                if(!$insertCategory){
                    die("Query FAILED" . mysqli_error(Database::$connection));
                }
            }
        }
    }

    public function DeleteCategory()
    {
        if(isset($_GET['delete'])){
            $catIdToBeDeleted = $_GET['delete'];

            $query = "DELETE FROM category WHERE id = {$catIdToBeDeleted}";
            $deleteQuery = Database::query($query);

            if(!$deleteQuery){
                die("Query FAILED" . mysqli_error(Database::$connection));

            }

            header("Location: category.php");
            fio
        }
    }

    //public function UpdateCategory()
    //{
    //    if(isset($_GET['edit'])){
    //        $catIdToBeUpdated = $_GET['edit'];

    //        $query = "SELECT * FROM category WHERE id = {$catIdToBeUpdated}";
    //        $selectIdQuery = $this->database->connection->query($query);

    //        if(!$selectIdQuery){
    //            die("Query FAILED" . mysqli_error($this->database->connection));

    //        }

    //    }
    //}

    //public function SelectCatTitle(){
    //    if(isset($this->catTitle)){echo $catTitle;}

    //}

    //private function NoEmptyField(){
    //    echo "<div class='alert alert-danger'>";
    //    echo "This field can't be empty";
    //    echo "</div>";

    //}


}

?>