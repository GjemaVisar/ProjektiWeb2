<?php
  require("../storeDB.php");
  session_start();
 

  if(isset($_POST['submit'])){
    $pid = $_POST['product_id'];
    $quantity = $_POST['product_quantity'];

    $cookie_name = get_cookie();
    echo $cookie_name;
    
   
    $cart = isset($_COOKIE[$cookie_name]) ? $_COOKIE[$cookie_name] : "[]";
    $cart = json_decode($cart,true);

    $result = mysqli_query($conn,"SELECT * FROM product WHERE pid='".$pid."'");
    $product = mysqli_fetch_assoc($result);
    

    $get_quantity = "SELECT quantity from product WHERE pid = '".$pid."'";
    $quantity_res = mysqli_query($conn,$get_quantity);
    $quantity_limit = mysqli_fetch_assoc($quantity_res);
    $limit = $quantity_limit['quantity'];



    $found = "";
    foreach($cart as &$item) {
      if($item["productId"] == $pid) {
          if($item["quantity"]==$limit){
            $found = true;
            break; 
          }
          else{
            $item["quantity"] += $quantity;
            $found = true;
            break;
          }
      }
  }

  // if product not found, add it to cart
  if(!$found) {
      array_push($cart, array(
          "productId" => $pid,
          "quantity" => $quantity,
          "price" => $product['product_price'],
          "name" => $product['product_name'],
          "description" => $product['product_description'],
          "image" => $product['product_image']
      ));
  }


    setcookie($cookie_name,json_encode($cart),time()+1296000);
    //setcookie($cookie_name,"",time()-1296000);

    header("Location: shop.php");
  }
?>
<html>
<head>
    <title>Buy Games</title>
    <link rel="stylesheet" href="css/shop.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
    <script rel="shop.js"></script>

<!-- 
  - custom css link
-->
<link rel="stylesheet" href="css/style.css">

<!-- 
  - google font link
-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
  href="https://fonts.googleapis.com/css2?family=Oxanium:wght@600;700;800&family=Poppins:wght@400;500;600;700;800;900&display=swap"
  rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    /* Style The Dropdown Button */
    .dropbtn {
      color: white;

      border: none;
      cursor: pointer;
    }
    /*style the alert box */
    .alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
        border: none;
        border-radius: 5px;
        margin-bottom: 15px;
        position: relative;
        }
    .alert .closebtn {
        position: absolute;
        top: 0;
        right: 0;
        color: white;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
        }
    .alert .closebtn:hover {
        color: black;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
      position: relative;
      display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
      background-color: #f1f1f1;
      display: block;
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
      display: block;
    }

  .btn_quantity{
      border: 2px solid #333;
      padding: 5px 10px;
      font-size: 20px;
      font-weight: bold;
      color: #333;
      background-color: #fff;
      transition: all 0.3s ease;
      margin-right: 5px;
}
.btn_quantity::hover{
  background-color: #333;
  color: #fff;
  cursor: pointer;
}

    </style>

</head>

<body>
<header class="header">

    <div class="header-top">
      <div class="container">

        <!-- <div class="countdown-text">
          Exclusive Black Friday ! Offer <span class="span skewBg">10</span> Days
        </div> -->

        <div class="social-wrapper">

          <p class="social-title">Follow us on :</p>

          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-pinterest"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

          </ul>

        </div>

      </div>
    </div>

    <div class="header-bottom skewBg" data-header>
      <div class="container">

        <a href="#" class="logo">Gamics</a>

        <nav class="navbar" data-navbar>
          <ul class="navbar-list">

          <li class="navbar-item">
              <a href="user-page.php" class="navbar-link skewBg" data-nav-link>Home</a>
            </li>

            <li class="navbar-item">
              <a href="shop.php" class="navbar-link skewBg" data-nav-link>Shop</a>
            </li>

            <li class="navbar-item">
              <a href="#blog" class="navbar-link skewBg" data-nav-link>Blog</a>
            </li>

            <li class="navbar-item">
              <a href="#contact" class="navbar-link skewBg" data-nav-link>Contact</a>
            </li>
            
            <!--
            <li class="navbar-item">
              <a href="login.php" class="navbar-link skewBg" data-nav-link>LogIn</a>
            </li>
            -->
            
            <li class="navbar-item">
              <a href="faq-user.php" class="navbar-link skewBg" data-nav-link>FAQ</a>
            </li>

            <li class="navbar-item dropdown" >
              <a href="#" class="navbar-link skewBg dropbtn" data-nav-link>Profile</a>
              <div class="dropdown-content" >
                <a href="update-profile.php">Update Profile</a>
                <a href="change-password.php" >Change Pass</a>
                <a><button type="button" id="deleteAccountBtn">Delete Account</button></a>
                <a href="../admin/logout.php" data-nav-link>Log Out</a>
              </div>
            </li>

            
          </ul>
        </nav>

        <div class="header-actions">

        <a href='shop_cart.php'>
          <button class="cart-btn" aria-label="cart">
            <ion-icon name="cart"></ion-icon>
          </button>
          </a>
          <form action="" class="footer-newsletter">
            <input type="search" name="search products" aria-label="search" placeholder="search products" required
              class="email-field">

            <button type="submit" class="footer-btn" aria-label="submit">
              <ion-icon name="search-outline"></ion-icon>            
            </button>
          </form>

          <!-- 
              Ikona e menus kur te ngushtohet faqja, duhet mu ndreq qe me dal to Home, Blog, Shop...
           -->
          <button class="nav-toggle-btn" aria-label="toggle menu" data-nav-toggler>
            <ion-icon name="menu-outline" class="menu"></ion-icon>
            
            <ion-icon name="close-outline" class="close"></ion-icon>
          </button>

        </div>

      </div>
    </div>

  </header>
  <br></br>
  <br></br>
  <br></br>
  <?php if (isset($_SESSION['error_message'])) { ?>
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <?php echo $_SESSION['error_message']; ?>
        </div>
        <?php unset($_SESSION['error_message']);} ?>
<div class="container mt-5 p-3 rounded cart">
    <div class="row no-gutters">
        <div class="col-md-8">
            <div class="product-details mr-2">
                <div class="d-flex flex-row align-items-center">
                    <i class="fa fa-long-arrow-left"></i>
                    <span class="ml-2"><a href="shop.php">Continue Shopping</a></span>
                </div>
                  <hr>
                <h6 class="mb-0">Shopping cart</h6>
                <div class="d-flex justify-content-between">
                  <?php
                    $totalQuantity = 0;
                    $cookie_name = get_cookie();
                    if(isset($_COOKIE[$cookie_name])){
                        $cookie_data = json_decode($_COOKIE[$cookie_name],true);
                        foreach ($cookie_data as $item) {
                          $totalQuantity += $item['quantity'];
                  }
                }
                  ?>
                  <span>You have <?php echo $totalQuantity;?> items in your cart</span>
                </div>

                <?php  
                     if(isset($_COOKIE[$cookie_name])){
                        foreach($cookie_data as $key=>$value){
                            
                      ?>
                <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                    <div class="d-flex flex-row"><img class="rounded" src=<?php echo $value['image']?> width="40">
                        <div class="ml-2">
                          <span class="font-weight-bold d-block"><?php echo $value['name'];?></span>
                          <span class="spec"><?php echo $value['description'];?></span></div>
                    </div>

                    <div class="d-flex flex-row align-items-center">
                      <span class="d-block"><?php echo $value['quantity'];?></span>
                      <span class="d-block ml-5 font-weight-bold">$<?php echo $value['price']*$value['quantity'];?></span>

                      <form method="Post" action="delete_from_cart.php">
                        <input type="hidden" name="id_to_delete" value="<?php echo $value['productId']?>">
                        <button type="submit" name="delete_item"><i class="fa fa-trash-o ml-3 text-black-50"></i></button>
                      </form>
                    </div>
    
                </div>
                    <?php } 
                  }?>
                <?php
                    $cookie_name = get_cookie();
                    //echo $cookie_name;
                    if(isset($_COOKIE[$cookie_name])){
                      $totalPrice = 0;
                      $cookie_data = json_decode($_COOKIE[$cookie_name],true);
                      foreach ($cookie_data as $item) {
                        $totalPrice += $item['quantity']*$item['price'];
                      }
                      $shipping = 0.03 * $totalPrice;
                    }else{
                      echo "";
                    }
                    
                   
                    
                    ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="payment-info">
                <div class="d-flex justify-content-between align-items-center"><span>Card details</span><img class="rounded" src="https://i.imgur.com/WU501C8.jpg" width="30"></div><span class="type d-block mt-3 mb-1">Card type</span><label class="radio"> <input type="radio" name="card" value="payment" checked> <span><img width="30" src="https://img.icons8.com/color/48/000000/mastercard.png"/></span> </label>

<label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/officel/48/000000/visa.png"/></span> </label>

<label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/ultraviolet/48/000000/amex.png"/></span> </label>


<label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/officel/48/000000/paypal.png"/></span> </label>
            <form method="Post" action="../admin/buy_product.php">
                <div><label class="credit-card-label">Name on card</label><input type="text" class="form-control credit-inputs" placeholder="Name" name="name_card" required></div>
                <div><label class="credit-card-label">Card number</label><input type="text" class="form-control credit-inputs" placeholder="0000 0000 0000 0000" name="card_number" required></div>
                <div class="row">
                    <div class="col-md-6"><label class="credit-card-label">Date</label><input type="text" class="form-control credit-inputs" placeholder="12/24" name="expiry" required></div>
                    <div class="col-md-6"><label class="credit-card-label">CVV</label><input type="text" class="form-control credit-inputs" placeholder="342" name="cvv" required></div>
                </div>
                <hr class="line">
                <div class="d-flex justify-content-between information">
                  <span>Subtotal</span>
                  <span>$<?php if(isset($_COOKIE[$cookie_name])){
                    echo '<input type="hidden" name="price" value='.$totalPrice.'>'.$totalPrice;}?>
                    </span>
                </div>
                <div class="d-flex justify-content-between information">

                  <span>Shipping</span><span>$<?php if(isset($_COOKIE[$cookie_name])){
                    echo "<input type='hidden' name='shipping' value=".$shipping.">".$shipping;}?></span>
                </div>
                <div class="d-flex justify-content-between information">
                  <span>Total(Incl. taxes)</span>
                  <span>$<?php if(isset($_COOKIE[$cookie_name])){
                    echo "<input type='hidden' name='total' value=".$totalPrice+$shipping.">".$totalPrice+$shipping;}?></span>
                </div>
                
                  <button class="btn btn-primary btn-block d-flex justify-content-between mt-3" type="submit" name="buy">
                    <input type="hidden" name="mycookie" value=<?php echo $cookie_name;?>>
                  <span>$<?php if(isset($_COOKIE[$cookie_name])){echo $totalPrice+$shipping;}?></span>
                  <span>Buy<i class="fa fa-long-arrow-right ml-1"></i></span></button></div>
            </form>
        </div>
    </div>
</div>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <?php 
    mysqli_close($conn);
  ?>

    <script>
        var close = document.getElementsByClassName("closebtn");
        var i;
        for (i = 0; i < close.length; i++) {
            close[i].onclick = function(){
                var div = this.parentElement;
                div.style.opacity = "0";
                setTimeout(function(){ div.style.display = "none"; }, 600);
            }
        }
        setTimeout(function() {
            var alertBox = document.querySelector('.alert');
            alertBox.style.display = 'none';
        }, 3000); // Set the duration in milliseconds
    </script>
</body>
</html>
<script src="delete-profile.js" ></script>
