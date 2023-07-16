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
function getUsers($conn) {
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    return $result;
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

function delComment($conn) {
    if(isset($_GΕΤ['delete'])){
        $delete_come_id = $_GET['delete_come_id'];

        // Delete the data from the database
        $query = "DELETE FROM comments WHERE comment_id = $delete_come_id";
        $result = mysqli_query($conn, $query);

        if($result){
            header("Location: comments.php");
            echo "Comment has been deleted";
        }else{
            echo "Error: " . mysqli_error($conn);
        }
    }
}


function UnApprove($conn) {
    if(isset($_GET['unapprove'])){
        $the_unapprove = $_GET['unapprove'];
        //update
        $query = "UPDATE comments SET comment_status ='unapprove' WHERE comment_id = $the_unapprove";
        $result = mysqli_query($conn, $query);

        if($result){
            header("Location: comments.php");
        }else{
            echo "Error: " . mysqli_error($conn);
        }
    }
}

function changeToAdmin($conn) {
    if(isset($_GET['admin'])){
        $admin = $_GET['admin'];
        //update
        $query = "UPDATE users SET user_role ='admin' WHERE user_id = $admin";
        $result = mysqli_query($conn, $query);

        if($result){
            header("Location: users.php");
        }else{
            echo "Error: " . mysqli_error($conn);
        }
    }
}

function changeSubscriber($conn) {
    if(isset($_GET['subscriber'])){
        $subscriber = $_GET['subscriber'];
        //update
        $query = "UPDATE users SET user_role ='subscriber' WHERE user_id = $subscriber";
        $result = mysqli_query($conn, $query);

        if($result){
            header("Location: users.php");
        }else{
            echo "Error: " . mysqli_error($conn);
        }
    }
}




function importAllPosts($conn) {
    $query = "SELECT posts.*, COUNT(comments.comment_id) AS post_comment_count
              FROM posts
              LEFT JOIN comments ON posts.post_id = comments.comment_post_id
              GROUP BY posts.post_id";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    $posts = array(); // Initialize an empty array to hold the posts

    while ($row = mysqli_fetch_assoc($result)) {
        $posts[] = $row; // Add each post row to the array
    }

    return $posts;
}
function importAllusers($conn) {
    $query = "SELECT * FROM users";
    $users = mysqli_query($conn, $query);

    if (!$users) {
        die("Error: " . mysqli_error($conn));
    }

    

    return $users;
}


function createUser() {
    global $conn;

    if (isset($_POST['create_user'])) {
        $username = $_POST['username'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_role_id = $_POST['user_role_id'];
        $user_password = $_POST['user_password'];

        // Additional processing for the form data

        // Insert the user into the database
        $query = "INSERT INTO users (username, user_firstname, user_lastname, user_email, user_role,user_password) ";
        $query .= "VALUES ('$username', '$user_firstname', '$user_lastname', '$user_email', '$user_role_id' ,'$user_password')";
        
        $create_user_query = mysqli_query($conn, $query);

        if (!$create_user_query) {
            die("Query Failed: " . mysqli_error($conn));
        }

        // Redirect to a success page or wherever needed
        header("Location: users.php");
        exit;
    }
}

function deleteUser($conn) {
    if (isset($_GET['delete'])) {
        $the_user_id = $_GET['delete'];
        $query = "DELETE FROM users WHERE user_id = $the_user_id";
        $delete_user_query = mysqli_query($conn, $query);

        if (!$delete_user_query) {
            die("QUERY FAILED" . mysqli_error($conn));
        }
        header("Location: users.php");
        exit;
    }
}

// function updateUser($conn)
// {
//     if (isset($_POST['update_user'])) {
//         $user_id = ['user_id'];
//         $user_firstname = $_POST['user_firstname'];
//         $user_lastname = $_POST['user_lastname'];
//         $user_role_id = $_POST['user_role_id'];
//         $username = $_POST['username'];
//         $user_email = $_POST['user_email'];
//         $user_password = $_POST['user_password'];

//         // Additional processing for the form data

//         // Update the user in the database
//         $query = "UPDATE users SET user_firstname='$user_firstname', user_lastname='$user_lastname', ";
//         $query .= "user_role='$user_role_id', username='$username', user_email='$user_email', user_password='$user_password' ";
//         $query .= "WHERE user_id='$user_id'";

//         $update_user_query = mysqli_query($conn, $query);

//         if (!$update_user_query) {
//             die("Query Failed: " . mysqli_error($conn));
//         }

//         // Redirect to a success page or wherever needed
//         header("Location: users.php");
//         exit;
//     }
// }
    


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



function importAllComment($conn) {
    $query = "SELECT * FROM comments";
    $result = mysqli_query($conn, $query);
    $comments = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $comments[] = $row;
        
    }
   
    return $comments;

}

function showComLink(){
    global $conn;
    global $comment_post_id;
    $query = "SELECT * FROM comments WHERE comment_post_id = '$comment_post_id'";
    $select_post_id_query = mysqli_query($conn, $query);
    return $select_post_id_query;
}



function get_post_count($conn) {
    $query = "SELECT COUNT(*) as post_count FROM posts";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['post_count'];
    } else {
        return 0;
    }
}

function get_comm_count($conn){
    $query = "SELECT COUNT(*) as comment_count FROM comments";
    $result = mysqli_query($conn,$query);

    if($result){
        $row = mysqli_fetch_assoc($result);
        return $row['comment_count'];
     } else {
            return 0;
        }
    }
    function get_users_count($conn){
        $query = "SELECT COUNT(*) as users_count FROM users";
        $result = mysqli_query($conn,$query);
    
        if($result){
            $row = mysqli_fetch_assoc($result);
            return $row['users_count'];
         } else {
                return 0;
            }
        }

        function get_cat_count($conn){
            $query = "SELECT COUNT(*) as cat_count FROM category";
            $result = mysqli_query($conn,$query);

            if($result){
                $row = mysqli_fetch_assoc($result);
                return $row ['cat_count'];
            }else{
                return 0;
            }
            }
        
    
  ?>
