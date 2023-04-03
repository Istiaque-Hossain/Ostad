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
                        <h4 class="page-title">Users</h4>
                    </div>

                </div>
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

                <div class="row justify-content-center ">
                    <div class="col-lg-12 col-md-12 ">
                        <div class="white-box">
                            <?php
                            $do = isset($_GET['do']) ? $_GET['do'] : 'view';

                            //............................VIEW .........................

                            if ($do == 'view') {
                            ?>

                                <table class="table table-hover">
                                    <thead>
                                        <tr class="">
                                            <th scope="col">#</th>
                                            <th scope="col">Thumbnail</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Email</th>
                                            <!-- <th scope="col">Password</th> -->
                                            <th scope="col">Address</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">DOB</th>
                                            <!-- <th scope="col">Biodata</th>
                                            <th scope="col">Education</th> -->
                                            <th scope="col">Role</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-------------- read data -------------->
                                        <?php
                                        $sql2 = "SELECT * FROM users";
                                        $result = mysqli_query($db, $sql2);
                                        $count = 0;
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
                                            $user_status = $row["u_status"];
                                            $user_role = $row["u_role"];
                                            $user_status = $row["u_status"];

                                            $count++;
                                        ?>
                                            <!--------------  -------------->

                                            <tr class="align-middle">
                                                <th scope="row"><?php echo $count ?></th>
                                                <td>
                                                    <img src="image/users/<?php echo  $user_img ?> " width="100" alt="" srcset="">
                                                </td>
                                                <td><?php echo  $user_name ?></td>
                                                <td><?php echo  $user_gender ?></td>
                                                <td><?php echo  $user_email ?></td>
                                                <td><?php echo  $user_address ?></td>
                                                <td><?php echo  $user_phone ?></td>
                                                <td><?php echo  $user_dob ?></td>
                                                <td>
                                                    <?php
                                                    if ($user_role == 0) {
                                                        echo "<span class='badge bg-success'>Subscriber</span>";
                                                    } else if ($user_role == 1) {
                                                        echo "<span class='badge bg-info'>Editor</span>";
                                                    } else {
                                                        echo "<span class='badge bg-danger'>Admin</span>";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php
                                                    if ($user_status == 0) {
                                                        echo "<span class='badge bg-warning'>Inactive</span>";
                                                    } else {
                                                        echo "<span class='badge bg-success'>Active</span>";
                                                    }
                                                    ?>
                                                </td>

                                                <td>
                                                    <a title="preview" href="category.php?update_id=<?php echo $cat_id ?>">
                                                        <i class="fa fa-eye fa-lg text-warning" aria-hidden="true"></i>
                                                    </a>
                                                    <a title="edit" href="users.php?do=edit&edit_id=<?php echo $user_id ?>">
                                                        <i class="fa fa-pencil-square-o fa-lg ms-2" aria-hidden="true"></i>
                                                    </a>
                                                    <a data-bs-toggle="modal" data-bs-target="#del<?php echo $user_id ?>">
                                                        <i class="fa fa-trash fa-lg ms-2 text-danger" aria-hidden="true"></i>
                                                    </a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="del<?php echo $user_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                    <a href="users.php?do=delete&delete_id=<?php echo $user_id ?>" type="button" class="btn btn-danger text-light">Confirm</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>

                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>


                            <?php
                            }

                            //============================== ADD ======================================

                            if ($do == 'add') {
                                // echo "add";
                            ?>
                                <h3 class=" box-title">Add New User</h3>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-md-12 mt-4">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">User name</label>
                                                    <input class="form-control" id="exampleFormControlInput1" placeholder="" name="user_name">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="user_email">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="" name="user_pass">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="user_adrs"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Phone</label>
                                                    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" name="user_phone">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="example-date-input" class="col-2 col-form-label">Date</label>
                                                    <input class="form-control" type="date" value="" id="example-date-input" placeholder="" name="user_date">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputGroupSelect01">Role</label>
                                                    <select class="form-select" id="inputGroupSelect01" name="user_role">
                                                        <option selected>Choose...</option>
                                                        <option value="2">Admin</option>
                                                        <option value="1">Editor</option>
                                                        <option value="0">Subscriber</option>
                                                    </select>

                                                </div>


                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="inputGroupSelect01">Status</label>
                                                <select class="form-select" id="inputGroupSelect01" name="user_status">
                                                    <option selected>Choose...</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>

                                            </div>
                                            <div class="mb-3">
                                                <label for="inputGroupSelect01">Gender</label>
                                                <select class="form-select" id="inputGroupSelect01" name="user_gender">
                                                    <option selected>Choose...</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Others">Others</option>
                                                </select>

                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Biodata</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="user_bio"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1" class="form-label">Education</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="user_edu"></textarea>
                                            </div>
                                            <div class="form-group mb-4 mt-4">
                                                <label for="exampleInputFile">Profile Image</label> <br>
                                                <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="user_photo"><br>
                                                <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                                            </div>

                                            <input type="submit" value="Submit" class="btn btn-mid btn-primary" name="add_user">
                                        </div>

                                    </div>

                                </form>

                                <?php
                                if (isset($_POST["add_user"])) {
                                    $user_name = $_POST["user_name"];
                                    $user_email = $_POST["user_email"];
                                    $user_pass = $_POST["user_pass"];
                                    $user_adrs = $_POST["user_adrs"];
                                    $user_phone = $_POST["user_phone"];
                                    $user_date = $_POST["user_date"];
                                    $user_gender = $_POST["user_gender"];
                                    $user_bio = $_POST["user_bio"];
                                    $user_edu = $_POST["user_edu"];
                                    $user_status = $_POST["user_status"];
                                    $user_role = $_POST["user_role"];
                                    $user_photo = $_FILES["user_photo"]["name"];
                                    $user_photo_temp = $_FILES["user_photo"]["tmp_name"];
                                    // echo  '=====>' . $user_photo . $user_photo_temp;


                                    if (
                                        !empty($user_name) && !empty($user_email) && !empty($user_pass) &&
                                        !empty($user_photo)
                                    ) {

                                        $split = explode('.', $user_photo);
                                        $ext = strtolower(end($split));
                                        $check_ext = array('jpg', 'jpeg', 'png');
                                        if (in_array($ext, $check_ext) == true) {
                                            $random = rand();
                                            $upadetd_photo = $random . $user_photo;
                                            move_uploaded_file($user_photo_temp, 'image/users/' . $upadetd_photo);
                                            $encrypt_pass = sha1($user_pass);
                                            $sql = "INSERT INTO users (u_name, u_email, u_password, u_address, u_phone, u_dob, u_gender, u_bio, u_education, u_status, u_role, u_img)
                                             value ('$user_name', '$user_email', '$encrypt_pass', '$user_adrs', '$user_phone', '$user_date', '$user_gender', '$user_bio', '$user_edu', '$user_status', '$user_role', '$upadetd_photo')";
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
                                                                Added Successfully.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                                                <a href="users.php" type="button" class="btn btn-success text-light">View</a>
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

                            if ($do == 'edit') {
                                if (isset($_GET['edit_id'])) {
                                    $edit_id = $_GET['edit_id'];


                                    $sql2 = "SELECT * FROM users WHERE u_id='$edit_id'";

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
                                        $user_status = $row["u_status"];
                                        $user_role = $row["u_role"];


                                ?>
                                        <h3 class=" box-title">Update User</h3>
                                        <form action="users.php?do=update" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="col-md-12 mt-4">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1" class="form-label">User name</label>
                                                            <input class="form-control" id="exampleFormControlInput1" placeholder="" name="user_name" value="<?php echo $user_name ?>">


                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="user_email" value="<?php echo $user_email ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                                                            <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="" name="user_pass">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="user_adrs"><?php echo $user_address ?></textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1" class="form-label">Phone</label>
                                                            <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" name="user_phone" value="<?php echo $user_phone ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="example-date-input" class="col-2 col-form-label">Date</label>
                                                            <input class="form-control" type="date" id="example-date-input" placeholder="" name="user_date" value="<?php echo $user_dob ?>">

                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="inputGroupSelect01">Role</label>
                                                            <select class="form-select" id="inputGroupSelect01" name="user_role">
                                                                <option selected>Choose...</option>
                                                                <option value="2" <?php if ($user_role == 2) echo 'selected' ?>>Admin</option>
                                                                <option value="1" <?php if ($user_role == 1) echo 'selected' ?>>Editor</option>
                                                                <option value="0" <?php if ($user_role == 0) echo 'selected' ?>>Subscriber</option>
                                                            </select>

                                                        </div>


                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="inputGroupSelect01">Status</label>
                                                        <select class="form-select" id="inputGroupSelect01" name="user_status">
                                                            <option selected>Choose...</option>
                                                            <option value="1" <?php if ($user_status == 1) echo 'selected' ?>>Active</option>
                                                            <option value="0" <?php if ($user_status == 0) echo 'selected' ?>>Inactive</option>
                                                        </select>

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputGroupSelect01">Gender</label>
                                                        <select class="form-select" id="inputGroupSelect01" name="user_gender">
                                                            <option selected>Choose...</option>
                                                            <option value="Male" <?php if ($user_gender == 'Male') echo 'selected' ?>>Male</option>
                                                            <option value="Female" <?php if ($user_gender == 'Female') echo 'selected' ?>>Female</option>
                                                            <option value="Others" <?php if ($user_gender == 'Others') echo 'selected' ?>>Others</option>
                                                        </select>

                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Biodata</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="user_bio"><?php echo $user_bio ?></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Education</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="user_edu"><?php echo $user_edu ?></textarea>
                                                    </div>
                                                    <div class="form-group mb-4 mt-4">
                                                        <label for="exampleInputFile">Profile Image</label> <br>
                                                        <img class="mb-2" src="image/users/<?php echo $user_img ?>" alt="" srcset="" width="120"><br>
                                                        <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="user_photo"><br>

                                                        <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                                                    </div>
                                                    <input type="hidden" name="update_id" value="<?php echo $user_id ?>">
                                                    <input type="submit" value="Update" class="btn btn-mid btn-primary">

                                                </div>

                                            </div>

                                        </form>


                                        <?php

                                    }
                                }
                            }
                            // <!-- ============================= Update ================================= -->

                            if ($do == 'update') {
                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                    $update_id = $_POST["update_id"];

                                    $user_name = $_POST["user_name"];
                                    $user_email = $_POST["user_email"];
                                    $user_pass = $_POST["user_pass"];
                                    $user_adrs = $_POST["user_adrs"];
                                    $user_phone = $_POST["user_phone"];
                                    $user_date = $_POST["user_date"];
                                    $user_gender = $_POST["user_gender"];
                                    $user_bio = $_POST["user_bio"];
                                    $user_edu = $_POST["user_edu"];
                                    $user_status = $_POST["user_status"];
                                    $user_role = $_POST["user_role"];
                                    $user_photo = $_FILES["user_photo"]["name"];
                                    $user_photo_temp = $_FILES["user_photo"]["tmp_name"];


                                    // ============================= Update Condition ================================

                                    // ====================== img, pass (no update) ========================
                                    if (empty($user_photo) && empty($user_pass)) {
                                        $sql = "UPDATE users SET u_name='$user_name',  u_email='$user_email',  u_address='$user_adrs', u_phone='$user_phone', u_dob='$user_date', u_gender='$user_gender', u_bio='$user_bio', u_education='$user_edu', u_status='$user_status', u_role='$user_role' WHERE u_id='$update_id'";

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
                                                            <a href="users.php" type="button" class="btn btn-success text-light">View</a>
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

                                            $sql = "UPDATE users SET u_name='$user_name',  u_email='$user_email',  u_address='$user_adrs', u_phone='$user_phone', u_dob='$user_date', u_gender='$user_gender', u_bio='$user_bio', u_education='$user_edu', u_status='$user_status', u_role='$user_role', u_img='$upadetd_photo' WHERE u_id='$update_id'";

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

                                                                <a href="users.php" type="button" class="btn btn-success text-light">View</a>
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

                                    // ====================== pass Update (no img) ========================

                                    else if (empty($user_photo) && !empty($user_pass)) {
                                        $encrypt_pass = sha1($user_pass);

                                        $sql = "UPDATE users SET u_name='$user_name',  u_email='$user_email',  u_address='$user_adrs', u_phone='$user_phone', u_dob='$user_date', u_gender='$user_gender', u_bio='$user_bio', u_education='$user_edu', u_status='$user_status', u_role='$user_role', u_password='$encrypt_pass' WHERE u_id='$update_id'";

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
                                                            <a href="users.php" type="button" class="btn btn-success text-light">View</a>
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

                                            $sql = "UPDATE users SET u_name='$user_name',  u_email='$user_email',  u_address='$user_adrs', u_phone='$user_phone', u_dob='$user_date', u_gender='$user_gender', u_bio='$user_bio', u_education='$user_edu', u_status='$user_status', u_role='$user_role', u_img='$upadetd_photo', u_password='$encrypt_pass'  WHERE u_id='$update_id'";

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
                                                                <a href="users.php" type="button" class="btn btn-success text-light">View</a>
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


                            // <!-- ============================= Delete ================================= -->

                            if ($do == 'delete') {
                                if (isset($_GET['delete_id'])) {
                                    $delete_id = $_GET['delete_id'];

                                    $img_name = "SELECT u_img FROM users WHERE u_id='$delete_id'";
                                    $result = mysqli_query($db, $img_name);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $img_name = $row['u_img'];
                                    }
                                    unlink('image/users/' . $img_name);

                                    $table = 'users';
                                    $p_key = 'u_id';
                                    $d_id = $delete_id;
                                    $url = 'users.php';


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