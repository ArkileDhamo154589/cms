<!-- comment_form.php -->

<div class="well">
    <h4>Leave a Comment:</h4>
    <form method="post" action="post.php?p_id=<?php echo $the_post_id; ?>" role="form">
        <div class="form-group">
            <label for="Author">Author</label>
            <input type="text" class="form-control" name="comment_author" />
        </div>
        <div class="form-group">
            <label for="Auhtor">Email</label>
            <input type="email" class="form-control" name="comment_email" />
        </div>
        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea class="form-control" name="comment_content" rows="3"></textarea>
        </div>
        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
    </form>
</div>
