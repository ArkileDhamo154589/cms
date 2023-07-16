<?php
   include 'includes/admin_header.php';
   include 'includes/navigation.php';


   if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '$username'";
    $select_user_query = mysqli_query($conn, $query);

    if (!$select_user_query) {
        die("Error: " . mysqli_error($conn));
    }

    if ($row = mysqli_fetch_assoc($select_user_query)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
        $user_password = $row['user_password'];
    }
}

    ?>
    
    
    
    <?php 
    if (isset($_POST['update_user'])) {
        // No need to get $user_id from $_GET as it's already fetched from the session data
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role_id = $_POST['user_role_id'];
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        
        

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
        header("Location: profile.php");
        exit();
    }
    ?>

<div id="wrapper">
   <div id="page-wrapper">
      <div class="container-fluid">
         <!-- Page Heading -->
         <div class="row">
            <div class="col-lg-12">
               <h1 class="page-header">
                Welcome to your profile<small> <?php echo $_SESSION['username']?> </small>
                  
               </h1>

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
        <input class="btn btn-primary" type="submit" name="update_user" value="Update credentials">
    </div>
</form>




            </div>
         </div>
         
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- /#page-wrapper -->
 
<?php
   include "includes/footer.php";
   ?>
   