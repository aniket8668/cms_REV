 <!-- Navigation -->
 <?php
    $query = "SELECT * FROM posts WHERE post_author = 'aniket'";
    $query_for_logo = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($query_for_logo)) {
        $post_image = $row['post_image'];

    ?>

     <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
         <div class="container">
             <!-- Brand and toggle get grouped for better mobile display -->
             <div class="navbar-header">
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                 </button>
                 <!-- <a class="navbar-brand" href="#">Start Bootstrap</a> -->
                 <div class="logo-image">
                     <img src="<?php echo $post_image ?>" class="img-responsive" alt="logo">
                 </div>

             </div>
             <!-- Collect the nav links, forms, and other content for toggling -->
             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                 <ul class="nav navbar-nav">
                     <li>
                         <a href="admin">Admin</a>
                     </li>
                     <li>
                         <div class="dropdown">
                             <button class="dropbtn">Categories</button>
                             <div class="dropdown-content">
                                 <?php
                                 $query="SELECT * FROM categories";
                                 $query_categories=mysqli_query($conn,$query);
                                 while($row=mysqli_fetch_assoc($query_categories)){
                                     $cat_title=$row['cat_title'];
                                 

                                 ?>
                                 <a href="#"><?php echo $cat_title ?></a>
                                 <?php }?>
                             </div>
                         </div>
                     </li>

                 </ul>
             </div>
             <!-- /.navbar-collapse -->
         </div>
         <!-- /.container -->
     </nav>
 <?php } ?>