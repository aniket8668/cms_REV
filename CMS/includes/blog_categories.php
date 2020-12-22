 <!-- Blog Categories Well -->

 <div class="well">
     <h4>Blog Categories</h4>
     <div class="row">
         <div class="col-lg-12">
             <ul class="list-unstyled">
                 <?php
                    $query = "SELECT * FROM categories";
                    $select_everything_from_categories = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($select_everything_from_categories)) {
                        $cat_title = $row['cat_title'];
                        echo "<li>
                        <ul><a href='#'>$cat_title</a></ul>
                        </li>";
                    }
                    ?>

             </ul>
         </div>

     </div>
     <!-- /.row -->
 </div>