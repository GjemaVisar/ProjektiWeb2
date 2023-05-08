<?php
    require('storeDB.php');
		
		//created salt generating function with length 10
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

	
		
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cfpassword = $_POST['cfpassword'];
            $role = $_POST['role'];
            $data = date('d/m/Y');
            
            $u = "SELECT name from user where name = '$name'";
            $u_query = mysqli_query($conn,$u);
            
            $e = "SELECT email from user where email ='$email'";
            $e_query = mysqli_query($conn,$e);
            
            $errors = "";
            if(mysqli_num_rows($u_query)>0){
                $errors = "Username exists";
            }else if(mysqli_num_rows($e_query)>0){
                $errors= "Email exists";
            }
            else if($password != $cfpassword){
                $errors = "Password and confirm password should be the same";
            }
           
            else if($password == $cfpassword){
                $salt = generate_salt($length);
                $hashed = hash('sha256',$password.$salt);

                if($insert = mysqli_query($conn,"INSERT INTO user(name,role,email,salt,password,datat) 
                VALUES ('$name','$role','$email','$salt','$hashed','$data')")){
                    header("Location:login.php", TRUE, 301);

                }else{
                    echo "Error : ".$sql.":-".mysqli_error($conn);
                }
            }
        }
        mysqli_close($conn);
    
#<p class='text-danger'><?php  if(isset($errors['e'])){echo $errors['e'];} / </p>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="login.css">
	
</head>
<body>
   <div class="container" id="container">
	<div class="">
		<form action="" method="post">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<div>
				<input type="text" name="name" placeholder="Name" required/><!-- -->
				<?php if(isset($errors)): ?>
					<span><?php echo $errors; ?> </span>
				<?php endif ?>
				<input type="email"name="email"  placeholder="Email" required/><!-- -->
				<input type="password" name="password" placeholder="Password" required/><!-- -->
				<input type="password" name="cfpassword" placeholder="Confirm Password" required/><!-- -->
				<select name="role" >
					<option value="user" >user</option>
					<option value="admin" >admin</option>
				</select>
				<p>If you have an accout please Sign In</p>
				<button class="ghost"><a href="login.php">Sign In</a></button>
				<input type="submit" name="submit" value="Submit">
			</div>
			
		</form>
	</div>
	<!-- <div class="form-container sign-in-container">
		<form action="loginInsert.php" method="post">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<?php if(isset($errors)): ?>
					<span><?php echo $errors; ?> </span>
				<?php endif ?>
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="password" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<input type="submit" name="submit" value="Submit">
		</form>
	</div> -->
	<!-- <div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost"><a href="login.php">Sign In</a></button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div> -->
</div>
<script src="login.js"></script>

</body>
</html>
