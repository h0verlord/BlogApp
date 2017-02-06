<?php
    require_once "../classes/Post.php";  
    require_once "../classes/Category.php";
    ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Section</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css">
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
          <a class="navbar-brand" href="../index.php">BlogApp - Show Website</a>
        </div>
        <!--COLLAPSE -->
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav ">
            <li class = "active"><a href="index.php">Posts</a></li>
            <li><a href="category.php">Categories</a></li>
            
          </ul>
        </div>
        <!--COLLAPSE -->
      </div>
    </nav>
    <div class='container'>
      <div class ="row">
        <table class="table table-bordered table-hover">
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Date Created</th>
            <th>Category</th>
            <th>Actions</th>            
          </tr>
            <?php
              //$p = new Post();             
              //$p->ViewPostsTable();
            ?>
          </table>
            <form action="">
          <input type="submit" class="btn btn-primary" name="create" value="Create Post">
          </form>
      </div>
    </div>

</body>
</html>