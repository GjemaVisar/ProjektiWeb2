<?php
    require('storeDB.php');

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cfpassword = $_POST['cfpassword'];
            $data = date('d/m/Y');
            
            $u = "SELECT name from user where name = '$name'";
            $u_query = mysqli_query($conn,$u);
            
            $e = "SELECT email from user where email ='$email'";
            $e_query = mysqli_query($conn,$e);
            
            $errors = "";
            if(mysqli_num_rows($u_query)>0 ){
                $errors = "Username exists";
            }else if(mysqli_num_rows($e_query)>0){
                $errors= "Email exists";
            }
            else if($password != $cfpassword){
                $errors = "Password and confirm password should be the same";
            }
           
            else if($password == $cfpassword){
                $salt = 'salt@_hellosalt';
                $hashed = hash('sha256',$password.$salt);

                if($insert = mysqli_query($conn,"INSERT INTO user(name,email,password,date) 
                VALUES ('$name','$email','$hashed','$data')")){
                    #echo "Te dhenat u regj me sukses! ";

                    header("Location: http://localhost/ProjektiWeb2/Login/login.php", TRUE, 301);
                    exit();
                }else{
                    echo "Error : ".$sql.":-".mysqli_error($conn);
                }
            }
        }
        mysqli_close($conn);
    
#<p class='text-danger'><?php  if(isset($errors['e'])){echo $errors['e'];} / </p>
?>

