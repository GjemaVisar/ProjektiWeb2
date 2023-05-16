<?php
include 'storeDB.php';
session_start();

$length = 10;

// Check if the user is logged in
if (isset($_SESSION['user'])) {
    $userId = $_SESSION['user_id'];

    // Retrieve the current user's information from the database
    $sql = "SELECT name, email, salt, password FROM user WHERE id = $userId";
    $result = mysqli_query($conn, $sql);
    $info = mysqli_fetch_assoc($result);
    $length = 10;

    function generate_salt($length){
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $salt = '';

        for($i=0;$i<$length;$i++){
            $index = rand(0,strlen($chars)-1);
            $salt .= $chars[$index];
        }

        return $salt;
    }

    if(isset($_POST['submit']))
    {
        $u_name = $_POST['username'];
        $u_email = $_POST['email'];
        $u_password = $_POST['password'];

        $salt_in_database = $info['salt'];
        $password_in_database = $info['password'];
        $errors = '';

        $usernameRegex = "/^[a-zA-Z0-9_]{3,20}$/";
        $emailRegex = "/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/";
        $passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
      
        $hashed= hash('sha256',$u_password.$salt_in_database);

        // $errors = "";
        // $u = "SELECT name from user where name = '$u_name'";
        // $u_query = mysqli_query($conn,$u);
                
        // $e = "SELECT email from user where email ='$u_email'";
        // $e_query = mysqli_query($conn,$e);

        if($hashed = $password_in_database){
          $sql2= "UPDATE user SET name = '$u_name', email = '$u_email' WHERE id = $userId ";

        if($result2){
            echo "Update success";
        }
          $result2 = mysqli_query($conn,$sql2);

          if($result2){
              header("Location: user-page.php");
          }else{
            $error = "Error!!!";
            header("Location: update-profile.php");
          }
        }else{
          $error = "Incorrect Password";
        // }
    }
}

    ?>
     <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link rel="stylesheet" href="admin/admin.css" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

<!-- 
  - custom css link
-->
<link rel="stylesheet" href="style.css">

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
        body{

font-family: 'PT Sans', sans-serif;
}
.container2 {
border: 5px solid;
margin: auto;
margin-top: 150px;
width: 50%;
padding: 10px;
}
/* .col-md-5 {
border: 5px solid;
margin: auto;
width: 50%;
padding: 10px;
} */
.card {
  border: 5px solid;
margin: auto;
width: 50%;
padding: 10px;
}
h2{
padding-top: 1.5rem;
}
a{
color: #333;
}
a:hover{
color: #da5767;
text-decoration: none;
}
.card{
border: 0.40rem solid #f8f9fa;
top: 10%;
}
.form-control{
background-color: #f8f9fa;
padding: 20px;
padding: 25px 15px;
margin-bottom: 1.3rem;
}

.form-control:focus {

  color: #000000;
  background-color: #ffffff;
  border: 3px solid #da5767;
  outline: 0;
  box-shadow: none;

}

.btn{
padding: 0.6rem 1.2rem;
background: #da5767;
border: 2px solid #da5767;
}
.btn-primary:hover {

  
  background-color: #df8c96;
  border-color: #df8c96;
transition: .3s;

}

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
  <!-- <div>
    <h3><?php echo "Welcome ".$user_name." !";?></h3>
  </div> -->
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

        <div class="container2">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <h2 class="card-title text-center" style="color:#ffffff">Edit your Profile</h2>
                        <div class="card-body py-md-4">
                            <form method="POST">

                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" value="<?php echo "{$info['name']}" ?>" id="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" value="<?php echo "{$info['email']}" ?>" id="email" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <label style="color:#f1f1f1">Verify your password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                                <?php if(isset($errors)): ?>
                                    <span><?php echo $errors; ?> </span>
                                <?php endif ?>
                                <div>
                                    <a href="user-page.php" class="btn btn-primary" style="text-align: center;" >Cancel</a>
                                    <br>
                                    <input type='submit' name='submit'class="btn btn-primary" value='Update Profile'>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

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
<?php
} else {
    // Redirect the user to the login page if they are not logged in
    header("Location: login.php");
    exit;
}



 ?>
