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

                    <?php $u_role = $_SESSION['u_role'];
                    if ($u_role == 0) {
                        $role = 'Subscriber';
                    } elseif ($u_role == 1) {
                        $role = 'Editor';
                    } else {
                        $role = 'Admin';
                    }

                    ?>
                    <h4 class="box-title mt-3">U are our beloved <span class=" text-warning fw-bold"> <?php echo $role; ?> </span></h4>

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
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Posts</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-success">

                                        <?php
                                        $sql2 = "SELECT * FROM posts";
                                        $result = mysqli_query($db, $sql2);
                                        $tpost = mysqli_num_rows($result);
                                        echo $tpost;
                                        ?>
                                    </span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Post Views</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash2"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-purple">

                                        <?php
                                        $sql2 = "SELECT p_view FROM posts";
                                        $result = mysqli_query($db, $sql2);

                                        $tview = 0;
                                        while ($row1 = mysqli_fetch_assoc($result)) {
                                            $p_view = $row1['p_view'];
                                            $tview = $tview + $p_view;
                                        }
                                        echo $tview;
                                        ?>
                                    </span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Users</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-info">

                                        <?php
                                        $sql2 = "SELECT * FROM users";
                                        $result = mysqli_query($db, $sql2);
                                        $tuser = mysqli_num_rows($result);
                                        echo $tuser;
                                        ?>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Subscribers</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-info">
                                        <?php
                                        $sql2 = "SELECT * FROM users WHERE u_role=0";
                                        $result = mysqli_query($db, $sql2);
                                        $tsubs = mysqli_num_rows($result);
                                        echo $tsubs;
                                        ?>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Editors</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-warning">
                                        <?php
                                        $sql2 = "SELECT * FROM users WHERE u_role=1";
                                        $result = mysqli_query($db, $sql2);
                                        $tsubs = mysqli_num_rows($result);
                                        echo $tsubs;
                                        ?>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Admins</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-danger">
                                        <?php
                                        $sql2 = "SELECT * FROM users WHERE u_role=2";
                                        $result = mysqli_query($db, $sql2);
                                        $tsubs = mysqli_num_rows($result);
                                        echo $tsubs;
                                        ?>
                                    </span>
                                </li>
                            </ul>
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