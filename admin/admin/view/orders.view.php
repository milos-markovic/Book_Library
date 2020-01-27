
<?php include '../../include/header.php';?>


<div class="container py-5">

<h5><a href="index.php" class="btn btn-link text-dark"><i class="fas fa-arrow-left"></i> Nazad</a></h5>


        <h1 class="display-4 text-center">Porudžbine</h1><hr>
        

        <?php include '../../Include/showMessages.php';?>
  

        <div class="card bg-light my-5">
                <table class="table table-hover m-0 text-center">
                    <thead>
                        <tr>
                            <th>Korisnik</th>
                            <th>Naručio</th>
                            <th>Količine</th>
                            <th>Plaćanje</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($orders as $order) :?>
                        <tr>
                            <td><?php echo $order->user; ?></td>
                            <td><?php echo $order->book; ?></td>
                            <td><?php echo $order->quantity; ?></td>
                            <td><?php echo $order->payment; ?></td>
                            <td><a href="deleteOrder.php?id=<?php echo $order->id; ?>" class="btn btn-danger btn-sm">Obriši</a></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
             
        </div>
   
</div>


<?php include '../../include/footer.php';?>



