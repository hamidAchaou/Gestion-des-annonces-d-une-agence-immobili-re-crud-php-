<?php
include 'connect.php';
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestion des annonces d'une agence immobilière</title>
    <!--======================== Link bootsrap ======================================-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <!--======================== link css ======================================-->
    <link rel="stylesheet" href="style.css" />
    <!--======================== link Librarry font Awesom ======================================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <nav class="navbar navbar-light bg-light w-100 position-fixed">
      <div class="container-fluid">
        <img
          src="images/Logo.png"
          alt=""
          width="160"
          height="130"
          class="d-inline-block align-text-top"
        />
        <div>
          <a class="navbar-brand" href="index.php">Home</a>
          <a class="navbar-brand" href="#">About</a>
          <a class="navbar-brand" href="#">Contact</a>
        </div>
      </div>
    </nav>
    <main class="">
      <section class="section-one">
        <div id="btn-serch" class="w-75">
          <form action="search.php" method ="POST" class="w-100 d-flex justify-content-center">
            <label for="" class="d-flex">
              type: 
               <select class="form-select form-select-sm" aria-label=".form-select-sm example" name= "type">
                <option value="Rent" >For Rent </option>
                <option value="Sale" >For Sale</option>
              </select>
            </label>
            <label for=""   class="d-flex" id="max-price">
              Max Price: 
              <input name="max_Price" type="number" min="0">
            </label>
            <label for="" class="d-flex" id="min-Price">
              Min Price: 
              <input name="min_Price" type="number" min="0">
            </label>
            <button name = "searchbtn" type="submit" class="btn btn-primary ml-4"

            >Submit</button>
          </form>
        </div>

     
      <!--======================================== MODAL ===========================================-->
        <!-- Modal add -->
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="btn-add">Open Modal</button>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Add Announce</h2>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body d-flex flex-column" id = "add-announce">
                  <form action="insert.php" method = "POST">
                      <label for="" class = "w-100">Title
                          <input type="text" name = "title">
                      </label>
                      <label class = "w-100">type:
                          <select id="" name = "types">
                              <option value="Vent">rent</option> 
                              <option value="Sale">Sale</option> 
                          </select>
                      </label>
                      <label class = "w-100">Date
                          <input type="date" name= "date">
                      </label>
                      <label class = "w-100">Price
                          <input type="number" min="0" name = "price">
                      </label>
                      <label class = "w-100">Space
                          <input type="number" min="0" name = "space">
                      </label>
                      <label class = "w-100" >Location
                          <input type="text" min="0" name="location">
                      </label>
                      <label class = "w-100">
                          Add image
                          <input type="file" name = "image">
                      </label>
                      <label class = "w-100">Discription
                          <input type="" name = "discription">
                      </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name = "submit">Add Announce</button>
                    </div>
                </form>
            </div>
        </div>  
      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> 


    </section>

      <?php 
      if (isset($_POST['searchbtn'])){


              $type =  $_POST["type"];
              $minPrice =$_POST["min_Price"];
              $maxPrice= $_POST["max_Price"];
              echo $type;
              echo "<br>";
              echo $maxPrice;
              echo $minPrice;

              $Search = "SELECT * FROM `announce` WHERE price BETWEEN '$minPrice' AND '$maxPrice' AND  type = '$type' ";
              $Search_run = mysqli_query($conn, $Search);
              $Search_run_check = mysqli_num_rows($Search_run );

               if ($Search_run_check  > 0){

                while ($rows = mysqli_fetch_assoc($Search_run)) {
                    ?>
                     <div class="card ml-3" width = "25rem">
                <img
                  src="<?php echo $rows["image"] ?>"
                  class="card-img-top"
                  alt="..."
                  height="300px"
                />
                <div class="card-body">
                  <h5 class="card-title"><?php echo $rows["title"];?></h5>
                  <p class="card-text">
                    <?php echo $rows["discription"]; ?>
                  </p>
                  <h3>Price: <span><?php echo $rows["price"];?>$</span></h3>
                  <div class="d-flex gap-5 justify-content-around">
                    <form action="">
                    <!-- <button class="btn btn-danger  delete-btn"  type="button"  class='btn btn-danger' class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1" >Delete</button> -->
                    <a class='btn btn-danger' href='delete.php?id=<?php echo $rows["id"]?>'>Delete</a>
                  </div>
                </div>
              </div>




             <?php
             }
           
             }
             ?>
             <?php
             }
             ?>
   