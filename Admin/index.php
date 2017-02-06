<?php
include "layout/head.php";
include "layout/navigation.php";
?>    
    <div class='container'>
        <div class="row">
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
                            <button type="button" class="btn alert-warning">EDIT</button>
                            <a href='index.php?delete={$postId}' class='btn alert-danger'>DELETE</a>
                        </div>
                    </td>
                </tr>
                <?php } ?>

            </table>
            <form action="">
                <input type="submit" class="btn btn-primary" name="create" value="Create Post" />
            </form>
        </div>
    </div>
</body>
</html>