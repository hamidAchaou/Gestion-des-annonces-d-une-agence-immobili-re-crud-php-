<?php
include 'connect.php';
$id = $_GET['id'];
if (isset($_POST['updat'])) {
    $title = $_POST['title'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $space = $_POST['space'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $discription = $_POST['discription'];
    $image = $_POST['image'];

     $sql = "UPDATE `announce` SET title='$title', type='$type', price='$price', space='$space', date='$date',
     location='$location', image='$image', discription='$discription' WHERE id='$id'";
     $result = mysqli_query($conn, $sql);

    if ($sql){
      echo "update done succses";
      header("Location: index.php");

      } else {
      header("Location:edit.php");
      echo "update haven't done succsessfull";

      }
}


?>