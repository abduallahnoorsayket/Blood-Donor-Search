

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
 width:1000px;
 background: orange;
 
}

body
{
padding:0;
margin:0;
background-color:skyblue;
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


<form action="serachai2(ABIR).php" method="POST" enctype="multipart/form-data">
<table align="center" bgcolor="gray">


<tr>
<td align="center"><strong>area:</strong></td>
<td><input type="text" name="area_name" placeholder="enter your name" required="required"/> </td>
</tr> 



<tr>
<td align="center"><strong>blood group:</strong></td>
<td><input type="text" name="blood" placeholder="enter your email" required="required"/> </td>
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
$area =$_POST['area_name'];
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
	
		$p= "SELECT * FROM data1 WHERE area='$area' AND blood='$blood' ";
		$run_email= mysqli_query($con,$p);
	    
		$i=0;
	while ($row=mysqli_fetch_array($run_email))
	
	{
		$id= $row['id'];
		$name = $row ['name'];
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
		<td><?php echo $name; ?></td>
		<td><?php echo $email ;?></td>
		<td><?php echo $blood; ?>
		<td><?php echo $address ?></td>
		<td><?php echo $distance ?></td>
		<td><?php echo $area?></td>
		<td><?php echo $phone ?></td>
		</tr>

		
<?php
}}
?>	 

</table>	





<?php

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

?>



<?php
	
		$p= "SELECT * FROM  node_inf WHERE node='$area' ORDER BY cndis+cntime DESC";
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




<?php

$p= "SELECT * FROM data1 WHERE area='$cn' and blood = '$blood' ";
		$run_email= mysqli_query($con,$p);
	    
		$i=0;
	while ($row=mysqli_fetch_array($run_email))
	
	{
		$id= $row['id'];
		$name = $row ['name'];
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
		<td><?php echo $name; ?></td>
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


<a  href="index.php" >home</a>   
   
   
</body>



	
</body>



</head>
</html>