<?php
    //id e userit prej session

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
            // me e fshi contentin e cookie
            // me ndreq tabelen per blerje
        }


   
    }
    

?>