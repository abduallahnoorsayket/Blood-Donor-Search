<!DOCTYPE html>
<html>
<head>
<title>deletion form</title>
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

<body>
<br>
<br>
<br>
<br>
<form action="delete_info.php" method="POST" enctype="multipart/form-data">
<table align="center" bgcolor="blue">

<!--
<tr>
<td align="center"><strong>id_number:</strong></td>
<td><input type="varchar" name="id_num" placeholder="enter id_num" required="required"/> </td>
-->



<td align="center"><strong>Enter username:</strong></td>
<td><input type="text" name="username" placeholder="enter username" required="required"/> </td>
</tr>


<tr align="center">
<td colspan="8"> <input type="submit" name="sub" value="submit"/> </td>
</tr>

<tr align="center">
<td colspan="8"> <input type="reset"/> </td>
</tr>
</table>



<?php
if(isset($_POST['sub']))
{
//$id_num=$_POST['id_num'];
$username=$_POST['username'];



$con= mysqli_connect("localhost","root","","donate blood") or die ("cannot connect to database");


if (!$con)
{
	echo "couldnot connect database";
}
else {
	echo "connect database successfully";
}

$delete1="delete from users where  username='$username'";
	$run_delete1=mysqli_query($con,$delete1);
	if($run_delete1)
	{
		
		//echo "<script>alert('your data cannot delete from database')</script>";
		echo "<script>alert('you have successfully  deleted your data!')</script>";
	    echo "<script>window.open('index.php','_self')</script>";
		//exit();
}
 
 else {
		
		
		//echo "<script>alert('you have successfully  deleted your data!')</script>";
		echo "<script>alert('your data cannot delete from database')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}



}

?>
<center>
<a  href="index.php" >home</a>   
   </center>

</body>

</html>