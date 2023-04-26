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
echo "Connected to the database";
?>