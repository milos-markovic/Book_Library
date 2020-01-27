
<?php include '../../include/header.php';?>


<div class="container py-5">

    <h5><a href="index.php" class="btn btn-link text-dark"><i class="fas fa-arrow-left"></i> Nazad</a></h5>

    <?php include '../../include/showMessages.php'; ?>

    <h1 class="display-4 mb-4 text-center">Korisnici</h1><hr>

    <div class="card mt-5">
        <table class="table table-hover text-center m-0" >
            <thead>
                <tr>
                    <th></th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Email</th>
                    <th>Tip korisnika</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><img class="user_img rounded" src="<?php echo !empty($user->img) ? '../../asets/user_img/'.$user->img : '../../asets/user_img/default_avatar.png' ;?>" /></td>
                        <td><?php echo $user->first_name; ?></td>
                        <td><?php echo $user->last_name; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td><strong> <?php echo $user->usertype; ?> </strong></td>
                        <td><a href="userDetails.php?id=<?php echo $user->id;?>">Detalji</a></td>
                        <td><a class="btn btn-primary btn-sm" href="editUser.php?id=<?php echo $user->id; ?>">Izmeni</a></td>
                        <td><a class="btn btn-danger btn-sm" href="deleteUser.php?id=<?php echo $user->id; ?>">Obrisi</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <a href="createUser.php" class="btn btn-primary mt-4 mb-5" >Napravite Korsnika</a>
   
</div>


<?php include '../../include/footer.php';?>



