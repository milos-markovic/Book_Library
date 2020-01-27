<?php include '../../include/header.php';?>


<div class="container py-5">

    <h5><a href="menuLinks.php?titleId=<?php echo $link->menu_title_id; ?>" class="btn btn-link text-dark"><i class="fas fa-arrow-left"></i> Nazad</a></h5>

    <?php require '../../include/showMessages.php'; ?>


    <h1 class="display-4 text-center mb-5">Izmeni Link: <?php echo $link->title; ?></h1>

    <div class="row">
    
        <div class="col-md-6 mx-auto">
        
            <form action="" method="POST">

                <input type="hidden" name="linkId" value="<?php echo $link->id; ?>" >
                <input type="hidden" name="titleId" value="<?php echo $link->menu_title_id; ?>" >
                
                <div class="form-group">
                    <label for="">Link title:</label>
                    <input type="text" name="title" id="title" class="form-control" value="<?php echo $link->title; ?>" >
                </div>
                <div class="form-group">
                    <label for="">Link:</label>
                    <input type="text" name="link" id="link" class="form-control" value="<?php echo $link->link; ?>" >
                </div>
                <div class="form-group text-center">
                    <input type="submit" name="update_link" value="Izmeni" class="btn btn-primary">
                </div>
            </form>

        </div>
    
    </div>
   
   
</div>
