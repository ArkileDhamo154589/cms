<?php 

if (!function_exists('insertComment')) {
    function insertComment() {
        global $conn;
        if (isset($_GET['p_id'])) {
            // Retrieve the post ID from the URL parameter
            $the_post_id = $_GET['p_id'];

        if (isset($_POST['create_comment'])) {
            $the_post_id = $_GET['p_id'];
            $comment_author = $_POST['comment_author'];
            $comment_email = $_POST['comment_email'];
            $comment_content = $_POST['comment_content'];
            $comment_status = "pending";
            $comment_date = date("Y-m-d");

            $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)
                      VALUES ('$the_post_id', '$comment_author', '$comment_email', '$comment_content', '$comment_status', '$comment_date')";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                die("Error" . mysqli_error($conn));
            }
          
        }
    }
}

}

function showComments(){
    global $the_post_id;
    global $conn;
    $query = "SELECT * FROM comments WHERE comment_post_id = $the_post_id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    $comments = array(); // Initialize an empty array to hold the comments

    while ($row = mysqli_fetch_assoc($result)) {
        $comments[] = $row; // Add each comment row to the array
    }

    return $comments;
}
function showCat() {
    global $conn;
    $query = "SELECT * FROM categories";
    $result = mysqli_query($conn, $query);
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $categories;
}
