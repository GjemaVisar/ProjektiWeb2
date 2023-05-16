<?php 

require('../../storeDB.php');
session_start();
if(isset($_POST['delete_btn'])){
    
    $id = $_POST['delete_id'];

    $query = "DELETE FROM user where id='$id'";
    $query_run = mysqli_query($conn,$query);

    if($query_run){
        $_SESSION['success'] = "Your data is deleted" ;
        header('Location: accounts.php');
    }
    else{
        $_SESSION['status'] = "Your data is NOT deleted" ;
        header('Location: accounts.php');
    }

}

?>