<?php
include "layout/head.php";
include "layout/navigation.php";
?>    
    <div class='container'>
        <div class="row">
            <?php 
            if (isset($_GET['source']))
            {
            	$source = $_GET['source'];
            }else
            {
                $source = "";
            }
            
                switch ($source)
                {
                    case "add_post":
                        include "post/add_post.php";
                        break;
                    case "edit_post":
                        include "post/edit_post.php";
                        break;
                	default:
                        include "post/view_posts.php";
                        break;
                }                
            
            ?>
            
        </div>
    </div>
</body>
</html>