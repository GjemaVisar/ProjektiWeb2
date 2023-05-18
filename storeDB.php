<?php 
$dbhost = 'localhost:3307';
$dbuser = 'root';
$dbpass = '';
$dbname = 'Store';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(! $conn)
{
    die("Connection failed ". mysqli_connect_error());
}else{
   # echo "Connected to the database";
}

function get_cookie(){
    if(isset($_SESSION['user_id'])){
      $user_id =$_SESSION['user_id'];
      $cookie_name = "shopping_cart".$user_id;
      return $cookie_name;
    }
    
  }  

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