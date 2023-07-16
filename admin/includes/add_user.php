<?php 
   
?>

<?php createUser() ?>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
        <label for="author">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="status">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
    
        <select name="user_role_id">
        <option value="Subscriber">---Select Options---</option>
        <option value="admin">Admin</option>
        <option value="Subscriber">Subscriber</option>
        </select>
    </div>
    
    <!-- <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" name="image">
    </div> -->
    <div class="form-group">
        <label for="tags">Usernmae</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="tags">email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="tags">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>
</form>
