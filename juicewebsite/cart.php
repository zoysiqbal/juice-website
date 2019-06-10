<?php
   //starts session
   session_start();
   //product ids are stored in an array which will be updated accordingly
   $product_ids = array();
   //session_destroy();

   //checks if 'add to cart' button is working
   if(filter_input(INPUT_POST, 'add_to_cart')){
       if(isset($_SESSION['shopping'])){

           //keeps track of quantity of products in cart
           $count = count($_SESSION['shopping']);

           //creates array to match product ids to array keys
           $product_ids = array_column($_SESSION['shopping'], 'id');

           if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
           $_SESSION['shopping'][$count] = array
               (
                   'id' => filter_input(INPUT_GET, 'id'),
                   'name' => filter_input(INPUT_POST, 'name'),
                   'price' => filter_input(INPUT_POST, 'price'),
                   'quantity' => filter_input(INPUT_POST, 'quantity')
               );
           }
           else {
               //if product already exists, quantity is increased - array key is matched to product id
               for ($i = 0; $i < count($product_ids); $i++){
                   if ($product_ids[$i] == filter_input(INPUT_GET, 'id')){
                       //update quantity of product in array if id previously exists
                       $_SESSION['shopping'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                   }
               }
           }

       }
       else {
           //if shopping cart doesn't exist, create cart with first product id stored in array key 0
           $_SESSION['shopping'][0] = array
           (
               'id' => filter_input(INPUT_GET, 'id'),
               'name' => filter_input(INPUT_POST, 'name'),
               'price' => filter_input(INPUT_POST, 'price'),
               'quantity' => filter_input(INPUT_POST, 'quantity')
           );
       }
   }

   if(filter_input(INPUT_GET, 'action') == 'delete'){
       //loop through all products in the shopping cart until id matches
       foreach($_SESSION['shopping'] as $key => $product){
           if ($product['id'] == filter_input(INPUT_GET, 'id')){
               //remove product from the shopping cart when it matches with the product id
               unset($_SESSION['shopping'][$key]);
           }
       }
       //reset session array
       $_SESSION['shopping'] = array_values($_SESSION['shopping']);
   }

   function pre_r($array){
       echo '<pre>';
       print_r($array);
       echo '</pre>';
   }
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
      <div class="container">
         <?php
            //connection to database is established
            $connect = mysqli_connect('localhost', 'root', 'root', 'shopping');

            //appropriate query is established
            $query = 'SELECT * FROM products ORDER by id ASC';
            $result = mysqli_query($connect, $query);

            if ($result):
                if(mysqli_num_rows($result)>0):
                    while($product = mysqli_fetch_assoc($result)):
                    ?>
         <div class="col-sm-3 col-md-4" >
            <form method="post" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
               <div class="products">
                  <center>
                     <!--values from database construct the product page-->
                     <img src="<?php echo $product['image']; ?>" class="img-responsive" />
                     <h4 class="text-info"><?php echo $product['name']; ?></h4>
                     <h4>£ <?php echo $product['price']; ?></h4>
                     <input type="text" name="quantity" class="form-control" value="1" />
                     <input type="hidden" name="name" value="<?php echo $product['name']; ?>" />
                     <input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
                     <input type="submit" name="add_to_cart" style="margin:10px;" class="btn btn-danger" value="add to cart"/>
                  </center>
               </div>
            </form>
         </div>
         <?php
            endwhile;
            endif;
            endif;
            ?>
        <!--shopping cart is created in the form of a table-->
         <div style="clear:both"></div>
         <div class="table-responsive">
            <table class="table">
               <tr>
                  <th colspan="5">
                     <h3>order details</h3>
                  </th>
               </tr>
               <tr>
                  <th class="title" width="30%">product name</th>
                  <th class="title" width="20%">quantity</th>
                  <th class="title" width="20%">price</th>
                  <th class="title" width="15%">total</th>
                  <th class="title" width="5%">remove?</th>
               </tr>
               <?php
                  if(!empty($_SESSION['shopping'])):

                       $total = 0;

                       foreach($_SESSION['shopping'] as $key => $product):
                  ?>
               <tr>
                  <td><?php echo $product['name']; ?></td>
                  <td><?php echo $product['quantity']; ?></td>
                  <td>£ <?php echo $product['price']; ?></td>
                  <td>£ <?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>
                  <td>
                     <a href="cart.php?action=delete&id=<?php echo $product['id']; ?>">
                     <button class="btn btn-danger">remove?</button>
                     </a>
                  </td>
               </tr>
               <?php
                  $total = $total + ($product['quantity'] * $product['price']);
                  endforeach;
                  ?>
               <tr>
                  <td colspan="3" align="right">total</td>
                  <td align="right">£ <?php echo number_format($total, 2); ?></td>
                  <td></td>
               </tr>
               <tr>
                  <!--checkout button shows if shopping cart has items in it -->
                  <td colspan="5">
                     <?php
                        if (isset($_SESSION['shopping'])):
                        if (count($_SESSION['shopping']) > 0):
                        ?>
                     <center><a href="checkout.php" class="btn btn-danger">checkout</a></center>
                     <?php endif; endif; ?>
                  </td>
               </tr>
               <?php
                  endif;
                  ?>
            </table>
         </div>
      </div>
   </body>
</html>
