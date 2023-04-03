<?php
ob_start();

session_start();

if ($_SESSION['logout'] == 1) {
    session_unset();
    session_destroy();
    header('location:../../index.php');
} else {
    session_unset();
    session_destroy();
    header('location:../index.php');
}
ob_end_flush();
