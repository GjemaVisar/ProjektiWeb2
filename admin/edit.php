<?php 
session_start();
require('../storeDB.php');

if(isset($_POST['edit_btn']))
{
    $id = $_POST['edit_id'];
    
    $query = "SELECT * FROM user where id='$id' ";
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
                <h2 class="card-title text-center" style="color:#ffffff" >Edit Admin Profile</h2>
                <div class="card-body py-md-4">
                    <form _lpchecked="1" method="POST" >

                        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>" >
                        <div class="form-group">
                            <input type="text" class="form-control" name="edit_name" value="<?php echo $row['name'] ?>"  id="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="edit_email" value="<?php echo $row['email'] ?>" id="email" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="edit_password" value="<?php echo $row['password'] ?>" id="password" placeholder="Password">
                        </div>
                        <div>
                            <a href="accounts.php" class="btn btn-primary" >Cancel</a>
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
    if(isset($_POST['updatebtn']))
    {
        $id = $_POST['edit_id'];
        $name = $_POST['edit_name'];
        $email = $_POST['edit_email'];
        $password = $_POST['edit_password'];

        $salt = generate_salt($length);
        $hashed = hash('sha256',$password.$salt);

        $query = "UPDATE user SET name='$name', email='$email', password='$hashed' WHERE id='$id' ";
        $query_run = mysqli_query($conn,$query);

        if($query_run){
            $_SESSION['success'] = "Your data is Updated";
            header('Location: accounts.php');
        }
        else{
            $_SESSION['status'] = "Your data is NOT Updated";
            header('Location: accounts.php');
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
	<p class="logo"><span>M</span>-SoftTech</p>
  <a href="#" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;Dashboard</a>
  <a href="user.php"class="icon-a"><i class="fa fa-users icons"></i> &nbsp;&nbsp;Users</a>
  <a href="admins.php"class="icon-a"><i class="fa fa-lock" aria-hidden="true"></i> &nbsp;&nbsp;Admins</a>
  <a href="#"class="icon-a"><i class="fa fa-list icons"></i> &nbsp;&nbsp;Projects</a>
  <a href="#"class="icon-a"><i class="fa fa-shopping-bag icons"></i> &nbsp;&nbsp;Orders</a>
  <a href="#"class="icon-a"><i class="fa fa-tasks icons"></i> &nbsp;&nbsp;Inventory</a>
  <a href="#"class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Accounts</a>
  <a href="#"class="icon-a"><i class="fa fa-list-alt icons"></i> &nbsp;&nbsp;Tasks</a>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>


</html>