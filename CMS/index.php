<?php include "includes/header.php" ?>


<body>

    <?php include "includes/navbar.php" ?>
    <!-- scroll bar indicator -->
    <div class="line" id="scrollIndicator"> </div>
    <div class="text">


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

                    <?php include "includes/post.php" ?>
                    <?php include "includes/pager.php" ?>
                </div>

                <!-- Blog Sidebar Widgets Column -->
                <div class="col-md-4">
            
                    <?php include "includes/blog_search.php" ?>
                    <?php include "includes/blog_categories.php" ?>
                    <?php include "includes/side_well.php" ?>
                    <?php include "includes/share.php"    ?>
                    <a href="tel:+918540095393"> Call us at:+918540095393</a>

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