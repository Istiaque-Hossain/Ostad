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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Icon -->
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

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="user_name" id="name" placeholder="Your Name" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="user_email" id="email" placeholder="Your Email" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="user_pass" id="pass" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" />
                            </div>

                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>

                        <?php
                        if (isset($_POST["signup"])) {
                            $user_name = $_POST["user_name"];
                            $user_email = $_POST["user_email"];
                            $user_pass = $_POST["user_pass"];
                            $re_pass = $_POST["re_pass"];

                            $sql_count = "SELECT u_email FROM users WHERE u_email= '$user_email'";
                            $result_count = mysqli_query($db, $sql_count);
                            $countEmail = mysqli_num_rows($result_count);

                            if ($countEmail > 0) {
                        ?>
                                <div class="alert alert-danger mt-4" role="alert">
                                    This Email address is already used.
                                </div>
                                <?php
                            } else {
                                if (!empty($user_name) && !empty($user_email) && !empty($user_pass)) {
                                    if ($user_pass == $re_pass) {

                                        $encrypt_pass = sha1($user_pass);
                                        $sql = "INSERT INTO users (u_name, u_email, u_password )
                                            value ('$user_name', '$user_email', '$encrypt_pass')";

                                        $result = mysqli_query($db, $sql);
                                        if ($result) {
                                ?>
                                            <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fs-5" id="staticBackdropLabel">Message</h5>
                                                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                        </div>
                                                        <div class="modal-body text-success fs-4">
                                                            Successfully Signed Up.
                                                        </div>
                                                        <div class="modal-footer">
                                                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                                            <a href="index.php" type="button" class="btn btn-success text-light">Log In</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        } else {
                                            echo " DB Error . . ";
                                        }
                                    } else {
                                        ?>
                                        <div class="alert alert-danger mt-4" role="alert">
                                            Password mismatched
                                        </div>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <div class="alert alert-danger mt-4" role="alert">
                                        Please fill up all required information.
                                    </div>
                        <?php
                                }
                            }
                        }
                        ?>
                    </div>
                    <div class="signup-image">
                        <figure><img src="logAssets/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="index.php" class="signup-image-link">I am already member</a>
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

    <script>
        $(document).ready(function() {
            $("#myModal").modal('show');
        });
    </script>

    <?php
    ob_end_flush();
    ?>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>