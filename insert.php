<?php
include 'connect.php'; // Call file connected with database

/*=============== insert data in database ===================*/
if (isset($_POST['submit'])) {
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
    
    // $image = $_FILES['image']['tmp_name'];
    // $target = "images/".$_FILES['image'];


    $sql = "INSERT INTO `announce` (`title`, `type`,  `price`, `space`, `date`, `location`, `image`, `discription`) VALUES ('$title', '$type',  '$price', '$space', '$date', '$location', '$img_des', '$discription');";
    $result = mysqli_query($conn, $sql);
     if ($result) {
        // echo "data insert successfully";
     } else {
        die(mysqli_error($conn));
     }

}
?>