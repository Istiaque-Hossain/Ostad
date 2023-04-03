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
                        <h4 class="page-title">Profile</h4>
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
                            $current_id = $_SESSION['u_id'];
                            $sql2 = "SELECT * FROM users WHERE u_id='$current_id'";

                            $result = mysqli_query($db, $sql2);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $user_id = $row['u_id'];
                                $user_img = $row["u_img"];
                                $user_name = $row["u_name"];
                                $user_gender = $row["u_gender"];
                                $user_email = $row["u_email"];
                                $user_pass = $row["u_password"];
                                $user_address = $row["u_address"];
                                $user_phone = $row["u_phone"];
                                $user_dob = $row["u_dob"];
                                $user_bio = $row["u_bio"];
                                $user_edu = $row["u_education"];
                                // $user_status = $row["u_status"];
                                // $user_role = $row["u_role"];
                            }
                            ?>
                            <div class="row">
                                <!-- Column -->
                                <div class="col-lg-4 col-xlg-3 col-md-12">
                                    <div class="white-box">
                                        <div class="user-bg"> <img width="100%" alt="user" src="image/users/<?php echo $user_img ?>">
                                            <div class="overlay-box">
                                                <div class="user-content">
                                                    <a href="javascript:void(0)"><img width="100%" src="image/users/<?php echo $user_img ?>" class="thumb-lg img-circle" alt="img"></a>
                                                    <h4 class="text-white mt-2"><?php echo $user_name ?> </h4>
                                                    <h5 class="text-white mt-2"><?php echo $user_email ?> </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="user-btm-box mt-5 d-md-flex">
                                            <div class="col-md-4 col-sm-4 text-center">
                                                <h1><?php echo '+880' . $user_phone ?></h1>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                                <!-- Column -->
                                <div class="col-lg-8 col-xlg-9 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="profile.php" method="POST" class="form-horizontal form-material" enctype="multipart/form-data">
                                                <div class="form-group mb-4">
                                                    <label class="col-md-12 p-0">Full Name</label>
                                                    <div class="col-md-12 border-bottom p-0">
                                                        <input type="text" class="form-control p-0 border-0" value="<?php echo $user_name ?>" name="user_name">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="example-email" class="col-md-12 p-0">Email</label>
                                                    <div class="col-md-12 border-bottom p-0">
                                                        <input type="email" value="<?php echo $user_email ?>" class="form-control p-0 border-0" name="user_email" id="example-email">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label class="col-md-12 p-0">Password</label>
                                                    <div class="col-md-12 border-bottom p-0">
                                                        <input type="password" class="form-control p-0 border-0" name="user_pass">
                                                    </div>
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="example-date-input" class="col-2 col-form-label">Date of Birth</label>
                                                    <input class="form-control" type="date" id="example-date-input" placeholder="" name="user_dob" value="<?php echo $user_dob ?>">
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="inputGroupSelect01">Gender</label>
                                                    <select class="form-select" id="inputGroupSelect01" name="user_gender">
                                                        <option selected>Choose...</option>
                                                        <option value="Male" <?php if ($user_gender == 'Male') echo 'selected' ?>>Male</option>
                                                        <option value="Female" <?php if ($user_gender == 'Female') echo 'selected' ?>>Female</option>
                                                        <option value="Others" <?php if ($user_gender == 'Others') echo 'selected' ?>>Others</option>
                                                    </select>
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlTextarea1" class="form-label">Education</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="user_edu"><?php echo $user_edu ?></textarea>
                                                </div>

                                                <div class="form-group mb-4">
                                                    <label class="col-md-12 p-0">Phone No</label>
                                                    <div class="col-md-12 border-bottom p-0">
                                                        <input type="text" value="<?php echo '0' . $user_phone ?>" class="form-control p-0 border-0" name="user_phone">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label class="col-md-12 p-0">Biodata</label>
                                                    <div class="col-md-12 border-bottom p-0">
                                                        <textarea rows="5" class="form-control p-0 border-0" name="user_bio"><?php echo $user_bio ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label class="col-md-12 p-0">Address</label>
                                                    <div class="col-md-12 border-bottom p-0">
                                                        <textarea rows="5" class="form-control p-0 border-0" name="user_adrs"><?php echo $user_address ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-4 mt-4">
                                                    <label for="exampleInputFile">Profile Image</label> <br>
                                                    <img class="mb-2" src="image/users/<?php echo $user_img ?>" alt="" srcset="" width="120"><br>
                                                    <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="photo"><br>

                                                    <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <div class="col-sm-12">
                                                        <input type="hidden" name="update_id" value="<?php echo $user_id ?>">
                                                        <button class="btn btn-success">Update Profile</button>
                                                    </div>
                                                </div>
                                            </form>


                                            <?php

                                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                                $update_id = $_POST["update_id"];

                                                $user_name = $_POST["user_name"];
                                                $user_email = $_POST["user_email"];
                                                $user_pass = $_POST["user_pass"];
                                                $user_adrs = $_POST["user_adrs"];
                                                $user_phone = $_POST["user_phone"];
                                                $user_bio = $_POST["user_bio"];

                                                $user_dob = $_POST["user_dob"];
                                                $user_gender = $_POST["user_gender"];
                                                $user_edu = $_POST["user_edu"];


                                                $user_photo = $_FILES["photo"]["name"];
                                                $user_photo_temp = $_FILES["photo"]["tmp_name"];


                                                // ============================= Update Condition ================================

                                                // ====================== img, pass (no update) ========================
                                                if (empty($user_photo) && empty($user_pass)) {
                                                    $sql = "UPDATE users SET u_name='$user_name', u_email='$user_email',  u_address='$user_adrs', u_phone='$user_phone', u_bio='$user_bio', u_dob='$user_dob', u_gender='$user_gender', u_education='$user_edu' WHERE u_id='$update_id'";

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

                                                                    </div>
                                                                    <div class="modal-body text-success fs-4">
                                                                        Updated Successfully.
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a href="profile.php" type="button" class="btn btn-success text-light">View</a>
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

                                                // ====================== img Update (no pass) ========================

                                                else if (!empty($user_photo) && empty($user_pass)) {
                                                    // echo " present";

                                                    //=========================== delete previous img =========================

                                                    $img_name = "SELECT u_img FROM users WHERE u_id='$update_id'";
                                                    $result = mysqli_query($db, $img_name);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $img_name = $row['u_img'];
                                                    }
                                                    unlink('image/users/' . $img_name);

                                                    //========================== img process =========================

                                                    $split = explode('.', $user_photo);
                                                    $ext = strtolower(end($split));
                                                    $check_ext = array('jpg', 'jpeg', 'png');
                                                    if (in_array($ext, $check_ext) == true) {
                                                        $random = rand();
                                                        $upadetd_photo = $random . $user_photo;
                                                        move_uploaded_file($user_photo_temp, 'image/users/' . $upadetd_photo);

                                                        $sql = "UPDATE users SET u_name='$user_name', u_email='$user_email',  u_address='$user_adrs', u_phone='$user_phone', u_bio='$user_bio', u_img='$upadetd_photo', u_dob='$user_dob', u_gender='$user_gender', u_education='$user_edu' WHERE u_id='$update_id'";

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

                                                                        </div>
                                                                        <div class="modal-body text-success fs-4">
                                                                            Updated Successfully.
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a href="profile.php" type="button" class="btn btn-success text-light">View</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <?php
                                                            // header("Location:users.php");
                                                        } else {
                                                            echo " DB Error : " . mysqli_error($db);
                                                        }
                                                    } else {
                                                        echo " Wrong Image Input . . .";
                                                    }
                                                }

                                                // ====================== pass Update (no img) ========================

                                                else if (empty($user_photo) && !empty($user_pass)) {
                                                    $encrypt_pass = sha1($user_pass);

                                                    $sql = "UPDATE users SET u_name='$user_name',  u_email='$user_email',  u_address='$user_adrs', u_phone='$user_phone', u_dob='$user_dob', u_gender='$user_gender', u_bio='$user_bio', u_education='$user_edu', u_password='$encrypt_pass', u_dob='$user_dob', u_gender='$user_gender', u_education='$user_edu' WHERE u_id='$update_id'";

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
                                                                        <a href="profile.php" type="button" class="btn btn-success text-light">View</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <?php
                                                        // header("Location:users.php");
                                                    } else {
                                                        echo " DB Error : " . mysqli_error($db);
                                                    }
                                                }
                                                // ====================== img,pass (both update) ========================
                                                else {
                                                    //=========================== delete img =========================
                                                    $delete_id = $update_id;

                                                    $img_name = "SELECT u_img FROM users WHERE u_id='$delete_id'";
                                                    $result = mysqli_query($db, $img_name);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $img_name = $row['u_img'];
                                                    }
                                                    unlink('image/users/' . $img_name);

                                                    //========================== img process =========================

                                                    $split = explode('.', $user_photo);
                                                    $ext = strtolower(end($split));
                                                    $check_ext = array('jpg', 'jpeg', 'png');
                                                    if (in_array($ext, $check_ext) == true) {
                                                        $random = rand();
                                                        $upadetd_photo = $random . $user_photo;
                                                        move_uploaded_file($user_photo_temp, 'image/users/' . $upadetd_photo);

                                                        //======================= pass encrp ===========================

                                                        $encrypt_pass = sha1($user_pass);

                                                        $sql = "UPDATE users SET u_name='$user_name',  u_email='$user_email',  u_address='$user_adrs', u_phone='$user_phone', u_dob='$user_dob', u_gender='$user_gender', u_bio='$user_bio', u_education='$user_edu', u_img='$upadetd_photo', u_password='$encrypt_pass', u_dob='$user_dob', u_gender='$user_gender', u_education='$user_edu'  WHERE u_id='$update_id'";

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
                                                                            <a href="profile.php" type="button" class="btn btn-success text-light">View</a>
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

                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                            </div>
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