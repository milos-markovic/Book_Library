
<?php include '../../include/header.php';?>

<div class="container py-5">


    <h2 class="text-center mb-5 display-4">Lista Vaših Porudžbina</h2>

    <div class="card">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Korisnik</th>
                    <th>Naručio</th>
                    <th>Količina</th>
                    <th>Napomena</th>
                    <th>Plaćanje</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach( $orders as $order ) :?>
                    <tr>
                        <td><?php echo $order->user;  ?></td>
                        <td><?php echo $order->book; ?></td>
                        <td><?php echo $order->quantity; ?></td>
                        <td><?php echo $order->coments;  ?></td>
                        <td><?php echo $order->payment; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>    


</div>

<?php include '../../include/footer.php';?>