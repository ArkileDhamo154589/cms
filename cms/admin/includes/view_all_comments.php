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
         <th>Approved</th>
         <th>UnApproved</th>
         <th>Edit</th>
         <th>Delete</th>
      </tr>
   </thead>
   <tbody>
      <?php
         $comments = importAllComment($conn);
         
         foreach ( $comments as $comm) {
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
         <td><?php echo  $comm_email; ?></td>
         <!-- <td class="img-responsive">
            <img class="img-small" src="../images/<?php echo $post_image ?>" alt="">
         </td> -->
         <td><?php echo $comm_content; ?></td>
         <td><?php echo $comm_status; ?></td>
         <td><?php echo $comm_date; ?></td>
         <td>
            <a href='post.php?source=approve_post&post_id=<?php echo $post_id; ?>' class="btn btn-primary">appove</a>
         </td>
         <td>
            <a href='post.php?unapprove=<?php echo $post_id; ?>' class="btn btn-danger">unapprove</a>
         </td>
         <td>
            <a href='post.php?delete=<?php echo $post_id; ?>' class="btn btn-danger">Delete</a>
         </td>
         
       
      </tr>
      <?php
         }
      ?>
   </tbody>
</table>
