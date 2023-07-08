<?php
include "db.php";

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
?>
