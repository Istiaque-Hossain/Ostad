<?php
$db = mysqli_connect("localhost", "istiaque_root", "newstoday2021", "istiaque_newstoday");
session_start();

?>
<?php
if (isset($_POST["add_cmnt"])) {
    $postID = $_GET['post_id'];
    // echo $postID;

    $cmnt_author = $_SESSION['u_id'];
    $cmnt_desc = $_POST['cmnt_desc'];
    $cmnt_post = $_GET['post_id'];

    $sql_cmnt_insert = "INSERT INTO comment (cmnt_author, cmnt_desc, cmnt_date, cmnt_post) value ('$cmnt_author', '$cmnt_desc', now(), '$cmnt_post')";
    $result_cmnt_insert = mysqli_query($db, $sql_cmnt_insert);

    if ($result_cmnt_insert) {
        header('location:../single_post.php?post_id=' . $postID . '&div_id=1');


        // header("Location:
        // <a href='single_post.php?post_id=$postID'>
        //     https://www.edureka.co/
        // </a>");

?>


<?php
    }
    // echo " commented";
}
?>



<!-- ============================= add category ================================= -->

<?php
if (isset($_POST["add_cat"])) {
    $cata_name = $_POST["cat_name"];
    $cata_desc = $_POST["cat_desc"];
    // echo $cat_name . " " . $cat_desc;
    $sql = "INSERT INTO category (c_name, c_desc, c_status) value ('$cata_name', '$cata_desc', 0)";
    $result = mysqli_query($db, $sql);
    if ($result) {
        header("Location:../admin/category.php");
    } else {
        echo " no ";
    }
}
?>