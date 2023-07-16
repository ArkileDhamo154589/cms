<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['delete'])) {
        delComment($conn);
    } elseif (isset($_GET['approve'])) {
        approve($conn);
    } elseif (isset($_GET['unapprove'])) {
        UnApprove($conn);
    }
}
?>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Comment_post_id</th>
            <th>Author</th>
            <th>Email</th>
            <th>Commnet</th>
            <th>Status</th>
            <th>Date</th>
            <th>CommentLink</th>
            <th>Approved</th>
            <th>UnApproved</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $comments = importAllComment($conn);
        foreach ($comments as $comm) {
            $comm_id = $comm['comment_id'];
            $comm_post_id = $comm['comment_post_id'];
            $comm_author = $comm['comment_author'];
            $comm_email = $comm['comment_email'];
            $comm_content = $comm['comment_content'];
            $comm_status = $comm['comment_status'];
            $comm_date = $comm['comment_date'];
            ?>
            <tr>
                <td><?php echo $comm_id; ?></td>
                <td><?php echo $comm_post_id; ?></td>
                <td><?php echo $comm_author; ?></td>
                <td><?php echo $comm_email; ?></td>
                <td><?php echo $comm_content; ?></td>
                <td><?php echo $comm_status; ?></td>
                <td><?php echo $comm_date; ?></td>
                <?php 
                $query = "SELECT * FROM posts WHERE post_id = $comm_post_id";
                $select_post_id_query = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($select_post_id_query)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td> ";
                }
                ?>
                <td>
                    <form method="get">
                        <input type="hidden" name="approve" value="<?php echo $comm_id; ?>">
                        <button type="submit" class="btn btn-primary">Approve</button>
                    </form>
                </td>
                <td>
                    <form method="get">
                        <input type="hidden" name="unapprove" value="<?php echo $comm_id; ?>">
                        <button type="submit" class="btn btn-danger">Unapprove</button>
                    </form>
                </td>
                <td>
                    <form method="get">
                        <input type="hidden" name="delete_come_id" value="<?php echo $comm_id; ?>">
                        <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
