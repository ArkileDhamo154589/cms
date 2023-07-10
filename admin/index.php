<?php 
ob_start();
include "includes/admin_header.php";
include "includes/navigation.php";
?>

<body>
         <?php 
         if($conn){ echo "we are in " ;} ?>
    <div id="wrapper">

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin Page
                            <small>User Name</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

       <?php include "includes/footer.php"; ?>

