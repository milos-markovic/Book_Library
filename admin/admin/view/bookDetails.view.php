
<?php include '../../include/header.php';?>


<div class="container py-5 mb-3">

    <h5><a href="books.php" class="btn btn-link text-dark"><i class="fas fa-arrow-left"></i> Nazad</a></h5>


    <blockquote class="blockquote text-center mb-5">
        <h2 class="mb-0">Detalji Knjige: <?php echo $bookDetails->name; ?></h2>
        <footer class="blockquote-footer d-flex justify-content-center">
            <span>Napisali:&nbsp; </span> <span>
                                        <?php foreach($bookDetails->autors as $autor):?>
                                            <?php echo $autor->autor.', ' ; ?><br>
                                        <?php endforeach;?>
                                    </span>
        </footer>
    </blockquote>


    <div class="card">
        <table class="table table-hover m-0">
            <thead class="bg-warning">
                <tr>
                    <th></th>
                    <th>Autor</th>
                    <th>Datum Rođenja</th>
                    <th>Biografija</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($bookDetails->autors as $autor):?>
                    <tr>
                        <td><img src="../../asets/autor_img/<?php echo $autor->img; ?>" alt="slika autora" class="rounded img-fluid autor_img"></td>
                        <td><?php echo $autor->autor; ?></td>
                        <td><?php echo $autor->date_of_birth; ?></td>
                        <td><?php echo showMore($autor->biography); ?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>

    <div class="card my-5">
        <table class="table table-hover m-0">
            <thead class="bg-warning">
                <tr>
                    <th>Dostupno na jeziku</th>
                    <th>Cena</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $bookDetails->language->name; ?></td>
                    <td><?php echo $bookDetails->price; ?> dinara</td>
                </tr>
            </tbody>
        </table>
    </div>

    <?php if( count($bookDetails->warehouses) ) :?>
        <div class="card mb-5">
            <table class="table table-hover m-0">
                <thead class="bg-warning">
                    <tr>
                        <th>Naziv skladišta</th>
                        <th>Adresa</th>
                        <th>Grad</th>
                        <th>Kapacitet skladišta</th>
                        <th>Dostupno kopija</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($bookDetails->warehouses as $warehouse):?>
                        <tr>
                            <td><?php echo $warehouse->name; ?></td>
                            <td><?php echo $warehouse->address; ?></td>
                            <td><?php echo $warehouse->city; ?></td>
                            <td><?php echo $warehouse->quantity.' knjiga'; ?></td>
                            <td><?php echo ($warehouse->number_of_book_copies != "" ) ? $warehouse->number_of_book_copies.' knjiga' : 'Nema kopija'; ?></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

 
</div>


<?php include '../../include/footer.php';?>



