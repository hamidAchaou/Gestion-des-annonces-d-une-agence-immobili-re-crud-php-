<?php
include 'connect.php'; // Call file connected with database
include 'insert.php'; // Call the file that adds the data to the database
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
    <link rel="stylesheet" href="test.css" />
  </head>
<body>
    <!--===================== navbar =============================-->
    <nav class="navbar navbar-light bg-light w-100 position-fixed">
      <div class="container-fluid d-flex">
        <img
          src="images/Logo.png"
          alt=""
          width="100"
          height="70"
          class="d-inline-block align-text-top"
        />
        <div class=" justify-content-center">
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
              <button name = "searchbtn" type="submit" class="btn btn-primary ml-4"

              >Submit</button>
            </form>
          </div>
          <button type="submit" name="serchbtn" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addAnnonce" id="btn-add">Add annonces</button>

          <!--=====================================  ADD ANNONCE  =====================-->
          <!-- button ADD ANNONCE -->
          <!-- Modal add -->
          <div id="addAnnonce" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
              <div class="modal-content">
                  <div class="modal-header">
                      <h2 class="modal-title">Add Announce</h2>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body d-flex flex-column" id = "add-announce">
                    <form action="index.php" method = "POST" enctype="multipart/form-data">
                        <label for="completName" class = "w-100">Title
                            <input type="text" name = "title" id = "completName" required>
                        </label>
                        <label for = "completeType" class = "w-100">type:
                            <select id="completeType" name = "type">
                                <option value="Vent">Rent</option> 
                                <option value="Sale">Sale</option> 
                            </select>
                        </label>
                        <label for="completdate" date class = "w-100">Date
                            <input type="date" id = "completdate" name= "date" required>
                        </label>
                        <label for="completPrice" class = "w-100">Price
                            <input type="number" id = "completPrice" min="0" name = "price" required>
                        </label>
                        <label for="completSpace" class = "w-100">Space
                            <input type="number" id = "completSpace" min="0" name = "space" required>
                        </label>
                        <label for="completLocation" class = "w-100" >Location
                            <input type="text" id = "completLocation" min="0" name="location" required>
                        </label>
                        <label for="completImage" class = "w-100">
                            Add Image
                            <input type="file" id = "completImage" name = "image" accept=".jpg,.jpeg,.png,.svg" required>
                        </label>
                        <label for="completDiscription" class = "w-100">Discription
                            <input type="" id = "completDiscription" name="discription" required>
                        </label>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary" id="addAnnounce" name = "submit">Add Announce</button>
                      </div>
                  </form>
              </div>
          </div>  
      </section>

      <!-- section show cards -->
      <section class="container mt-5">
        <div class="row flex-wrap gap-5">

          <?php 
          if (isset($_POST['searchbtn'])){
            // show cards while search
              include 'search.php';
             ?>
             <?php
             } else {
              $sql = "SELECT * FROM announce ";
              $result = $conn->query($sql);
              $data = $result->fetch_all(MYSQLI_ASSOC);
              // loop a data for show cards
              foreach ($data as $key => $value) :
              ?>
                <!-- show cards -->
                <div class="card mb-4 ml-4 wow" style="width: 20rem;">
                  <img class="card-img-top" src="<?php echo $value['image'] ?>" alt="Card image cap" height="250">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <h5 class="card-title"><?php echo $value['title'] ?></h5>
                      <p class="card-text"><?php echo $value['price'] ?>$</p>
                    </div>
                  <p class="card-text"><small class="text-muted"><?php echo $value['location'] ?> m</small></p>
                  <p class="card-text"><?php echo $value['type'] ?></p>
                  <p class="card-text"><?php echo $value['discription'] ?></p>
                  <form action="" method="POST" >
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

        <!-- ==================- Modal -=============================== -->
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
        <!-- MODAL Edit -->
        <div class="modal fade" id="edit<?php echo $value["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                  <h2 class="modal-title">edit Announce</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body d-flex flex-column" id = "add-announce">
                <form name="formupdate" action="edit.php?id=<?php echo $value['id'] ?>" method = "POST" enctype="multipart/form-data">
                  <h2>Announce</h2>
                  <div class="form-group">
                    <label for="" class = "w-100">Title
                        <input type="text" name = "title" value="<?php echo $value['title'] ?>" required>
                    </label>
                  </div>
                  <div class="form-group">
                    
                  </div>
                    <label for="disabledTextInput" class="form-label">type:
                        <select id="" name = "type" value="<?php echo $value['type'] ?>" required>
                            <option value="Vent">Vent</option> 
                            <option value="Sale">Sale</option> 
                        </select>
                    </label>
                    <div class="form-group">
                      <label for="disabledTextInput" class="form-label">Date
                          <input type="date" name= "date" value="<?php echo $value['date'] ?>" required>
                      </label>
                    </div>
                    <div class="form-group">
                      <label for="disabledTextInput" class="form-label">Price
                          <input type="number" min="0" name = "price" value="<?php echo $value['price'] ?>" required>
                      </label>
                    </div>
                    <div class="form-group">
                      <label for="disabledTextInput" class="form-label">Space
                          <input type="number" min="0" name = "space" value="<?php echo $value['space'] ?>" required>
                      </label>
                    </div>
                    <div class="form-group">
                      <label for="disabledTextInput" class="form-label" >Location
                          <input type="text" min="0" name="location"value="<?php echo $value['location'] ?>" required>
                      </label>
                    </div>
                    <div class="form-group">
                      <label for="disabledTextInput" class="form-label">
                        Add image
                        <input type="file" name ="image" value="<?php echo $value['image'] ?>" accept=".jpg,.jpeg,.png,.svg" required>
                      </label>
                    </div>
                    <div class="form-group">
                      <label for="disabledTextInput" class="form-label">Discription
                          <input type="" name = "discription" value="<?php echo $value['discription'] ?>" required>
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
        </div>

        <?php
              endforeach;
          }; //end else
        ?>

      </section>
    </main>

  <!--========================  Footer ======================================-->
    <footer class="text-center text-lg-start text-muted bg-light mt-5">
      <!-- Section: Social media -->
      <div class="d-flex justify-content-center p-4 border-bottom">
          <!-- Left -->
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
      </div>
      <div class="">
          <div class="container text-center text-md-start mt-5">
      </div>
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