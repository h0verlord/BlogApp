<?php
    require "Includes/Post.php";  
    require "Includes/Category.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog App</title>
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">BlogApp</a>
        </div>
        <!--COLLAPSE -->
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            
            <?php  
            $cat = new Category();
            $cat->ShowNavigationCategories();  
              ?>
          </ul>
        </div>
        <!--COLLAPSE -->
      </div>
    </nav>
            <div class="container">
       
        <div class="row">
            <div class="col-md-8 ">
               
                <?php   
                    
                $post = new Post();
                $post->FetchPosts();
                
                ?>
                </div>
                 <div class="col-md-4">
                    <div class="panel panel-default sidebar-module">
                      <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                      </div>
                      <div class="panel-body">
                       <!--LOGIN FORM-->
                        <form action="login.php" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                    
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Sumbit" class="btn btn-primary">
                    </div> 
                    </form>
                    <!--/LOGIN FORM-->
                      </div>
                    </div>
            </div>
</div>        
    </div>
    
    
    <!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../../BlogApp/js/bootstrap.min.js"></script>    
    
</body>
</html>
    
    
            
            
            
            
        