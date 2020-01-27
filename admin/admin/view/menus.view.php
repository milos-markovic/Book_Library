
<?php include '../../include/header.php';?>


<div class="container py-5">

    <h5><a href="index.php" class="btn btn-link text-dark"><i class="fas fa-arrow-left"></i> Nazad</a></h5>

    <?php require '../../include/showMessages.php'; ?>


    <h1 class="display-4 text-center">Menu Items</h1><hr>

    <div id="tabs" class="my-5">
        <ul>
            <li><a href="#tabs-1">Gornji Meni</a></li>
            <li><a href="#tabs-2">Donj Meni</a></li>
        </ul>
        <div id="tabs-1">

            <table class="table table-bordered" id="topMeni">
              <thead>
                  <tr>
                    <th>Naziv linka</th>
                    <th>Link</th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach( $topMenuItems as $menuItem ) :?>

                    <tr>
                      <td><?php echo $menuItem->name; ?></td>
                      <td><?php echo $menuItem->link; ?></td>
                      <td><a href="updateTopMenuLink.php?id=<?php echo $menuItem->id; ?>"  class="btn btn-primary btn-sm text-white" >Update</a></td>
                      <td><a href="deleteTopMenuLink.php?id=<?php echo $menuItem->id; ?>" class="btn btn-danger btn-sm text-white">Delete</a></td>
                    </tr>
                    
                  <?php endforeach; ?>
              </tbody>
            </table>

            <a href="createTopMenuLink.php" class="btn btn-primary text-white">Novi Link</a>

        </div>
        <div id="tabs-2">

            <table class="table table-hover">
                <tr>
                    <th>Naslov sekcije menija</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach( $bootomMenuItems as $meniItem ) :?>

                    <tr>
                        <td><?php echo $meniItem->title; ?></td>
                        <td><a href="menuLinks.php?titleId=<?php echo $meniItem->id; ?>" class="text-primary">Linkovi menija</a></td>
                        <td><a href="#" data-id = "<?php echo $meniItem->id; ?>" id="updateTitle" class="btn btn-primary btn-sm text-light updateTitle" data-toggle="modal" data-target="#exampleModal">Update</a></td>
                        <td><a href="deleteMenuTitle.php?id=<?php echo $meniItem->id; ?>" class="btn btn-danger btn-sm text-light">Delete</a></td>
                    </tr>

                <?php endforeach; ?>
            </table>

            <?php if( count($bootomMenuItems) < 4 ) :?>
              <a href="#" class="btn btn-primary text-white mt-2" data-toggle="modal" data-target="#createSection" >Napravi Sekciju</a>
            <?php endif; ?>
        </div>
    </div>
   
   
</div>



<!-- modal update title bottom meni -->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Izmeni naslov</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="" method="POST">
        <div class="modal-body">
            <input type="hidden" name="titleId" id="menuTitleId" value="">
            <div class="form-group">
                <label for="menuTitle" class="col-form-label">Naslov:</label>
                <input type="text" class="form-control" id="menuTitle" name="menuTitle">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
            <input type="submit" name="updateMenuTitle" class="btn btn-primary btn-lg" value="Izmeni">
        </div>
      </form>

    </div>
  </div>
</div>


 <!-- modal napravi sekciju bootom meni -->

 <div class="modal fade" id="createSection" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Napravi Naslov Sekcije</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="" method="POST">
        <div class="modal-body">
            <div class="form-group">
                <label for="menuTitle" class="col-form-label">Naslov:</label>
                <input type="text" class="form-control" id="menuTitle" name="menuTitle">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
            <input type="submit" name="createSection" class="btn btn-primary btn-lg" value="Napravi">
        </div>
      </form>

    </div>
  </div>
</div>






<?php include '../../include/footer.php';?>


<script>

  $( function() {
    $( "#tabs" ).tabs();
  } );

  // slanje od naslova id

  $(".updateTitle").click(function(e){
       
       e.preventDefault();

       let titleId = Number( $(this).attr('data-id') );

      $.ajax({
        url: 'getMenuTitleAjax.php',
        data: { titleId: titleId },
        method: 'POST'
      }).done( function(data) {

        let modal = $("#exampleModal");

        let titleObject = JSON.parse( data );

        modal.find("#menuTitle").val( `${titleObject.title}` );
        modal.find("#menuTitleId").val( `${titleObject.id}` );
      });
  });


</script>



