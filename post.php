<!-- <?php
// From includes, import header and navigation files
include "includes/header.php";
include "includes/navigation.php";
include "includes/db.php";
include "includes/functions.php";

// Check if p_id is set
if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
    global $conn;
    $query = "SELECT * FROM posts WHERE post_id = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $the_post_id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];

            // Rest of your code
        }
    } else {
        // Handle the error
        die(mysqli_error($conn));
    }
}
?>

<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php if (isset($post_title)) { ?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $the_post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p class="content"><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
                <?php } ?>
            </div>
            <!-- From includes, import the sidebar.php file -->
            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>
        </div>
        <!-- /.row -->
        <hr>
   
<?php
// Other code here...
insertComment(); ?>

<div class="well">
    <h4>Leave a Comment:</h4>
    <form method="post" action="" role="form">
        <div class="form-group">
            <label for="Author">Author</label>
            <input type="text" class="form-control" name="comment_author" />
        </div>
        <div class="form-group">
            <label for="Auhtor">Email</label>
            <input type="email" class="form-control" name="comment_email" />
        </div>
        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea class="form-control" name="comment_content" rows="3"></textarea>
        </div>
        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
    </form>
</div>




        <hr>

        <!-- Posted Comments -->
    
<!-- Comment -->
<?php $comments = showComments(); ?>
<?php foreach ($comments as $row) : ?>
    <?php if ($row['comment_status'] === 'approve') : ?>
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading"><?php echo $row['comment_author']; ?>
                    <small><?php echo $row['comment_date']; ?></small>
                </h4>
                <?php echo $row['comment_content']; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>



       
        <?php
        // FROM includes, import footer.php file
        include "includes/footer.php";
        ?> 
