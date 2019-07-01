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

<body>

<br>
<br>
<br>
<form action="serach2(sayket).php" method="POST" enctype="multipart/form-data">
<table align="center" bgcolor="gray">


<tr>
<td align="center"><strong>area:</strong></td>
<td><input type="text" name="area" placeholder="enter area" required="required"/> </td>
</tr> 



<tr>
<td align="center"><strong>blood group:</strong></td>
<td><input type="varchar" name="blood" placeholder="enter blood group" required="required"/> </td>
</tr>

<tr align="center">
<td colspan="8"> <input type="submit" name="sub" value="submit"/> </td>
</tr>

<tr align="center">
<td colspan="8"> <input type="reset"/> </td>
</tr>
</table>


<?php

if (isset($_POST['sub']))
{
$area =$_POST['area'];
$blood=$_POST['blood'];

$con= mysqli_connect("localhost","root","","donate blood") or die ("cannot connect to database");


if (!$con){
	echo "<br>couldnot connect database<br>";
}
else {
	echo "<br><br>connect database successfully<br>";
	
}

?>


<table align="center">
	<tr align="center">
		<td colspan="8"><h2>view all users</h2></td>
	</tr>
	
		<tr>
		<th>s.n</th>
		<th>name</th>
		<th>email</th>
		<th>blood group</th>
		<th>address</th>
		<th>distance</th>
		<th>area</th>
		<th>contact number</th>
		</tr>

<?php
	
		$p= "SELECT * FROM users WHERE area='$area' AND blood='$blood' ";
		$run_email= mysqli_query($con,$p);
	    
		$i=0;
	while ($row=mysqli_fetch_array($run_email))
	
	{
		//$seq= $row['seq'];
		$username = $row ['username'];
		$email = $row ['email'];
		$blood = $row ['blood'];
		$area=$row['area'];
		$address = $row ['address'];
		$distance=$row['distance'];
		$phone=$row['phone'];
		$i++;
		
		
	
	?>
	
	<tr align="center">
		<td><?php echo $i ;?></td>
		<td><?php echo $username; ?></td>
		<td><?php echo $email ;?></td>
		<td><?php echo $blood; ?>
		<td><?php echo $address ?></td>
		<td><?php echo $distance ?></td>
		<td><?php echo $area?></td>
		<td><?php echo $phone ?></td>
		</tr>

	<?php
}
}
?>	 

	
</table>	





<?php

if (isset($_POST['sub']))
{
	$area =$_POST['area'];
    $blood=$_POST['blood'];

$con= mysqli_connect("localhost","root","","donate blood") or die ("cannot connect to database");


if (!$con){
	echo "<br>couldnot connect database<br>";
}
else {
	echo "<br><br>To see information<br>";
	
}

?>


<?php
	
		$p= "SELECT * FROM  node_inf WHERE node='$area' ORDER BY cndis+cntime ASC";
		$run_email= mysqli_query($con,$p);
	    
		$i=0;
	while ($row=mysqli_fetch_array($run_email))
	
	{
		 
        $cn=$row['cn'];
		$cndis=$row['cndis'];
		$cntime=$row['cntime'];
		$i++;
		
		echo $area."--->".$cn."-->".$cndis."-->".$cntime."<br>";
		
	?>
	
	
	<?php 
}              // these are the ending of while and isset.
}
?>
	
		
 
	<?php

if (isset($_POST['sub']))
{
	$area =$_POST['area'];
    $blood=$_POST['blood'];

$con= mysqli_connect("localhost","root","","donate blood") or die ("cannot connect to database");


if (!$con){
	echo "<br>couldnot connect database<br>";
}
else {
	echo "<br><br>To see information<br>";
	
}  

?>

<table align="center">
	<tr align="center">
		<br/><td colspan="8"><h2>YOU MAY CONTACT WITH THEM</h2></td>
	</tr>
	
		<tr>
		<th>s.n</th>
		<th>name</th>
		<th>email</th>
		<th>blood group</th>
		<th>address</th>
		<th>distance</th>
		<th>area</th>
		<th>contact number</th>
		</tr>


<!--
<?php
/*
if (isset($_POST['sub']))
{
	$area =$_POST['area_name'];
    $blood=$_POST['blood'];

$con= mysqli_connect("localhost","root","","donate blood") or die ("cannot connect to database");


if (!$con){
	echo "<br>couldnot connect database<br>";
}
else {
	echo "<br><br>To see information<br>";
	
}


*/


?>
	-->	
		
		
<?php





//$p= "SELECT * FROM users WHERE area='$cn' and blood = '$blood' ";
 	//$p= "SELECT * FROM users WHERE area='$area' AND blood='$blood' ";
	$p= "SELECT * FROM users WHERE blood='$blood' and area in (SELECT cn FROM users, node_inf WHERE area='$area' and node = '$area')";
	$run_email= mysqli_query($con,$p);
	    
		$i=0;
	while ($row=mysqli_fetch_array($run_email))
	
	{
		$id= $row['id'];
		$username = $row ['username'];
		$email = $row ['email'];
		$blood = $row ['blood'];
		$area=$row['area'];
		$address = $row ['address'];
		$distance=$row['distance'];
		$phone=$row['phone'];
		$i++;
		
		
	
	?>
	
	<tr align="center">
		<td><?php echo $i ;?></td>
		<td><?php echo $username; ?></td>
		<td><?php echo $email ;?></td>
		<td><?php echo $blood; ?>
		<td><?php echo $address ?></td>
		<td><?php echo $distance ?></td>
		<td><?php echo $area?></td>
		<td><?php echo $phone ?></td>
		</tr>
<?php 
}
}

?>
</table>


 </table> 
 <center>

<a  href="index.php" >home</a>   
   
   </center>
</body>

</body>

<head>


</html>