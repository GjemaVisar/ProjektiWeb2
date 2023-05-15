<?php 

    require('storeDB.php');
    session_start();
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        if(isset($_POST['delete_btn'])){
            $query = "DELETE FROM user where id='$userId'";
            $query_run = mysqli_query($conn,$query);

            if($query_run){
                echo "Deleted!";
                header('Location: signup.php');
            }
            else{
                echo "Not Deleted";
                header('Location: user-page.php');
            }
        }
    }

?>