<?php

 require('../storeDB.php');

        $length = 10;
		function generate_salt($length){
			$chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$salt = '';
	
			for($i=0;$i<$length;$i++){
				$index = rand(0,strlen($chars)-1);
				$salt .= $chars[$index];
			}
	
			return $salt;
		}

 if(isset($_POST['registerbutton'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cfpassword = $_POST['cfpassword'];
    $data = date('d/m/Y');

    $email_query = "SELECT * FROM user WHERE email='$email'";
    $email_query_run = mysqli_query($conn, $email_query);
    if(mysqli_num_rows($email_query_run)>0){
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: registerUser.php');  
    }
    else
    {
        if($role='user'){
            if($password == $cfpassword){
                $salt = generate_salt($length);
                $hashed = hash('sha256',$password.$salt);
                $query = "INSERT INTO user(name,role,email,salt,password,datat) 
                VALUES ('$name','$role','$email','$salt','$hashed','$data')";
                $query_run = mysqli_query($conn, $query);

                if($query_run)
                {
                    // echo "Saved";
                    $_SESSION['status'] = "User Profile Added";
                    $_SESSION['status_code'] = "success";
                    header('Location: registerUser.php');
                }
                else 
                {
                    $_SESSION['status'] = "User Profile Not Added";
                    $_SESSION['status_code'] = "error";
                    header('Location: registerUser.php');  
                }
            }

            else 
            {
                $_SESSION['status'] = "Password and Confirm Password Does Not Match";
                $_SESSION['status_code'] = "warning";
                header('Location: registerUser.php');  
            }
        }
    }

}

?>



<!Doctype HTML>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="user.css" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=PT+Sans');

body{

  font-family: 'PT Sans', sans-serif;
}
.container {
  border: 5px solid;
  margin: auto;
  width: 50%;
  padding: 10px;
}
/* .col-md-5 {
  border: 5px solid;
  margin: auto;
  width: 50%;
  padding: 10px;
} */
.card {
    border: 5px solid;
  margin: auto;
  width: 50%;
  padding: 10px;
}
h2{
  padding-top: 1.5rem;
}
a{
  color: #333;
}
a:hover{
  color: #da5767;
  text-decoration: none;
}
.card{
  border: 0.40rem solid #f8f9fa;
  top: 10%;
}
.form-control{
  background-color: #f8f9fa;
  padding: 20px;
  padding: 25px 15px;
  margin-bottom: 1.3rem;
}

.form-control:focus {

    color: #000000;
    background-color: #ffffff;
    border: 3px solid #da5767;
    outline: 0;
    box-shadow: none;

}

.btn{
  padding: 0.6rem 1.2rem;
  background: #da5767;
  border: 2px solid #da5767;
}
.btn-primary:hover {

    
    background-color: #df8c96;
    border-color: #df8c96;
  transition: .3s;

}
</style>

<body>
	
<div id="mySidenav" class="sidenav">
	<p class="logo"><span>GAMICS</span></p>
  <a href="#" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;Dashboard</a>
  <a href="user.php"class="icon-a"><i class="fa fa-users icons"></i> &nbsp;&nbsp;Users</a>
  <a href="admins.php"class="icon-a"><i class="fa fa-lock" aria-hidden="true"></i> &nbsp;&nbsp;Admins</a>
  <a href="#"class="icon-a"><i class="fa fa-list icons"></i> &nbsp;&nbsp;Projects</a>
  <a href="#"class="icon-a"><i class="fa fa-shopping-bag icons"></i> &nbsp;&nbsp;Orders</a>
  <a href="#"class="icon-a"><i class="fa fa-tasks icons"></i> &nbsp;&nbsp;Inventory</a>
  <a href="#"class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Accounts</a>
  <a href="#"class="icon-a"><i class="fa fa-list-alt icons"></i> &nbsp;&nbsp;Tasks</a>

</div>
  <div id="main">

	<div class="head">
		<div class="col-div-6">
        <span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >&#9776; User Add</span>
    </div>
        
    
    
	<div class="col-div-6">
        <div class="profile">

            <img src="images/user.png" class="pro-img" />
            <p>Manoj Adhikari <span>UI / UX DESIGNER</span></p>
        </div>
    </div>
	<div class="clearfix"></div>
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card">
        <h2 class="card-title text-center" style="color:#ffffff" >Register User</h2>
        <div class="card-body py-md-4">
          <form _lpchecked="1" method="POST" >
            <div class="form-group">
              <input type="text" class="form-control" name="name" id="name" placeholder="Name">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Email">
            </div>

            <div class="form-group">
              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="cfpassword" id="confirm-password" placeholder="confirm-password">
            </div>
            <!-- <div class="form-group">
                <select name="role"><option value="admin" >admin</option></select>
            </div><br> -->
            <div class="d-flex flex-row align-items-center justify-content-between">
              
              <button type="submit" name="registerbutton" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- 
<div class="container-fluid">

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control checking_email" placeholder="Enter Email">
                <small class="error_email" style="color: red;"></small>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
       Add Admin Profile 
</button> -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>


</html>