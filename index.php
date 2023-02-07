<?php
include 'connect.php';
include 'insert.php';
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
    <!--======================== link Librarry font Awesom ======================================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--======================== link css ======================================-->
    <link rel="stylesheet" href="style.css" />
  </head>
<body>
    <!--===================== navbar =============================-->
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
          <a class="navbar-brand" href="#">Home</a>
          <a class="navbar-brand" href="#">About</a>
          <a class="navbar-brand" href="#">Contact</a>
        </div>
      </div>
    </nav>
    <!-- MAIN -->
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
            <button name = "searchbtn" type="submit" class="btn btn-primary ml-4">Submit</button>
          </form>
        </div>
        <button type="submit" name="serchbtn" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="btn-add">Add Announce</button>
      
      <!--======================================== Modal add ===========================================-->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Add Announce</h2>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body d-flex flex-column" id = "add-announce">
                  <form action="index.php" methods="POST">
                      <label for="completName" class = "w-100">Title
                          <input type="text" name = "title" id = "completName">
                      </label>
                      <label for = "completeType" class = "w-100">type:
                          <select id="completeType" name = "type">
                              <option value="Vent">Vent</option> 
                              <option value="Sale">Sale</option> 
                          </select>
                      </label>
                      <label for="completdate" date class = "w-100">Date
                          <input type="date" id = "completdate" name= "date">
                      </label>
                      <label for="completPrice" class = "w-100">Price
                          <input type="number" id = "completPrice" min="0" name = "price">
                      </label>
                      <label for="completSpace" class = "w-100">Space
                          <input type="number" id = "completSpace" min="0" name = "space">
                      </label>
                      <label for="completLocation" class = "w-100" >Location
                          <input type="text" id = "completLocation" min="0" name="location">
                      </label>
                      <label for="completImage" class = "w-100">
                          Add Image
                          <input type="file" id = "completImage" name ="my_image">
                      </label>
                      <label for="completDiscription" class = "w-100">Discription
                          <input type="" id = "completDiscription" name="discription">
                      </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="addAnnounce()">Cancel</button>
                        <button type="submit" class="btn btn-primary" name = "submit">Add Announce</button>
                    </div>
                </form>
            </div>
        </div>  

    </section>
      <section class="container mt-5">
        <div class="row flex-wrap justify-content-around">
          
          <?php
                $sql = "SELECT * FROM announce ";
                $result = $conn->query($sql);
                $data = $result->fetch_all(MYSQLI_ASSOC);
                // loop a data for show cards
                foreach ($data as $key => $value) {
                ?>
            <div class="card mb-4" style="width: 20rem;">
                <img class="card-img-top" src="<?php echo $value['image'] ?>" alt="Card image cap" height="250">
                <div class="card-body">
                <h5 class="card-title"><?php echo $value['title'] ?></h5>
                <p class="card-text"><?php echo $value['price'] ?>$</p>
                <p class="card-text"><small class="text-muted"><?php echo $value['superficie'] ?> m</small></p>
                <p class="card-text"><?php echo $value['type'] ?></p>
                <p class="card-text"><?php echo $value['discription'] ?></p>
                <form action="" method="POST">
                      <input type="hidden" name="announceId" value="<?php echo $value["id"] ?>">
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $value['id'] ?>">
                          DELETE
                      </button>                   
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo $value["id"] ?>">
                          EDIT
                      </button> 
                    </form>
                </div>
            </div>



<!-- =============================================== -->
<!-- Modal -->
<!-- ================================================= -->
    <!-- MODAL DELETE -->
    <div class="modal fade" id="delete<?php echo $value["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Annonce</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="delete.php?id=<?php echo $value['id'] ?>" method="post">
                Are you sure you want to delete Annonce <?php echo $value['title'] ?>?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-danger" name="delete">Delete</button>
              </div>
            </form>
          </div>
        </div>
    </div>

    <!--================== MODAL Edit ===========================-->
    <div class="modal fade" id="edit<?php echo $value["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <!-- Modal content-->
       <div class="modal-content">
          <div class="modal-header">
              <h2 class="modal-title">Add Announce</h2>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body d-flex flex-column" id = "add-announce">
            <form name="formupdate" action="edit.php?id=<?php echo $value['id'] ?>" method = "POST">
              <h2>Announce</h2>
                <label for="" class = "w-100">Title
                    <input type="text" name = "title" value="<?php echo $value['title'] ?>">
                </label>
                <label class = "w-100">type:
                    <select id="" name = "type" value="<?php echo $value['type'] ?>">
                        <option value="Vent">Vent</option> 
                        <option value="Sale">Sale</option> 
                    </select>
                </label>
                <label class = "w-100">Date
                    <input type="date" name= "date" value="<?php echo $value['date'] ?>">
                </label>
                <label class = "w-100">Price
                    <input type="number" min="0" name = "price" value="<?php echo $value['price'] ?>">
                </label>
                <label class = "w-100">Space
                    <input type="number" min="0" name = "space" value="<?php echo $value['space'] ?>">
                </label>
                <label class = "w-100" >Location
                    <input type="text" min="0" name="location"value="<?php echo $value['location'] ?>">
                </label>
                <label class = "w-100">
                    Add image
                    <input type="file" name ="my_image" value="<?php echo $value['image'] ?>">
                </label>
                <label class = "w-100">Discription
                    <input type="" name = "discription" value="<?php echo $value['discription'] ?>">
                </label>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <!-- <button type="submit" class="btn btn-primary" name = "submit">Add Announce</button> -->
                  <button class="btn btn-danger" name="updat">updat</button>
              </div>
          </form>
        </div>
       </div>
      </div>
        <?php
        };
        ?>
              <!-- Modal Delet -->
              


        </div>

      </section>
    </main>

    <!--========================  Footer ======================================-->
    <footer class="text-center text-lg-start text-muted bg-light">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
        <span>social networks:</span>
        </div>
        <div>
        <a href="" class="me-4 link-secondary">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 link-secondary">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="me-4 link-secondary">
            <i class="fab fa-google"></i>
        </a>
        <a href="" class="me-4 link-secondary">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="me-4 link-secondary">
            <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="me-4 link-secondary">
            <i class="fab fa-github"></i>
        </a>
        </div>
    </section>
    <section class="">
        <div class="container text-center text-md-start mt-5">
    </section>
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
        © 2021 Copyright:
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    </footer>
 <!-- link js bootsrap -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    ></script>
    <!-- link java script -->
    <script src="script.js"></script>
</body>
</html>