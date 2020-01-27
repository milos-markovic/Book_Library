



<?php if(isset($errors)): ?>

    <ul class="alert alert-danger mb-3 pl-5" id="validate_errors">

        <?php foreach($errors as $error): ?>

            <li><?php echo $error; ?></li>

        <?php  endforeach; ?>
            
    </ul>

<?php endif;?>




<?php $message = $session->getMessage(); ?>

<?php if(isset($message)): ?>

    <div class="alert alert-info border border-light my-3"  id="messages" role="alert">
        <?php echo $message; ?>
    </div>

  <?php  $session->destroyMessage(); ?>
<?php endif; ?>