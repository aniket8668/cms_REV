<?php
function test_data($data)
{
    $data = stripslashes($data);
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_POST['create_post'])) {

    $post_title = $_POST["post_title"];
    $post_category_id = $_POST['post_category_id'];
    $post_author = $_POST['post_author'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_status = $_POST['post_status'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date("D-M-Y");
    $post_comment_count = 4;

    move_uploaded_file($post_image_temp, "../images/$post_image");


    $post_title = test_data($post_title);
    $post_category_id = test_data($post_category_id);
    $post_author = test_data($post_author);
    $post_status = test_data($post_status);
    $post_tags = test_data($post_tags);
    $post_content = test_data($post_content);

    $query = "INSERT INTO posts (post_title,post_category_id,post_author,post_image,post_status,post_tags,post_content,post_date,post_comment_count) VALUES ('{$post_title}',{$post_category_id},'{$post_author}','{$post_image}','{$post_status}','{$post_tags}','{$post_content}',now(),{$post_comment_count})";

    if (mysqli_query($conn, $query)) {
        echo "<h3>Post Added Sucessfully</h3>";
    } else {
        echo "Error adding post!!" . mysqli_error($conn);
    }
}



?>
<form method="POST" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" id="post_title" placeholder="post_title" name="post_title" required>
    </div>


    <div class="form-group">
        <label for="post_category_id">Post Category id</label>
        <input type="text" class="form-control" placeholder="post_category_id" name="post_category_id">
    </div>

    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" placeholder="post_author" name="post_author" required>
    </div>

    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" name="image" required>
    </div>

    <div class="form-group">
        <label for="post_status">post status</label>
        <input type="text" class="form-control" placeholder="post_status" name="post_status" required>
    </div>

    <div class="form-group">
        <label for="post_tags">post tags</label>
        <input type="text" class="form-control" placeholder="post_tags" name="post_tags" required>
    </div>

    <div class="form-group">
        <label for="post_content">post content</label>
        <textarea class="form-control" rows="4" name="post_content" required></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="publish post">
    </div>
</form>