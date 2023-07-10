<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    updatePost(); // Call the updatePost() function when the form is submitted
}
?>
<form action="post.php" method="post" enctype="multipart/form-data">
    <?php
            
                if (isset($_GET['post_id'])) {
                    $post_id = $_GET['post_id'];
        // Retrieve the post data from the database based on the post ID
        $query = "SELECT * FROM posts WHERE post_id = $post_id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        // Extract the post data
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_author = $row['post_author'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_content = $row['post_content'];
                }
   ?>

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" value="<?php echo $post_title; ?>">
    </div>
    <div class="form-group">
        <label for="post_category">Post Category Id</label>
        <select class="form-control" name="post_category_id">
        <?php
        $categories = getCategories($conn);
        foreach ($categories as $row) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

            // Check if the current category matches the post's category
            $selected = ($cat_id == $post_category_id) ? 'selected' : '';

            echo "<option value='$cat_id' $selected>$cat_title</option>";
        }
        ?>
    </select>
    </div>
    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="author" value="<?php echo $post_author; ?>">
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <input type="text" class="form-control" name="status" value="<?php echo $post_status; ?>">
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" name="image">
        <img src="../images/<?php echo $post_image; ?>" alt="Post Image" width="100">
    </div>
    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" class="form-control" name="tags" value="<?php echo $post_tags; ?>">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?></textarea>
    </div>
    <?php updatePost(); ?>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
    </div>
</form>
