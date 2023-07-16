


<?php 
$query = "SELECT * FROM users";
$users = mysqli_query($conn, $query);

if (!$users) {
    die("Error: " . mysqli_error($conn));
}

foreach ($users as $row){
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
    $user_password = $row['user_password'];
}
?>



<?php 
if (isset($_POST['update_user'])) {
    $user_id = $_GET['user_id'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role_id = $_POST['user_role_id'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    // Ενημέρωση του χρήστη στη βάση δεδομένων
    $query = "UPDATE users SET ";
    $query .= "user_firstname = '$user_firstname', ";
    $query .= "user_lastname = '$user_lastname', ";
    $query .= "user_role = '$user_role_id', ";
    $query .= "username = '$username', ";
    $query .= "user_email = '$user_email', ";
    $query .= "user_password = '$user_password' ";
    $query .= "WHERE user_id = '$user_id'";

    $update_user_query = mysqli_query($conn, $query);

    if (!$update_user_query) {
        die("Query Failed: " . mysqli_error($conn));
    }

    // Ανακατεύθυνση σε μια σελίδα επιτυχίας ή όπου αλλού επιθυμείτε
    header("Location: users.php");
    exit();
}
?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="author">First Name</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
    </div>
    <div class="form-group">
        <label for="status">Last Name</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
    </div>
    <div class="form-group">
        <select name="user_role_id">
            <option value="admin" <?php if ($user_role === 'admin') echo 'selected'; ?>>Admin</option>
            <option value="Subscriber" <?php if ($user_role === 'Subscriber') echo 'selected'; ?>>Subscriber</option>
        </select>
    </div>
    
    <!-- <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" name="image">
    </div> -->
    <div class="form-group">
        <label for="tags">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="form-group">
        <label for="tags">Email</label>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
    </div>
    <div class="form-group">
        <label for="tags">Password</label>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_user" value="Update user">
    </div>
</form>



