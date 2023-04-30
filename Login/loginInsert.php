<?php
    require('storeDB.php');
    
        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $salt = 'salt@_hellosalt';

            $hashed = hash('sha256',$password.$salt);
            $hashed = substr($hashed,0,20);
            
            
            $check = mysqli_query($conn,"SELECT * FROM user WHERE 
                    email='".$email."' and password='".$hashed."' ");



            if(mysqli_num_rows($check)==1){
                #echo "Login success";
                header("Location: http://localhost/ProjektiWeb2/", TRUE, 301);
                exit();
            }else{
                echo "Login failed";
            }
        }
    

?> 