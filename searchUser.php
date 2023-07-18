<?php

ini_set('display_errors',1);
error_reporting(E_ALL & ~E_NOTICE);

$idNum=$_POST['idNum'];

mysql_connect("localhost", "root", "") 
or die("");


mysql_select_db("db_bakascts") 
or die("");
echo"";

$idNum=$_POST['idNum'];
$email=$_POST['email'];
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$password=$_POST['password'];
$image_path=$_POST['image_path'];
$contactNum=$_POST['contactNum'];
$address=$_POST['address'];
$city=$_POST['city'];

if(isset($_POST['searchBtn'])){
		$result=mysql_query("SELECT* FROM tb_usersreg WHERE idNum='$idNum'") or die(mysql_error());

		echo"
		<th>ID Number</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
		<th>Password</th>
		<th>Contact Number</th>
		<th>Address</th>
		<th>City</th>
			";

		while($row=mysql_fetch_assoc($result))
			{

			echo"<tr><td>".$row['idNum'];
			echo"</td><td>".$row['firstName'];
			echo"</td><td>".$row['lastName'];
			echo"</td><td>".$row['email'];
			echo"</td><td>".$row['password'];
			echo"</td><td>".$row['contactNum'];
			echo"</td><td>".$row['address'];
			echo"</td><td>".$row['city'];
			echo"</td></tr>";
			}
	
		}

?>