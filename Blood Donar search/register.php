
<?php include('function.php') ?>

<!DOCTYPE html>
<html>

<head>
	<title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css" />

	</head>
<body>
<div class="header">
	<h2>Register</h2>
</div>
<form method="post" action="register.php">
     <?php echo display_error(); ?>
	<div class="input-group">
		<label>Username</label>
		<input type="varchar" name="username" value="<?php echo $username; ?>">
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" value=" <?php echo $email; ?>">
	</div>
	
	<div class="input-group">
		<label>Bloodgroup</label>
		<input type="varchar" name="blood" >  <!-- value="<?php// echo $username; ?>" >  -->
	</div>
	
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password_1">
	</div>
	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="password_2">
	</div>
	
	
	<div class="input-group">
		<label>address</label>
		<input type="text" name="address"  value="<?php echo $username; ?>">
	</div>
	
	<div class="input-group">
		<label>distance</label>
		<input type="number" name="distance"  value="<?php echo $username; ?>">
	</div>
	
	<div class="input-group">
		<label>phone</label>
		<input type="number" name="phone"  value="<?php echo $username; ?>">
	</div>
	
	<div class="input-group">
		<label>area</label>
		<input type="text" name="area"  value="<?php echo $username; ?>">
	</div>
	
	<div class="input-group">
		<p>gender</p>
		male  :<input type="radio" name="gender"value="male">
		female:<input type="radio" name="gender"value="female">
	</div>
	
	<div class="input-group">
		<label>birthdate</label>
		<input type="date" name="bday">
	</div>
	
	<div class="input-group">
		<label>User_type</label>
		<input type="varchar" name="user_type">
	</div>
	
	
	<div class="input-group">
		<button type="submit" class="btn" name="register_btn">Register</button>
	</div>
	<p>
		Already a member? <a href="login.php">Sign in</a>
	</p>
</form>
</body>
</html>