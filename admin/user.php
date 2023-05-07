<?php

 require('../storeDB.php');
// Numerimi i llogarive te krijuara te webfaqes
$sql_total_users = "SELECT COUNT(*) FROM user"; // replace "users" with your table name
$result_total_users = mysqli_query($conn, $sql_total_users);

$row_total_users = mysqli_fetch_array($result_total_users);
$num_users = $row_total_users[0];

// Llogarit e krijuara sot
$today = date('d/m/Y');
$sql_users_today = "SELECT COUNT(*) FROM user WHERE datat = '$today'"; // replace "users" with your table name and "signup_date" with the name of your column that stores the date of sign up
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
	<p class="logo"><span>M</span>-SoftTech</p>
  <a href="admin.php" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;Dashboard</a>
  <a href="user.php"class="icon-a"><i class="fa fa-users icons"></i> &nbsp;&nbsp;Users</a>
  <a href="#"class="icon-a"><i class="fa fa-list icons"></i> &nbsp;&nbsp;Projects</a>
  <a href="#"class="icon-a"><i class="fa fa-shopping-bag icons"></i> &nbsp;&nbsp;Orders</a>
  <a href="#"class="icon-a"><i class="fa fa-tasks icons"></i> &nbsp;&nbsp;Inventory</a>
  <a href="#"class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Accounts</a>
  <a href="#"class="icon-a"><i class="fa fa-list-alt icons"></i> &nbsp;&nbsp;Tasks</a>

    </div>
  <div id="main">

	<div class="head">
		<div class="col-div-6">
        <span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >&#9776; Users</span>
    </div>
        
    
    
	<div class="col-div-6">
	<div class="profile">

		<img src="images/user.png" class="pro-img" />
		<p>Manoj Adhikari <span>UI / UX DESIGNER</span></p>
	</div>
</div>
	<div class="clearfix"></div>
</div>

	<div class="clearfix"></div>
	<br/>
	
	<div class="col-div-3">
		<div class="box">
			<p><?php echo $num_users; ?><br/><span>Accounts</span></p>
			<i class="fa fa-users box-icon"></i>
		</div>
	</div>
	<div class="col-div-3">
		<div class="box">
			<p><?php echo $num_users_today; ?><br/><span>Sign ups for today</span></p>
			<i class="fa fa-list box-icon"></i>
		</div>
	</div>
	<div class="col-div-3">
		<div class="box">
			<p>99<br/><span>Orders</span></p>
			<i class="fa fa-shopping-bag box-icon"></i>
		</div>
	</div>
	<div class="col-div-3">
		<div class="box">
			<p>78<br/><span>Tasks</span></p>
			<i class="fa fa-tasks box-icon"></i>
		</div>
	</div>
    <div class="clearfix"></div>
	<br/><br/>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>


</html>


