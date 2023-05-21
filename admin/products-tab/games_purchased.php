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

?>

<!Doctype HTML>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../css/admin.css" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	
<div id="mySidenav" class="sidenav">
	<p class="logo"><span>Gamics</span></p>
  
    <a href="user.php"class="icon-a"><i class="fa fa-users icons"></i> &nbsp;&nbsp;Users</a>
  <a href="admins.php"class="icon-a"><i class="fa fa-lock" aria-hidden="true"></i> &nbsp;&nbsp;Admins</a>
  <a href="products.php"class="icon-a"><i class="fa fa-gamepad icons"></i> &nbsp;&nbsp;Products</a>
  <a href="../faq.php"class="icon-a"><i class="fa fa-list-alt icons"></i> &nbsp;&nbsp;Faq</a>
  <a href="../logout.php"class="icon-a"><i class="fa fa-level-down icons"></i> &nbsp;&nbsp;Log Out</a>

</div>
  <div id="main">

	<div class="head">
		<div class="col-div-6">
        <span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >&#9776; Products</span>
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

<div class="container-fluid">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Products purchased</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <?php
            $query = "SELECT p.product_name, p.category,sum(pp.quantity) as Units,sum(pp.payment) as Profit  FROM product p inner join purchased pp
            on p.pid = pp.product_id group by p.pid order by Profit desc";
            $query_run = mysqli_query($conn, $query);
        ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Product Name </th>
                        <th>Product Category </th>
                        <th>Units Sold</th>
                        <th>Profit on product </th>
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
                            <td><?php  echo $row['product_name']; ?></td>
                            <td><?php  echo $row['category']; ?></td>
                            <td><?php  echo $row['Units']; ?></td>
                            <td><?php  echo $row['Profit']; ?></td>
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
	<br/>
	
	
	</div>
    <div class="clearfix"></div>
	<br/><br/>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php  mysqli_close($conn); ?>
</body>


</html>