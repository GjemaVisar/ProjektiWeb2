<?php

 require('../storeDB.php');
  session_start();
 $name = $_SESSION['admin'];
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
        <span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >&#9776; Users</span>
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
		<div class="box">
			<p><?php echo $num_users; ?><br/><span>Accounts</span></p>
			<i class="fa fa-users box-icon"></i>
		</div>
        
        <form class = "search-form" method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="search-bar" style="color: white;">Search users:</label>
    <input type="text" name="search_term" id = "search_bar" >
   	<input type="submit" value="Search">
  	</form> 
	</div>
	<div class="col-div-3">
		<div class="box">
			<p><?php echo $num_users_today; ?><br/><span>Sign ups for today</span></p>
			
		</div>
	</div>
	<div class="col-div-3">
    <a href="registerUser.php" >
		<div class="box">
			<p>+<br/><span>Add User</span></p>
			<i class="fa fa-users box-icon"></i>
		</div>
	</div>
	
	
    


	<div class="container-fluid">
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
        <?php
            $search_query = isset($_GET['search_term']) ? $_GET['search_term'] : '';
            if($search_query){
                $query1 = "SELECT * FROM user WHERE email LIKE '%$search_query%'and role ='user'";
            }
            else {
			$query1 = "SELECT * FROM user WHERE role = 'user'";
		  }
           
            $query_run = mysqli_query($conn, $query1);
        ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> Username </th>
                        <th>Email </th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        while($row = mysqli_fetch_assoc($query_run))
                        {
                    ?>
                        <tr>
                            <td><?php  echo $row['id']; ?></td>
                            <td><?php  echo $row['name']; ?></td>
                            <td><?php  echo $row['email']; ?></td>
                            <td><?php  echo $row['password']; ?></td>
                            <td><?php  echo $row['role']; ?></td>
                            <td>
                                <form action="#" method="post">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                </form>
                            </td>
                            <td>
                                <form action="deleteUsers.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <input type='submit' name='delete' value='Delete'></form>
                                </form>
                            </td>
                        </tr>
                    <?php
                        }
                    }
                    else {
                        echo "No Record Found";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>





    <div class="clearfix"></div>
	<br/><br/>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>


</html>


