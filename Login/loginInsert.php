<?php
    require('storeDB.php');
    
        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $check = mysqli_query($conn,"SELECT * FROM user WHERE 
                    email='".$email."' and password='".$password."' ");

            if(mysqli_num_rows($check)==1){
                echo "Login success";
            }else{
                echo "Login failed";
            }
        }
    

?> 