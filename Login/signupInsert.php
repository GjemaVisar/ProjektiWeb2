<?php
    require('login&signupDB.php');


    
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cfpassword = $_POST['cfpassword'];
            $data = date('d/m/Y'); 
            
            if($password == $cfpassword){

                if($insert = mysqli_query($conn,"INSERT INTO user(name,email,password,date) 
                VALUES ('$name','$email','$password','$data')")){
                    echo "Te dhenat u regj me sukses! ";
                }else{
                    echo "Error : ".$sql.":-".mysqli_error($conn);
                }
            }else{
                echo "Password and confirm password should be same";
            }
        }
    

?> 