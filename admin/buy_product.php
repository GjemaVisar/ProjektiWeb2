<?php
    require("../storeDB.php");
    session_start();
    $user_id = $_SESSION['user_id'];


    $insert_id = "SELECT MAX(id) from purchased";
    $res = mysqli_query($conn,$insert_id);

    $row = mysqli_fetch_row($res);
    $id_next = $row[0] +1;
    
    $prods = $_POST['ids'];
    $quantity = $_POST['quantity'];
    $price = $_POST['prices'];



    $prods = unserialize($prods);
    $quantity = unserialize($quantity);
    $price = unserialize($price);

    for($i=0;$i<count($prods);$i++){
        echo "ID:".$prods[$i]." -quantity ".$quantity[$i]." -price ".$price[$i]."<br>";
    }
    
    
    
    
    if(isset($_POST['buy'])){
        $cardNamePattern = "/^[a-zA-Z ]+$/";
        $cardNumberPattern = "/^\d{16}$/";
        $expiryPattern = "/^(0[1-9]|1[0-2])\/(\d{2})$/";
        $cvvPattern = "/^\d{3}$/";


        $name = $_POST['name_card'];
        $card_number = $_POST['card_number'];
        $expiry_date = $_POST['expiry'];
        $cvv = $_POST['cvv'];

        $totalPrice = $_POST['price'];
        $shipping = $_POST['shipping'];
        $total = $_POST['total'];

       

        if(preg_match($cardNamePattern,$name) && preg_match($cardNumberPattern,$card_number) && 
        preg_match($expiryPattern,$expiry_date) &&preg_match($cvvPattern,$cvv)){
            for($i=0;$i<count($prods);$i++){
                $sql = "INSERT INTO purchased(id,user_id,product_id,quantity,payment,purchase_date) VALUES($id_next,'$user_id','$prods[$i]',
                '$quantity[$i]','$price[$i]',now())";
                mysqli_query($conn,$sql) or die(mysqli_error($conn));
                
                $decrement_quantity = "UPDATE product set quantity = quantity - '$quantity[$i]'
                WHERE pid = '$prods[$i]'";
                mysqli_query($conn,$decrement_quantity) or die(mysqli_error($conn));
                
                
            }
          
            $_SESSION['success_buy'] = "Your purchase was complete! If you dont want to purchase the same items again, 
            please click the garbage cans!";
            
            // header("Location: ../user/shop_cart.php");
            // exit();
          
        }else{
            $_SESSION['error_message'] = "Your credentials are not correct!";
            header("Location: ../user/shop_cart.php");
            exit();
          
        }
        

   
    }
    mysqli_close($conn);

?>

