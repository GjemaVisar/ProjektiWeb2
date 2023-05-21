<?php
require("../storeDB.php");
session_start();
$asker = $_SESSION['user'];
if(isset($_POST['submit'])){
    $question = $_POST['question'];
    $answer = NULL;
    $date_created = date('d/m/Y');
    $date_updated = NULL;
    $answerer = NULL;
    $insert_query = "INSERT INTO faq(question,answer,date_created,date_updated,asker,answerer) 
    VALUES('$question','$answer','$date_created',
    '$date_updated','$asker','$answerer')";
    
    if(mysqli_query($conn,$insert_query)){
       #echo "Right";
    }
    else{
        #echo "problem adding";}
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>FAQ Page</title>
    <link rel="stylesheet" type="text/css" href="../faq.css">
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

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

    </style>

</head>
<body style="background-color:aliceblue;">
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
  <br><br><br><br>
    <main>
        <section class="ask">
            <h2>Ask a Question</h2>
            <form id="question-form" action="" method="Post">
                
                <label for="question">Question:</label>
                <textarea id="question" name="question" required></textarea>
                <label>Answer:</label>
                <textarea id="answer" name="answer" readonly></textarea>
                <input type="submit" name="submit" value="Submit">
            </form>
        </section>
        <section class="faq">
            <?php
                $get_faq = "SELECT * FROM faq";
                $result = mysqli_query($conn,$get_faq);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                        $questions = $row['question'];
                        $answers = $row['answer'];
                        $askers = $row['asker'];
                        $answerers = $row['answerer'];
                        if($answers == null && $answerers == null){
                            $answers="This question hasn't gotten a response yet!";
                            $answerers="No Admin has answered yet";
                        }
                        echo '<h2>General Questions </h2>
                        <div class="question">
                        <h3>'.$questions.'</h3>
                        <h4>Question by:'.$askers.'</h4>
                        <p>'.$answers.'</p>
                        <h4>Answered by: '.$answerers.'</h4><br>
                        
                        </div>';
                    }
                }
                
               
            ?>
           
           
        </section>
       <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
       </script>
    </main>
    <script src="../script.js"></script>
    <?php  mysqli_close($conn); ?>
</body>

<script>
window.addEventListener("load",function(){
    $("answer").richText();
});
</script>
</html>
<script src="../assets/js/script.js" defer></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="delete-profile.js" ></script>



