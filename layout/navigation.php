
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
                <li class="active">
                    <a href="#">Home</a>
                </li>
                <?php
                $query = "Select * FROM category";
                $select_all_cats = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_cats))
                {
                	$catTitle = $row['catTitle'];
                    echo "<li><a href='#'>{$catTitle}</a></li>";
                }

                //$cat = new Category();
                //$row = $cat ->QueryCategories("LIMIT 3");
                //foreach ($row as $r)
                //{
                //    echo "<li><a href='#'>{$r[title]}</a></li>";
                //}

                ?>
            </ul>
        </div>
        <!--COLLAPSE -->
    </div>
</nav>