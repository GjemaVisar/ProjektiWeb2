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

    // ALTER TABLE PER TE SHTUAR KOLONEN ROLI
    // $sql = "ALTER TABLE user ADD COLUMN `role` varchar(10) AFTER `name`";

    // KRIJIMI I TABELES FAQ
    // $sql = 'CREATE TABLE FAQ (id INT(11) auto_increment primary key, question varchar(100), answer varchar(100),
    //         date_created varchar(20), date_updated varchar(20), user_id INT(11), admin_id INT(11))';

    //KRIJIMI I TABELES purchased
    $sql = 'CREATE TABLE purchased(id INT(11) auto_increment, user_id INT not null,
    product_id INT not null,quantity tinyint(4) not null ,payment real not null,purchase_date DATE,
    primary key(id,user_id,product_id),
    foreign key(user_id) references user(id), foreign key(product_id) references product(pid))';


    
    $retvalue = mysqli_query($conn,$sql);
    if(! $retvalue){
        die("Could not create purchased table : ".mysqli_connect_error());
    }
    echo "table has been added successfully";
	mysqli_close($conn);



?>