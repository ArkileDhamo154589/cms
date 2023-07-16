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
                     case 'add_user';
                     include "includes/add_user.php";
                     break;
                     case 'edit_user';
                     include "includes/edit_user.php";
                     break;
                     case '34';
                     echo "nice";
                     break;
                     case '200';
                     echo "nice 200";
                     break;
                     
                     default:

                     include "includes/view_all_users.php";

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
 
<?php
   include "includes/footer.php";
   ?>
   