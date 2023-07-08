<?php
ob_start();
include "includes/admin_header.php";
include "includes/navigation.php";

?>

<body>
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
                        <div class="col-xs-6">
                            <?php insertCategory($conn); ?>
                            <form action="categorys.php" method="POST">
                                <div class="form-group">
                                    <label for="cat-title">Add Category</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add category">
                                </div>
                            </form>
                        </div>

                        <div class="col-xs-6">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>CATEGORY TITLE</th>
                                        <th>EDIT</th>
                                        <th>DELETE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $categories = getCategories($conn);
                                    foreach ($categories as $row) {
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];
                                    ?>
                                    <tr>
                                        <td><?php echo $cat_id; ?></td>
                                        <td><?php echo $cat_title; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?php echo $cat_id; ?>">Edit</button>
                                        </td>
                                        <td>
                                            <?php deleteCategory($conn) ?>
                                            <form action="categorys.php" method="POST">
                                                <input type="hidden" name="delete_cat_id" value="<?php echo $cat_id; ?>">
                                                <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal<?php echo $cat_id; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $cat_id; ?>" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel<?php echo $cat_id; ?>">Edit Category</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php updateCategory($conn) ?> 
                                                    <form action="categorys.php" method="POST">
                                                        <input type="hidden" name="edit_cat_id" value="<?php echo $cat_id; ?>">
                                                        <div class="form-group">
                                                            <label for="edit-cat-title<?php echo $cat_id; ?>">Category Title</label>
                                                            <input class="form-control" type="text" name="edit_cat_title" id="edit-cat-title<?php echo $cat_id; ?>" value="<?php echo $cat_title; ?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary" name="edit">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>

    <?php include "includes/footer.php"; ?>
</body>
