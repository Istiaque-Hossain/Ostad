<?php include "inc/head.php" ?>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        <?php include "inc/header.php"; ?>
        <?php include "inc/menubar.php"; ?>

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Category</h4>
                    </div>

                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Add New Category</h3>
                            <form action="../config/action.php" method="POST">
                                <div class="col-md-12 mt-4">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Add Category Name</label>
                                        <input class="form-control" id="exampleFormControlInput1" placeholder="" name="cat_name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Add description</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="cat_desc"></textarea>
                                    </div>
                                    <input type="submit" value="Submit" class="btn btn-mid btn-primary" name="add_cat">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">All Categories</h3>
                            <table class="table table-light table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Status</th>
                                        <?php if ($u_role == 2) {
                                        ?>
                                            <th scope="col">Action</th>
                                        <?php
                                        }  ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-------------- read data -------------->
                                    <?php
                                    $sql2 = "SELECT * FROM category";
                                    $result = mysqli_query($db, $sql2);
                                    $count = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $cat_id = $row['c_id'];
                                        $cat_name = $row["c_name"];
                                        $cat_desc = $row["c_desc"];
                                        $cat_status = $row["c_status"];

                                        $count++;
                                    ?>
                                        <!--------------  -------------->

                                        <tr>
                                            <th scope="row"><?php echo $count ?></th>
                                            <td><?php echo  $cat_name ?></td>
                                            <td><?php echo $cat_desc ?></td>
                                            <td><?php
                                                if ($cat_status == 0) {
                                                    echo "<span class='badge bg-warning'>Inactive</span>";
                                                } else {
                                                    echo "<span class='badge bg-success'>Active</span>";
                                                }
                                                ?></td>

                                            <td>
                                                <?php
                                                if ($u_role == 2) {
                                                ?>
                                                    <a href="category.php?update_id=<?php echo $cat_id ?>"><i class="fa fa-pencil-square-o fa-lg " aria-hidden="true"></i></a>
                                                    <?php
                                                    if ($cat_id != 137) {
                                                    ?>
                                                        <a data-bs-toggle="modal" data-bs-target="#del<?php echo $cat_id ?>"><i class="fa fa-trash fa-lg ms-2 text-danger" aria-hidden="true"></i></a>
                                                <?php
                                                    }
                                                }
                                                ?>

                                                <!-- Modal -->
                                                <div class="modal fade" id="del<?php echo $cat_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-danger fw-bold" id="exampleModalLabel">Delete</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-danger fw-bold">
                                                                <span> Are You Sure ?</span>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</a>
                                                                <a href="category.php?delete_id=<?php echo $cat_id ?>" type="button" class="btn btn-primary">Confirm</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>

                                    <?php
                                    }
                                    ?>

                                    <!-------------- delete operation -------------->
                                    <?php
                                    if (isset($_GET['delete_id'])) {
                                        $delete_id = $_GET['delete_id'];

                                        $sql3 = "DELETE FROM category WHERE c_id = '$delete_id'";
                                        $result = mysqli_query($db, $sql3);

                                        if ($result) {
                                            header('Location:category.php');
                                        }
                                    }
                                    ?>

                                    <!-------------- read for update -------------->
                                    <?php
                                    if (isset($_GET['update_id'])) {
                                        $update_id = $_GET['update_id'];

                                        $sql4 = "SELECT * FROM category WHERE c_id = '$update_id'";
                                        $result = mysqli_query($db, $sql4);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $cat_name = $row["c_name"];
                                            $cat_desc = $row["c_desc"];
                                            $cat_status = $row["c_status"];
                                        }
                                    ?>
                                        <h1>Update Category</h1>
                                        <form action="" method="POST">
                                            <div class=" col-md-12">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Update Category</label>
                                                    <input class="form-control" id="exampleFormControlInput1" placeholder="" name="cat_name" value=" <?php echo $cat_name ?> ">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlTextarea1" class="form-label">Update description</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="cat_desc"><?php echo $cat_desc ?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlTextarea1" class="form-label">Update Status</label>
                                                    <div class="form-check">
                                                        <input value="1" class="form-check-input" type="radio" name="cat_status" id="flexRadioDefault1" <?php if ($cat_status == 1) { ?> checked <?php } ?>>
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Active
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input value="0" class="form-check-input" type="radio" name="cat_status" id="flexRadioDefault2" <?php if ($cat_status == 0) { ?> checked <?php } ?>>
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            Inactive
                                                        </label>
                                                    </div>
                                                </div>
                                                <input type="submit" value="Submit" class="btn btn-mid btn-primary mb-3" name="update_cat">
                                                <!-- <input type="button" value="Cancel" class="btn btn-secondar" > -->


                                                <a type="button" class="btn btn-secondary ms-2 mb-3 text-light " href="category.php">Cancel</a>


                                            </div>
                                        </form>

                                    <?php

                                    }
                                    ?>
                                    <!-------------- update -------------->
                                    <?php
                                    if (isset($_POST["update_cat"])) {
                                        $cata_name = $_POST["cat_name"];
                                        $cata_desc = $_POST["cat_desc"];
                                        $cata_status = $_POST["cat_status"];
                                        echo " this is " . $cata_status;


                                        // echo $cata_name . " " . $cata_desc;
                                        $sql_up = "UPDATE category SET c_name= '$cata_name', c_desc='$cata_desc' , c_status='$cata_status' WHERE c_id='$update_id'";
                                        $result_up = mysqli_query($db, $sql_up);
                                        if ($result_up) {
                                            header("Location:category.php ");
                                        } else {
                                            echo " ERROR ";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <?php include "inc/footer.php"; ?>

        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <?php include "inc/js.php" ?>
</body>

</html>