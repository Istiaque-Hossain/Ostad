<?php
include "inc/head.php";
$current_user = $_SESSION['u_id'];

?>



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
                        <h4 class="page-title">Dashboard</h4>
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
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="white-box">

                            <?php

                            $do = isset($_GET['do']) ? $_GET['do'] : 'view';

                            //<!-- ============================= VIEW ================================= -->

                            if ($do == "view") {
                            ?>
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="">
                                            <th scope="col">#</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Thumbnail</th>
                                            <th scope="col">Tiltle</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Author</th>
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
                                        $sql2 = "SELECT * FROM posts";
                                        $result = mysqli_query($db, $sql2);
                                        $count = 0;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $p_id = $row['p_id'];
                                            $p_title = $row["p_title"];
                                            $p_img = $row["p_img"];
                                            $p_author = $row["p_author"];
                                            $p_desc = $row["p_desc"];
                                            $p_date = $row["p_date"];
                                            $p_date = date('d-m-Y g:i A', strtotime($p_date));
                                            // $p_date = strtotime($p_date);
                                            // $p_date = date("m-d-Y g:i A", $p_date);

                                            $p_cat = $row["p_cat"];
                                            $p_cmnt = $row["p_cmnt"];
                                            $p_status = $row["p_status"];

                                            $count++;
                                        ?>
                                            <!--------------  -------------->

                                            <tr class="align-middle">
                                                <th scope="row"><?php echo $count ?></th>
                                                <td style="width: 7rem;"><?php echo  $p_date ?></td>

                                                <td>
                                                    <img src="image/posts/<?php echo  $p_img ?> " width="100" alt="" srcset="">
                                                </td>
                                                <td style="width: 12rem;"> <?php echo  $p_title ?> </td>
                                                <td style="width: 14rem;"><?php echo substr($p_desc, 0, 150) . ' . . . . . .' ?></td>
                                                <td><?php

                                                    $cat = "SELECT c_name FROM category WHERE c_id='$p_cat'";
                                                    $result1 = mysqli_query($db, $cat);
                                                    while ($row1 = mysqli_fetch_assoc($result1)) {
                                                        $cat_name = $row1['c_name'];
                                                    }
                                                    if (!empty($cat_name)) {
                                                        echo $cat_name;
                                                    } else {
                                                        echo $cat_name = "Uncategorized";
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $user = "SELECT u_name FROM users WHERE u_id='$p_author'";
                                                    $result1 = mysqli_query($db, $user);
                                                    while ($row1 = mysqli_fetch_assoc($result1)) {
                                                        $user_name = $row1['u_name'];
                                                    }
                                                    echo $user_name;
                                                    // $user_name = "none";
                                                    ?>
                                                </td>

                                                <td><?php
                                                    if ($p_status == 0) {
                                                        echo "<span class='badge bg-warning'>Inactive</span>";
                                                    } else {
                                                        echo "<span class='badge bg-success'>Active</span>";
                                                    }
                                                    ?>
                                                </td>


                                                <!-- <a title="preview" href="category.php?update_id=">
                                                        <i class="fa fa-eye fa-lg text-warning" aria-hidden="true"></i>
                                                    </a> -->

                                                <?php
                                                if ($u_role == 2) {
                                                ?> <td>
                                                        <a title="edit" href="posts.php?do=edit&edit_id=<?php echo $p_id ?>">
                                                            <i class="fa fa-pencil-square-o fa-lg ms-2" aria-hidden="true"></i>
                                                        </a>
                                                        <a data-bs-toggle="modal" data-bs-target="#del<?php echo $p_id ?>">
                                                            <i class="fa fa-trash fa-lg ms-2 text-danger" aria-hidden="true" style="cursor: pointer;"></i>
                                                        </a>


                                                        <!-- Modal -->
                                                        <div class="modal fade" id="del<?php echo $p_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                        <a type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Cancel</a>
                                                                        <a href="posts.php?do=delete&delete_id=<?php echo $p_id ?>" type="button" class="btn btn-danger text-light">Confirm</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                <?php
                                                }
                                                ?>

                                            </tr>

                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            <?php


                            }

                            //<!-- ============================= ADD ================================= -->

                            else if ($do == "add") {

                            ?>
                                <h3 class=" box-title">Add New Post</h3>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-md-12 mt-4">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                                                    <input class="form-control" id="exampleFormControlInput1" placeholder="" name="p_title">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="p_desc" style="height: 12rem;"></textarea>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <div class="mb-3">
                                                <label for="inputGroupSelect01">Category</label>
                                                <select class="form-select" id="inputGroupSelect01" name="p_cat">

                                                    <?php
                                                    $sql2 = "SELECT * FROM category";
                                                    $result = mysqli_query($db, $sql2);
                                                    $count = 0;
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $cat_id = $row['c_id'];
                                                        $cat_name = $row["c_name"];
                                                        $cat_status = $row["c_status"];
                                                        if ($cat_status == 1) {
                                                    ?>

                                                            <option value="<?php echo $cat_id ?>" <?php if ($cat_id == 137) { ?> selected <?php } ?>><?php echo $cat_name ?></option>

                                                    <?php
                                                        }
                                                    }
                                                    ?>


                                                </select>

                                            </div>
                                            <?php if ($u_role == 2) {
                                            ?>
                                                <div class="mb-3">
                                                    <label for="inputGroupSelect01">Status</label>
                                                    <select class="form-select" id="inputGroupSelect01" name="p_status">
                                                        <option selected>Choose...</option>
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>

                                                </div>
                                            <?php
                                            }  ?>


                                            <div class="form-group mb-4 mt-4">
                                                <label for="exampleInputFile">Post Image</label> <br>
                                                <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="p_img"><br>
                                                <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                                            </div>

                                            <input type="submit" value="Post Now" class="btn btn-mid btn-primary" name="add_post">
                                        </div>

                                    </div>

                                </form>

                                <?php
                                if (isset($_POST["add_post"])) {
                                    $p_title = $_POST["p_title"];
                                    $p_desc = $_POST["p_desc"];

                                    $p_desc = addslashes($p_desc);

                                    $p_cat = $_POST["p_cat"];
                                    if ($u_role == 2) {
                                        $p_status = $_POST["p_status"];
                                    }
                                    // $p_author = $_POST["p_author"];
                                    $p_img = $_FILES["p_img"]["name"];
                                    $p_img_temp = $_FILES["p_img"]["tmp_name"];

                                    if (
                                        !empty($p_title) && !empty($p_desc) && !empty($p_cat) &&
                                        !empty($p_img)
                                    ) {

                                        $split = explode('.', $p_img);
                                        $ext = strtolower(end($split));
                                        $check_ext = array('jpg', 'jpeg', 'png');
                                        if (in_array($ext, $check_ext) == true) {
                                            $random = rand();
                                            $upadetd_photo = $random . $p_img;
                                            move_uploaded_file($p_img_temp, 'image/posts/' . $upadetd_photo);

                                            if ($u_role == 2) {
                                                $sql = "INSERT INTO posts (p_title, p_desc, p_cat , p_status , p_img , p_date, p_author)
                                             value ('$p_title', '$p_desc', '$p_cat', '$p_status', '$upadetd_photo' , now(), '$current_user')";
                                            } else {
                                                $sql = "INSERT INTO posts (p_title, p_desc, p_cat, p_img , p_date, p_author)
                                             value ('$p_title', '$p_desc', '$p_cat', '$upadetd_photo' , now(), '$current_user')";
                                            }


                                            $result = mysqli_query($db, $sql);
                                            if ($result) {
                                                // echo " Successfull ";
                                ?>


                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title fs-5" id="staticBackdropLabel">Message</h5>
                                                                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                            </div>
                                                            <div class="modal-body text-success fs-4">
                                                                Posted Successfully.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                                                <a href="posts.php" type="button" class="btn btn-success text-light">View</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php
                                                // header("Location:users.php");
                                            } else {
                                                echo " DB Error . . ";
                                            }
                                        } else {

                                            ?>
                                            <div class="alert alert-danger" role="alert">
                                                Wrong Photo Input . .
                                            </div>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <div class="alert alert-danger" role="alert">
                                            Please fill up all required information.
                                        </div>
                                <?php
                                    }
                                }
                                ?>

                                <?php
                            }

                            //<!-- ============================= EDIT ================================= -->

                            else if ($do == "edit") {

                                if (isset($_GET['edit_id'])) {
                                    $edit_id = $_GET['edit_id'];


                                    $sql2 = "SELECT * FROM posts WHERE p_id='$edit_id'";
                                    $result = mysqli_query($db, $sql2);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $p_id = $row['p_id'];
                                        $p_title = $row["p_title"];
                                        $p_img = $row["p_img"];
                                        $p_author = $row["p_author"];
                                        $p_desc = $row["p_desc"];
                                        $p_date = $row["p_date"];
                                        $p_cat = $row["p_cat"];
                                        $p_cmnt = $row["p_cmnt"];
                                        $p_status = $row["p_status"];

                                ?>
                                        <h3 class=" box-title">Update Post</h3>
                                        <form action="posts.php?do=update" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="col-md-12 mt-4">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1" class="form-label">Title</label>
                                                            <input class="form-control" id="exampleFormControlInput1" placeholder="" name="p_title" value="<?php echo $p_title ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="p_desc" style="height: 12rem;"><?php echo $p_desc ?> </textarea>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-md-6">

                                                    <div class="mb-3">
                                                        <label for="inputGroupSelect01">Category</label>
                                                        <select class="form-select" id="inputGroupSelect01" name="p_cat">

                                                            <?php
                                                            $sql2 = "SELECT * FROM category";
                                                            $result = mysqli_query($db, $sql2);
                                                            $count = 0;
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $cat_id = $row['c_id'];
                                                                $cat_name = $row["c_name"];
                                                                $cat_status = $row["c_status"];
                                                                if ($cat_status == 1) {
                                                            ?>
                                                                    <option value="<?php echo $cat_id ?>" <?php if ($cat_id == $p_cat) { ?> selected <?php } ?>>
                                                                        <?php echo $cat_name ?>
                                                                    </option>
                                                            <?php
                                                                }
                                                            }
                                                            ?>


                                                        </select>

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputGroupSelect01">Status</label>
                                                        <select class="form-select" id="inputGroupSelect01" name="p_status">
                                                            <option value="1" <?php if ($p_status == 1) { ?> selected <?php } ?>>Active</option>
                                                            <option value="0" <?php if ($p_status == 0) { ?> selected <?php } ?>>Inactive</option>
                                                        </select>

                                                    </div>

                                                    <div class="form-group mb-4 mt-4">
                                                        <label for="exampleInputFile">Post Image</label> <br>
                                                        <img class="mb-2" src="image/posts/<?php echo $p_img ?>" alt="" srcset="" width="120"><br>
                                                        <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="p_img"><br>
                                                        <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                                                    </div>

                                                    <input type="hidden" name="update_id" value="<?php echo $p_id ?>">
                                                    <input type="submit" value="Update Post" class="btn btn-mid btn-primary">
                                                </div>

                                            </div>

                                        </form>


                                        <?php

                                    }
                                }
                            }

                            //<!-- ============================= UPDATE ================================= -->

                            else if ($do == "update") {

                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                    $update_id = $_POST["update_id"];

                                    $p_title = $_POST["p_title"];
                                    $p_desc = $_POST["p_desc"];

                                    $p_desc = addslashes($p_desc);

                                    $p_cat = $_POST["p_cat"];
                                    $p_status = $_POST["p_status"];
                                    $p_img = $_FILES["p_img"]["name"];
                                    $p_img_temp = $_FILES["p_img"]["tmp_name"];


                                    // ============================= Update Condition ================================

                                    // ====================== img (no update) ========================
                                    if (empty($p_img)) {

                                        $sql = "UPDATE posts SET p_title='$p_title',  p_desc=' $p_desc',  p_cat='$p_cat', p_status='$p_status', p_date=now() WHERE p_id='$update_id'";

                                        $result = mysqli_query($db, $sql);
                                        if ($result) {

                                        ?>
                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fs-5" id="staticBackdropLabel">Message</h5>
                                                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                        </div>
                                                        <div class="modal-body text-success fs-4">
                                                            Updated Successfully.
                                                        </div>
                                                        <div class="modal-footer">
                                                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                                            <a href="posts.php" type="button" class="btn btn-success text-light">View</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                            // header("Location:users.php");
                                        } else {
                                            echo " DB Error . . ";
                                        }
                                    }

                                    // ====================== img Update ========================

                                    else if (!empty($p_img)) {

                                        //========== delete img ========

                                        $delete_id = $update_id;

                                        $img_name = "SELECT p_img FROM posts WHERE p_id='$delete_id'";
                                        $result = mysqli_query($db, $img_name);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $img_name = $row['p_img'];
                                        }
                                        unlink('image/posts/' . $img_name);

                                        //========================== img process =========================

                                        $split = explode('.', $p_img);
                                        $ext = strtolower(end($split));
                                        $check_ext = array('jpg', 'jpeg', 'png');
                                        if (in_array($ext, $check_ext) == true) {
                                            $random = rand();
                                            $upadetd_photo = $random . $p_img;
                                            move_uploaded_file($p_img_temp, 'image/posts/' . $upadetd_photo);

                                            $sql = "UPDATE posts SET p_title='$p_title',  p_desc=' $p_desc',  p_cat='$p_cat', p_status='$p_status', p_img='$upadetd_photo', p_date=now() WHERE p_id='$update_id'";

                                            $result = mysqli_query($db, $sql);
                                            if ($result) {
                                                // echo " Successfull ";
                                            ?>


                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title fs-5" id="staticBackdropLabel">Message</h5>
                                                                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                            </div>
                                                            <div class="modal-body text-success fs-4">
                                                                Updated Successfully.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                                                <a href="posts.php" type="button" class="btn btn-success text-light">View</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                            <?php
                                                // header("Location:users.php");
                                            } else {
                                                echo " DB Error . . ";
                                            }
                                        } else {
                                            echo " Wrong Image Input . . .";
                                        }
                                    }
                                }
                            }

                            //<!-- ============================= DELETE ================================= -->

                            else if ($do == "delete") {
                                if (isset($_GET['delete_id'])) {
                                    $delete_id = $_GET['delete_id'];

                                    $img_name = "SELECT p_img FROM posts WHERE p_id='$delete_id'";
                                    $result = mysqli_query($db, $img_name);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $img_name = $row['p_img'];
                                    }
                                    unlink('image/posts/' . $img_name);

                                    $table = 'posts';
                                    $p_key = 'p_id';
                                    $d_id = $delete_id;
                                    $url = 'posts.php';

                                    delete($table, $p_key, $d_id, $url);
                                }
                            }

                            ?>
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
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <?php include "inc/js.php"; ?>

</body>

</html>