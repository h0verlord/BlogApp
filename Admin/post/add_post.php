<?php

if (isset($_POST['create_post']))
{
	$post_title = $_POST['title'];
    $post_category = $_POST['post_category_id'];
	$post_content = $_POST['post_content'];

	$post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_date = date("Y-m-d");


    move_uploaded_file($post_image_temp, "../images/{$post_image}");


    $query = "INSERT into post(author_id, category_id, title, image, content, dateCreated)";

    $query .= "VALUES('1', {$post_category}, '{$post_title}', '{$post_image}', '{$post_content}', now())" ;

    $create_post_query = mysqli_query($connection, $query);

    if (!$create_post_query)
    {
    	die("QUERY FAILED " . mysqli_error($connection));
    }else
    {
        header("Location: post.php");
    }
    
    
}


?>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title"/>
     </div>    

    <div class="form-group">
        <label for="post_category_id">Post Category</label>
        <input type="text" class="form-control" name="post_category_id" />
    </div>    

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content"  cols="30" rows="10">
        </textarea>
    </div>
    
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name="image" />
    </div>        

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post"/>
    </div>    

</form>