<div class="col-md-4">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Login</h3>
        </div>
        <div class="panel-body">
            <!--LOGIN FORM-->
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" />
                </div>
                <div class="form-group">
                    <input type="submit" name="login" value="Sumbit" class="btn btn-primary" />
                </div>
            </form>
            <!--/LOGIN FORM-->
        </div>
    </div>
    <div class="well">
        <h4>Kategorie</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php
                    $query = "Select * FROM category";
                    $select_all_cats = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_all_cats))
                    {
                        $catTitle = $row['catTitle'];
                        echo "<li><a href='#'>{$catTitle}</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>