<?php include '../include/header.php';?>


   
    <div class="card w-25 mx-auto mt-5 border border-secondary card-shadow" id="login" >
        <h5 class="card-header text-center bg-secondary text-warning">Login: </h5>
        <div class="card-body ">

            <?php include '../include/showMessages.php'; ?>
           
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" <?php echo oldInput('email'); ?> >
                </div>
                <div class="form-group">
                    <label for="name">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" <?php echo oldInput('password'); ?> >
                </div>
                <div class="form-group text-center">
                    <input type="submit" name="login" value="Login" class="btn btn-outline-primary">
                </div>
            </form>
        </div>
    </div>



<?php include '../include/footer.php';?>

