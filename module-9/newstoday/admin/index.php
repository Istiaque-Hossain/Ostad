<?php
ob_start();
include "inc/connection.php";
// include "inc/functions.php";

session_start();
if (!empty($_SESSION['u_email']) && $_SESSION['log'] == 1) {
    header('Location:dashboard.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="logAssets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="logAssets/css/style.css">

    <!-- Custom css -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="logAssets/images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="registration.php" class="signup-image-link" style="color: orange ; padding-bottom: 1rem;"><span> New !</span> Create an account</a>

                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="your_email" id="your_email" placeholder="Your Email" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Password" />
                            </div>
                            <!-- <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div> -->
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                            </div>
                        </form>


                        <?php
                        if (isset($_POST['signin'])) {
                            $your_email = $_POST['your_email'];
                            $your_pass = $_POST['your_pass'];
                            // echo " lolllllll";
                            // echo  $your_email . $your_pass;

                            $encryPass = sha1($your_pass);
                            // echo $encryPass;

                            $sql = "SELECT * FROM users WHERE u_email='$your_email'";
                            // echo $sql;
                            $result = mysqli_query($db, $sql);
                            // echo $result;

                            while ($row = mysqli_fetch_assoc($result)) {
                                // echo " lolllllll";

                                $_SESSION['u_id'] = $row['u_id'];
                                $_SESSION['u_email'] = $row['u_email'];
                                $_SESSION['u_name'] = $row['u_name'];
                                $_SESSION['u_img'] = $row['u_img'];
                                $_SESSION['u_role'] = $row['u_role'];

                                $u_pass = $row['u_password'];
                                $_SESSION['log'] = 0;
                                // echo $u_pass;



                                if ($_SESSION['u_email'] == $your_email && $u_pass == $encryPass) {
                                    $_SESSION['log'] = 1;
                                    header('location:dashboard.php');
                                    exit();
                                    // header('location:index.php');
                                    // echo "ok";
                                
                                } else if ($_SESSION['u_email'] != $your_email || $u_pass != $encryPass) {
                        ?>
                                    <div class="alert alert-danger mt-4" role="alert">
                                        Wrong Input ! please try again .
                                    </div>
                        <?php
                                } else {
                                     header('location:index.php');
                                    
                                     
                                     
                                }
                            }
                            // echo " lolllllll2";
                        }
                        else {
                            
                        }
                        ?>

                        <!-- <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="logAssets/vendor/jquery/jquery.min.js"></script>
    <script src="logAssets/js/main.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php
    ob_end_flush();
    ?>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>