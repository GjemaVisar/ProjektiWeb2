<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        $user_id =$_SESSION['user_id'];
      }
      $cookie_name = "shopping_cart".$user_id;
      echo $cookie_name."<br>";

    if(isset($_POST['delete_item'])){
      $id = $_POST['id_to_delete'];
      echo $id."<br>";
      
      if(isset($_COOKIE[$cookie_name])){
        $cart = $_COOKIE[$cookie_name];
      }else{
        $cart = "";
      }
      // var_dump($cart);
      $cart = json_decode($cart,true);

      $new_cart = array();
      foreach($cart as $c){
        if($c['productId'] != $id){
          array_push($new_cart,$c);
        }
      }
      var_dump($new_cart);
      setcookie($cookie_name,json_encode($new_cart),time()+1296000);
    
      header("Location:user/shop_cart.php",TRUE,301);
    }
  
  ?>