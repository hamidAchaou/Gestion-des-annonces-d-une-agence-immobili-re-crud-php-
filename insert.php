<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $space = $_POST['space'];
    $date = $_POST['date'];
    $location = $_POST['location'];

        // verifie image
        $uploads_dir = 'uploads/';
        $name = $_FILES['my_image']['name'];
        if (is_uploaded_file($_FILES['my_image']['tmp_name']))
        {
            //in case you want to move  the file in uploads directory
             move_uploaded_file($_FILES['my_image']['tmp_name'], $uploads_dir.$name);
               // echo 'moved file to destination directory';

        }
        $image = $uploads_dir.$name;
   //  $image = $_POST['image'];
    
    // $image = $_FILES['image']['tmp_name'];
    // $target = "images/".$_FILES['image'];

    $discription = $_POST['discription'];

    $sql = "INSERT INTO `announce` (`title`, `type`,  `price`, `space`, `date`, `location`, `image`, `discription`) VALUES ('$title', '$type',  '$price', '$space', '$date', '$location', '$image', '$discription');";
    $result = mysqli_query($conn, $sql);
     if ($result) {
        // echo "data insert successfully";
     } else {
        die(mysqli_error($conn));
     }

}
?>