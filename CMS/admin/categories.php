<?php include "includes/header.php" ?>


<div id="wrapper">

    <?php include "includes/navbar.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Blank Page
                        <small>Subheading</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Blank Page
                        </li>
                    </ol>
                </div>
                <div class="col-xs-6">

                    <form method="post" action="#">
                        <div class="form-group">
                            <?php

                            function test_data($data)
                            {
                                $data =  stripslashes($data);
                                $data =  stripslashes($data);
                                $data =  stripslashes($data);
                                return $data;
                            }
                            if (isset($_POST['submit'])) {
                                $categories = $_POST['categories'];
                                if ($categories == '' || empty($categories)) {
                                    echo "<div class='alert alert-danger alert-dismissible' role='alert'><h3>Please enter your category name</h3></div>";
                                } else {
                                    $categories = test_data($categories);
                                    $query = "INSERT INTO categories(cat_title) VALUES ('$categories')";
                                    if (mysqli_query($conn, $query)) {
                                        echo "<div class='alert alert-success alert-dismissible' role='alert'><h3>Category Added</h3></div>";
                                    } else {
                                        echo "failed" . mysqli_error($conn);
                                    }
                                }
                            }



                            ?>
                            <label for="cat-title">Add Categories</label>
                            <input type="text" class="form-control" name="categories" placeholder="Enter your category here..">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="add category">
                        </div>
                    </form>
                    <form method="post" action="#">
                        <div class="form-group">
                            <label for="cat-title">update Categories</label>
                            <?php
                            if (isset($_GET['Update'])) {
                                $cat_idd = $_GET['Update'];
                                $query = "SELECT * FROM categories WHERE cat_id =$cat_idd ";
                                $update_value = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($update_value)) {
                                    $cat_title = $row['cat_title'];


                            ?>
                                    <input type="text" value="<?php if (isset($cat_title)) {
                                                                    echo $cat_title;
                                                                } ?>" class="form-control" name="update_categories" placeholder="update your category here..">
                            <?php }
                            } ?>

                            <?php
                            if (isset($_POST['update_categories'])) {
                                $update_categories = $_POST['update_categories'];
                                if ($update_categories == '' || empty($update_categories)) {
                                    echo "please select and add new name";
                                } else {
                                    $update_categories = test_data($update_categories);
                                    $update_query = "UPDATE categories SET cat_title = $update_categories WHERE cat_id = $cat_idd";
                                    $update_query_conn = mysqli_query($conn, $update_query);
                                }
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="update" value="update category">
                        </div>
                    </form>
                </div>

                <div class="col-xs-6">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Ids</th>
                                <th>Categories</th>
                                <th>Delete</th>
                                <th>update</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM categories";
                            $categories = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($categories)) {
                                $cat_title = $row['cat_title'];
                                $cat_id = $row["cat_id"];


                                echo "<tr>";
                                echo "<td>$cat_id</td>";
                                echo "<td> $cat_title </td>";

                                echo "<td><a href='categories.php?Delete={$cat_id}'><button class='btn btn-danger text-center'>Delete</button></a></td>";

                                echo "<td><a href='categories.php?Update={$cat_id}'><button class='btn btn-danger text-center'>update</button></a></td>";
                                echo "</tr>";
                            } ?>

                            <?php
                            if (isset($_GET['Delete'])) {
                                $cat_id = $_GET['Delete'];
                                $query = "DELETE  FROM categories WHERE cat_id = $cat_id";
                                if (mysqli_query($conn, $query)) {
                                    header("location:categories.php");
                                } else {
                                    echo "category deletion failed";
                                }
                            }


                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<?php include "includes/footer.php" ?>