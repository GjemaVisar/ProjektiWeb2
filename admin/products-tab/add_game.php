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

 if(isset($_POST['registerbtn'])){
        $product_name = $_POST['name'];
        $product_price = $_POST['price'];
        
        $float_val = floatval($product_price);
        $product_description = $_POST['description'];
        
        $product_image = $_POST['image'];
        $product_category = $_POST['category'];

        $product_quantity = $_POST['quantity'];
        $quantity = intval($product_quantity);


        
        $insert_query = "INSERT INTO product(product_name, product_price, product_description, product_image, category, quantity)
         VALUES('$product_name',$float_val,'$product_description','$product_image','$product_category',$quantity)";

        mysqli_query($conn,$insert_query) or die(mysqli_error($conn));
}


?>



<!Doctype HTML>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../css/admin.css" type="text/css"/>
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

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card">
        <h2 class="card-title text-center" style="color:#ffffff" >Add Game</h2>
        <div class="card-body py-md-4">

          <form _lpchecked="1" method="POST" action="">
            <div class="form-group">
              <input type="text" class="form-control" name="name" id="name" placeholder="Product name" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="price" id="price" placeholder="Product Price" required>
            </div>

            <div class="form-group">
              <input type="text" class="form-control" name="description" id="description" placeholder="Product Description" >
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="image" id="image" placeholder="Product Image" required>
            </div>

            <div class="form-group">
              <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Product Quantity" required>
            </div>

            <div class="form-group">    
                <select class="form-control" name="category">
                    <option value="videogame">Video Game</option>
                    <option value="console">Consoles</option>
                    <option value="merch">Merch</option>
                </select>
            </div>
            <!-- <div class="form-group">
                <select name="role"><option value="admin" >admin</option></select>
            </div><br> -->
            <div class="d-flex flex-row align-items-center justify-content-between">
              
              <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>


</html>
