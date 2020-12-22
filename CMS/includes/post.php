<?php
$query = "SELECT * FROM posts";
$post_data = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($post_data)) {
  $post_title = $row['post_title'];
  $post_author = $row['post_author'];
  $post_date = $row['post_date'];
  $post_image = $row['post_image'];
  $post_content = $row['post_content'];
  $post_tags = $row['post_tags'];


?>
  <!-- First Blog Post -->
  <div class="post">
    <div class="post-image">
      <img class="img-responsive" src="<?php echo $post_image ?>" alt="image not ready">
      <p class="post-heading"><a href="#"><?php echo $post_title ?></a> </p>
      </p>
      <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
      <hr>
      <div class="post-details"></div>
      <p class="post-content"><?php echo $post_content ?></p>
      <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
      <p style="padding-top: 20px;"> by <a href="index.php"><?php echo $post_author ?></a>

    </div>
  </div>
<?php } ?>


