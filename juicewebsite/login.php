<?php

//escape email to protect against sql injections
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

if ( $result->num_rows == 0 ){
    //user doesn't exist in database
    $_SESSION['message'] = "user with that email doesn't exist";
    header("location: error.php");
}
else {
    //user exists in database
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {

        $_SESSION['email'] = $user['email'];
        $_SESSION['active'] = $user['active'];

        //user has logged in
        $_SESSION['logged_in'] = true;
        header("location: welcomeuser.php");
    }
    else {
        $_SESSION['message'] = "wrong password entered; please try again!";
        header("location: error.php");
    }
}
