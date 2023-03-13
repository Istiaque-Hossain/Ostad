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
        $random = date("Y-m-d h-i-sa");
        // $random = rand();
        $upadetd_photo = $random . "_" . $p_img;
        move_uploaded_file($p_img_temp, 'uploads/' . $upadetd_photo);
    }

    $myfile = fopen("user.csv", "w") or die("Unable to open file!");
    $txt = "NAME:{$_POST["name"]} <br>, EMAIL:{$_POST["email"]} <br>, PASSWORD:{$_POST["pass"]} <br>, IMAGE:{$upadetd_photo}";
    // echo $txt;
    fwrite($myfile, $txt);
    fclose($myfile);


    $file = fopen("user.csv", "r");

    while (!feof($file))
    {
        print_r(fgetcsv($file));
    }

    fclose($file);
}
