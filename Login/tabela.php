<?php 
require("storeDB.php");

    //KRIJIMI I TABLES users
    // $sql = 'CREATE TABLE user(
    //     id INT(11) AUTO_INCREMENT PRIMARY KEY,
    //     name VARCHAR(20),
    //     email VARCHAR(30),
    //     pasword VARCHAR(20),
    //     date varchar(20) 
    // )';

    /*
       // KRIJIMI I TABELES product
        $sql = 'CREATE TABLE product(
            pid INT(11) AUTO_INCREMENT PRIMARY KEY,
            product_name VARCHAR(30) not null,
            product_price real not null,
            product_description varchar(100),
            product_image longblob NOT NULL)';
    */
    
    $retvalue = mysqli_query($conn,$sql);
    if(! $retvalue){
        die("Could not create table users : ".mysqli_connect_error());
    }
    echo "Table users has been created successfully";
	mysqli_close($conn);



?>