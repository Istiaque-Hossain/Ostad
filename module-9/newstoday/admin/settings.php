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
                    <div class="col-lg-6 col-md-12">
                        <div class="white-box">
                            <!-- ============================= Posts Num form ================================= -->

                            <form method="POST" enctype="multipart/form-data">
                                <div class="col-md-12 mt-4">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Posts per page</label>
                                        <input class="form-control" id="exampleFormControlInput1" placeholder="" name="s_post">
                                    </div>

                                    <input type="submit" value="Update" class="btn btn-mid btn-primary" name="update_postNum">
                                </div>
                            </form>

                            <!-- ============================= Bannner form ================================= -->

                            <form method="POST" enctype="multipart/form-data">
                                <div class="col-md-12 mt-4">

                                    <div class="form-group mb-4 mt-4">
                                        <label for="exampleInputFile">Banner Image</label> <br>
                                        <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="s_banner"><br>
                                        <small id="fileHelp" class="form-text text-muted">Please insert an image which size is <span class=" text-danger">( 1920 : 1044 )</span> & <span class=" text-danger"> JPG format</span> to get a good fit.</small>
                                    </div>
                                    <input type="submit" value="Update Image" class="btn btn-mid btn-primary" name="update_banner">
                                </div>
                            </form>

                            <!-- ============================= Update ================================= -->

                            <?php
                            if (isset($_POST["update_postNum"])) {
                                $s_post = $_POST["s_post"];

                                $sql = "UPDATE settings SET s_post= '$s_post' WHERE s_id=1";
                                $result = mysqli_query($db, $sql);

                                if ($result) {
                                    header("Location:settings.php");
                                } else {
                                    echo " DB ERROR ";
                                }
                            }

                            if (isset($_POST["update_banner"])) {

                                $s_banner = $_FILES["s_banner"]["name"];
                                $s_banner_temp = $_FILES["s_banner"]["tmp_name"];



                                //========================== img process =========================

                                $split = explode('.', $s_banner);
                                $ext = strtolower(end($split));
                                $check_ext = array('jpg', 'jpeg', 'png');

                                if (in_array($ext, $check_ext) == true && $ext == 'jpg') {

                                    //========== img size check ========

                                    $size = getimagesize($s_banner_temp);
                                    $w = $size[0];
                                    $h = $size[1];

                                    if ($w == 1920 && $h == 1044) {

                                        //========== delete img ========

                                        $img_name = "SELECT s_banner FROM settings WHERE s_id=1";
                                        $result = mysqli_query($db, $img_name);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $img_name = $row['s_banner'];
                                        }
                                        unlink('../images/custom/banner/' . $img_name);

                                        //========== ========== ========


                                        $upadetd_photo = 'banner.' . $ext;
                                        move_uploaded_file($s_banner_temp, '../images/custom/banner/' . $upadetd_photo);

                                        $sql = "UPDATE settings SET s_banner= '$upadetd_photo' WHERE s_id=1";
                                        $result = mysqli_query($db, $sql);
                                        if ($result) {
                                            header("Location:settings.php");
                                        } else {
                                            echo " DB Error ";
                                        }
                                    } else {
                                        echo " Wrong Image Size . . .";
                                    }
                                } else {
                                    echo " Wrong Image Input . . .";
                                }
                            }
                            ?>


                        </div>
                    </div>

                    <!-- ============================= Read Data ================================= -->

                    <div class="col-lg-6 col-md-12">

                        <?php
                        $sql2 = "SELECT * FROM settings";
                        $result = mysqli_query($db, $sql2);
                        $count = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $s_id = $row['s_id'];
                            $s_banner = $row['s_banner'];
                            $s_post = $row['s_post'];

                        ?>
                            <div class="white-box">
                                <h3 class="box-title">Posts per page</h3>
                                <span class="counter text-success" style="font-size: 2.5rem;"><?php echo $s_post ?></span>

                            </div>
                            <div class="white-box">
                                <h3 class="box-title">Banner image</h3>
                                <!-- <span class="counter text-success" style="font-size: 2.5rem;">2</span> -->
                                <img class="mb-2" src="../images/custom/banner/<?php echo $s_banner ?>" alt="" srcset="" width="100%">

                            </div>
                        <?php
                        }
                        ?>

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