<?php 
	include('function.php');
	if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="#000000">


   <br>
    <br>
	 <br>
	 <br>
	 <br>
  <!--	 <marquee> <h2> <font color="black"> HELLO   EVERYONE!! This project is represented by MD.ABDULLAH  SAYKET   and ASHIK MAHMUD....  to MAHAMUDUL HASAN SIR. </font> </h2> </marquee>   -->
	  <br>


	<div class="header">
		<h1>Home Page</h1>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">
			<img src="download.jpg"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" style="color: red;">logout</a>
					</small>

				<?php endif ?>
			</div>
		</div>
	
	</div>
	
	<br>
	
    <center>
<table   width="1000" border="0" bgcolor="#999999">
		
			<tr>
				
				<!--<td colspan="3"> <img src="HomePage.jpg" height="200" width="1000" /> </td> -->
			
			</tr>
			
			<tr>
				
				<td colspan="3" align="center"><font color="#WWWWW"><a href="index.php">Home</a> &nbsp; &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp; <a href="insert_node.php">enter nodes</a> &nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp; <a href="updatenode_inf.php">update nodes</a> &nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp; <a href="serach2(sayket).php">search</a>&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp; <a href="Update_INFO_2.php"> Update_info</a>  &nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp; <a href="delete_info.php"> Delete_info</a> </font> <hr align="center" width="70%" /> </td> 
			
			</tr>
			
			
			
			
		</table>
		<center>
		
</body>
</html>