<?php 

@include 'storeDB.php';

session_start();

$user_name = isset($_SESSION['user']) ? $_SESSION['user'] : null;
$id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if ($user_name !== null && $id !== null) {
  // User is logged in, display their name
  echo '<span style="color: white;">Welcome, ' . $user_name . '</span>';
} else {
  // User is not logged in
  echo '<span style="color: white;">Please log in to access this page</span>';
  // You can redirect to the login page here if desired
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gamics - Create Manage Matches(User Page)</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->


  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@600;700;800&family=Poppins:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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

    </style>
  <!-- 
    - preload images
  -->
</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header"style="color:black;">

    <div class="header-top" >
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
      <div >
        <h3><?php echo "Welcome ".$user_name." !";?></h3>
      </div>
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
                <a href="admin/logout.php" data-nav-link>Log Out</a>
              </div>
            </li>

          </ul>
        </nav>

        <div class="header-actions">
        <a href='shop_cart.php'>
          <button class="cart-btn" aria-label="cart">
            <ion-icon name="cart"></ion-icon>
            <span class="cart-badge">0</span>
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



  <main>
    <article>

      <!-- 
        - #HERO
      -->
      

      <section class="section hero" id="home" aria-label="home"
        style="background-image: url('https://cdn.mos.cms.futurecdn.net/84CvByk739yh2zzP6bZZm8.jpg')">
        <div class="container">

          <div class="hero-content">

            <p class="hero-subtitle">World Gaming</p>

            <h1 class="h1 hero-title">
              Buy. <span class="span">Play.</span>Enjoy.
            </h1>

            <p class="hero-text">
              Enjoy shopping for the newest games and consoles !
            </p>

          </div>

        </div>
      </section>





      <!-- 
        - #BRAND
      -->

      <section class="section brand" aria-label="brand">
        <div class="container">

          <ul class="has-scrollbar">

            <li class="brand-item">
              <img src="assets/images/brand-1.png" width="90" height="90" loading="lazy" alt="brand logo">
            </li>

            <li class="brand-item">
              <img src="assets/images/brand-2.png" width="90" height="90" loading="lazy" alt="brand logo">
            </li>

            <li class="brand-item">
              <img src="assets/images/brand-3.png" width="90" height="90" loading="lazy" alt="brand logo">
            </li>

            <li class="brand-item">
              <img src="assets/images/brand-4.png" width="90" height="90" loading="lazy" alt="brand logo">
            </li>

            <li class="brand-item">
              <img src="assets/images/brand-5.png" width="90" height="90" loading="lazy" alt="brand logo">
            </li>

            <li class="brand-item">
              <img src="assets/images/brand-6.png" width="90" height="90" loading="lazy" alt="brand logo">
            </li>

          </ul>

        </div>
      </section>





      <div class="section-wrapper">

        <!-- 
          - #LATEST GAME
        -->

        <section class="section latest-game" aria-label="latest game">
          <div class="container">

            <p class="section-subtitle"> </p>

            <h2 class="h2 section-title">
             <span class="span">BUY PS3 / PS4 / PS5</span>
            </h2>

            <ul class="has-scrollbar">

              <li class="scrollbar-item">
                <div class="latest-game-card">

                  <figure class="card-banner img-holder" style="--width: 400; --height: 470;">
                    <img src="https://www.trustedreviews.com/wp-content/uploads/sites/54/2009/09/11972-ps3controllerangleb-1.jpg" width="400" height="470" loading="lazy"
                      alt="White Walker Daily" class="img-cover">
                  </figure>

                  <div class="card-content">

                    <a href="#" class="card-badge skewBg">PS3</a>

                    <h3 class="h3">
                      <a href="#" class="card-title">Sony 3 <span class="span">32 GB</span></a>
                    </h3>

                    <p class="card-price">
                      Price : <span class="span">260 $ </span>
                    </p>

                  </div>

                </div>
              </li>

              <li class="scrollbar-item">
                <div class="latest-game-card">

                  <figure class="card-banner img-holder" style="--width: 400; --height: 470;">
                    <img src="https://m.media-amazon.com/images/I/41sN+-1hRsL._AC_UF894,1000_QL80_.jpg" width="400" height="470" loading="lazy"
                      alt="White Walker Daily" class="img-cover">
                  </figure>

                  <div class="card-content">

                    <a href="#" class="card-badge skewBg">PS4</a>

                    <h3 class="h3">
                      <a href="#" class="card-title">SONY 4 <span class="span"></span></a>
                    </h3>

                    <p class="card-price">
                      Price: <span class="span">430 $</span>
                    </p>

                  </div>

                </div>
              </li>

              <li class="scrollbar-item">
                <div class="latest-game-card">

                  <figure class="card-banner img-holder" style="--width: 400; --height: 470;">
                    <img src="https://i.guim.co.uk/img/media/953860ce3e8f24da59a4a0173383eb95f9384c78/43_0_960_576/master/960.jpg?width=465&quality=85&dpr=1&s=none" width="400" height="470" loading="lazy"
                      alt="White Walker Daily" class="img-cover">
                  </figure>

                  <div class="card-content">

                    <a href="#" class="card-badge skewBg">PS5</a>

                    <h3 class="h3">
                      <a href="#" class="card-title">PS5 <span class="span"></span></a>
                    </h3>

                    <p class="card-price">
                      Price : <span class="span">660$</span>
                    </p>

                  </div>

                </div>
              </li>


            </ul>

          </div>
        </section>




      <!-- 
        - #FEATURED GAME
      -->

      <section class="section featured-game" id="features" aria-label="featured game">
        <div class="container">

          <h2 class="h2 section-title">
            All Released <span class="span">Games</span>
          </h2>

          <ul class="has-scrollbar">

            <li class="scrollbar-item">
              <div class="featured-game-card">

                <figure class="card-banner img-holder" style="--width: 450; --height: 600;">
                  <img src="assets/images/featured-game-1.jpg" width="450" height="600" loading="lazy"
                    alt="Just for Gamers" class="img-cover">
                </figure>

                <div class="card-content">

                  <h3 class="h3">
                    <a href="#" class="card-title" tabindex="-1">
                      Just for <span class="span">Gamers</span>
                    </a>
                  </h3>

                  <span class="card-meta">
                    <ion-icon name="notifications"></ion-icon>

                    <span class="span">Playstation 5, Xbox</span>
                  </span>

                </div>

                <div class="card-content-overlay">

                  <img src="assets/images/featured-game-icon.png" width="36" height="61" loading="lazy" alt=""
                    class="card-icon">

                  <h3 class="h3">
                    <a href="#" class="card-title">
                      Just for <span class="span">Gamers</span>
                    </a>
                  </h3>

                  <span class="card-meta">
                    <ion-icon name="notifications"></ion-icon>

                    <span class="span">Playstation 5, Xbox</span>
                  </span>

                </div>

              </div>
            </li>

            <li class="scrollbar-item">
              <div class="featured-game-card">

                <figure class="card-banner img-holder" style="--width: 450; --height: 600;">
                  <img src="assets/images/featured-game-2.jpg" width="450" height="600" loading="lazy"
                    alt="Need for Speed" class="img-cover">
                </figure>

                <div class="card-content">

                  <h3 class="h3">
                    <a href="#" class="card-title" tabindex="-1">
                      Need for <span class="span">Speed</span>
                    </a>
                  </h3>

                  <span class="card-meta">
                    <ion-icon name="notifications"></ion-icon>

                    <span class="span">Playstation 5, Xbox</span>
                  </span>

                </div>

                <div class="card-content-overlay">

                  <img src="assets/images/featured-game-icon.png" width="36" height="61" loading="lazy" alt=""
                    class="card-icon">

                  <h3 class="h3">
                    <a href="#" class="card-title">
                      Need for <span class="span">Speed</span>
                    </a>
                  </h3>

                  <span class="card-meta">
                    <ion-icon name="notifications"></ion-icon>

                    <span class="span">Playstation 5, Xbox</span>
                  </span>

                </div>

              </div>
            </li>

            <li class="scrollbar-item">
              <div class="featured-game-card">

                <figure class="card-banner img-holder" style="--width: 450; --height: 600;">
                  <img src="assets/images/featured-game-3.jpg" width="450" height="600" loading="lazy"
                    alt="Egypt Hunting Gamers" class="img-cover">
                </figure>

                <div class="card-content">

                  <h3 class="h3">
                    <a href="#" class="card-title" tabindex="-1">
                      Egypt Hunting <span class="span">Gamers</span>
                    </a>
                  </h3>

                  <span class="card-meta">
                    <ion-icon name="notifications"></ion-icon>

                    <span class="span">Playstation 5, Xbox</span>
                  </span>

                </div>

                <div class="card-content-overlay">

                  <img src="assets/images/featured-game-icon.png" width="36" height="61" loading="lazy" alt=""
                    class="card-icon">

                  <h3 class="h3">
                    <a href="#" class="card-title">
                      Egypt Hunting <span class="span">Gamers</span>
                    </a>
                  </h3>

                  <span class="card-meta">
                    <ion-icon name="notifications"></ion-icon>

                    <span class="span">Playstation 5, Xbox</span>
                  </span>

                </div>

              </div>
            </li>

            <li class="scrollbar-item">
              <div class="featured-game-card">

                <figure class="card-banner img-holder" style="--width: 450; --height: 600;">
                  <img src="assets/images/featured-game-4.jpg" width="450" height="600" loading="lazy"
                    alt="Just for Gamers" class="img-cover">
                </figure>

                <div class="card-content">

                  <h3 class="h3">
                    <a href="#" class="card-title" tabindex="-1">
                      Just for <span class="span">Gamers</span>
                    </a>
                  </h3>

                  <span class="card-meta">
                    <ion-icon name="notifications"></ion-icon>

                    <span class="span">Playstation 5, Xbox</span>
                  </span>

                </div>

                <div class="card-content-overlay">

                  <img src="assets/images/featured-game-icon.png" width="36" height="61" loading="lazy" alt=""
                    class="card-icon">

                  <h3 class="h3">
                    <a href="#" class="card-title">
                      Just for <span class="span">Gamers</span>
                    </a>
                  </h3>

                  <span class="card-meta">
                    <ion-icon name="notifications"></ion-icon>

                    <span class="span">Playstation 5, Xbox</span>
                  </span>

                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #SHOP
      -->

      <section class="section shop" id="shop" aria-label="shop"
        style="background-image: url('./assets/images/shop-bg.jpg')">
        <div class="container">

          <h2 class="h2 section-title">
            Gaming Product Corner. <span class="span">Order Now</span>
          </h2>

          <p class="section-text">
            Take a look at the most sold games in our website. Hurry up! Order them and have fun playing 
          </p>

          <ul class="has-scrollbar">
            <?php 
              $favorite_games = "SELECT product_image, category,product_price,product_name from product
              INNER JOIN purchased on product.pid = purchased.product_id group by product.pid order by sum(payment) desc limit 10";
              
              $res = mysqli_query($conn,$favorite_games);
              if(mysqli_num_rows($res)>0){
                while($row = mysqli_fetch_assoc($res)){
              ?>

            <li class="scrollbar-item">
              <div class="shop-card">
                <figure class="card-banner img-holder" style="--width: 300; --height: 260;">
                  <img src=<?php echo $row['product_image']?> width="300" height="260" loading="lazy"
                    alt=<?php echo $row['product_name']?> class="img-cover">
                </figure>

                <div class="card-content">

                  <a href="#" class="card-badge skewBg"><?php echo $row['category']?></a>

                  <h3 class="h3">
                    <a href="#" class="card-title"><?php echo $row['product_name']?></a>
                  </h3>

                  <div class="card-wrapper">
                    <p class="card-price">$<?php echo $row['product_price'] ?></p>

                    <a href="shop.php">
                    <button class="card-btn" >
                      
                      <ion-icon name="basket"></ion-icon>
                    </button>
                  </a>
                  </div>

                </div>
              </div>
            </li>
            <?php }}?>
            

          </ul>

        </div>
      </section>





      <!-- 
        - #BLOG
      -->

      <section class="section blog" id="blog" aria-label="blog">
        <div class="container">

          <h2 class="h2 section-title">
            Latest News & <span class="span">Articles</span>
          </h2>

          <p class="section-text">
            Compete With 100 Players On A Remote Island For Winner Takes Showdown Known Issue Where Certain Skin
            Strategic
          </p>
          <!DOCTYPE html>
          <html>
<head>
    <title>News API</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <style>
        .container {
            margin-top: 20px;
            width: 75%;
        }

        .title {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .single-news {
            background-color: #ddd;
            padding: 30px;
            margin-bottom: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <hr>
        <div class="list-wrapper">
            <?php
            if (file_exists('news.json')) {
                $api_url = 'news.json';
                $newslist = json_decode(file_get_contents($api_url));
            } else {
                $api_url = 'https://newsapi.org/v2/everything?q=videogames&from=2023-05-14&to=2023-05-10&sortBy=popularity&pageSize=15&apiKey=371aaaac69d64e46bef2448595bcfe8f';

                $newslist = @file_get_contents($api_url);

                if ($newslist === false) {
                    echo "Failed to fetch news articles.";
                } else {
                    file_put_contents('news.json', $newslist);
                    $newslist = json_decode($newslist);

                    if (empty($newslist->articles)) {
                        echo "No news articles found.";
                    }
                }
            }

            if (!empty($newslist->articles)) {
                $count = 0; // Counter variable
                foreach ($newslist->articles as $news) {
                    if ($count >= 10) {
                        break; // Break the loop once 30 articles have been displayed
                    }
                    ?>
                    <div class="row single-news">
                        <div class="col-4">
                            <img style="width:100%;" src="<?php echo $news->urlToImage; ?>">
                        </div>
                        <div class="col-8">
                            <h2><?php echo $news->title; ?></h2>
                            <small><?php echo $news->source->name; ?></small>
                            <?php if ($news->author && $news->author != '') { ?>
                                <small>| <?php echo $news->author; ?></small>
                            <?php } ?>
                            <p><?php echo $news->description; ?></p>
                            <a href="<?php echo $news->url; ?>" class="btn btn-sm btn-primary" style="float:right;" target="_blank">Read More >></a>
                        </div>
                    </div>
                    <?php
                    $count++; // Increment the counter variable
                }
            }
            
            ?>
        </div>
    </div>
</body>
</html>

        </div>
      </section>





      <!-- 
        - #NEWSLETTER
      -->

      <section class="newsletter" aria-label="newsletter">
      </section>

    </article>
  </main>





  <!-- 
    - #FOOTER
  -->

  <footer class="footer">

    <div class="footer-top">
      <div class="container">

        <div class="footer-brand">

          <p class="footer-list-title">Contact</p>
          <p class="footer-text">
            Gamics is the most professional game selling website in Kosovo
          </p>
          
          <ul id="contact" class="contact-list">

            <li class="contact-item">
              <div class="contact-icon">
                <ion-icon name="location"></ion-icon>
              </div>

              <address class="item-text">
                Address : Prishtina Mall,Kati II, Lipjan, 10000
              </address>
            </li>

            <li class="contact-item">
              <div class="contact-icon">
                <ion-icon name="headset"></ion-icon>
              </div>

              <p class="item-text">Phone : +383 44 149 235<br>+383 45 274 218</p>
            
            </li>

            <li class="contact-item">
              <div class="contact-icon">
                <ion-icon name="mail-open"></ion-icon>
              </div>

              <a href="mailto:info@exemple.com" class="item-text">Email : gamics-ks@gmail.com</a>
            </li>

          </ul>

        </div>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Products</p>
          </li>

          <li>
            <a href="#" class="footer-link">Video Games</a>
          </li>

          <li>
            <a href="#" class="footer-link">Consoles</a>
          </li>

          <li>
            <a href="#" class="footer-link">Merch</a>
          </li>

          

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Need Help?</p>
          </li>

          <li>
            <a href="#" class="footer-link">Terms & Conditions</a>
          </li>

          <li>
            <a href="#" class="footer-link">Privacy Policy</a>
          </li>

          <li>
            <a href="#" class="footer-link">Refund Policy</a>
          </li>


        </ul>

        <div class="footer-wrapper">

          <div class="social-wrapper">

            <p class="footer-list-title">Follow Us</p>

            <ul class="social-list">

              <li>
                <a href="#" class="social-link" style="background-color: #3b5998">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="social-link" style="background-color: #55acee">
                  <ion-icon name="logo-twitter"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="social-link" style="background-color: #d71e18">
                  <ion-icon name="logo-pinterest"></ion-icon>
                </a>
              </li>

              <li>
                <a href="#" class="social-link" style="background-color: #1565c0">
                  <ion-icon name="logo-linkedin"></ion-icon>
                </a>
              </li>

            </ul>

          </div>

          

        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2022 Gamics. All Right Reserved
        </p>

        <img src="assets/images/footer-bottom-img.png" width="340" height="21" loading="lazy" alt=""
          class="footer-bottom-img">

      </div>
    </div>

  </footer>





  <!-- 
    - #BACK TO TOP
  -->

  <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
    <ion-icon name="caret-up"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js" defer></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
<script src="delete-profile.js" ></script>