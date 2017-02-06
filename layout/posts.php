
<div class="col-md-8 ">
    <?php
    $query = "SELECT u.username, c.catTitle, p.* FROM user u LEFT OUTER JOIN post p ON u.id = p.author_id LEFT OUTER join category c ON p.category_id = c.id";
    $select_all_posts_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_posts_query)){
        $post_id = $row['id'];
        $post_title = $row['title'];
        $post_author = $row['username'];
        $post_image = $row['image'];
        $post_content = $row['content'];
        $post_category = $row['catTitle'];
        $post_date = $row['dateCreated'];
    
    ?>
    <div class="panel panel-primary">
        <div class='panel-body'>
            <h3>
                <a href='#'>
                    <?php echo $post_title; ?>
                </a>
            </h3>
            <hr /><?php if ($post_image != null) { ?>
            <img class='img-responsive' src='images/<?php echo $post_image ?>' alt='' />
            <?php } ?>

            <p class='lead'>
                <?php echo $postImage ?>
            </p>
            <p>
                <?php echo $post_content?>
            </p>
        </div>
        <div class='panel-footer'>
            <p>
                <span class='glyphicon glyphicon-time'></span><?php echo $post_date ?>
                by <?php echo $post_author ?> | Kategorie:
                <a href='#'>
                    <?php echo $post_category ?>
                </a>
            </p>
        </div>
    </div>
    <?php  } ?>

</div>