<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
    <div class="sidebar">
        <div class="widget">
            <h2 class="widget-title">Recent Posts</h2>
            <div class="blog-list-widget">
                <div class="list-group">

                    <?php
                    $sql_recent = "SELECT * FROM posts ORDER BY p_id DESC";
                    $res = mysqli_query($db, $sql_recent);
                    $maxNum = 0;

                    while ($row = mysqli_fetch_assoc($res)) {
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


                        if ($p_status == 1 && $maxNum < 3) {
                    ?>
                            <a href="" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="w-100 justify-content-between">
                                    <div class="row">
                                        <div class=" col-lg-4 col-md-2" style="padding-right: 0px;">

                                            <a href="single_post.php?post_id=<?php echo $p_id ?>">
                                                <img style="width: 100%; padding-top:.5rem; background-color:#33333300" src="admin/image/posts/<?php echo $p_img; ?>" alt="" class="img-fluid float-left">
                                            </a>
                                        </div>
                                        <div class=" col-lg-8 col-md-6">

                                            <a href="single_post.php?post_id=<?php echo $p_id ?>">
                                                <h5 class="mb-1"><?php echo $p_title; ?></h5>
                                            </a>
                                            <small><?php echo $p_date; ?></small>
                                        </div>
                                    </div>

                                </div>
                            </a>
                    <?php
                            $maxNum++;
                        }
                    }
                    ?>


                </div>
            </div><!-- end blog-list -->
        </div><!-- end widget -->

        <div class="widget">
            <h2 class="widget-title">Popular Categories</h2>
            <div class="link-widget">
                <ul>
                    <?php
                    $sql2 = "SELECT * FROM category";
                    $result = mysqli_query($db, $sql2);

                    $age = array();
                    $y = 0;

                    while ($row = mysqli_fetch_assoc($result)) {
                        $cat_id = $row['c_id'];
                        $cat_name = $row["c_name"];
                        $cat_status = $row["c_status"];


                        if ($cat_status == 1) {
                            $sql_pnum = "SELECT * FROM posts WHERE p_cat='$cat_id'";
                            $res_pnum = mysqli_query($db, $sql_pnum);
                            $pnum = mysqli_num_rows($res_pnum);

                            // $age = array("a" => "2", "b" => "8", "c" => "6",);
                            $age[$cat_name] = $pnum;
                            arsort($age);
                    ?>
                        <?php
                        }
                    }
                    $max = 0;
                    foreach ($age as $x => $x_value) {
                        // echo "Key=" . $x . ", Value=" . $x_value;
                        // echo "<br>";
                        if ($max == 5) {
                            break;
                        }
                        ?>
                        <li><a href="archive.php?cata_name=<?php echo $x; ?>"><?php echo $x; ?> <span>(<?php echo  $x_value; ?>)</span></a></li>
                    <?Php
                        $max++;
                    }

                    ?>

                </ul>
            </div><!-- end link-widget -->
        </div><!-- end widget -->



        <!-- ============================= Popular post ================================= -->

        <div class="widget">
            <h2 class="widget-title">Popular Posts</h2>
            <div class="blog-list-widget">
                <div class="list-group">

                    <?php
                    $sql_recent = "SELECT * FROM posts ORDER BY p_view DESC";
                    $res = mysqli_query($db, $sql_recent);
                    $maxNum = 0;

                    while ($row = mysqli_fetch_assoc($res)) {
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



                        if ($p_status == 1 && $maxNum < 3) {
                    ?>
                            <a href="" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="w-100 justify-content-between">
                                    <div class="row">
                                        <div class=" col-lg-4 col-md-2" style="padding-right: 0px;">

                                            <a href="single_post.php?post_id=<?php echo $p_id ?>">
                                                <img style="width: 100%; padding-top:.5rem; background-color:#33333300" src="admin/image/posts/<?php echo $p_img; ?>" alt="" class="img-fluid float-left">
                                            </a>
                                        </div>
                                        <div class=" col-lg-8 col-md-6">

                                            <a href="single_post.php?post_id=<?php echo $p_id ?>">
                                                <h5 class="mb-1"><?php echo $p_title; ?></h5>
                                            </a>
                                            <small><?php echo $p_date; ?></small>
                                            <small>
                                                <i class="fa fa-eye" style="margin-left: 1rem !important;"></i>
                                                <?php

                                                echo $p_view;

                                                ?>

                                            </small>
                                        </div>
                                    </div>

                                </div>
                            </a>
                    <?php
                            $maxNum++;
                        }
                    }
                    ?>


                </div>
            </div><!-- end blog-list -->
        </div><!-- end widget -->
        <!-- =============================  ================================= -->




        <?php
        if (!empty($_SESSION['u_email']) && $_SESSION['log'] == 1) {
            $_SESSION['logout'] = 1;
        ?>

            <div class=" widget">
                <h1 class=" widget-title"> Want to Log Out ?</h1>
                <button type="button" class="btn"> <a href="admin/inc/logout.php">Log Out</a> </button>
            </div>
        <?php


        }
        ?>

    </div>




</div><!-- end sidebar -->
</div><!-- end col -->