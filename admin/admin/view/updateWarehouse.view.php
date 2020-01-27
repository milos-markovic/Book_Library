
<?php include '../../include/header.php';?>


<div class="container py-5">

    <h5><a href="bookWarehouses.php" class="btn btn-link text-dark"><i class="fas fa-arrow-left"></i> Nazad</a></h5>


    <h1 class="display-4 text-center">Izmeni Skladište: <?php echo $getWarehouse->name; ?></h1>

    <div class="row py-4">
    
        <div class="col-8 mx-auto">

            <form action="" method="POST" id="updateWarehouseForm">

                <?php include '../../Include/showMessages.php';?>
                

                <input type="hidden" name="warehouseId" id="warehouseId" value="<?php echo $getWarehouse->id; ?>" >

                <div class="form-group">
                    <label for="ime">Ime:</label>
                    <input type="text" name="ime" id="ime" class="form-control" placeholder = "Ime skladišta" value="<?php echo $getWarehouse->name; ?>" required>
                </div>
                <div class="form-group">
                    <label for="adress">Adresa:</label>
                    <input type="text" name="adresa" id="adresa" class="form-control" placeholder = "Naziv Adresa" value="<?php echo $getWarehouse->address; ?>" required>
                </div>
                <div class="form-group">
                    <label for="kolicina">Kolicina:</label>
                    <input type="text" name="kapacitet" id="kapacitet" class="form-control" placeholder = "Kapacitet skladišta" value="<?php echo $getWarehouse->quantity; ?>" required>
                </div>
                
                <div class="form-group">
                    <?php if( count( $getWarehouse->books ) > 0 ) :?>
                     <label for="books">Knjige iz skladišta: </label>
                     <div class="form-group" id="test">
                             
                        <?php foreach($getWarehouse->books as $book) :?>
                                      
                                <div class="form-row justify-content-center align-items-center">
                                    <div class="col-6">
                                        <div class="form-row align-items-center">
                                            <div class="col-6">
                                                <i><?php echo $book->book; ?></i>&nbsp;  (<?php echo $book->language; ?>)
                                            </div>
                                            <div class="col-3">
                                                <input type="text" name="number_of_copies[]" id="number_of_copies" class="form-control text-center" value="<?php echo $book->bookCopies; ?>" required >
                                                <input type="hidden" name="bookId[]" id="bookId" value=<?php echo $book->id; ?>>
                                                <input type="hidden" name="key_number_of_copies" id="key_number_of_copies" value=<?php echo $warehouseKey; ?> >
                                            </div>
                                            <div class="col-1">
                                                Knjiga
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <button type="submit" name="update" id="updateBtn" class="btn btn-primary btn-sm updateBtn">
                                            <i class="fas fa-pencil-alt"></i>&nbsp; Izmeni
                                        </button>
                                        <a href="deleteWarehouseBooks.php" class="btn btn-danger btn-sm deleteBtn" ><i class="far fa-trash-alt"></i>&nbsp; Obriši</a>
                                    </div>
                                </div>
                           
                        <?php endforeach; ?>
   
                     </div>
                     <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" name="grad" id="grad" class="form-control" placeholder = "Grad" value="<?php echo $getWarehouse->city; ?>" required >
                </div>
                <div class="form-group text-center mt-4">
                    <input type="submit" name="update" value="Izmeni" class="btn btn-info" >
                </div>
            </form>

        </div>

    </div>
    
</div>


<?php include '../../include/footer.php';?>


<script>
    $(document).ready(function(){
       
        // dugmici za izmenu broja knjiga
        let updateBtns =  $(".updateBtn");
        
        $.each(updateBtns, function( index, btn ) {
            $(btn).click(function(e){

                e.preventDefault();

                let numberOfCopiesValue = Number( $( this ).parent().prev().find("#number_of_copies").val() );
                let bookId = Number( $( this ).parent().prev().find("#bookId").val() );
                let arrayKeyNumberOfCopies = Number( $( this ).parent().prev().find("#key_number_of_copies").val() );

                let posting = $.post( 'updateWarehouseBooksAjax.php', { 
                    numCopies: numberOfCopiesValue,
                    bookId: bookId,
                    arrayKeyNumberOfCopies: arrayKeyNumberOfCopies
                });

                posting.done(function( data ) {
 
                    let message = `<div class="alert alert-info border border-light my-3"  id="messages" role="alert">
                                        ${data}
                                     </div>`;

                    let updateWarehouseForm = $( "#updateWarehouseForm" );
                    
                    $(updateWarehouseForm).prepend(message);

                    setTimeout(() => {
                        $("#messages").remove();
                    }, 3000);
                });

            })
        });
    


        // dugmici za brisanje knjiga
        let deleteBtn = $(".deleteBtn");

        $.each( deleteBtn, function(index, btn) {

            $( btn ).click(function(e){

                e.preventDefault();

                let bookId = Number( $(this).parent().prev().find("#bookId").val() );
                let arrayKeyNumberOfCopies = Number( $(this).parent().prev().find("#key_number_of_copies").val() );
                let warehouseId = Number( $("form").find("#warehouseId").val() );


                let posting = $.post( 'deleteWarehouseBooksAjax.php', { 

                    warehouseId: warehouseId,
                    bookId: bookId,
                    arrayKeyNumberOfCopies: arrayKeyNumberOfCopies

                });

        
                // slanje podataka ajaksom
                 posting.done(function( data ) {
   
                    // brisanje reda knjiga
                    let rowBook = $(e.target).parent().parent();
                    $( rowBook ).remove();

                    let message = `<div class="alert alert-info border border-light my-3"  id="messages" role="alert">
                                        ${data}
                                  </div>`;

                    let updateWarehouseForm = $( "#updateWarehouseForm" );
                    
                    $(updateWarehouseForm).prepend(message);

                    setTimeout(() => {
                        $("#messages").remove();
                    }, 3000);

                 });

            });
        });
       
    })

    $("#updateWarehouseForm").validate();

</script>







