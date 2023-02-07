<?php
  include 'connect.php'; // Call file connected with database
$id = $_GET['id'];
if (isset($_POST['updat'])) {
    $title = $_POST['title'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $space = $_POST['space'];
    $date = $_POST['date'];
    $location = $_POST['location'];
    $discription = $_POST['discription'];
    $image = $_FILES['image'];

    $uploads_dir = 'uploads/';
         $name = $_FILES['image']['name'];
         if (is_uploaded_file($_FILES['image']['tmp_name']))
         {
          //in case you want to move  the file in uploads directory
          move_uploaded_file($_FILES['image']['tmp_name'], $uploads_dir.$name);
            // echo 'moved file to destination directory';
         }
         $img_des = $uploads_dir.$name;

     $sql = "UPDATE `announce` SET title='$title', type='$type', price='$price', space='$space', date='$date',
     location='$location', image='$img_des', discription='$discription' WHERE id='$id'";
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