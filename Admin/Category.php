<?php
require_once "../classes/Post.php";  
require_once "../classes/Category.php";
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
            <li><a href="index.php">Posts</a></li>
            <li class = "active"><a href="category.php">Categories</a></li>
            
          </ul>
        </div>
        <!--COLLAPSE -->
      </div>
    </nav>
    <div class='container'>
    <div class ="col-lg-12">
        <h1>
            Categories
        </h1>
        </div>
        <div class="col-xs-6">
            <table class="table table-responsive table-bordered table-hover">
                <tr>
                    <th>ID</th>
                    <th>Category Title</th>
                    <th>Date Created</th>
                    <th>Actions</th>                               
                </tr>
                <?php
                $cat = new Category();
                $rows = $cat->QueryCategoryTable();
                foreach ($rows as $r)
                {
                    $CategoryId = $row['id'];

                    echo "<tr>";
                    echo "<td>" . $r['id'] . "</td>";
                    echo "<td>" . $r['catTitle'] . "</td>";
                    echo "<td>" . $r['dateCreated'] . "</td>";
                    echo "<td>";
                    echo "<div class='btn-group'>";
                    echo "<a href='category.php?edit={$CategoryId}' class='btn alert-warning'>EDIT</a>";
                    echo "<a href='category.php?delete={$row['id']}' class='btn alert-danger'>DELETE</a>";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                }
                
                ?>
                </table>
        </div>
            <div class="col-xs-6">
<!--ADD FORM-->
            <form action ="" method="post">
            <div class= "form-group"> 
            <label for ="catTitle">Add a Category</label>           
            <input type = "text" name="catTitle" class="form-control"></input>
            </div>
            <div class= "form-group">            
            <input type="submit" class="btn btn-primary" name="create" value="Create"></input>
            </div>
            </form>
<!--/ADD FORM-->
<!--UDPATE FORM-->
            <form action ="" method="get">
            <div class= "form-group"> 
            <label for ="catTitle">Edit Category</label>           
            <input type = "text" name="catTitle" class="form-control" value="
            <?php 
            $cat->SelectCatTitle();
            ?>">
            </input>
            </div>
            <div class= "form-group">            
            <input type="submit" class="btn btn-primary" name="create" value="Update"></input>
            </div>
            </form>
<!--/UPDATE FORM-->
          
        </div>
        
    </div>

</body>
</html>