<?php
    require('storeDB.php');
		
		
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
	
		// RegEx
		$usernameRegex = "/^[a-zA-Z0-9_]{4,20}$/";
		$emailRegex = "/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/";
		$passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
	
		$errors = "";
		$u = "SELECT name from user where name = '$name'";
        $u_query = mysqli_query($conn,$u);
            
        $e = "SELECT email from user where email ='$email'";
        $e_query = mysqli_query($conn,$e);
	
		if (!preg_match($usernameRegex, $name)) {
			$errors = "Username should have 4 to 20 characters";
		}
		elseif (!preg_match($emailRegex, $email)) {
			$errors = "Invalid email format";
		}
		elseif (!preg_match($passwordRegex, $password)) {
			$errors = "Password should include at least 8 charachters (1 upper , lower and a symbol character)";
		}
		elseif(mysqli_num_rows($u_query) > 0){
			$errors = "Username taken";
		}
		elseif(mysqli_num_rows($e_query) > 0){
			$errors = "This email already has an account";
		}
		elseif($password != $cfpassword){
			$errors = "Password and confirm password should be the same";
		}
		else {
			$salt = generate_salt($length);
			$hashed = hash('sha256',$password.$salt);
	
			if($insert = mysqli_query($conn,"INSERT INTO user(name, role, email, salt, password, datat) 
			VALUES ('$name','$role','$email','$salt','$hashed','$data')")){
				header("Location: login.php", TRUE, 301);
			}else{
				$errors = "Useri nuk mund te regjistrohej";
				echo "Error : ".$sql.":-".mysqli_error($conn);
			}
		}
		
		mysqli_close($conn);
	}
    

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
			
			<div>
				<input type="text" name="name" placeholder="Username" required/><!-- -->
				<input type="email"name="email"  placeholder="Email" required/><!-- -->
				<input type="password" name="password" placeholder="Password" required/><!-- -->
				<input type="password" name="cfpassword" placeholder="Confirm Password" required/><!-- -->
				<?php if(isset($errors)): ?>
        <span style="color: red;"><?php echo $errors; ?></span>
    <?php endif ?>
				<select hidden name="role" >
					<option value="user" selected >user</option>
					<option value="admin" >admin</option>
				</select>
				<p>If you have an accout please Sign In</p>
				<button class="ghost"><a href="login.php">Sign In</a></button>
				<input type="submit" name="submit" value="Submit">
			</div>
			
		</form>
	</div>
	
   </div>
	

<script src="login.js"></script>

</body>
</html>
