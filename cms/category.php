<?php
// Include header and navigation files
include 'includes/db.php';
include "includes/header.php";
include "includes/navigation.php";
?>

<body>
   <!-- Page Content -->
   <div class="container">
      <div class="row">
         <!-- Blog Entries Column -->
         <div class="col-md-8">
            <?php
            if(isset($_GET['category'])){
               $post_category_id = $_GET['category'];
            
               $query = "SELECT * FROM posts WHERE post_category_id = $post_category_id";
               $select_all_posts_query = mysqli_query($conn, $query);
            
               // Check if there are any rows returned
               if(mysqli_num_rows($select_all_posts_query) > 0) {
                  while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                     $post_id = $row['post_id'];
                     $post_title = $row['post_title'];
                     $post_author = $row['post_author'];
                     $post_date = $row['post_date'];
                     $post_image = $row['post_image'];
                     $post_content = $row['post_content'];
                     ?>
                     <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                     </h1>
                     <!-- First Blog Post -->
                     <h2>
                        <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                     </h2>
                     <p class="lead">
                        by <a href="index.php"><?php echo $post_author; ?></a>
                     </p>
                     <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                     <hr>
                     <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                     <hr>
                     <p class="content"><?php echo $post_content; ?></p>
                     <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                     <hr>
            <?php
                  }
               } else {
                  echo "<p>No posts found in this category.</p>";
               }
            }
            ?>
         </div>
         <!-- Include the sidebar -->
         <?php include "includes/sidebar.php"; ?>
      </div>
      <!-- /.row -->
      <hr>
      <?php 
         // Include the footer
         include "includes/footer.php";
      ?>
   </div>
   <!-- /.container -->
</body>
