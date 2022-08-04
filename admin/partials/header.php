
<?php
require 'config/database.php';

//fetch current user from database

if(isset($_SESSION['user-id'])){
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);
    
}

//check login status
if(!isset($_SESSION['user-id'])) {
    header('location:' . ROOT_URL . 'signin.php');
    die();
}


?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Php and Mysql project</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,500;0,600;0,700;0,900;1,300&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    </head>

    <body>
        <nav>
            <div class="container nav_container">
                <a href="<?= ROOT_URL ?>" class="nav_logo">Shree</a>

                <ul class="nav_items">
                    <li><a href="<?= ROOT_URL ?>blog.php">Blog</a></li>
                    <li><a href="<?= ROOT_URL ?>about.php">About</a></li>
                    <li><a href="<?= ROOT_URL ?>services.php">Servies</a></li>
                    <li><a href="<?= ROOT_URL ?>contact.php">Contact</a></li>
                    <?php if(isset($_SESSION['user-id'])): ?>
                    <li class="nav_profile">
                        <div class="avatar">
                            <img src="<?= ROOT_URL . 'images/' . $avatar['avatar'] ?>">
                        </div>
                        <ul>
                            <li><a href="<?= ROOT_URL ?>admin/index.php">Dashboard</a></li>
                            <li><a href="<?= ROOT_URL ?>logout.php">Logout</a></li>
                        </ul>
                    </li>
                    <?php else : ?>
                    <li><a href="<?= ROOT_URL ?>signin.php">Sign In</a></li>
                        <?php endif ?>
                </ul>
                <button id="open_nav_btn"><i class="uil uil-bars"></i></button>
                <button id="close_nav_btn"><i class="uil uil-multiply"></i></button>
            </div>

            </div>
        </nav>
        <!-- end of navbar -->