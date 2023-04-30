<?php
    require('storeDB.php');

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cfpassword = $_POST['cfpassword'];
            $data = date('d/m/Y');
            
            if($password == $cfpassword){
                $salt = 'salt@_hellosalt';
                $hashed = hash('sha256',$password.$salt);

                if($insert = mysqli_query($conn,"INSERT INTO user(name,email,password,date) 
                VALUES ('$name','$email','$hashed','$data')")){
                    #echo "Te dhenat u regj me sukses! ";
                    header("Location: http://localhost/ProjektiWeb2/login.php", TRUE, 301);
                    exit();
                }else{
                    echo "Error : ".$sql.":-".mysqli_error($conn);
                }
            }else{
                echo "Password and confirm password should be same";
            }
        }
        mysqli_close($conn);
    

?> 