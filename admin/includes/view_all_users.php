
<?php
?>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Username</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Email</th>
            <th>Role</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
        $users = importAllusers($conn);
        while ($row = mysqli_fetch_assoc($users)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
            
        ?>
            <tr>
                <td><?php echo $user_id; ?></td>
                <td><?php echo $user_image; ?></td>
                <td><?php echo $username; ?></td>
                <td><?php echo $user_firstname; ?></td>
                <td><?php echo $user_lastname; ?></td>
                <td><?php echo $user_email; ?></td>
                <td><?php echo $user_role; ?></td>
                <td>
                <form method="get" action="users.php">
                    <?php changeToAdmin($conn); ?>
                        <input type="hidden" name="admin" value="<?php echo $user_id; ?>">
                        <button type="submit" class="btn btn-primary">Change to Admin</button>
                    </form>
                </td>
                <td>
                <form method="get" action="users.php">
                    <?php changeSubscriber($conn); ?>
                        <input type="hidden" name="subscriber" value="<?php echo $user_id; ?>">
                        <button type="submit" class="btn btn-danger"> Change to Subscriber</button>
                    </form>
                </td>
                <td>
                <form method="get" action="users.php">
                        <?php deleteUser($conn); ?>
                        <input type="hidden" name="delete" value="<?php echo $user_id; ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </td>
                <td>
            <a href='users.php?source=edit_user&user_id=<?php echo $user_id; ?>' class="btn btn-primary">Edit</a>
         </td>
            </tr>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
