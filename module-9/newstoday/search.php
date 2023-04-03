<?php
include "inc/head.php";
?>

<body>

    <div id="wrapper">
        <?php include "inc/header.php"; ?>

        <section class="section mt-4 pb-1">
            <div class="container text-center">
                <!-- <h5> Search Result</h5> -->
                <h4 class="text-warning">S e a r c h &nbsp;&nbsp;&nbsp;&nbsp; R e a u l t s &nbsp;- </h4>
            </div>
        </section>

        <section class="section lb pt-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-custom-build">

                                <?php

                                if (isset($_GET['searchbtn'])) {
                                    $s_text = $_GET['s_text'];
                                    echo "hello";


                                    $sql2 = "SELECT * FROM posts WHERE p_title LIKE '%$s_text%' OR p_desc LIKE '%$s_text%'";
                                    $result = mysqli_query($db, $sql2);
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
                                }
                                ?>

                            </div>
                        </div>

                        <hr class="invis">

                        <!-- <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div> -->
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