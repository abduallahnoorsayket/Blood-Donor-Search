

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
 width:400px;
 
}

body
{
padding:0;
margin:0;
background-color:skyblue;
}

input
{
padding :5px;
}

</style>

<body>


<form action="aiproject_home2.php" method="POST" enctype="multipart/form-data">
<table align="center" bgcolor="gray">


<tr>
<td align="center"><strong>name:</strong></td>
<td><input type="text" name="username" placeholder="enter your name" required="required"/> </td>
</tr> 


<tr>
<td align="center"><strong>blood group:</strong></td>
<td><input type="text" name="blood" placeholder="enter your blood group" required="required"/> </td>
</tr>



<tr>
<td align="center"><strong>email:</strong></td>
<td><input type="text" name="email" placeholder="enter your email" required="required"/> </td>
</tr>


<tr>
<td align="center"><strong>area:</strong></td>
<td><input type="text" name="area" placeholder="enter your area" required="required"/> </td>
</tr>






<tr>
<td align="center"><strong>address:</strong></td>
<td><input type="text" name="address" placeholder="enter your area" required="required"/> </td>
</tr>



<tr>
<td align="center"><strong>distance:</strong></td>
<td><input type="text" name="distance" placeholder="enter distance"/> </td>
</tr>







<tr>
<td align="center"><strong>phone number:</strong></td>
<td><input type="text" name="user_phonenumber" placeholder="enter your phonenumber"/> </td>
</tr>





<tr>
<td align="center"><strong>gender:</strong></td>
<td>
<input type="radio" name="user_gender" value="male"/>male
<input type="radio" name= "user_gender" value="female"/>female
</td>
</tr>


<tr>
<td align="center"><strong>birthday:</strong></td>
<td><input type="date" name="b_day"/> </td>
</tr>





<tr align="center">
<td colspan="8"> <input type="submit" name="sub" value="submit"/> </td>
</tr>

<tr align="center">
<td colspan="8"> <input type="reset"/> </td>
</tr>
</table>

    <p>
		Already a member? <a href="login.php">Sign in</a>
	</p>


<?php 

if (isset($_POST['sub']))
{
$user_name=$_POST['user_name'];
$blood=$_POST['blood_group'];
$email=$_POST['user_email'];

$area=$_POST['area'];
$address=$_POST['address'];
$distance =$_POST['distance'];
$phone=$_POST['user_phonenumber'];
$gender=$_POST['user_gender'];
$bday=$_POST['b_day'];


if($area == '' || $address=='' || $distance=='' || $phone=='' || $gender=='')
{
	echo "<script>please enter all the fileds!!</script>";
	exit();
}




$con= mysqli_connect("localhost","root","","abir") or die ("cannot connect to database");


if (!$con)
{
	echo "couldnot connect database";
}
else {
	echo "connect database successfully";
}



	
	$insert = "INSERT INTO aiproject2 (id,name,email,area,address,distance,phone ,gender,b_day,blood )
	VALUES(NULL, '$user_name' , '$email', '$area', '$address', '$distance', '$phone', '$gender', '$bday', '$blood')";
	
	$run_insert=mysqli_query($con,$insert);
	if ($run_insert)
	{
		echo "<script>alert('you have successfully regestered!')</script>";
		echo "<script>window.open('aiprojecthomepage.html','_self')</script>";
	}
	
	else {
		
		echo "<script>alert('your data cannot insert into database')</script>";
		
	}
}

?>


</body>
</html>