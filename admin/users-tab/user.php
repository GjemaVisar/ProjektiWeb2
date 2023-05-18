<?php

 require('../../storeDB.php');
  session_start();
 $name = isset($_SESSION['admin']) ? $_SESSION['admin'] : null;
 // nese preket back button dhe munohet te kete qasje pa bere login
 if ($name === null ) {
    // User is not logged in or session expired, redirect to the login page
    header('Location: ../../login.php');
    exit();
}

// Numerimi i llogarive te krijuara te webfaqes
$sql_total_users = "SELECT COUNT(*) FROM user WHERE role = 'user' "; // replace "users" with your table name
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
	<link rel="stylesheet" href="../css/admin.css" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
	
<div id="mySidenav" class="sidenav">
	<p class="logo"><span>Gamics</span></p>
  
    <a href="../users-tab/user.php"class="icon-a"><i class="fa fa-users icons"></i> &nbsp;&nbsp;Users</a>
  <a href="../admins-tab/admins.php"class="icon-a"><i class="fa fa-lock" aria-hidden="true"></i> &nbsp;&nbsp;Admins</a>
  <a href="../products-tab/products.php"class="icon-a"><i class="fa fa-gamepad icons"></i> &nbsp;&nbsp;Products</a>
  <a href="../faq.php"class="icon-a"><i class="fa fa-list-alt icons"></i> &nbsp;&nbsp;Faq</a>
  <a href="../logout.php"class="icon-a"><i class="fa fa-level-down icons"></i> &nbsp;&nbsp;Log Out</a>


</div>
  <div id="main">

	<div class="head">
		<div class="col-div-6">
        <span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >&#9776; Users</span>
    </div>
        
    
    
    <div class="col-div-6">
	<div class="profile">

		<img src="..\..\assets\images\admin.png" class="pro-img" />
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
        
        <input type="text" id="search_bar" name="search_term" />
<button id="searchButton" type="button">Search</button>

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
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th> ID </th>
									<th> Username </th>
									<th>Email </th>
									<th>Password</th>
									<th>Role</th>
									<th>DELETE</th>
								</tr>
							</thead>
							<tbody id="usersTableBody">
								<!-- User data will be loaded dynamically using AJAX -->
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>





    <div class="clearfix"></div>
	<br/><br/>

</div>

<script>
    
    $(document).ready(function () {
    // Funksioni load
    loadUsers();

    // pe me handle search buttonin
    $('#searchButton').click(function (event) {
        event.preventDefault();
        loadUsers();
    });

    // Me bo search buttoni edhe kur ti ranojsh enter
    $('#search_bar').keypress(function (event) {
        if (event.which === 13) { // 13 osht enteri 
            event.preventDefault(); // prevent default mos me lan me bo reload
            $('#searchButton').click();
        }
    });

    function loadUsers() {
        var searchQuery = $('#search_bar').val();

        $.ajax({
            url: 'load_users.php',
            type: 'GET',
            dataType: 'html',
            data: { search_term: searchQuery },
            success: function (response) {
                $('#usersTableBody').html(response);
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    }
});





</script>


</body>


</html>


