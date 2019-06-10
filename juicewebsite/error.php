<?php
   //displays error messages
   session_start();
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>juice laboratory</title>
      <link href="https://fonts.googleapis.com/css?family=Quicksand:100,300,400" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link href="style.css" rel="stylesheet">
   </head>
   <body>
      <header>
         <div class="container">
            <h1 class="logo"><a href="index.html"><img src="images/logo-low.jpg" width=120px alt="logo"/></a></h1>
            <nav>
               <ul>
                  <li><a href="cart.php">Shop</a></li>
                  <li><a href="about.html">About</a></li>
                  <li><a href="contact.html">Contact</a></li>
                  <li><a href="index.php">My Account</a></li>
                  <li><a href="checkout.php">Bag</a></li>
               </ul>
            </nav>
         </div>
      </header>
      <body>
         <div class="container">
            <center>
            <div class="form">
               <div class="title">error</div>
               <p>
                  <?php
                     if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
                         echo $_SESSION['message'];
                     else:
                         header( "location: index.html" );
                     endif;
                     ?>
               </p>
               <a href="index.php"><button class="btn btn-danger"/>go back</button></a>
            </div>
         </div>
         </div>
   </body>
</html>
