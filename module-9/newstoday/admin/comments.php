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

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Post Image</th>
                                        <th scope="col">Comment Description</th>
                                        <th scope="col">Date & Time</th>
                                        <th scope="col">User Email Address</th>
                                        <?php
                                        if ($_SESSION['u_role'] == 2) {
                                        ?>
                                            <th scope="col">Action</th>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                </thead>

                                <?php
                                if ($_SESSION['u_role'] == 2) {
                                ?>
                                    <tbody>
                                        <?php
                                        $sql2 = "SELECT * FROM comment  ORDER BY cmnt_post";
                                        $result = mysqli_query($db, $sql2);
                                        $count = 0;
                                        while ($row_cmnt = mysqli_fetch_assoc($result)) {
                                            $cmnt_id = $row_cmnt['cmnt_id'];
                                            $cmnt_author = $row_cmnt["cmnt_author"];
                                            $cmnt_desc = $row_cmnt["cmnt_desc"];
                                            $cmnt_date = $row_cmnt["cmnt_date"];
                                            $cmnt_date = date('d-m-Y ___ g:i A', strtotime($cmnt_date));
                                            $cmnt_post = $row_cmnt["cmnt_post"];

                                            // $p_date = strtotime($p_date);
                                            // $p_date = date("m-d-Y g:i A", $p_date);

                                            $count++;
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $count; ?></th>
                                                <td>
                                                    <?php
                                                    $user = "SELECT p_img FROM posts WHERE p_id='$cmnt_post'";
                                                    $result1 = mysqli_query($db, $user);
                                                    while ($row1 = mysqli_fetch_assoc($result1)) {
                                                        $p_img = $row1['p_img'];
                                                    }

                                                    ?>
                                                    <img src="image/posts/<?php echo $p_img; ?>" alt="" width="70px">

                                                </td>

                                                <td style="width: 35%;"> <?php echo substr($cmnt_desc, 0, 150) . ' . . . '; ?></td>

                                                <td><?php echo $cmnt_date; ?></td>

                                                <td>
                                                    <?php
                                                    $user = "SELECT u_email FROM users WHERE u_id='$cmnt_author'";
                                                    $result1 = mysqli_query($db, $user);
                                                    while ($row1 = mysqli_fetch_assoc($result1)) {
                                                        $u_email = $row1['u_email'];
                                                    }
                                                    echo $u_email
                                                    ?>
                                                </td>



                                                <td>
                                                    <?php
                                                    if ($u_role == 2) {
                                                    ?>
                                                        <a data-bs-toggle="modal" data-bs-target="#del<?php echo $cmnt_id ?>"><i class="fa fa-trash fa-lg ms-2 text-danger" aria-hidden="true"></i></a>
                                                    <?php

                                                    }
                                                    ?>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="del<?php echo $cmnt_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                    <a href="comments.php?delete_id=<?php echo $cmnt_id ?>" type="button" class="btn btn-primary">Confirm</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>






                                            </tr>
                                        <?php } ?>

                                        <!-------------- delete operation -------------->
                                        <?php
                                        if (isset($_GET['delete_id'])) {
                                            $delete_id = $_GET['delete_id'];

                                            $sql3 = "DELETE FROM comment WHERE cmnt_id = '$delete_id'";
                                            $result = mysqli_query($db, $sql3);

                                            if ($result) {
                                                header('Location:comments.php');
                                            }
                                        }
                                        ?>
                                    </tbody>
                                <?php
                                    # code...
                                } else {
                                ?>
                                    <tbody>
                                        <?php
                                        $user_id = $_SESSION['u_id'];
                                        // echo $user_id;
                                        $sql2 = "SELECT * FROM comment WHERE cmnt_author='$user_id' ORDER BY cmnt_post";
                                        $result = mysqli_query($db, $sql2);
                                        $count = 0;
                                        while ($row_cmnt = mysqli_fetch_assoc($result)) {
                                            $cmnt_id = $row_cmnt['cmnt_id'];
                                            $cmnt_author = $row_cmnt["cmnt_author"];
                                            $cmnt_desc = $row_cmnt["cmnt_desc"];
                                            $cmnt_date = $row_cmnt["cmnt_date"];
                                            $cmnt_date = date('d-m-Y ___ g:i A', strtotime($cmnt_date));
                                            $cmnt_post = $row_cmnt["cmnt_post"];

                                            // $p_date = strtotime($p_date);
                                            // $p_date = date("m-d-Y g:i A", $p_date);

                                            $count++;
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $count; ?></th>
                                                <td>
                                                    <?php
                                                    $user = "SELECT p_img FROM posts WHERE p_id='$cmnt_post'";
                                                    $result1 = mysqli_query($db, $user);
                                                    while ($row1 = mysqli_fetch_assoc($result1)) {
                                                        $p_img = $row1['p_img'];
                                                    }

                                                    ?>
                                                    <img src="image/posts/<?php echo $p_img; ?>" alt="" width="70px">

                                                </td>

                                                <td style="width: 35%;"> <?php echo substr($cmnt_desc, 0, 150) . ' . . . '; ?></td>

                                                <td><?php echo $cmnt_date; ?></td>

                                                <td>
                                                    <?php
                                                    $user = "SELECT u_email FROM users WHERE u_id='$cmnt_author'";
                                                    $result1 = mysqli_query($db, $user);
                                                    while ($row1 = mysqli_fetch_assoc($result1)) {
                                                        $u_email = $row1['u_email'];
                                                    }
                                                    echo $u_email
                                                    ?>
                                                </td>



                                                <td>
                                                    <?php
                                                    if ($u_role == 2) {
                                                    ?>
                                                        <a data-bs-toggle="modal" data-bs-target="#del<?php echo $cmnt_id ?>"><i class="fa fa-trash fa-lg ms-2 text-danger" aria-hidden="true"></i></a>
                                                    <?php

                                                    }
                                                    ?>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="del<?php echo $cmnt_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                    <a href="comments.php?delete_id=<?php echo $cmnt_id ?>" type="button" class="btn btn-primary">Confirm</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>






                                            </tr>
                                        <?php } ?>

                                        <!-------------- delete operation -------------->
                                        <?php
                                        if (isset($_GET['delete_id'])) {
                                            $delete_id = $_GET['delete_id'];

                                            $sql3 = "DELETE FROM comment WHERE cmnt_id = '$delete_id'";
                                            $result = mysqli_query($db, $sql3);

                                            if ($result) {
                                                header('Location:comments.php');
                                            }
                                        }
                                        ?>
                                    </tbody>
                                <?php
                                }

                                ?>
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
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <?php include "inc/js.php"; ?>

</body>

</html>