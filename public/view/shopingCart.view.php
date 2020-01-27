


<div class="card bg-dark">
    <table class="table table-bordered text-warning my-4 w-100">
        <thead class="text-center">
            <th></th>
            <th>Naziv Knjige</th>
            <th>Autori</th>
            <th>Broj strana</th>
            <th>Povez</th>
            <th>Količina</th>
            <th>Cena</th>
            <th>Ukupna Cena</th>
            <th></th>
        </thead>
        <tbody class="text-center">
            <?php foreach($getProductsFromShopingCart as $product) :?>
                <tr>           
                    <td><img src="../asets/book_img/<?php echo $product->img; ?>" class="img-fluid" alt="product-image" style="height: 100px;"></td>
                    <td><?php echo $product->name; ?></td>
                    <td>
                        <?php foreach($product->autors as $autor): ?>
                            <?php echo $autor->autor; ?><br>
                        <?php endforeach; ?>
                    </td>
                    <td><?php echo $product->page_number; ?></td>
                    <td><?php echo $product->binding; ?></td>
                    <td><?php echo $product->quantity; ?></td>
                    <td><?php echo $product->price; ?></td>
                    <td><?php echo $product->price * $product->quantity; ?></td>
                    <td><a href="deleteShopingCardProduct.php?id=<?php echo $product->id; ?>&bookId=<?php echo $getBook->id; ?>" class="text-danger"><i class="fas fa-times fa-2x"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <table class="table table-bordered text-warning my-4 w-100 mb-5">
        <thead class="text-center">
            <th></th>
            <th>Naručio</th>
            <th>Email</th>
            <th>Telefon</th>
        </thead>
        <tbody class="text-center">
             <td><img src="../asets/user_img/<?php echo $getUser->img; ?>" class="img-fluid" style="height: 100px; " /></td>
             <td><?php echo $getUser->first_name.' '.$getUser->last_name; ?></td>
             <td><?php echo $getUser->email; ?></td>
             <td><?php echo $getUser->phone; ?></td>               
        </tbody>
    </table>

    <div class="card w-25 bg-transparent text-warning mb-5 mt-3">
        <label for="payment">Vrsta plaćanja: </label>
        <select name="payment" id="payment" class="form-control">
            <?php foreach( $peymentTypes as $peymentType ) :?>
                <option value="<?php echo $peymentType->id; ?>"><?php echo $peymentType->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="card w-50  bg-transparent">
        <div class="card-body">
            <h6 class="card-title text-warning">Napomena: </h6>
            <textarea name="note" id="note" class="form-control" cols="30" rows="4" placeholder="Unesite napomenu vezanu za vašu kupovinu"></textarea>
            <span class="text-warning">* Nije obavezno polje</span>
        </div> 
    </div>

    <div class="card w-25 ml-auto">
        <div class="card-header text-center bg-primary text-light">
            <h5 class="font-weight-bold m-0">Ukupno: </h5>
        </div>
        <div class="card-body">
            <ul class="list-group">

                <?php $total = 0; ?>

                <?php foreach( $getProductsFromShopingCart as $product ) :?>

                    <?php 
                        $perBook = $product->price * $product->quantity; 
                        $total += $perBook; 
                    ?>

                    <li class="list-group-item text-center">
                        <b><?php echo $product->name; ?></b><br> 
                        <?php echo $product->price.' dinara X '.$product->quantity; ?>
                    </li>
                <?php endforeach; ?>
                
                <li class="list-group-item text-center border bg-light text-danger">
                    <b><?php echo 'Ukupno: '.$total.' dinara'; ?></b>
                </li>
            </ul>
        </div>
    </div>

</div>







