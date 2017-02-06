
<?php

require_once "classes/Category.php";
require_once "classes/Post.php";


include "layout/head.php";
?>

<body>

<?php
include "layout/navigation.php";
?>
<div class="container">
    <div class="row">

        <?php
        include "layout/posts.php";
        ?>
        
        <?php
        include"layout/sidebar.php"
        ?>
    </div>        
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.js"></script>        
</body>
</html>
    
    
            
            
            
            
        