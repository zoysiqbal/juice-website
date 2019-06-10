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
      <div class="center">
         <div class="col-sm-7">
            <div class="title text-center" style="margin:10px;">shipping information</div>
            <div class="row">
               <div class="col-sm-6 form-group">
                  <input class="form-control" id="fullname" name="full name" placeholder="name" type="text" required>
               </div>
               <div class="col-sm-6 form-group">
                  <input class="form-control" id="email" name="email address" placeholder="email address" type="email" required>
               </div>
               <div class="col-sm-6 form-group">
                  <input class="form-control" id="address" name="address" placeholder="address" type="text" required>
               </div>
               <div class="col-sm-6 form-group">
                  <input class="form-control" id="postcode" name="post code" placeholder="post code" type="text" required>
               </div>
               <div class="col-sm-6 form-group">
                  <input class="form-control" id="phonenumber" name="phone number" placeholder="phone number" type="text" required>
               </div>
               <div class="col-sm-2 form-group">
                  <button class="btn btn-primary" type="submit">choose delivery method</button>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
