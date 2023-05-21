<?php 

require('../../storeDB.php');
session_start();
$name = isset($_SESSION['admin']) ? $_SESSION['admin'] : null;
$adminId = isset($_SESSION['admin_id']) ? $_SESSION['admin_id'] : null;
 // nese preket back button dhe munohet te kete qasje pa bere login
 if ($name === null ) {
    // User is not logged in or session expired, redirect to the login page
    header('Location: ../../login.php');
    exit();
}


if(isset($_POST['edit_btn']))
{
    $id = $_POST['edit_id'];
    if ($adminId == 13) {
    
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
                            <label style="color:#f1f1f1">Verify your password</label>
                            <input type="password" class="form-control" name="edit_password" id="password" placeholder="Password">
                        </div>
                        <?php if(isset($errors)): ?>
                            <span><?php echo $errors; ?> </span>
                        <?php endif ?>
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

} else {
  // Redirect other admins to accounts.php
  header('Location: accounts.php');
  exit();
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

        $sql = "SELECT name, email, salt, password FROM user WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $salt_in_database = $row['salt'];
        $password_in_database = $row['password'];
        $errors = '';

        $hashed= hash('sha256',$password.$salt_in_database);

        if($hashed = $password_in_database){
          $query = "UPDATE user SET name='$name', email='$email' WHERE id='$id' ";
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
  <a href="../logout.php"class="icon-a"><i class="fa fa-level-down icons"></i> &nbsp;&nbsp;Log Out</a>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php  mysqli_close($conn); ?>
</body>


</html>