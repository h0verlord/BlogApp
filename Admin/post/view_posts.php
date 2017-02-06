
<table class="table table-bordered table-hover">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Date Created</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>
    <?php
    $query = "SELECT u.username, c.catTitle, p.* FROM user u INNER JOIN post p ON u.id = p.author_id INNER join category c ON p.category_id = c.id";
    $selectAllPosts = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($selectAllPosts)){
        $postId = $row['id'];
        $postTitle = $row['title'];
        $postDate = $row['dateCreated'];
        $postCategory = $row['catTitle'];
    ?>
    <tr>
        <td>
            <?php echo $postId ?>
        </td>
        <td>
            <?php echo $postTitle?>
        </td>
        <td>
            <?php echo $postDate?>
        </td>
        <td>
            <?php echo $postCategory?>
        </td>
        <td>
            <div class='btn-group'>
                <a href='post.php?source=edit_post&p_id=<?php {echo $postId;} ?>' class='btn alert-warning'>EDIT</a>
                <a href='post.php?delete=<?php {echo $postId;} ?>' class='btn alert-danger'>DELETE</a>
            </div>
        </td>
    </tr>
    <?php } ?>

    <?php
    //Delete Post
    if(isset($_GET['delete'])){

        $PostIdToBeDeleted = ($_GET['delete']);

        $query = "DELETE FROM post WHERE id = {$PostIdToBeDeleted}";
        $deleteQuery = mysqli_query($connection,$query);

        if(!$deleteQuery){
            die("Query FAILED" . mysqli_error($connection));

        }
        header("Location: post.php");

    }
    ?>

</table>
<a href="post.php?source=add_post" class="btn btn-primary">Add post</a>

