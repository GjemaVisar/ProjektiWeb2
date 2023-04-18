<?php
    require('storeDB.php');

// KRIJIMI I DATABAZES
//   $sql = 'CREATE Database LogInSignUp';
//   $retval = mysqli_query($conn, $sql);
//     if(! $retval){
//         die('Could not create database: '.mysqli_connect_error());
//     }
//     echo "Database Login&SignUp created successfully\n ";
//     mysqli_close($conn);

    

    //KRIJIMI I TABLES users
    // $sql = 'CREATE TABLE user(
    //     id INT(11) AUTO_INCREMENT PRIMARY KEY,
    //     name VARCHAR(20),
    //     email VARCHAR(30),
    //     pasword VARCHAR(20),
    //     date VARCHAR(20) 
    // )';
    // $retvalue = mysqli_query($conn,$sql);
    // if(! $retvalue){
    //     die("Could not create table users : ".mysqli_connect_error());
    // }
    // echo "Table users has been created successfully";
	// mysqli_close($conn);

    
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