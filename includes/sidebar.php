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




<?php 

$query = "SELECT * FROM category";
$selcet_query_category = mysqli_query($conn,$query);


?>

<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
                <?php 
                while($row = mysqli_fetch_assoc($selcet_query_category)){
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];
                    echo "<li><a href='category.php?category=$cat_id'>" . $cat_title . "</a></li>";
                }
                ?>
            </ul>
        </div>
        
        
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>





<!-- Side Widget Well -->
<?php include "widget.php" ?>

</div>