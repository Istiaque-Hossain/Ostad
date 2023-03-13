<?php
$name = session_name("session_user");
session_start();

$cookie_name = "cookie_user";
$cookie_value = $_POST["name"];
setcookie($cookie_name, $cookie_value, time() + 300, "/"); // 86400 = 1 day


$_SESSION[$name] = $_POST["name"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <?php

    if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["pass"]) || empty($_FILES["p_img"]["name"]))
    {
        $errMsg = "Error! You didn't fill up all fields.";
        echo $errMsg;
    }
    elseif (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false)
    {
        $email = $_POST["email"];
        echo ("$email is not a valid email address");
    }
    else
    {
        $p_img = $_FILES["p_img"]["name"];
        $p_img_temp = $_FILES["p_img"]["tmp_name"];

        $split = explode('.', $p_img);
        $ext = strtolower(end($split));
        $check_ext = array('jpg', 'jpeg', 'png');

        if (in_array($ext, $check_ext) == true)
        {
            date_default_timezone_set("Asia/Dhaka");
            $random = date("Y-m-d__h-i-sa");
            // $random = rand();
            $upadetd_photo = $random . "__" . $p_img;
            move_uploaded_file($p_img_temp, 'uploads/' . $upadetd_photo);
        }

        $myfile = fopen("user.csv", "w") or die("Unable to open file!");
        $txt = "NAME:{$_POST["name"]} <br>, EMAIL: {$_POST["email"]} <br>, PASSWORD: {$_POST["pass"]} <br>, IMAGE FILE NAME: {$upadetd_photo}";
        // echo $txt;
        fwrite($myfile, $txt);
        fclose($myfile);


        // $file = fopen("user.csv", "r");

        // while (!feof($file))
        // {
        //     print_r(fgetcsv($file));
        // }

        // fclose($file);
    }

    ?>


    <div class="container">
        <div class="row align-items-center vh-100">
            <div class="col-12">

                <?php
                if (!isset($_COOKIE[$cookie_name]) && !isset($_SESSION["session_user"]))
                {
                    echo "Cookie named '" . $cookie_name . "' is not set! <br>";
                    echo "Session named '" . $_SESSION["session_user"] . "' is not set! <br>";
                }
                else
                {
                    echo "Cookie '" . $cookie_name . "' is set!<br>";
                    echo "Value is: " . $_COOKIE[$cookie_name] . '<br>';

                    echo "Session '" . 'session_user' . "' is set!<br>";
                    echo "Value is: " . $_SESSION[$name] . '<br>';
                }

                echo "<br><br> ........... Data From user.csv .................<br>";
                $file = fopen("user.csv", "r");

                while (!feof($file))
                {
                    print_r(fgetcsv($file));
                }

                fclose($file);
                ?>

            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>