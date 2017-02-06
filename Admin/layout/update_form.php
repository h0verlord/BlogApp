<!--UDPATE FORM-->
<form action="" method="post">
    <div class="form-group">
        <label for="catTitle">Edit Category</label>
        <?php
        //Choosing the right title and putting it into INPUT field
        if(isset($_GET['edit'])){

            $catIdToBeEdited = ($_GET['edit']);
            $query = "SELECT * FROM category WHERE id = {$catIdToBeEdited}";
            $selectCategory =  mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($selectCategory))
            {
                $cat_id = $row['id'];
                $cat_title = $row['catTitle'];
        ?>
        <input value="<?php if(isset($cat_title)){echo $cat_title;}?>" type="text" class="form-control" name="cat_title" />
        <?php
            }
        }?>

        <?php
        //Update the name of a category
        if(isset($_POST['update_category'])){

            $cat_update_title = ($_POST['cat_title']);

            $query = "UPDATE category SET catTitle = '{$cat_update_title}' WHERE id = {$cat_id}";
            $update_query = mysqli_query($connection,$query);

            if(!$update_query){
                die("Query FAILED " . mysqli_error($connection));
            }

            header("Location: category.php");
        }

        ?>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_category" value="Update" />
    </div>
</form>
<!--/UPDATE FORM-->