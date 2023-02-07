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

    if(isset($_FILES['my_image'])) {
      echo "<pre>";
      print_r($_FILES['my_image']);
      echo "</pre>";

      $uploads_dir = 'uploads/';
      $img_name = $_FILES['my_image']['name'];
      $img_size = $_FILES['my_image']['size'];
      $tmp_name = $_FILES['my_image']['tmp_name'];
      $error = $_FILES['my_image']['error'];

      if ($error === 0) {
        if($img_size > 125000) {
          $em = "sorry, your file is not large!";
          header("location: index.php?error=$em");
        }
      } else {
        $em = "unknown error occured!";
        header("location: index.php?error=$em");
      }
    }

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