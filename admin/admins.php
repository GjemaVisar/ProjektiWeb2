<?php

 require('../storeDB.php');
 session_start();
 $name = $_SESSION['admin'];
// Numerimi i llogarive te krijuara te webfaqes
$sql_total_users = "SELECT COUNT(*) FROM user where role='admin'"; // replace "users" with your table name
$result_total_users = mysqli_query($conn, $sql_total_users);

$row_total_users = mysqli_fetch_array($result_total_users);
$num_users = $row_total_users[0];

// Llogarit e krijuara sot
$today = date('d/m/Y');
$sql_users_today = "SELECT COUNT(*) FROM user WHERE role='admin' and datat = '$today'"; // replace "users" with your table name and "signup_date" with the name of your column that stores the date of sign up
$result_users_today = mysqli_query($conn, $sql_users_today);

$row_users_today = mysqli_fetch_array($result_users_today);
$num_users_today = $row_users_today[0];
 



?>



<!Doctype HTML>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="admin.css" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	
<div id="mySidenav" class="sidenav">
	<p class="logo"><span>Gamics</span></p>
  
  <a href="user.php"class="icon-a"><i class="fa fa-users icons"></i> &nbsp;&nbsp;Users</a>
  <a href="admins.php"class="icon-a"><i class="fa fa-lock" aria-hidden="true"></i> &nbsp;&nbsp;Admins</a>
  
  <a href="#"class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Products</a>
  <a href="../faq.php"class="icon-a"><i class="fa fa-list-alt icons"></i> &nbsp;&nbsp;Faq</a>

</div>
  <div id="main">

	<div class="head">
		<div class="col-div-6">
        <span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >&#9776; Admins</span>
    </div>
        
    
    
	<div class="col-div-6">
	<div class="profile">

		<img src="..\assets\images\admin.png" class="pro-img" />
		<p><?php echo strtoupper($name) ?>
		<span>ADMIN</span></p>
	</div>
  </div>
	<div class="clearfix"></div>
</div>

	<div class="clearfix"></div>
	<br/>
	
    <div class="col-div-3">
        <a href="accounts.php" >
		<div class="box">
			<p><?php echo $num_users; ?><br/><span>Accounts</span></p>
			<i class="fa fa-users box-icon"></i>
		</div></a>
	</div>
	<div class="col-div-3">
        <a href="registerAdmin.php" >
		<div class="box">
			<p>+<br/><span>Register an Admin</span></p>
			<i class="fa fa-users box-icon"></i>
		</div></a>
	</div>
	<div class="col-div-3">
		<div class="box">
			<p><?php echo $num_users_today; ?><br/><span>Sign up/Today</span></p>
			<i class="fa fa-list box-icon"></i>
		</div>
	</div>
	

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>


</html>