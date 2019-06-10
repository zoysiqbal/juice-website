<?php
   //requires connection to database in separate file
   require 'db.php';
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
      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
      <script src="js/index.js"></script>
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
      <?php
         if ($_SERVER['REQUEST_METHOD'] == 'POST')
         {
             //user logging in
             if (isset($_POST['login'])) {

                 require 'login.php';

             }

             //user registering account
             elseif (isset($_POST['register'])) {

                 require 'register.php';

             }
         }
         ?>
      <body>
         <div class="center">
            <div class="col-sm-3">
               <div class="row">
                  <div class="panel">
                     <center>
                     <div class="title">log in</div>
                     <div class="panel-body">
                        <form class="form" action="index.php" method="post" enctype="multipart/form-data" autocomplete="on">
                           <input type="email" placeholder="email address" name="loginemail" required /><br>
                           <div style="margin-top:5px">
                              <input type="password" placeholder="password" name="loginpassword" autocomplete="new-password" required /><br>
                           </div>
                           <div style="margin-top:5px">
                              <input type="submit" value="login" name="loginregister" class="btn btn-primary" />
                           </div>
                           <div style="margin-top:5px">
                              <div class="reminder">
                                 <p><a href="forgot.php">forgotten your password?</a></p>
                              </div>
                        </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="center">
            <div class="col-sm-3">
               <div class="row">
                  <div class="panel">
                     <center>
                     <div class="title">create an account</div>
                     <div class="panel-body">
                        <form class="form" action="index.php" method="post" enctype="multipart/form-data" autocomplete="off">
                           <input type="text" placeholder="full name" name="fullname" required /><br>
                           <div style="margin-top:5px">
                              <input type="email" placeholder="email address" name="email" required /><br>
                           </div>
                           <div style="margin-top:5px">
                              <input type="password" placeholder="password" name="password" autocomplete="new-password" required /><br>
                           </div>
                           <div style="margin-top:5px">
                              <input type="submit" value="register" name="register" class="btn btn-primary" />
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </body>
</html>
