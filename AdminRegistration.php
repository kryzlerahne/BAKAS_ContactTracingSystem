<!DOCTYPE html>
<html>
<head>
		<title>BAKAS: A Contact Tracing System</title>
		
<style>
.p1{
	position:relative;
	margin-top: 2%;
	font-family: "Acherus Militant 1";
	padding-right:280px;
	z-index: 1;
}
.p2{
	position:relative;
	margin-top: 12%;
	font-family: "Acherus Militant 1";
	padding-right:280px;
	z-index: 1;
}
.p5{
	position:relative;
	margin-top: 12%;
	font-family: "Acherus Militant 1";
	padding-right:280px;
	z-index: 1;
}
.p6{
	position:relative;
	margin-top: 12%;
	font-family: "Acherus Militant 1";
	padding-right:280px;
	z-index: 1;
}
.p3{
	font-family: "Adobe Gothic Std";
	font-size: 40px;
	padding-top:10px;
	margin-bottom:0px;
}
.p4{
	font-family: "Acherus Militant 1";
	font-size: 20px;
}
.shape{
	border-radius:25px;
	text-align:center;
    background-color:#343477;
    width:500px;
    height:570px;
	color:white;
	margin:auto;
	position:relative;
}
.center1{
	display: block;
	position: absolute;
	margin-left: 60px;
	
	width: 75%;
	padding: 8px 15px;
	box-sizing: border-box;
	border-radius: 10px;
	border-style:none;
}
.center2{
	display: block;
	position: absolute;
	margin-left: 60px;
	
	width: 75%;
	padding: 8px 15px;
	box-sizing: border-box;
	border-radius: 10px;
	border-style:none;
}
.center3{
	display: block;
	position: absolute;
	margin-left: 60px;

	width: 75%;
	padding: 8px 15px;
	box-sizing: border-box;
	border-radius: 10px;
	border-style:none;
}
.center4{
	display: block;
	position: absolute;
	margin-left: 60px;

	width: 75%;
	padding: 8px 15px;
	box-sizing: border-box;
	border-radius: 10px;
	border-style:none;
}
.cenImg{
	display: block;
	margin-left: auto;
	margin-right: auto;
    padding-top: 7px;

}

.btn1{
	font-family: "Acherus Militant 1";
	font-size: 17px;
	width: 150px;
	border-radius: 7px;
	margin-top:65px;
	margin-right:15px;
	border-style:none;
	cursor: pointer;
}
.btn2{
	font-family: "Acherus Militant 1";
	font-size: 17px;
	width: 150px;
	border-radius: 7px;
	margin-top:65px;
	margin-left:15px;
	border-style:none;
	cursor: pointer;
}
.success{
	  font-family: "Acherus Militant 1";
	  font-size: 14px;
	  text-align:center;
	  color: #343477;
}

</style>
</head>	

<!-- For Admin -->

	<body style="background-color:#FFF9E7;">
		
		<img src="images/logo.png" width="330px" alt="BAKAS" class="cenImg">
		<div class="shape">	
			<p class = "p3"> REGISTER</p>
			<hr style="width:75%;margin-left:auto;margin-right:auto;">
			<p class = "p4"> Create your account.</p>
			<form action="AdminRegistration.php" method="POST">
			
			<p class = "p1">First Name:</p>
			<input type="text" name="firstName" class="center1" >
			
			<p class = "p2">Last Name:</p>
			<input type="text" name="lastName" class="center2">	
			
			<p class = "p5">Username:</p>
			<input type="text" name="user" class="center3" >
			
			<p class = "p6">Password:</p>
			<input type="password" name="password" class="center4">
		
			<input type="submit" name="add" value="Add Admin" class="btn2">
			<input type="reset" name="clear" value="Reset" class="btn2">
			</form>
		</div>
		
	</body>

<?php

error_reporting(E_ALL & ~E_NOTICE);

$mysqli = new mysqli("localhost", "root", "" ,"db_bakascts") or die(mysqli_error($mysqli));

if (isset($_POST['add'])){
	$firstName=$_POST['firstName'];
	$lastName=$_POST['lastName'];
	$userEmail=$_POST['user'];
	$userPass=$_POST['password'];
	
		$result = $mysqli->query("INSERT INTO tb_login(firstName, lastName, user, password) VALUES('$firstName','$lastName','$userEmail','$userPass')") or die($mysqli->error);
	
	if($result)
	{
	  echo '<div class="success">';  
	  echo "<h3>Succesfully added!</h3>";
	  echo '</div>';
	}
	else{
	  echo '<div class="success">'; 
	  echo "<h3>Unsuccesful.</h3>";
	  echo '</div>';
	}
}
?>

</html>
