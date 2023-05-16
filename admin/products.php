<?php 
    require('../storeDB.php');
 session_start();
 $name = $_SESSION['admin'];


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
  <a href="products.php"class="icon-a"><i class="fa fa-gamepad icons"></i> &nbsp;&nbsp;Products</a>
  <a href="../faq.php"class="icon-a"><i class="fa fa-list-alt icons"></i> &nbsp;&nbsp;Faq</a>
  <a href="logout.php"class="icon-a"><i class="fa fa-level-down icons"></i> &nbsp;&nbsp;Log Out</a>

  

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
        <a href="games.php" >
		<div class="box">\
            <i class="fa fa-gamepad fa-3x"></i>
			<p><?php //echo $num_users; ?><br/><span>Games</span></p>
		</div></a>
	</div>
	<div class="col-div-3">
        <a href="add_game.php" >
		<div class="box">
			<p>+<br/><span>Add a Game</span></p>
			<i class="fa fa-gamepad box-icon"></i>
		</div></a>
	</div>
	<div class="col-div-3">
		<a href="games_purchased.php">
		<div class="box">
			<p><?php // echo $num_users_today; ?><br/><span>Games purchased</span></p>
			<i class="fa fa-money box-icon"></i>
		</div>
	</div>
	

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>


</html>