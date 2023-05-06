<?php 
$dbhost = 'localhost:3307';
$dbuser = 'root';
$dbpass = '';
$dbname = 'Store';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(! $conn)
{
    die("Connection failed ". mysqli_connect_error());
}
    #echo "Connected to the database";
    


// KRIJIMI I DATABAZES
// $conn = mysqli_connect($dbhost,$dbuser,$dbpass);

//   $sql = 'CREATE Database Store';
//   $retval = mysqli_query($conn, $sql);
//     if(! $retval){
//         die('Could not create database: '.mysqli_connect_error());
//     }
//     echo "Created!";

// mysqli_close($conn);



?>