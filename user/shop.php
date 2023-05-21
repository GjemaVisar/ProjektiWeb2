<?php  
session_start();
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

    .dark-dropdown {
  background-color: #333;
  color: #fff;
  border: 1px solid #fff;
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
              <a href="user-page.php#blog" class="navbar-link skewBg" data-nav-link>Blog</a>
            </li>

            <li class="navbar-item">
              <a href="user-page.php#contact" class="navbar-link skewBg" data-nav-link>Contact</a>
            </li>
            
            <!--
            <li class="navbar-item">
              <a href="login.php" class="navbar-link skewBg" data-nav-link>LogIn</a>
            </li>
            -->
            <?php if(isset($_SESSION['user'])){ ?>
            
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
            
              <?php } ?>
            </ul>
        </nav>

        <div class="header-actions">
        <?php if(isset($_SESSION['user'])){ ?>
        <a href='shop_cart.php'> 
          <button class="cart-btn" aria-label="cart" > 
            
            <ion-icon name="cart"></ion-icon>
          </button>
          </a>
          <?php }else{?>
            <a href='shop_cart.php'> 
          <button class="cart-btn" aria-label="cart" disabled> 
            
            <ion-icon name="cart"></ion-icon>
          </button>
          </a>
          <?php } ?>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="footer-newsletter" methos="GET" id="searchForm">
            <input type="search" name="search" aria-label="search" placeholder="search products" required
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
  <br> 
  
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" id="filterForm">
<select id="categoryDropdown" class="dark-dropdown" name="category">
  <option value="deffault" disabled selected>Category</option>
  <option value="merch">Merch</option>
  <option value="videogame">Videogame</option>
  <option value="console">Console</option>
  <option value="all">All</option>
</select>
</form>
<script>
  $(document).ready(function() {
    // Function to update the product listing based on search or category filter
    function updateProductListing(data) {
      $('.shop-container').html(data);
    }

    // Search form submission
    $('#searchForm').submit(function(event) {
      event.preventDefault(); // Prevent default form submission

      // Get the search query
      var searchQuery = $(this).find('input[name="search"]').val();

      // Perform AJAX request
      $.ajax({
        url: 'search.php',
        type: 'GET',
        data: { search: searchQuery },
        success: function(response) {
          // Handle the response and update the product listing
          updateProductListing(response);
        },
        error: function(xhr, status, error) {
          // Handle any errors
          console.error(error);
        }
      });
    });

    // Category dropdown change event
    $('#categoryDropdown').change(function() {
      var category = $(this).val();

      // Perform AJAX request
      $.ajax({
        url: 'search.php',
        type: 'GET',
        data: { category: category },
        success: function(response) {
          // Handle the response and update the product listing
          updateProductListing(response);
        },
        error: function(xhr, status, error) {
          // Handle any errors
          console.error(error);
        }
      });
    });
  });
</script>

  <br></br>
  
  <div class="shop-container">
  <?php
            require("../storeDB.php");
    
  $get_product = "SELECT * FROM product";

            // Further processing with the SQL query and displaying the products
            // ...
            $result = mysqli_query($conn,$get_product);
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    $product_id = $row['pid'];
                    $category = $row['category'];
                    $product_name = $row['product_name'];
                    $product_price = $row['product_price'];
                    $product_image = $row['product_image'];
                    $product_description = $row['product_description'];
                    $quantity = $row['quantity'];
                    //$cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
                    //$cart = json_decode($cart);
        ?>
        <div class="shop-card2">
                <figure class="card-banner" style="width:300; height: 260;">
                  <img src=<?php echo $product_image;?> width="300" height="260" loading="lazy"
                    alt=<?php echo $product_name; ?> class="img-cover">
                <div class="card-content">
                  <a href="#" class="card-badge skewBg"><?php echo $category;?></a>
                  <h3 class="h3">
                    <a href="#" class="card-title"><?php echo $product_name;?></a>
                  </h3>
                  <div class="card-wrapper">
                    <p class="card-price">$<?php echo $product_price;?></p>
                  <form method="Post" action="shop_cart.php" >
                    <input type="hidden" name="product_id" value="<?php echo $product_id;?>" >
                    <input type="hidden" name="product_quantity" value="1">
                    <?php 
                      $check_quantity = "SELECT quantity from  product where pid = '$product_id'";
                      $res = mysqli_query($conn,$check_quantity);
                      $row = mysqli_fetch_row($res);
                      $value = $row[0];

                      if($value == 0){
                    ?>
                    <p class="card-btn">No more of this item in stock!</p>
                    
                    <?php }else{ ?>
                      <button type="submit" class="card-btn" name="submit">
                      <ion-icon name="basket"></ion-icon>
                    </button>
                    <?php }?>
                  </form>
                  </div>
                  <i style="color:white;"><?php echo $product_description; ?></i>
                </div>
                </figure>
              </div>
    <?php
    }
            }

             mysqli_close($conn); 
                ?>
  



                </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
<script src="delete-profile.js" ></script>
