<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

   
    <link rel="stylesheet" href="<?php echo ROOT; ?>/asets/css/bootstrap/bootstrap.min.css" > 

 <!-- <link rel="stylesheet" href="http://localhost/Book_Library/asets/css/jquery.datetimepicker.min.css"> -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo ROOT; ?>/asets/css/owl-carousel/owl.carousel.min.css"/>
    <link rel="stylesheet" href="<?php echo ROOT; ?>/asets/css/owl-carousel/owl.theme.default.min.css">

    <link href="<?php echo ROOT; ?>/asets/icons/css/all.css" rel="stylesheet"> <!--load all styles -->
    <script src="<?php echo ROOT; ?>/asets/icons/js/all.js"></script> <!--load all styles -->

    <link rel="stylesheet" href="<?php echo ROOT; ?>/asets/css/stil.css">

</head>
<body>
    <header>
        <div id="header-top" class="plava-pozadina">
            <div class="container"> 
                <div class="row justify-content-between" style="height: 80px;">
                    <div class="brand col-2 align-self-center pl-0" style="position:relative; z-index: 10;">
                        <a class="navbar-brand" href="<?php echo ROOT; ?>"><img src="<?php echo ROOT ?>/asets/img/dbllogosml_1.png" alt="Digital Book Library"></a>
                    </div>
                    <div class="search col-5 align-self-center mt-2">
                        <label class="sr-only" for="inlineFormInputGroup">Username</label>
                        <div class="input-group mb-2 w-100" style="position: relative;">
                            <div class="input-group-prepend">
                                <div class="input-group-text text-danger"><i class="fas fa-search fa-lg"></i></div>
                            </div>
                            <input type="text" class="form-control" id="search" placeholder="Pronađi Knjigu" >
                            <div class="searchResults" style="position: absolute;top:40px; z-index: 1;">
                            
                            </div> 
                        </div>
                            
                    </div>
                    <div class="col-2 align-self-center mb-1">
                        <?php if( !isset($_SESSION['userId']) ): ?>
                            <a href="<?php echo ROOT; ?>/public/login.php" class="text-white">Login</a> &nbsp;
                            <a href="<?php echo ROOT; ?>/public/register.php" class="text-white">Register</a>
                        <?php else: ?>
                            <?php $user_usertype = $user->getUsertype(); ?>
                            
                            <?php if( $user_usertype === 'admin' ) :?>

                                <a href="<?php echo ROOT; ?>/admin/admin/index.php" class="btn btn-outline-light">Admin Deo</a>

                            <?php elseif( $user_usertype === 'moderator' ) :?>

                                <a href="<?php echo ROOT; ?>/admin/moderator/index.php" class="btn btn-outline-light">Admin Deo</a>

                            <?php elseif( $user_usertype === 'user' ) :?>

                                <a href="<?php echo ROOT; ?>/admin/user/index.php" class="btn btn-outline-light">Admin Deo</a>

                            <?php endif; ?>

                        <?php endif; ?>
                    </div>
                    <div class="col-1 align-self-center ml-0 mb-1" style="position:relative;">
   
                        <span class="text-light font-weight-bold" style="position:absolute; top:-10px; right: 25px; z-index:5;">
                            <?php echo !empty( $_SESSION['shopingCartProducts'] ) ? count( $_SESSION['shopingCartProducts'] ) : 0; ?>
                        </span>

                        <a href="#" class="cart"  data-toggle="modal" data-target=".bd-example-modal-xl" ><i class="fas fa-cart-arrow-down fa-2x"></i></a>
                    </div>   
                </div>          
            </div>
        </div>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container justify-content-between">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">

                        <?php $topMenuItems = $menu->getTopMenuItems(); ?>

                        <?php foreach($topMenuItems as $menuItem) :?>
                            <li class="nav-item active">
                                <a class="nav-link text-primary menu_item" href="<?php echo $menuItem->link; ?>"><?php echo $menuItem->name; ?> </a>
                            </li>
                        <?php endforeach; ?>
                        
                    </ul>
                </div> 
                <div>
                    <a href="" class="social-icon"><i class="fab fa-facebook-f fa-lg"></i></a>
                    <a href="" class="social-icon"><i class="fab fa-twitter fa-lg"></i></a>
                    <a href="" class="social-icon"><i class="fab fa-youtube fa-lg"></i></a>
                    <a href="" class="social-icon"><i class="fab fa-google-plus-g fa-lg"></i></a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        
        