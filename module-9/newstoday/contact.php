<?php
include "inc/head.php";

?>

<body>
    <div id="wrapper">
        <?php
        include "inc/header.php";
        ?>

        <section class="section lb">
            <div class="container">
                <div class="row">


                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php
                                    if (isset($_POST['signin']))
                                    {
                                        echo "<div class='alert alert-success' role='alert'>
                            Form Submitted Successfully
                        </div>";
                                        $your_name = $_POST['name'];
                                        $your_email = $_POST['email'];
                                        $your_sub = $_POST['subject'];
                                        $your_text = $_POST['message'];

                                        echo "<h4>Your Email: <span>$your_email </span></h4>";
                                        echo "<h4>Your Name: <span>$your_name </span></h4>";
                                        echo "<h4>Your Subject: <span>$your_sub </span></h4>";
                                        echo "<h4>Your Message: <span>$your_text </span></h4>";
                                    }
                                    ?>
                                </div>


                            </div><!-- end row -->

                            <hr class="invis">

                            <div class="row">
                                <div class="col-lg-12">
                                    <form class="form-wrapper" method="post">
                                        <h4>Contact form</h4>
                                        <input name="name" type="text" class="form-control" placeholder="Your name">
                                        <input name="email" type="text" class="form-control" placeholder="Email address">
                                        <input name="subject" type="text" class="form-control" placeholder="Subject">
                                        <textarea name="message" class="form-control" placeholder="Your message"></textarea>
                                        <input type="submit" value="Log In" class="btn btn-default btn-block w-25" name="signin" />
                                    </form>
                                </div>
                            </div>
                            <!-- <div class="alert alert-success" role="alert">
                            A simple success alert—check it out!
                        </div>
                        <h1>Your Name: <span>$your_name </span></h1>
                        <h1>Your Email: <span>$your_email </span></h1>
                        <h1>Your Subject: <span>$your_sub </span></h1>
                        <h1>Your Message: <span>$your_text </span></h1> -->
                            <hr class="invis">
                            <hr class="invis">


                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <?php
        include "inc/footer.php";

        ?>
    </div>

</body>

</html>