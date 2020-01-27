<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

   
    <link rel="stylesheet" href="<?php echo ROOT; ?>/asets/css/bootstrap/bootstrap.min.css" > 

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link href="<?php echo ROOT; ?>/asets/icons/css/all.css" rel="stylesheet"> <!--load all styles -->
    <script defer src="<?php echo ROOT; ?>/asets/icons/js/all.js"></script> <!--load all styles -->
    
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    
   
    <link rel="stylesheet" href="<?php echo ROOT; ?>/asets/css/stil.css">
</head>
<body>
    <header>

        <nav class="navbar navbar-expand-lg navbar-dark text-white plava-pozadina">
            <div class="container">
                <a class="navbar-brand" href="<?php echo ROOT; ?>"><img src="<?php echo ROOT ?>/asets/img/dbllogosml_1.png" alt="Digital Book Library"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                    <?php if(!isset($_SESSION['userId'])):?>

                        <li class="nav-item">
                                <a class="nav-link" href="<?php echo ROOT; ?>/public/register.php">Registracija</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link" href="<?php echo ROOT; ?>/public/login.php">Pristup</a>
                        </li>

                    <?php else: ?>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                
                                    <?php $loginUser = $user->getUser( $_SESSION['userId']); ?>
                                    <img src="<?php echo !empty($loginUser->img) ? '../../asets/user_img/'.$loginUser->img : '../../asets/user_img/default_avatar.png'; ?>" alt="user image" class="login_user_img">&nbsp; 
                                    <?php echo $_SESSION['name'];?>

                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo ROOT.'/admin/admin/editUserProfile.php'; ?>">Korisnikov Profil</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo ROOT.'/public/logout.php'; ?>">Logout</a>
                                </div>
                            </li>

                    <?php endif;?>
                    </ul>
                    
                </div>
            </div>
        </nav>      
    </header>

    <main>
        
