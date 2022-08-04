<?php
session_start();

require 'config/database.php';


//get signup date if clicked

if (isset($_POST['submit'])) {
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];

    //validate input values
    if (!$firstname) {
        $_SESSION['signup'] = "Please Enter Your First Name";
    } elseif (!$lastname) {
        $_SESSION['signup'] = "Please Enter Your Last Name";
    } elseif (!$username) {
        $_SESSION['signup'] = "Please Enter Your username Name";
    } elseif (!$email) {
        $_SESSION['signup'] = "Please Enter Your Valid Email";
    } elseif (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['signup'] = "Please Enter Your First Name";
    } elseif (!$avatar['name']) {
        $_SESSION['signup'] = "Please add avatar";
    } else {
        // check uf password dont match
        if ($createpassword !== $confirmpassword) {
            $_SESSION['signup'] = "Password do not match";
        } else {
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);

            //check if username or email already exist in database
            $user_check_query = "SELECT * FROM users WHERE
            username = '$username' OR email= '$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if (mysqli_num_rows($user_check_result) > 0) {
                $_SESSION['signup'] = "Username or Email already exist";
            } else {
                //work on avatar
                //rename the avatar
                $time = time(); //make each image unique
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = 'images/' . $avatar_name;

                //checking file type
                $allowed_files = ['png', 'jpg', 'jpeg'];
                $extention = explode('.', $avatar_name);
                $extention = end($extention);
                if (in_array($extention, $allowed_files)) {
                    //image size(1mb+)
                    if ($avatar['size'] < 1000000) {
                        //upload avatar
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    } else {
                        $_SESSION['signup'] = "File size too big. Should be less than 1mb";
                    }
                } else {
                    $_SESSION['signup'] = "File should be png,jpg or jpeg";
                }
            }
        }
    }

    //redirect back to signup page 
    if (isset($_SESSION['signup'])) {
        //pass form data back to signup page
        $_SESSION['signup_data'] = $_POST;
        header('location:' . ROOT_URL . 'signup.php');

        die();
    } else {
        $insert_user_query = "INSERT INTO users SET firstname='$firstname',lastname='$lastname',username='$username',email='$email',password='$hashed_password',avatar='$avatar_name',is_admin=0";
        $insert_user_query = mysqli_query($connection, $insert_user_query);
        if (!mysqli_errno($connection)) {
            //redirect to logic page with success message
            $_SESSION['signup-success'] = "Registration successful. Please log in";
            header('location:' . ROOT_URL . 'signin.php');
            die();
        }
    }
} else {
    //if button is not clicked
    header('location: ' . ROOT_URL . 'signup.php');
    die();
}
