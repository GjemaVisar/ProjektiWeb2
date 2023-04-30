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
            
            $errors = array();
            if(empty($name)){
                $errors['u'] = "Username required";

            }else if(mysqli_num_rows($u_query)>0 ){
                $errors['u'] = "Username exists";

            }else if(empty($email)){
                $errors['e'] = "Email required";

            }else if(mysqli_num_rows($e_query)>0){
                $errors['e'] = "Email exists";
            }
            else if(empty($password)){
                $errors['p'] = "Password required";

            }else if(empty($cfpassword)){
                $errors['cp'] = "Repeat password please";
            }
           
            if($password == $cfpassword && count($errors)==0){
                $salt = 'salt@_hellosalt';
                $hashed = hash('sha256',$password.$salt);

                //check if username exists
                

                if($insert = mysqli_query($conn,"INSERT INTO user(name,email,password,date) 
                VALUES ('$name','$email','$hashed','$data')")){
                    #echo "Te dhenat u regj me sukses! ";

                    header("Location: http://localhost/ProjektiWeb2/Login/login.php", TRUE, 301);
                    exit();
                }else{
                    echo "Error : ".$sql.":-".mysqli_error($conn);
                }
            }else{
                echo "Password and confirm password should be same";
            }
        }
        mysqli_close($conn);
    
#<p class='text-danger'><?php  if(isset($errors['e'])){echo $errors['e'];} / </p>
?>

