
<?php include '../../include/header.php';?>


<div class="container py-5">

    <h5><a href="menus.php" class="btn btn-link text-dark"><i class="fas fa-arrow-left"></i> Nazad</a></h5>


    <h1 class="display-4 text-center mb-5">Linkovi Menija naslova: <?php echo $menuTitle->title; ?></h1><hr>


    <?php require '../../include/showMessages.php';?>


    <?php if(count( $getMenuLinks )) :?>
      <div class="card w-75 m-auto mb-5">
          <table class="table table-hover m-0">
              <thead>
                  <th>Naziv linka</th>
                  <th>Link</th>
                  <th></th>
                  <th></th>
              </thead>
              <tbody>
                  <?php foreach( $getMenuLinks as $link) :?>
                      <tr>
                          <td><?php echo $link->title; ?></td>
                          <td><?php echo $link->link; ?></td>
                          <td><a href="updateMenuLink.php?id=<?php echo $link->id; ?>" class="btn btn-primary btn-sm">Izmeni</a></td>
                          <td><a href="deleteMenuLink.php?id=<?php echo $link->id; ?>" class="btn btn-danger btn-sm">Obriši</a></td>
                      </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
      </div>
    <?php else: ?>

        <h3 class="text-center">Napravite Link Menija</h3>      

    <?php endif; ?>

    <div class=" w-75 text-left m-auto pt-4">
        <a href="createMenuLink.php" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Napravi Link</a>
    </div> 
    
    
</div>



<!-- modal create link -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Napravi Link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="" method="POST">
        <div class="modal-body">
            <input type="hidden" name="titleId" value="<?php echo $titleId; ?>" >
            
            <div class="form-group">
                <label for="linkName" class="col-form-label">Ime linka:</label>
                <input type="text" class="form-control" id="linkName" name="linkName">
            </div>
            <div class="form-group">
                <label for="link" class="col-form-label">Link:</label>
                <input type="text" class="form-control" id="link" name="link" placeholder="Primer: google.com">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
            <input type="submit" name="createMenuLink" class="btn btn-primary btn-lg" value="Napravi">
        </div>
      </form>

    </div>
  </div>
</div>



<?php include '../../include/footer.php';?>










