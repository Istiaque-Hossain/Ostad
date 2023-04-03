<?php
include "inc/head.php";
session_start();

//======================== post per page ==============================

$post_per_page = 3;

$sql2 = "SELECT * FROM settings";
$result = mysqli_query($db, $sql2);
while ($row = mysqli_fetch_assoc($result))
{
    $s_id = $row['s_id'];
    $s_banner = $row['s_banner'];
    $s_post = $row['s_post'];

    $post_per_page = $s_post;
}


// $user_role=$_SESSION['u_role'];
// if($user_role==2){

// }

$_SESSION['checklog'] = 0;
if (!empty($_SESSION['u_email']) && $_SESSION['log'] == 1)
{
    $_SESSION['checklog'] = 1;
}

?>

<body>
    <div id="wrapper">
        <?php
        include "inc/header.php";
        ?>


        <h1>HOME PAGE</h1>
        <h1 class="text-center">Featured POST : </h1>


        <section class="section lb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-custom-build">

                                <?php
                                if (isset($_GET['page']))
                                {
                                    $page = $_GET['page'];
                                }
                                else
                                {
                                    $page = 1;
                                }

                                $offset = ($page - 1) * $post_per_page;

                                $sql2 = "SELECT * FROM posts LIMIT {$offset},{$post_per_page}";
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



                                    // $count++;
                                    if ($p_status == 1)
                                    {
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
                                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share
                                                            on Facebook</span></a></li>
                                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet
                                                            on Twitter</span></a></li>
                                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div><!-- end post-sharing -->
                                        <h4><a href="single_post.php?post_id=<?php echo $p_id ?>" title=""><?php echo $p_title ?></a></h4>
                                        <p><?php echo substr($p_desc, 0, 250) . ' . . . . . ' ?><a style="font-size: 10px; font-weight: 900" href="single_post.php?post_id=<?php echo $p_id ?>">READ MORE</a></p>
                                        <small><a href="marketing-category.html" title="">
                                                <?php
                                                        $cat = "SELECT c_name FROM category WHERE c_id='$p_cat'";
                                                        $result1 = mysqli_query($db, $cat);
                                                        while ($row1 = mysqli_fetch_assoc($result1))
                                                        {
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
                                                        while ($row1 = mysqli_fetch_assoc($result1))
                                                        {
                                                            $user_name = $row1['u_name'];
                                                        }
                                                        echo 'by ' . $user_name;
                                                        ?>
                                            </a></small>
                                        <small><a href="#" title=""><i class="fa fa-eye"></i>
                                                <?php

                                                        echo $p_view;

                                                        ?>
                                            </a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->

                                <hr class="invis">

                                <?php
                                    }
                                } ?>

                            </div>
                        </div>


                    </div><!-- end col -->



                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <?php
        include "inc/footer.php";

        ?>

</body>

</html>