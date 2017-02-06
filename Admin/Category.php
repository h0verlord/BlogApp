<?php
include "layout/head.php";
include "layout/navigation.php";
?>
        <div class='container'>
        <div class="col-lg-12">
            <h1>
                Categories
            </h1>
        </div>
        <div class="col-xs-6">
            <table class="table table-responsive table-bordered table-hover">
                <tr>
                    <th>ID</th>
                    <th>Category Title</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                </tr>
                <?php                

                $query = "SELECT * FROM category";
                $selectAllPosts = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($selectAllPosts)){
                    $cat_id = $row['id'];
                    $cat_title = $row['catTitle'];
                    $cat_date = $row['dateCreated'];

                ?>
                <tr>
                    <td>
                        <?php echo $cat_id ?>
                    </td>
                    <td>
                        <?php echo $cat_title?>
                    </td>
                    <td>
                        <?php echo $cat_date?>
                    </td>

                    <td>
                        <div class='btn-group'>
                            <a href='category.php?edit=<?php echo $cat_id?>' class='btn alert-warning'>EDIT</a>
                            <a href='category.php?delete=<?php echo $cat_id?>' class='btn alert-danger'>DELETE</a>
                        </div>
                    </td>
                </tr>
                <?php } ?>                
                    
                <?php
                
                //DELETE CAT
                if(isset($_GET['delete'])){

                    $catIdToBeDeleted = ($_GET['delete']); 

                    $query = "DELETE FROM category WHERE id = {$catIdToBeDeleted}";
                    $deleteQuery = mysqli_query($connection,$query);

                    if(!$deleteQuery){
                        die("Query FAILED" . mysqli_error($connection));

                    }
                    header("Location: category.php");
                    
                }
                
                ?>
            </table>
        </div>
        <div class="col-xs-6">
            <!--ADD FORM-->
            <?php
            $date = date("Y-m-d");

            if(isset($_POST['submit'])){
                $title = $_POST['catTitle'];
                $newCatTitle = mysqli_real_escape_string($connection,$title);

                if($newCatTitle == "" || empty($newCatTitle)){
                    echo "<div class ='alert alert-danger'>This field cannot be empty, bitch</div>";
                } else {

                    $query = "INSERT INTO category(catTitle, author_id, dateCreated)";
                    $query .= "VALUE ('{$newCatTitle}', '1', '{$date}')";

                    $insertCategory = mysqli_query($connection, $query);
                    header("Location: category.php");

                    if(!$insertCategory){
                        die("Query FAILED" . mysqli_error($connection));
                    }
                }
            }
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="catTitle">Add a Category</label>
                    <input type="text" name="catTitle" class="form-control" />
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="Create Category" />
                </div>
            </form>
            <!--/ADD FORM-->           

        </div>

    </div>

</body>
</html>