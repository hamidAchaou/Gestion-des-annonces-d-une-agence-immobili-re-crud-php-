 <?php 
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
};
};
?>