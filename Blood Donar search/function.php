

<?php 
session_start();

// connect to database
$db = mysqli_connect("localhost", "root", "", "donate blood");

// variable declaration
$username = "";
$email    = "";
$errors   = array(); 
$blood    = "";
$area    = "";
$address  = "";
$distance ="";
$phone = "";
$gender  = "";
$bday  = "";
//$password_1 = "";
//$password_2 = "";
$user_type  = "";

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {     // register btn
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email,$blood ,$area, $address, $distance, $phone,  $gender, $bday,$password_1 , $password_2, $user_type;
	       
           // if ($_SERVER["REQUEST_METHOD"] == "POST") {		   
					  
$username= e($_POST['username']);
$blood=   e($_POST['blood']);
$email=  e($_POST['email']);
$area=  e($_POST['area']);
$address=  e($_POST['address']);
$distance =  e($_POST['distance']);
$phone=  e($_POST['phone']);
$gender=  e($_POST['gender']);
$bday=   e($_POST['bday']);
$password_1  =  e($_POST['password_1']);
$password_2  =  e($_POST['password_2']);  
$user_type=  e($_POST['user_type']);	

	// form validation: ensure that the form is correctly filled//
	if (empty($username) || empty($email)){ 
		array_push($errors, "Username and email is required"); 
	}
	else
	{
		$check_user_exits="SELECT * FROM users WHERE username='$username' or email='$email' LIMIT 1 "; 
		$result=mysqli_query ($db, $check_user_exits);
		$user=mysqli_fetch_assoc($result);
		
		if($user)
		{
			
			if($user['username']==$username)
			{
				array_push($errors," username exits");
			}
		   
            if($user['email']==$email)
			{
				array_push($errors," email exits");
			}		   
			
			
		}
		//$username=is_valid_username($_POST["username"]);
		//$name = test_input($_POST["name"]);
		
	}
	
	
	/*if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	else
	{
		
		
	}*/
	
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	/*else
	{
		
		
	}*/
	
	
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}
	
	if (empty($blood)) { 
		array_push($errors, "blood group  is required"); 
	}
	
	if (empty($address)) { 
		array_push($errors, "address is required"); 
	}
	
	if (empty($distance)) { 
		array_push($errors, "distance is required"); 
	}
	
	if (empty($area)) { 
		array_push($errors, "area is required"); 
	}
	
	if (empty($gender)) { 
		array_push($errors, "gender is required"); 
	}
	
	if (empty($bday)) { 
		array_push($errors, "bday  is required"); 
	}

	if (empty($phone)) { 
		array_push($errors, "phone is required"); 
	}
	/*else
	{
		
	}*/
	
			/*}
	function is_valid_username($username){
// accepted username length between 5 and 20
    if (preg_match('/^\w{3,5}$/', $username))
        return true;
    else
        return false;
}
 */
	
	
	
	
	
	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users (id,username, email,blood ,password, address, distance,phone,area,gender,bday, user_type) 
					  VALUES(NULL,'$username', '$email','$blood' ,'$password', '$address', '$distance','$phone','$area','$gender','$bday', '$user_type')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: home.php');
		}else{
			$query = "INSERT INTO users (id,username, email,blood ,password, address, distance,phone,area,gender,bday, user_type) 
					  VALUES(NULL,'$username', '$email','$blood' ,'$password', '$address', '$distance','$phone','$area','$gender','$bday', 'user')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: index.php');				
             //header('location: Adminhomepage.html');		
		}
		
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}	

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
   header("location: login.php");
   //header('location: Adminhomepage.html');
  }

if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password); // encrypt.

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin/home.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: index.php');
			    // header('location: Adminhomepage.html');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}
