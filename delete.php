<?php
include 'connect.php';

$id = $_GET['id'];
if (isset($_POST['delete'])) {

    $sql = "DELETE FROM `announce` WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location: index.php");
    } else {
        die(mysqli_error($conn));
    }
}
?>