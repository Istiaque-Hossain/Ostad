<!-------------- DB connection -------------->
<?php
ob_start();
$db = mysqli_connect("localhost", "root", "", "istiaque_newstoday");

if ($db) {
  // echo "Database connection established!";
} else {
  echo "Database connection error!";
}

?>