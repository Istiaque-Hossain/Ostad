<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
    <div class="sidebar">


        <div class="widget">
            <form class="form-inline mb-5" action="search.php" method="GET">
                <input class="form-control mr-sm-2" type="text" placeholder="How may I help?" name="s_text">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="searchbtn">Search</button>
            </form>

            <h2 class="widget-title">Popular Categories</h2>
            <div class="link-widget">
                <ul>
                    <?php
                    $sql2 = "SELECT * FROM category";
                    $result = mysqli_query($db, $sql2);

                    $age = array();
                    $y = 0;

                    while ($row = mysqli_fetch_assoc($result))
                    {
                        $cat_id = $row['c_id'];
                        $cat_name = $row["c_name"];
                        $cat_status = $row["c_status"];


                        if ($cat_status == 1)
                        {
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
                    foreach ($age as $x => $x_value)
                    {
                        // echo "Key=" . $x . ", Value=" . $x_value;
                        // echo "<br>";
                        if ($max == 5)
                        {
                            break;
                        }
                        ?>
                        <li><a href="#"><?php echo $x; ?> <span>(<?php echo  $x_value; ?>)</span></a></li>
                    <?Php
                        $max++;
                    }

                    ?>

                </ul>
            </div><!-- end link-widget -->
        </div><!-- end widget -->


    </div>




</div><!-- end sidebar -->
</div><!-- end col -->