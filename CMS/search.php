<?php include "includes/header.php" ?>


<body>

    <?php include "includes/navbar.php" ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->

            <div class="col-md-8">
                <div id=sidebar><?php include "includes/sidenav.php" ?></div>
                <div class="page_heading">
                    <h1 class="page-header">
                        Your own blogging system!!
                    </h1>
                </div>
                <?php
                if (isset($_POST['submit'])) {
                    $search = $_POST['search'];
                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                    if ($specific_post = mysqli_query($conn, $query)) {
                        while ($row = mysqli_fetch_assoc($specific_post)) {
                            $post_title = $row['post_title'];
                            $post_content = $row['post_content'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                ?>
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
                <?php
                        }
                    } else {

                        die("query failed!!" . mysqli_error($conn));
                    }
                }
                ?>



                <?php include "includes/pager.php" ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->

            <div class="col-md-4">
                <?php include "includes/blog_search.php" ?>
                <?php include "includes/blog_categories.php" ?>
                <?php include "includes/side_well.php" ?>
                <?php include "includes/share.php" ?>
            </div>
        </div>
        <?php include "includes/footer.php"  ?>
    </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>


</html>