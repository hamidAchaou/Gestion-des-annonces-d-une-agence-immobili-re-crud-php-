          <?php
                $sql = "SELECT * FROM announce ";
                $result = $conn->query($sql);
                
                $data = $result->fetch_all(MYSQLI_ASSOC);
                // loop a data for show cards
                foreach ($data as $key => $value) {
                    
                    
                    ?>

            <div class="d-flex mb-4 flex-wrap w-100">
              <div class="card ml-3" width = "25rem">
                <img
                  src="<?php echo $value["image"] ?>"
                  class="card-img-top"
                  alt="..."
                  height="300px"
                />
                <div class="card-body">
                  <h5 class="card-title" name = "titleCard"><?php echo $value["title"] ?></h5>
                  <p class="card-text">
                    <?php echo $value["discription"]; ?>
                  </p>
                  <h3>Price: <span name="pricePro"><?php echo $value["price"] ?>$</span></h3>
                  <div class="d-flex gap-5 justify-content-around">
                    <form action="" method="POST">
                        <input type="hidden" name="announceId" value="<?php echo $value["id"] ?>">
                    <!-- <a
                      href = ""
                      name = "delete"
                      type="button"
                      class="btn btn-danger"
                      data-toggle="modal"
                      data-target="#delete"
                    >
                      delete
                   </a>  -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo $value['id'] ?>">
                        Delete
                    </button>                   <a
                   name = "id"
                   type="button"
                   class="btn btn-primary"
                   data-toggle="modal"
                   data-target="#confirm-edit"
                   href = "index.php?updateid=<?php $value['id'] ?>"
                   >
                   Edit
                </a> 
            </form>
                  </div>
                </div>
              </div>
            </div>

        <?php
        };
        ?>