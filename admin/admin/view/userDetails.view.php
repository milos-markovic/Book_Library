
<?php include '../../include/header.php';?>

<div class="container py-5">

    <h5><a href="users.php" class="btn btn-link text-dark"><i class="fas fa-arrow-left"></i> Nazad</a></h5>


    <div class="card border mt-4 mb-5">
        <div class="card-header p-0 ">
            <h1 class="display-4 bg-secondary text-warning m-0 p-4 text-center">Detalji korisnika: <?php echo $userDetails->first_name.' '.$userDetails->last_name;?> </h1>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Korisničko ime:</strong>&nbsp;  <?php echo $userDetails->username;?></li>
            <li class="list-group-item"><span class="userDetails_title">Adrese:</span> 
                <ul>
                    <?php foreach($userDetails->addresses as $address):?>
                        <li><?php echo "$address->street, <strong>$address->city</strong>, $address->country"; ?></li>
                  
                    <?php endforeach;?>
                </ul>
            </li>
            <li class="list-group-item"><strong>Telefon: </strong>&nbsp; <?php echo $userDetails->phone;?></span></li>
            <li class="list-group-item"><strong>Datum rodjenja:</strong>&nbsp;  <?php echo formatDate($userDetails->date_of_birth);?></li>
            <li class="list-group-item"><strong>Datum kreiranja:</strong>&nbsp;  <?php echo formatDateTime($userDetails->created_at);?></li>
            <li class="list-group-item"><strong>Datum izmene:</strong>&nbsp;  <?php echo formatDateTime($userDetails->updated_at);?></li>
            <li class="list-group-item"><strong>Clanarina:</strong>&nbsp;  <?php echo $userDetails->membership;?></li>
        </ul>
    </div>
   
</div>

<?php include '../../include/footer.php';?>




