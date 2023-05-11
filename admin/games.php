<?php

 require('../storeDB.php');
 session_start();
 $name = $_SESSION['admin'];

    
    #Session te cilat i perdorim- nuk e di pse spom funksionojne
    if(isset($_SESSION['success']) && $_SESSION['success'] !=''){
        echo '<h2 class="bg-primary" > '.$_SESSION['success'].' <h2>';
        unset($_SESSION['success']);
    }
    if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
        echo '<h2 class="bg-info> " '.$_SESSION['status'].' <h2>';
        unset($_SESSION['status']);
    }


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

<div class="container-fluid">

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Game List</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <?php
            $query = "SELECT * FROM product";
            $query_run = mysqli_query($conn, $query);
        ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> Product Name </th>
                        <th>Product Price </th>
                        <th>Product Description</th>
                        <th>Product Image</th>
                        <th>Category</th>
                        <th>Quantity</th>
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
                            <td><?php  echo $row['pid']; ?></td>
                            <td><?php  echo $row['product_name']; ?></td>
                            <td><?php  echo $row['product_price']; ?></td>
                            <td><?php  echo $row['product_description']; ?></td>
                            <td><?php  echo $row['product_image']; ?></td>
                            <td><?php  echo $row['category']; ?></td>
                            <td><?php  echo $row['quantity']; ?></td>
                            <td>
                                <form action="edit_product.php" method="post">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['pid'] ?>">
                                    <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                </form>
                            </td>
                            <td>
                                <form action="delete_product.php" method="post">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['pid']; ?>">
                                    <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
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
	<br/>
	
	
	</div>
    <div class="clearfix"></div>
	<br/><br/>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>


</html>