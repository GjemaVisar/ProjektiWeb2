<?php 
session_start();
$name = $_SESSION['admin'];
require('../storeDB.php');

if(isset($_POST['edit_btn']))
{
    $id = $_POST['edit_id'];
    
    $query = "SELECT * FROM product where pid='$id' ";
    $query_run = mysqli_query($conn, $query);

    foreach($query_run as $row){

        ?>
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <h2 class="card-title text-center" style="color:#ffffff" >Edit Game Information</h2>
                <div class="card-body py-md-4">
                    <form _lpchecked="1" method="POST" >

                        <input type="hidden" name="edit_id" value="<?php echo $row['pid'] ?>" >
                        <div class="form-group">
                            <input type="text" class="form-control" name="edit_name" value="<?php echo $row['product_name'] ?>"  id="name" placeholder="Product Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="edit_price" value="<?php echo $row['product_price'] ?>" id="price" placeholder="Product Price">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="edit_description" 
                                    value="<?php echo $row['product_description'] ?>" id="description" placeholder="Product Description">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="edit_image" 
                                    value="<?php echo $row['product_image'] ?>" id="image" placeholder="Product Image">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="edit_quantity" 
                                    value="<?php echo $row['quantity'] ?>" id="quantity" placeholder="Product Quantity">
                        </div>


                        <div class="form-group">    
                        <select class="form-control" name="edit_category">
                            <option value="videogame">Video Game</option>
                            <option value="console">Consoles</option>
                            <option value="merch">Merch</option>
                        </select>
                        </div>

                        <div>
                            <a href="games.php" class="btn btn-primary" >Cancel</a>
                            <button type="submit" name="updatebtn" class="btn btn-primary" >Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
            
        <?php 

    }

}

?>

<?php 

    if(isset($_POST['updatebtn']))
    {
        $pid = $_POST['edit_id'];
        $product_name = $_POST['edit_name'];
        echo $product_name;

        $product_price = $_POST['edit_price'];
        $float_val = floatval($product_price);
        echo $float_val;

        $product_description = $_POST['edit_description'];
        echo $product_description;

        $product_image = $_POST['edit_image'];
        echo $product_image;

        $product_category = $_POST['edit_category'];
        echo $product_category;

        $product_quantity = $_POST['edit_quantity'];
        $quantity = intval($product_quantity);

        $query = "UPDATE product SET product_name='$product_name', product_price=$float_val,
         product_description='$product_description', product_image = '$product_image',
         category = '$product_category',quantity = $quantity WHERE pid='$pid' ";

        $query_run = mysqli_query($conn,$query);

        if($query_run){
            $_SESSION['success'] = "Your data is Updated";
            header('Location: games.php');
        }
        else{
            $_SESSION['status'] = "Your data is NOT Updated";
            header('Location: games.php');
        }

    }

?>


<!Doctype HTML>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="admin.css" type="text/css"/>
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
  
  <a href="user.php"class="icon-a"><i class="fa fa-users icons"></i> &nbsp;&nbsp;Users</a>
  <a href="admins.php"class="icon-a"><i class="fa fa-lock" aria-hidden="true"></i> &nbsp;&nbsp;Admins</a>
  
  <a href="products.php"class="icon-a"><i class="fa fa-gamepad icons"></i> &nbsp;&nbsp;Products</a>
  <a href="../faq.php"class="icon-a"><i class="fa fa-list-alt icons"></i> &nbsp;&nbsp;Faq</a>
  <a href="logout.php"class="icon-a"><i class="fa fa-level-down icons"></i> &nbsp;&nbsp;Log Out</a>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>


</html>