<?php
include "db.php";

if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    
    // Ανάκτηση των στοιχείων της ανάρτησης από τη βάση δεδομένων
    $query = "SELECT * FROM posts WHERE post_id = $post_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_author = $row['post_author'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_content = $row['post_content'];
?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" class="form-control" name="title" value="<?php echo $post_title; ?>">
        </div>
        <div class="form-group">
            <label for="post_category">Post Category</label>
            <select class="form-control" name="post_category_id">
                <?php
                $categories = getCategories($conn);
                foreach ($categories as $row) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

                    // Επιλογή της κατηγορίας που αντιστοιχεί στην ανάρτηση
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
            <select class="form-control" name="status">
                <?php
                $status_options = array('draft', 'published');

                foreach ($status_options as $option) {
                    $selected = ($option == $post_status) ? 'selected' : '';
                    echo "<option value='$option' $selected>$option</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image">
            <img src="../images/<?php echo $post_image; ?>" alt="Post Image" class="img-thumbnail" style="max-width: 200px;">
        </div>
        <div class="form-group">
            <label for="tags">Post Tags</label>
            <input type="text" class="form-control" name="tags" value="<?php echo $post_tags; ?>">
        </div>
        <div class="form-group">
            <label for="post_content">Post Content</label>
            <textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?></textarea>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
        </div>
    </form>
<?php
}

// Επεξεργασία της ανάρτησης όταν υποβληθεί η φόρμα
if (isset($_POST['update_post'])) {
    // Ανάκτηση των νέων τιμών από τη φόρμα
    $post_title = $_POST['title'];
    $post_category_id = $_POST['post_category_id'];
    $post_author = $_POST['author'];
    $post_status = $_POST['status'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_tags = $_POST['tags'];
    $post_content = $_POST['post_content'];

    // Ανανέωση της ανάρτησης στη βάση δεδομένων
    $query = "UPDATE posts SET ";
    $query .= "post_title = '$post_title', ";
    $query .= "post_category_id = '$post_category_id', ";
    $query .= "post_author = '$post_author', ";
    $query .= "post_status = '$post_status', ";
    $query .= "post_tags = '$post_tags', ";
    $query .= "post_content = '$post_content' ";
    
    if (!empty($post_image)) {
        // Ανανέωση της εικόνας μόνο αν έχει ανέβει νέα
        move_uploaded_file($post_image_temp, "../images/$post_image");
        $query .= ", post_image = '$post_image' ";
    }

    $query .= "WHERE post_id = $post_id";
    
    $update_post_query = mysqli_query($conn, $query);

    if (!$update_post_query) {
        die("Query Failed: " . mysqli_error($conn));
    }

    header("Location: post.php"); // Ανακατεύθυνση στη σελίδα με τις αναρτήσεις
    exit();
}


?>
