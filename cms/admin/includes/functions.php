<?php
include "db.php";

function confirm($result){
global $conn;
    if(!$result){
        die("QUERY FAILED" .mysqli_error($conn));
    }
}


if (!function_exists('getCategories')) {
    function getCategories($conn) {
        $query = "SELECT * FROM category";
        $result = mysqli_query($conn, $query);
        return $result;
    }
}

function insertCategory($conn) {
    if(isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'];

        // Validate category title
        if (!empty($cat_title)) {
            // Insert into db 
            $query = "INSERT INTO category (cat_title) VALUES ('$cat_title')";
            $result = mysqli_query($conn, $query);

            if($result){
                header("Location: categorys.php");
                // Category added successfully
                exit();
            }else{
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Category title cannot be empty.";
        }
    }
}

function updateCategory($conn) {
    if(isset($_POST['edit'])){
        $edit_cat_id = $_POST['edit_cat_id'];
        $edit_cat_title = $_POST['edit_cat_title'];

        if(!empty($edit_cat_title)){
            $query = "UPDATE category SET cat_title = '$edit_cat_title' WHERE cat_id = $edit_cat_id";
            $result = mysqli_query($conn, $query);

            if($result){
                header("Location: categorys.php");
                exit();
            }else{
                echo "Error: " . mysqli_error($conn);
            }
        }
    }
}

function deleteCategory($conn) {
    if(isset($_POST['delete'])){
        $delete_cat_id = $_POST['delete_cat_id'];

        // Delete the data from the database
        $query = "DELETE FROM category WHERE cat_id = $delete_cat_id";
        $result = mysqli_query($conn, $query);

        if($result){
            header("Location: categorys.php");
            echo "Category has been deleted";
        }else{
            echo "Error: " . mysqli_error($conn);
        }
    }
}

function importAllPosts($conn) {
    $query = "SELECT * FROM posts";
    $result = mysqli_query($conn, $query);
    $posts = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $posts[] = $row;
        
    }

    return $posts;
}

function addPost(){
    global $conn;
    
    if(isset($_POST['create_post'])) {
        $post_title = $_POST['title'];
        $post_category_id = $_POST['post_category_id'];
        $post_author = $_POST['author'];
        $post_status = $_POST['status'];
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_tags = $_POST['tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('Y-m-d');
        $post_comment_count = 0; // Update this value if needed

        // Additional processing for the form data, such as moving the uploaded image to a desired location
        move_uploaded_file($post_image_temp, "../images/$post_image");
    
        $query = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";
        $query .= "VALUES('$post_category_id', '$post_title', '$post_author', '$post_date', '$post_image', '$post_content', '$post_tags', '$post_comment_count', '$post_status')";

        $create_post_query = mysqli_query($conn, $query);
  
        if(!$create_post_query) {
            die("Query Failed: " . mysqli_error($conn));
        }
        $the_post_id = mysqli_insert_id($conn);
        header("Location: post.php?p_id=$the_post_id");
    }
}

function DeletePost($conn){
    if(isset($_GET['delete'])){
        $the_post_id = $_GET['delete'];
        $query = "DELETE FROM posts WHERE post_id = $the_post_id"; // Modify the column name here
        $delete_post_query = mysqli_query($conn, $query);

        if(!$delete_post_query){
            die("QUERY FAILED" . mysqli_error($conn));
        }
        header("Location: post.php");
    }
}

$posts = importAllPosts($conn);

function updatePost() {
    global $conn;

    if (isset($_POST['update_post'])) {
        // Retrieve the updated values from the form
        $post_id = $_GET['post_id'];
        $updated_title = $_POST['title'];
        $updated_category_id = $_POST['post_category_id'];
        $updated_author = $_POST['author'];
        $updated_status = $_POST['status'];
        $updated_tags = $_POST['tags'];
        $updated_content = $_POST['post_content'];

        // Perform data validation and sanitization as needed

        // Check if a new image has been uploaded
        if ($_FILES['image']['name']) {
            $post_image = $_FILES['image']['name'];
            $post_image_temp = $_FILES['image']['tmp_name'];

            // Move the uploaded image to a desired location
            move_uploaded_file($post_image_temp, "../images/$post_image");
        } else {
            // If no new image is uploaded, retain the existing image
            $query = "SELECT post_image FROM posts WHERE post_id = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "i", $post_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            $post_image = $row['post_image'];
        }

        // Construct the SQL query to update the post
        $query = "UPDATE posts SET
            post_title = ?,
            post_category_id = ?,
            post_author = ?,
            post_status = ?,
            post_image = ?,
            post_tags = ?,
            post_content = ?
            WHERE post_id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sisssssi", $updated_title, $updated_category_id, $updated_author, $updated_status, $post_image, $updated_tags, $updated_content, $post_id);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            // The update was successful
            // Redirect to a success page or perform any other desired action
            header("Location: success.php");
            exit();
        } else {
            // An error occurred during the update
            // Handle the error appropriately (e.g., display an error message)
            echo "Error updating post: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    }
}


function importAllComment($conn) {
    $query = "SELECT * FROM comments";
    $result = mysqli_query($conn, $query);
    $comments = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $comments[] = $row;
        
    }
   
    return $comments;

}


        ?>
