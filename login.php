
<?php
    require('storeDB.php');

    session_start();
    
        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $salt = 'salt@_hellosalt';

            $hashed = hash('sha256',$password.$salt);
            $hashed = substr($hashed,0,20);
            
            $select = "SELECT * FROM user WHERE email= '$email' &&
                        password = '$hashed' ";
            
            $check = mysqli_query($conn,$select);



            if(mysqli_num_rows($check)==1){
                #echo "Login success";
                $row = mysqli_fetch_array($check);
                
                if($row['role'] == 'admin'){
                    $_SESSION['admin'] = $row['name'];
                    header("Location:admin.php", TRUE, 301);

            	}
                else if($row['role'] == 'user'){
                    $_SESSION['user'] = $row['name'];
                    header("Location:user-page.php", TRUE, 301);
           	 	}	

                // header("Location: http://localhost/ProjektiWeb2/", TRUE, 301);
                // exit();
			}	
			else{
                $error[] = 'Incorrect';
            }
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
	<!-- <div class="form-container sign-up-container">
		<form action="signupInsert.php" method="post">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<div>
				<input type="text" name="name" placeholder="Name" required/>
				<?php if(isset($errors)): ?>
					<span><?php echo $errors; ?> </span>
				<?php endif ?>
			</div>
			<input type="email"name="email"  placeholder="Email" required/>
			<input type="password" name="password" placeholder="Password" required/>
			<input type="password" name="cfpassword" placeholder="Confirm Password" required/>
			<select name="role" >
				<option value="user" >user</option>
				<option value="admin" >admin</option>
			</select>
			<input type="submit" name="submit" value="Submit">
		</form>
	</div> -->
	<div class="form-container sign-in-container">
		<form action="" method="post">
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
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp" ><a href="signup.php">Sign Up</a></button>
			</div>
		</div>
	</div>
</div>
<script src="login.js"></script>

</body>
</html>