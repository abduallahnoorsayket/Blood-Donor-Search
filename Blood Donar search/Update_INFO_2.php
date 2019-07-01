<?php include('function.php') ?>
<!DOCTYPE html>
<html>
<head>
<title>regestation form</title>
</head>
<style>
table 
{
  color:white;
 padding:10px;
 width:1500px;
 background: red;
 
}

body
{
padding:0;
margin:0;
background-color:white;
}

input
{
padding:5px;
}

th{
	border : 2px solid black;
}

</style>

<br>
<br>
<br>
<br>
<body>
<form action="Update_INFO_2.php" method="POST" enctype="multipart/form-data">
<table align="center" bgcolor="gray">

<tr>
<td align="center"><strong>enter username:</strong></td>
<td><input type="text" name="username" placeholder="enter your username" required="required"/> </td>
</tr> 



<tr>
<td align="center"><strong>email:</strong></td>
<td><input type="varchar" name="email" placeholder="enter email" required="required"/> </td>

</table>
<table align="center" bgcolor="gray">


<tr>
<td align="center"><strong>address:</strong></td>
<td><input type="text" name="address" placeholder="enter address" required="required"/> </td>
</t>

<tr>
<td align="center"><strong>phone:</strong></td>
<td><input type="varchar" name="phone" placeholder="enter phone" required="required"/> </td>
</tr> 


<tr align="center">
<td colspan="8"> <input type="submit" name="sub" value="submit"/> </td>
</tr>

<tr align="center">
<td colspan="8"> <input type="reset"/> </td>
</tr>
</table>


<?php
if(isset($_POST['sub'])){
$username=$_POST['username'];	

$email=$_POST['email'];
//$area=$_POST['area'];
$address=$_POST['address'];
$phone=$_POST['phone'];
//$node1=$_POST['node1'];
//$time1=$_POST['time1'];



$con= mysqli_connect("localhost","root","","donate blood") or die ("cannot connect to database");


if (!$con)
{
	echo "couldnot connect database";
}
else {
	echo "connect database successfully";
}

	
	$insert = "UPDATE users SET email='$email' , address='$address' , phone='$phone' WHERE username='$username'";
	
	$run_insert=mysqli_query($con,$insert);
	if ($run_insert)
	{
		echo "<script>alert('YOU HAVE SUCCESSFULLY UPDATED YOUR DATA!')</script>";
		echo "<script>window.open('index.php','_self')</script>";
		
	}
	
	else {
		
		echo "<script>alert('YOUR DATA CANNOT BE UPDATED INTO DATABASE')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}
}

?>

<center>
<a  href="index.php" >home</a>  

</center>
</body>

</html>