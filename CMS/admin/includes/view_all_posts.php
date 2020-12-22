<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $query = "SELECT * FROM posts";
        $all_posts = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($all_posts)) {
            $post_id = $row['post_id'];
            $author = $row['post_author'];
            $post_title = $row['post_title'];
            // $id=$row[''];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_date=$row['post_date'];

            
           echo "<tr>";
           echo "<td>$post_id; </td>";
           echo "<td>$author; </td>";
           echo "<td>$post_title;</td>";
           echo "<td> $post_id; </td>";
           echo "<td> $post_status;</td>";
           echo "<td><img width="100" class="img-responsive" src="../<?php echo $post_image; ?>"></td>";
           echo "<td> $post_tags; </td>"
           echo "<td> $post_comment_count;</td>";
           echo "<td><?php echo $post_date; ?></td>";
           e     <td><a href="view_all_posts.php?Delete={$post_id}">Delete</a></td>
            </tr>
          } ?>

    </tbody>
</table>