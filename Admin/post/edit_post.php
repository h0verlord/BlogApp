
<?php


if (isset($_GET['p_id']))
{
    $get_post_id = $_GET['p_id'];
}


$query = "SELECT u.username, c.catTitle, p.* FROM user u INNER JOIN post p ON u.id = p.author_id INNER join category c ON p.category_id = c.id WHERE p.id = {$get_post_id}";
$selectPostById = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($selectPostById)){
    $postId = $row['id'];
    $postTitle = $row['title'];
    $postContent = $row['content'];
    $postDate = $row['dateCreated'];
    $postCategoryId = $row['category_id'];
    $postCategory = $row['catTitle'];
    $postImage = $row['image'];
}


if (isset($_POST['update_post']))
{
    $postTitle = $_POST['title'];
    $postContent = $_POST['post_content'];
    $postCategoryId = $_POST['post_category'];
    $postImage = $_FILES['image']['name'];
    $postImagetmp = $_FILES['image']['tmp_name'];


    move_uploaded_file($postImagetmp, "../images/{$postImage}");

    if (empty($postImage))
    {
        $query = "SELECT * FROM post WHERE id = {$get_post_id}";
        $selectImage = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($selectImage));
        {
            $postImage = $row['image'];
        }
    }


    $query = "UPDATE post SET ";
    $query .= "title  = '{$postTitle}', ";
    $query .= "content  = '{$postContent}', ";
    $query .= "category_id  = '{$postCategoryId}', ";
    $query .= "dateCreated  = now(), ";
    $query .= "image  = '{$postImage}' ";
    $query .= "WHERE id = '{$get_post_id}' ";


    $update_post = mysqli_query($connection, $query);

    if (!$update_post)
    {
    	die("QUERY FAILED " . mysqli_error($connection));
    }
    header("Location: post.php");

}


?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" value="<?php echo $postTitle;?>" />
    </div>

    <div class="form-group">
        <label for="post_category_id">Post Category</label>
        <select name="post_category" id="" class="form-control">
            <?php
            $query = "SELECT * FROM category";
            $select_categories =  mysqli_query($connection, $query);



            while ($row = mysqli_fetch_assoc($select_categories))
            {
                $cat_id = $row['id'];
                $cat_title = $row['catTitle'];
                $option = "<option ";
                if ($cat_id == $postCategoryId)
                {
                	$option .= "selected='selected'";
                }

                $option .= "value='{$cat_id}'>{$cat_title}</option>";

                echo $option;

            }


            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" cols="30" rows="10">
            <?php $postContent;?>
        </textarea>
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <img width="100" src="../images/<?php echo $postImage; ?>" alt="Alternate Text" />
        <input type="file" class="form-control" name="image" value="<?php echo $postImage?>" />
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_post" value="Publish Post" />
    </div>

</form>