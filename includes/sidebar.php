<div class="col-md-4">







<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">
    <div class="input-group">
        <input name="search" type="text" class="form-control">
        <span class="input-group-btn">
            <button  name="submit" type ="sybmit"class="btn btn-default" type="button">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
</form>
    <!-- /.input-group -->
</div>

<div class="well">
             <h4>Login</h4>

                <form method="post" action="includes/login.php">
                <div class="form-group">
                    <input name="username" type="text" class="form-control" placeholder="Enter Username">
                </div>

                  <div class="input-group">
                    <input name="password" type="password" class="form-control" placeholder="Enter Password">
                    <span class="input-group-btn">
                       <button class="btn btn-primary" name="login" type="submit">Submit
                       </button>
                    </span>
                   </div>

                    <div class="form-group">

                        <a href="forgot.php?forgot=<?php echo uniqid(true); ?>">Forgot Password</a>


                    </div>

                </form>


<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
                <?php
                $query = "SELECT * FROM category";
                $result = mysqli_query($conn, $query);
                $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

                foreach ($categories as $category) {
                    $cat_title = $category['cat_title'];
                    $cat_id = $category['cat_id'];
                    echo "<li><a href='category.php?category=$cat_id'>$cat_title</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>




<!-- Side Widget Well -->
<?php include "widget.php" ?>

</div>