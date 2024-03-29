<?php include "inc/head.php";
session_start();
ob_start();
?>

<body>


    <div id="wrapper">
        <?php include "inc/header.php"; ?>

        <!-- ============================= for showing a certai div ================================= -->

        <?php if ($_GET['div_id'] == 1)
        { ?>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <script>
                $(document).ready(function() {
                    // Handler for .ready() called.
                    $('html, body').animate({
                        scrollTop: $('#what').offset().top
                    }, 'slow');
                });
            </script>
        <?php } ?>

        <!-- =============================  ================================= -->


        <section class="section lb m3rem">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">

                        <?php
                        if (isset($_GET['post_id']))
                        {
                            $postID = $_GET['post_id'];

                            $sql2 = "SELECT * FROM posts WHERE p_id='$postID'";
                            $result = mysqli_query($db, $sql2);
                            // $count = 0;
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                $p_id = $row['p_id'];
                                $p_title = $row["p_title"];
                                $p_img = $row["p_img"];
                                $p_author = $row["p_author"];
                                $p_desc = $row["p_desc"];
                                $p_date = $row["p_date"];

                                $p_date = date('d-m-Y _ g:i A', strtotime($p_date));


                                $p_cat = $row["p_cat"];
                                $p_cmnt = $row["p_cmnt"];
                                $p_status = $row["p_status"];
                                $p_view = $row["p_view"];


                        ?>

                                <div class="page-wrapper">
                                    <div class="blog-title-area">
                                        <ol class="breadcrumb hidden-xs-down">
                                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#">
                                                    <?php
                                                    $cat = "SELECT c_name FROM category WHERE c_id='$p_cat'";
                                                    $result1 = mysqli_query($db, $cat);
                                                    while ($row1 = mysqli_fetch_assoc($result1))
                                                    {
                                                        $cat_name = $row1['c_name'];
                                                    }

                                                    echo $cat_name;

                                                    ?>
                                                </a></li>
                                            <li class="breadcrumb-item active"><?php echo $p_title ?></li>
                                        </ol>

                                        <span class="color-yellow"><a href="#" title="">
                                                <?php
                                                $cat = "SELECT c_name FROM category WHERE c_id='$p_cat'";
                                                $result1 = mysqli_query($db, $cat);
                                                while ($row1 = mysqli_fetch_assoc($result1))
                                                {
                                                    $cat_name = $row1['c_name'];
                                                }

                                                echo $cat_name;

                                                ?>
                                            </a></span>

                                        <h3><?php echo $p_title ?></h3>

                                        <div class="blog-meta big-meta">
                                            <small><a href="#0" title=""><?php echo $p_date ?></a></small>
                                            <small>
                                                <a href="#0" title="">
                                                    <?php
                                                    $user = "SELECT u_name FROM users WHERE u_id='$p_author'";
                                                    $result1 = mysqli_query($db, $user);
                                                    while ($row1 = mysqli_fetch_assoc($result1))
                                                    {
                                                        $user_name = $row1['u_name'];
                                                    }
                                                    echo 'by ' . $user_name;
                                                    ?>
                                                </a>
                                            </small>
                                            <small><a href="#" title=""><i class="fa fa-eye"></i>
                                                    <?php
                                                    $p_view++;
                                                    echo $p_view;
                                                    $sqlView = "UPDATE posts SET p_view='$p_view' WHERE p_id='$postID'";
                                                    $resultView = mysqli_query($db, $sqlView);
                                                    ?>
                                                </a></small>
                                        </div><!-- end meta -->

                                        <div class="post-sharing">
                                            <ul class="list-inline">
                                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div><!-- end post-sharing -->
                                    </div><!-- end title -->

                                    <div class="single-post-media">
                                        <img src="admin/image/posts/<?php echo $p_img ?>" alt="" class="img-fluid">
                                    </div><!-- end media -->

                                    <div class="blog-content">
                                        <div class="pp">
                                            <p> <?php echo $p_desc ?> </p>

                                        </div><!-- end pp -->


                                    </div><!-- end content -->

                                    <div class="blog-title-area">
                                        <div class="tag-cloud-single">
                                            <span>Tags</span>
                                            <small><a href="#" title="">lifestyle</a></small>
                                            <small><a href="#" title="">colorful</a></small>
                                            <small><a href="#" title="">trending</a></small>
                                            <small><a href="#" title="">another tag</a></small>
                                        </div><!-- end meta -->

                                        <div class="post-sharing">
                                            <ul class="list-inline">
                                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div><!-- end post-sharing -->
                                    </div><!-- end title -->

                                    <hr class="invis1">

                                    <div class="custombox authorbox clearfix">
                                        <h4 class="small-title">About author</h4>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                <?php
                                                $user = "SELECT u_img FROM users WHERE u_id='$p_author'";
                                                $result1 = mysqli_query($db, $user);
                                                while ($row1 = mysqli_fetch_assoc($result1))
                                                {
                                                    $user_img = $row1['u_img'];
                                                }

                                                ?>
                                                <img src="admin/image/users/<?Php echo $user_img ?>" alt="" class="img-fluid rounded-circle">
                                            </div><!-- end col -->

                                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                                <h4>
                                                    <a href="#">
                                                        <?php
                                                        $user = "SELECT u_name FROM users WHERE u_id='$p_author'";
                                                        $result1 = mysqli_query($db, $user);
                                                        while ($row1 = mysqli_fetch_assoc($result1))
                                                        {
                                                            $user_name = $row1['u_name'];
                                                        }
                                                        echo 'by ' . $user_name;
                                                        ?>
                                                    </a>
                                                </h4>
                                                <p>
                                                    <?php
                                                    $user = "SELECT u_role FROM users WHERE u_id='$p_author'";
                                                    $result1 = mysqli_query($db, $user);
                                                    while ($row1 = mysqli_fetch_assoc($result1))
                                                    {
                                                        $u_role = $row1['u_role'];
                                                    }
                                                    if ($u_role == 2)
                                                    {

                                                        echo 'He is the '  ?>
                                                        <a href="#0" style=" color:#ed5b3b !important;">
                                                            ADMIN
                                                        </a>
                                                    <?php echo ' of Our News portal';
                                                    }

                                                    if ($u_role == 1)
                                                    {
                                                        echo 'He is the '  ?>
                                                        <a href="#0" style=" color:#F9CA27 !important;">
                                                            EDITOR
                                                        </a>
                                                    <?php echo ' of Our News portal';
                                                    }
                                                    if ($u_role == 0)
                                                    {
                                                        echo 'He is the '  ?>
                                                        <a href="#0">
                                                            SUBSCRIBER
                                                        </a>
                                                    <?php echo ' of Our News portal';
                                                    }

                                                    ?>
                                                </p>

                                                <!-- <div class="topsocial">
                                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                                </div> -->
                                                <!-- end social -->

                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div><!-- end author-box -->

                                    <hr class="invis1">

                                    <!-- ============================= LIKE POST ================================= -->



                                    <div id="what"></div>

                                    <hr class="invis1">


                                </div><!-- end page-wrapper -->
                        <?php
                            }
                        }
                        ?>


                    </div><!-- end col -->

                    <?php include "inc/sidebar.php"; ?>
                </div><!-- end row -->
            </div><!-- end container -->
        </section>




        <?php include "inc/footer.php";

        ob_end_flush();

        ?>


</body>

</html>