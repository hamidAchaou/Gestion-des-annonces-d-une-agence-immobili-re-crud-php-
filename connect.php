<?php
// Contact with the database 
$conn = new mysqli('localhost', 'root', '', 'annonce');

if (!$conn) {
    die(mysqli_error($conn));
}
?>