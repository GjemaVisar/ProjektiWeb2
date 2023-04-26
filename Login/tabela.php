<?php 
require("storeDB.php");

    //KRIJIMI I TABLES users
    // $sql = 'CREATE TABLE user(
    //     id INT(11) AUTO_INCREMENT PRIMARY KEY,
    //     name VARCHAR(20),
    //     email VARCHAR(30),
    //     roli VARCHAR(30),
    //     pasword VARCHAR(20),
    //     date DATE 
    // )';
    $retvalue = mysqli_query($conn,$sql);
    if(! $retvalue){
        die("Could not create table users : ".mysqli_connect_error());
    }
    echo "Table users has been created successfully";
	mysqli_close($conn);



?>