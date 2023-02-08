<?php
// Contact with the database 
$conn = new mysqli('localhost', 'root', '', 'crud');

if (!$conn) {
    die(mysqli_error($conn));
}
?>