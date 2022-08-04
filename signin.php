<?php

require 'config/constants.php';

$username_email = $_SESSION['signin-data']['username_email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;
unset($_SESSION['signin-data']);


?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Full Projectt</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,500;0,600;0,700;0,900;1,300&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="<?= ROOT_URL?>css/style.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    </head>

    <body>
      
<section class="form_section">
    <div class="container form_section-container">
        <h2>Sign In</h2>
        <?php 
            if(isset($_SESSION['signup-success'])) :
        ?>
        <div class="alert_message success">
            <p>
            <?= $_SESSION['signup-success'];
            unset($_SESSION['signup-success']);?>
            </p>    
    </div>
        <?php elseif(isset($_SESSION['signin'])) : ?>
            <div class="alert_message error">
            <p>
            <?= $_SESSION['signin'];
            unset($_SESSION['signin']);?>
            </p>    
    </div>
    <?php endif ?>
        <form action="<?= ROOT_URL ?>signin-logic.php" method="POST">
            
            <input type="text" name="username_email" value="<?= $username_email ?> "placeholder="Email">
            <input type="password" name="password" value="<?php $password ?>" placeholder="Password">
            <button type="submit" name="submit" class="btn">Sign In</button>
            <small>Dont have an account? <a href="<?= ROOT_URL ?>signup.php">Sign Up</a></small>
        </form>
    </div>
</section>
</body>
</html>