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
<form action="insert_node.php" method="POST" enctype="multipart/form-data">
<table align="center" bgcolor="blue">


<tr>
<td align="center"><strong>node:</strong></td>
<td><input type="text" name="node" placeholder="enter node name" required="required"/> </td>




<td align="center"><strong>closest node:</strong></td>
<td><input type="text" name="cn" placeholder="enter  closest node" required="required"/> </td>
</tr>

</table>
<table align="center" bgcolor="gray">


<tr>
<td align="center"><strong>distance:</strong></td>
<td><input type="text" name="dis1" placeholder="enter distance" required="required"/> </td>
</tr> 

<tr>
<td align="center"><strong>time:</strong></td>
<td><input type="text" name="time1" placeholder="enter time" required="required"/> </td>
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
 echo $node=$_POST['node'];
  echo$cn=$_POST['cn'];
//$cn1=$_POST['cn1'];
 echo $dis1=$_POST['dis1'];
//$node1=$_POST['node1'];
 echo $time1=$_POST['time1'];



$con= mysqli_connect("localhost","root","","donate blood") or die ("cannot connect to database");


if (!$con)
{
	echo "couldnot connect database";
}
else {
	echo "connect database successfully";
}

	
	$insert = "INSERT INTO node_inf (node,cn,cndis,cntime)
    VALUES('$node','$cn','$dis1','$time1')";
	
	$run_insert=mysqli_query($con,$insert);
	if ($run_insert)
	{
		echo "<script>alert('YOU HAVE SUCCESSFULLY REGESTERED!')</script>";
		echo "<script>window.open('index.php','_self')</script>";
		
	}
	
	else {
		
		echo "<script>alert('YOUR DATA CANNOT INSERT INTO DATABASE')</script>";
		
	}
}

?>
<center>
<a  href="index.php" >home</a>  
</center>
</body>

</html>