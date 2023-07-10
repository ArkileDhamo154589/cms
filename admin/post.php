<?php
   include 'includes/admin_header.php';
   include 'includes/navigation.php';
   ?>
<div id="wrapper">
   <div id="page-wrapper">
      <div class="container-fluid">
         <!-- Page Heading -->
         <div class="row">
            <div class="col-lg-12">
               <h1 class="page-header">
                  <?php
                     $currentPage = basename($_SERVER['PHP_SELF']);
                     echo $currentPage;
                     ?>
               </h1>
               <?php
               if(isset($_GET['source'])){
                     $source = $_GET['source'];
               } else{
                  $source = '';
               }
               switch($source){
                     case 'add_post';
                     include "includes/add_post.php";
                     break;
                     case 'edit_post';
                     include "includes/edit.php";
                     break;
                     case '34';
                     echo "nice";
                     break;
                     case '200';
                     echo "nice 200";
                     break;
                     
                     default:

                     include "includes/view_all_posts.php";

                     break;
               }
               ?>
            </div>
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /#page-wrapper -->
   <script>
   $(document).ready(function() {
       $('.edit-btn').click(function() {
           var postId = $(this).data('post-id');
           var postTitle = $(this).data('post-title');
           var postAuthor = $(this).data('post-author');
           var postStatus = $(this).data('post-status');
           var postImage = $(this).data('post-image');
           var postTags = $(this).data('post-tags');
           var postCommentCount = $(this).data('post-comment-count');
           var postDate = $(this).data('post-date');
   
           $('#editPostId').val(postId);
           $('#editPostTitle').val(postTitle);
           $('#editPostAuthor').val(postAuthor);
           // Set more form inputs with their respective values
   
           $('#editModal').modal('show');
       });
   
       // Optional: Add a submit event listener to the edit form
       $('#editForm').submit(function(e) {
           e.preventDefault();
   
           // Perform AJAX request to update the post with the form data
           // ...
   
           $('#editModal').modal('hide');
       });
   });
</script>
<?php
   include "includes/footer.php";
   ?>
   