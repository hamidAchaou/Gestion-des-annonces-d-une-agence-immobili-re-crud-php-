        <!-- MODAL DELETE -->
        <div class="modal fade" id="delete<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    Are you sure you want to delete Annonce <?php echo $title ?>?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger" name="delete">Delete</button>
                  </div>
                </form>
              </div>
            </div>
        </div>