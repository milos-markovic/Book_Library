
<?php include '../../include/header.php';?>


<div class="container py-5">

<h5><a href="index.php" class="btn btn-link text-dark"><i class="fas fa-arrow-left"></i> Nazad</a></h5>


    <?php include '../../Include/showMessages.php';?>


    <h1 class="display-4 text-center">Skladišta Knjiga</h1><hr>

    <div class="row  my-5">

        <div class="col-12">

            <?php if(count($getWarehouses) > 0): ?>
                <div class="card mb-4">
                
                    <table class="table table-hover m-0 ">
                        <thead >
                            <tr>
                                <th>Ime skladišta</th>
                                <th>Adresa</th>
                                <th>Kapacitet skladišta</th>
                                <th>Trenutno u skladištu</th>
                                <th>Grad</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <?php foreach($getWarehouses as $warehouseKey => $warehouse) :?>
                            <tr>
                                <td><?php echo $warehouse->name; ?></td>
                                <td><?php echo $warehouse->address; ?></td>
                                <td><?php echo $warehouse->quantity; ?></td>
                                <td>
                                    
                                    <?php if( count($warehouse->books) > 0 ) :?>
                                        <?php foreach($warehouse->books as $book) :?>

                                            <li>
                                                 <i><?php echo $book->book; ?></i>&nbsp;  (<?php echo $book->language; ?>) - <?php echo $book->bookCopies.' knjiga'; ?>
                                            </li>

                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $warehouse->city; ?></td>
                                <td><a href="updateWarehouse.php?warehouseId=<?php echo $warehouse->id; ?>&warehouseKey=<?php echo $warehouseKey; ?>" class="btn btn-primary btn-sm" id="btn_update_warehouse">Izmeni</a></td>
                                <td><a href="deleteWarehouse.php?id=<?php echo $warehouse->id; ?>" id="deleteWarehouse"  class="btn btn-danger btn-sm">Obriši</a></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <h3>Nema skladišta</h3>
            <?php endif;?>

            <a href="createWarehouse.php" class="btn btn-info" >Napravi Skladište</a>

        </div>

        
        
    </div>
   
</div>


<?php include '../../include/footer.php';?>



<script>

    let deleteBtns = document.querySelectorAll("#deleteWarehouse");

    deleteBtns.forEach(function( btn ){

        btn.addEventListener('click',function(e){

            e.preventDefault();

            alert("Pažnja! Obrisaćete skladište");

        });
        
    });

</script>