<?php 
   // from include i import header and navigation files
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

if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
 }
        
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
            $select_all_posts_query = mysqli_query($conn, $query);
            
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
            by <a href="index.php"> <?php echo  $post_author ?></a>
         </p>
         <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
         <hr>
         <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
         <hr>
         <p class="content"><?php echo  $post_content ?></p>
         <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
         <hr>
         <?php  }   ?>
      </div>
      <!-- from my includes file i import the file sidebar.php -->
      <!-- Blog Sidebar Widgets Column -->
      <?php include "includes/sidebar.php"; ?>
   </div>
   <!-- /.row -->
   <hr>
   
                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
   <?php 
      // FROM includes i import footer.phpp file
      include "includes/footer.php";
      
      ?>