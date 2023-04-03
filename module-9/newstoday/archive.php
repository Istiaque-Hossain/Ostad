<?php
include "inc/head.php";
$post_per_page = 3;
session_start();


?>

<body>

    <div id="wrapper">
        <?php include "inc/header.php"; ?>

        <section>
            <div class="mt-4"></div>
        </section>

        <section class="section lb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-custom-build">

                                <!-- //=========================================== Search by Category Id ========================================================= -->


                                <?php

                                if (isset($_GET['cata_id'])) {

                                    $cata_id = $_GET['cata_id'];

                                    if (isset($_GET['page'])) {
                                        $page = $_GET['page'];
                                    } else {
                                        $page = 1;
                                    }
                                    $offset = ($page - 1) * $post_per_page;


                                    $sql2 = "SELECT * FROM posts WHERE p_cat='$cata_id' LIMIT {$offset},{$post_per_page}";
                                    $result = mysqli_query($db, $sql2);
                                    $numRows = mysqli_num_rows($result);
                                    if ($numRows == 0) {
                                ?>
                                        <div class="alert alert-warning" role="alert">
                                            Sorry . . . <br> No Post Found !
                                        </div>
                                        <?Php
                                    }
                                    // $count = 0;
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
                                        $p_view = $row["p_view"];


                                        // $count++;
                                        if ($p_status == 1) {
                                        ?>




                                            <div class="blog-box wow fadeIn">
                                                <div class="post-media">
                                                    <a href="" title="">
                                                        <img src="admin/image/posts/<?php echo $p_img ?>" alt="" class="img-fluid">
                                                        <div class="hovereffect">
                                                            <span></span>
                                                        </div>
                                                        <!-- end hover -->
                                                    </a>
                                                </div>
                                                <!-- end media -->
                                                <div class="blog-meta big-meta text-center">
                                                    <div class="post-sharing">
                                                        <ul class="list-inline">
                                                            <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                                            <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                                            <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                                        </ul>
                                                    </div><!-- end post-sharing -->
                                                    <h4><a href="single_post.php?post_id=<?php echo $p_id ?>" title=""><?php echo $p_title ?></a></h4>
                                                    <p><?php echo substr($p_desc, 0, 250) . ' . . . . . ' ?><a style="font-size: 10px; font-weight: 900" href="single_post.php?post_id=<?php echo $p_id ?>">READ MORE</a></p>
                                                    <small><a href="marketing-category.html" title="">
                                                            <?php
                                                            $cat = "SELECT c_name FROM category WHERE c_id='$p_cat'";
                                                            $result1 = mysqli_query($db, $cat);
                                                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                                                $cat_name = $row1['c_name'];
                                                            }

                                                            echo $cat_name;

                                                            ?>
                                                        </a></small>
                                                    <small><a href="" title=""><?php echo $p_date ?></a></small>
                                                    <small><a href="#" title="">
                                                            <?php
                                                            $user = "SELECT u_name FROM users WHERE u_id='$p_author'";
                                                            $result1 = mysqli_query($db, $user);
                                                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                                                $user_name = $row1['u_name'];
                                                            }
                                                            echo 'by ' . $user_name;
                                                            ?>
                                                        </a></small>
                                                    <small><a href="#" title=""><i class="fa fa-eye"></i> <?php echo $p_view ?></a></small>
                                                </div><!-- end meta -->
                                            </div><!-- end blog-box -->

                                            <hr class="invis">

                                    <?php
                                        }
                                    }



                                    ?>
                                    <!-- // =========================================== pagenation ==================================== -->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination justify-content-center">

                                                    <?php
                                                    $cata_id = $_GET['cata_id'];

                                                    $sqlpage = "SELECT * FROM posts WHERE p_cat='$cata_id'";
                                                    $resultpage = mysqli_query($db, $sqlpage);

                                                    $tpost = mysqli_num_rows($resultpage);
                                                    $tpage = ceil($tpost / $post_per_page);

                                                    if ($page > 1) {
                                                    ?>

                                                        <li class="page-item">
                                                            <a class="page-link" href="archive.php?cata_id=<?php echo $cata_id ?>&page=<?php echo ($page - 1) ?>">prev</a>
                                                        </li>

                                                    <?php
                                                    }
                                                    // echo $tpage;
                                                    for ($i = 1; $i <= $tpage; $i++) {

                                                    ?><li class="page-item">
                                                            <a class="page-link" href="archive.php?cata_id=<?php echo $cata_id ?>&page=<?php echo $i ?>" <?php if ($i == $page) { ?> style="background-color: #f7db7e !important;" <?php } ?>>
                                                                <?php echo $i ?>
                                                            </a>
                                                        </li>
                                                    <?php
                                                    }

                                                    if ($page < $tpage) {
                                                    ?>
                                                        <li class="page-item">
                                                            <a class="page-link" href="archive.php?cata_id=<?php echo $cata_id ?>&page=<?php echo ($page + 1) ?>">Next</a>
                                                        </li>
                                                    <?php
                                                    } ?>
                                                </ul>
                                            </nav>
                                        </div><!-- end col -->
                                    </div><!-- end row -->
                                    <?php




                                }


                                //=========================================== Search by Category Name =========================================================


                                if (isset($_GET['cata_name'])) {

                                    $cata_name = $_GET['cata_name'];

                                    if (isset($_GET['page'])) {
                                        $page = $_GET['page'];
                                    } else {
                                        $page = 1;
                                    }
                                    $offset = ($page - 1) * $post_per_page;

                                    $sql1 = "SELECT * FROM category WHERE c_name='$cata_name' ";
                                    $result1 = mysqli_query($db, $sql1);

                                    while ($row1 = mysqli_fetch_assoc($result1)) {
                                        $cata_id = $row1['c_id'];
                                    }



                                    $sql2 = "SELECT * FROM posts WHERE p_cat='$cata_id' LIMIT {$offset},{$post_per_page}";
                                    $result = mysqli_query($db, $sql2);
                                    $numRows = mysqli_num_rows($result);
                                    if ($numRows == 0) {
                                    ?>
                                        <div class="alert alert-warning" role="alert">
                                            Sorry . . . <br> No Post Found !
                                        </div>
                                        <?Php
                                    }
                                    // $count = 0;
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

                                        // $count++;
                                        if ($p_status == 1) {
                                        ?>




                                            <div class="blog-box wow fadeIn">
                                                <div class="post-media">
                                                    <a href="" title="">
                                                        <img src="admin/image/posts/<?php echo $p_img ?>" alt="" class="img-fluid">
                                                        <div class="hovereffect">
                                                            <span></span>
                                                        </div>
                                                        <!-- end hover -->
                                                    </a>
                                                </div>
                                                <!-- end media -->
                                                <div class="blog-meta big-meta text-center">
                                                    <div class="post-sharing">
                                                        <ul class="list-inline">
                                                            <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                                            <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                                            <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                                        </ul>
                                                    </div><!-- end post-sharing -->
                                                    <h4><a href="single_post.php?post_id=<?php echo $p_id ?>" title=""><?php echo $p_title ?></a></h4>
                                                    <p><?php echo substr($p_desc, 0, 250) . ' . . . . . ' ?><a style="font-size: 10px; font-weight: 900" href="single_post.php?post_id=<?php echo $p_id ?>">READ MORE</a></p>
                                                    <small><a href="marketing-category.html" title="">
                                                            <?php
                                                            $cat = "SELECT c_name FROM category WHERE c_id='$p_cat'";
                                                            $result1 = mysqli_query($db, $cat);
                                                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                                                $cat_name = $row1['c_name'];
                                                            }

                                                            echo $cat_name;

                                                            ?>
                                                        </a></small>
                                                    <small><a href="" title=""><?php echo $p_date ?></a></small>
                                                    <small><a href="#" title="">
                                                            <?php
                                                            $user = "SELECT u_name FROM users WHERE u_id='$p_author'";
                                                            $result1 = mysqli_query($db, $user);
                                                            while ($row1 = mysqli_fetch_assoc($result1)) {
                                                                $user_name = $row1['u_name'];
                                                            }
                                                            echo 'by ' . $user_name;
                                                            ?>
                                                        </a></small>
                                                    <small><a href="#" title=""><i class="fa fa-eye"></i> 666</a></small>
                                                </div><!-- end meta -->
                                            </div><!-- end blog-box -->

                                            <hr class="invis">

                                    <?php
                                        }
                                    }


                                    ?>

                                    <!-- // =========================================== pagenation ==================================== -->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination justify-content-center">

                                                    <?php
                                                    $cata_name = $_GET['cata_name'];

                                                    $sql1 = "SELECT * FROM category WHERE c_name='$cata_name' ";
                                                    $result1 = mysqli_query($db, $sql1);

                                                    while ($row1 = mysqli_fetch_assoc($result1)) {
                                                        $cata_id = $row1['c_id'];
                                                    }

                                                    $sqlpage = "SELECT * FROM posts WHERE p_cat='$cata_id'";
                                                    $resultpage = mysqli_query($db, $sqlpage);

                                                    $tpost = mysqli_num_rows($resultpage);
                                                    $tpage = ceil($tpost / $post_per_page);

                                                    if ($page > 1) {
                                                    ?>

                                                        <li class="page-item">
                                                            <a class="page-link" href="archive.php?cata_name=<?php echo $cata_name ?>&page=<?php echo ($page - 1) ?>">prev</a>
                                                        </li>

                                                    <?php
                                                    }
                                                    // echo $tpage;
                                                    for ($i = 1; $i <= $tpage; $i++) {

                                                    ?><li class="page-item">
                                                            <a class="page-link" href="archive.php?cata_name=<?php echo $cata_name ?>&page=<?php echo $i ?>" <?php if ($i == $page) { ?> style="background-color: #f7db7e !important;" <?php } ?>>
                                                                <?php echo $i ?>
                                                            </a>
                                                        </li>
                                                    <?php
                                                    }

                                                    if ($page < $tpage) {
                                                    ?>
                                                        <li class="page-item">
                                                            <a class="page-link" href="archive.php?cata_name=<?php echo $cata_name ?>&page=<?php echo ($page + 1) ?>">Next</a>
                                                        </li>
                                                    <?php
                                                    } ?>
                                                </ul>
                                            </nav>
                                        </div><!-- end col -->
                                    </div><!-- end row -->

                                <?php


                                }






                                ?>

                            </div>
                        </div>

                        <hr class="invis">






                    </div><!-- end col -->

                    <?php include "inc/sidebar.php"; ?>

                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <?php
        include "inc/footer.php";

        ?>

</body>

</html>