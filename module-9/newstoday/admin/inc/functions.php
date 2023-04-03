<?php
include "connection.php";
function delete($table, $p_id, $d_id, $url)
{
    global $db;
    // echo $d_id;
    $sql3 = "DELETE FROM $table WHERE $p_id = '$d_id'";
    $result = mysqli_query($db, $sql3);

    if ($result) {
        header('Location:' . $url);
    } else {
        echo " DB ERROR ! ";
    }
}
?>
<?php  ?>