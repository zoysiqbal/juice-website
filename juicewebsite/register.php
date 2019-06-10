<?php
//registration process allows user to be inserted into database

//sets session variables
$_SESSION['email'] = $_POST['email'];
$_SESSION['full_name'] = $_POST['fullname'];

//escapes variables to protect against sql injections
$full_name = $mysqli->escape_string($_POST['fullname']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );

//check if user with that email already exists
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

//if rows returned is more than 0, the email already exists
if ( $result->num_rows > 0 ) {

    $_SESSION['message'] = 'this user already exists; try logging in instead';
    header("location: error.php");

}
else {

    //email doesn't exist
    $sql = "INSERT INTO users (full_name, email, password, hash) "
            . "VALUES ('$full_name','$email','$password', '$hash')";

    //adds user to the database
    if ( $mysqli->query($sql) ){

        $_SESSION['active'] = 0;
        //user has logged in
        $_SESSION['logged_in'] = true;
        $_SESSION['message'] =

        header("location: welcome.php");

    }

    else {
        $_SESSION['message'] = 'uh oh; registration failed - please try again';
        header("location: error.php");
    }

}
