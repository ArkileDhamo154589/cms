<table class="table table-bordered table-hover">
   <thead>
      <tr>
         <th>Id</th>
         <th>Author</th>
         <th>Title</th>
         <th>Status</th>
         <th>Image</th>
         <th>Tags</th>
         <th>Comments</th>
         <th>Date</th>
         <th>Category</th>
         <th>Edit</th>
         <th>Delete</th>
      </tr>
   </thead>
   <tbody>
      <?php
         $posts = importAllPosts($conn);
         
         foreach ($posts as $post) {
             $post_id = $post['post_id'];
             $post_author = $post['post_author'];
             $post_title = $post['post_title'];
             $post_status = $post['post_status'];
             $post_image = $post['post_image'];
             $post_tags = $post['post_tags'];
             $post_comment_count = $post['post_comment_count'];
             $post_date = $post['post_date'];
             $category_name = $post['post_category_id'];
             $status_bullet = ($post_status === 'draft') ? '<span class="status-bullet-green"></span>' : '<span class="status-bullet-red"></span>';
      ?>
      <tr>
         <td><?php echo $post_id; ?></td>
         <td><?php echo $post_author; ?></td>
         <td><?php echo $post_title; ?></td>
         <td><?php echo $status_bullet . ' ' . $post_status; ?></td>
         <td class="img-responsive">
            <img class="img-small" src="../images/<?php echo $post_image ?>" alt="">
         </td>
         <td><?php echo $post_tags; ?></td>
         <td><?php echo $post_comment_count; ?></td>
         <td><?php echo $post_date; ?></td>
         <td><?php echo $category_name; ?></td>
         <td>
            <a href='post.php?source=edit_post&post_id=<?php echo $post_id; ?>' class="btn btn-primary">Edit</a>
         </td>
         <td>
            <?php DeletePost($conn); ?>
            <a href='post.php?delete=<?php echo $post_id; ?>' class="btn btn-danger">Delete</a>
         </td>
      </tr>
      <?php
         }
      ?>
   </tbody>
</table>
