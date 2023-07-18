<?php

error_reporting(E_ALL & ~E_NOTICE);

session_start();

$mysqli = new mysqli("localhost", "root", "" ,"db_bakascts") or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$fn = '';
$ln = '';
$us = '';
$pw = '';

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result= $mysqli->query("SELECT * FROM tb_login WHERE idNum=$id") or die($mysqli->error());
    if(count($result)==1){
        $row = $result->fetch_array();
		$id = $row['idNum'];
        $fn = $row['firstName'];
        $ln = $row['lastName'];
        $us = $row['user'];
        $pw = $row['password'];
    }
}

else if (isset($_POST['update_btn'])){
    $id = $_POST['idNum'];
    $fn = $_POST['firstName'];
    $ln = $_POST['lastName'];
    $us = $_POST['user'];
    $pw = $_POST['password'];

    $result = $mysqli->query("UPDATE tb_login SET firstName='$fn', lastName='$ln', user='$us', password='$pw' WHERE idNum=$id") or die($mysqli->error);
    
    if($result)
	{
	  echo '<div class="success">';  
	  echo "<h3>Updated succesfully!</h3>";
	  echo '</div>';
	}
	else{
	  echo '<div class="success">'; 
	  echo "<h3>Unsuccesful.</h3>";
	  echo '</div>';
	}
    
    header('location: registeredAdmin.php');
}
?>

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
.updateBtn{
	font-family: "Acherus Militant 1";
	font-size: 17px;
	width: 150px;
	border-radius: 7px;
	margin-top:35px;
	margin-right:15px;
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
		
		<form action="updateAdmin.php" method="POST">
		 <input type="hidden" name="id" value="<?php echo $id; ?>" />
		<div class="shape">	
			<p class = "p3"> REGISTER</p>
			<hr style="width:75%;margin-left:auto;margin-right:auto;">
			<p class = "p4"> Create your account.</p>
			<form action="updateAdmin.php" method="POST">
			
			<p class = "p1">First Name:</p>
			<input type="text" name="firstName" class="center1" value="<?php echo $fn?>" >
			
			<p class = "p2">Last Name:</p>
			<input type="text" name="lastName" class="center2" value="<?php echo $ln?>">	
			
			<p class = "p5">Username:</p>
			<input type="text" name="user" class="center3" value="<?php echo $us?>" >
			
			<p class = "p6">Password:</p>
			<input type="password" name="password" class="center4" value="<?php echo $pw?>">
			
			<br><input type="hidden" name="idNum" class="txtBox" 
            value="<?php echo $id?>"><br>
            
<?php
if ($update == true):
?>        
        <input type="submit" name="update_btn" value="Update" class="updateBtn">
		</div>
		
<?php endif; ?>  
			
	</body>
</html>