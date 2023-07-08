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
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $posts = importAllPosts($conn);

                            foreach ($posts as $post) {
                                $post_id = $post['post_id'];
                                $post_author = $post['post_author'];
                                $post_title = $post['post_title'];
                                $post_status = $post['post_status'];
                                $post_image = $post['post_image'];
                                $post_tags = $post['post_tags'];
                                $post_comment_count = $post['post_comment_count'];
                                $post_date = $post['post_date'];
                                $status_bullet = ($post_status === 'draft') ? '<span class="status-bullet-green"></span>' : '<span class="status-bullet-red"></span>';
                            ?>
                                <tr>
                                    <td><?php echo $post_id; ?></td>
                                    <td><?php echo $post_author; ?></td>
                                    <td><?php echo $post_title; ?></td>
                                    <td><?php echo $status_bullet . ' ' . $post_status; ?></td>
                                    <td>
                                        <img src="<?php echo $post_image; ?>" alt="Post Image" class="img-thumbnail" style="max-width: 100px;">
                                    </td>
                                    <td><?php echo $post_tags; ?></td>
                                    <td><?php echo $post_comment_count; ?></td>
                                    <td><?php echo $post_date; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editModal" data-post-id="<?php echo $post_id; ?>" data-post-title="<?php echo $post_title; ?>" data-post-author="<?php echo $post_author; ?>" data-post-status="<?php echo $post_status; ?>" data-post-image="<?php echo $post_image; ?>" data-post-tags="<?php echo $post_tags; ?>" data-post-comment-count="<?php echo $post_comment_count; ?>" data-post-date="<?php echo $post_date; ?>">
                                            Edit
                                        </button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST">
                        <input type="hidden" id="editPostId" name="edit_post_id">
                        <div class="form-group">
                            <label for="editPostTitle">Title</label>
                            <input type="text" class="form-control" id="editPostTitle" name="edit_post_title">
                        </div>
                        <div class="form-group">
                            <label for="editPostAuthor">Author</label>
                            <input type="text" class="form-control" id="editPostAuthor" name="edit_post_author">
                        </div>
                        <!-- Add more form inputs for other post details -->
                        <!-- ... -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /#wrapper -->

<!-- Edit Modal Script -->
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
