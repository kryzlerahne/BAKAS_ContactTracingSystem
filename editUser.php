<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

session_start();

$mysqli = new mysqli("localhost", "root", "" ,"db_bakascts") or die(mysqli_error($mysqli));

		$id=$_SESSION['idNum'];
		$width = "250";
		$height = "250";
		$update = false;
$fn = '';
$ln = '';
$em = '';
$pw = '';
$im = '';
$cn = '';
$st = '';
$ct = '';
$brgy = '';
$gen = '';
$url = "https://chart.googleapis.com/chart?cht=qr&chs={$width}x{$height}&chl={$id}";
$file = $url;

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result= $mysqli->query("SELECT * FROM tb_usersreg WHERE idNum=$id") or die($mysqli->error());
    if(count($result)==1){
        $row = $result->fetch_array();
		$id = $row['idNum'];
        $fn = $row['firstName'];
        $ln = $row['lastName'];
        $em = $row['email'];
        $pw = $row['password'];
        $im = $row['image_path'];
		$cn = $row['contactNum'];
		$st = $row['street'];
		$ct = $row['city'];
		$brgy = $row['barangay'];
		$gen = $row['gender'];
		
		$width = "250";
		$height = "250";
		
		$url = "https://chart.googleapis.com/chart?cht=qr&chs={$width}x{$height}&chl={$id}";
		$qr["img"] = $url;
		
    }
}

else if (isset($_POST['update_btn'])){
  
  $target = "icons/".basename($_FILES['image_path']['name']);
  
    $id = $_POST['idNum'];
    $fn = $_POST['firstName'];
    $ln = $_POST['lastName'];
    $em = $_POST['email'];
    $pw = $_POST['password'];
    $cn = $_POST['contactNum'];
	$st = $_POST['street'];
	$ct = $_POST['city'];
	$brgy = $_POST['barangay'];
	$gen = $_POST['gender'];

	$im=$_FILES['image_path']['name'];
    $old_image = $_POST['stud_image_old'];
    
	if($im !='')
	{
	  $update_filename = $_FILES['image_path']['name'];
	}
	else{
	  $update_filename = $old_image;
	}
	
	if(file_exists("icons/" .$_FILES['image_path']['name']))
	{
		$filename = $_FILES['image_path']['name'];
		$_SESSION['status'] = "Image already exists.".$filename;
		header('location: updateUser.php');
	} 
	 
		$result = $mysqli->query("UPDATE tb_usersreg SET firstName='$fn', lastName='$ln', email='$em', password='$pw', image_path='$update_filename', contactNum='$cn', street='$st', barangay='$brgy', city='$ct', gender='$gen' WHERE idNum='$id'") or die($mysqli->error);
		$result_run = mysqli_query($mysqli, $result);
		  
		  if(result_run){
			if($_FILES['image_path']['name'] !=''){
				move_uploaded_file($_FILES['image_path']['tmp_name'], "icons/".$_FILES['image_path']['name']);
				unlink("icons/".$old_image);
			}
				$_SESSION['status'] = "Data updated succesfully.";
			}
			else{
			  	$_SESSION['status'] = "Data not updated.";
			}
	
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
	
    header('location: registeredIndiv.php');
}

?>

<html>
<head>
    <title>Users Registration</title>
<style>
    .cenImg{
    	display: block;
    	margin-left: auto;
    	margin-right: auto;
        margin-top: 15px;
    }
    .bgForm{
        position: absolute;
        z-index:1;
    	margin-left: 350px;
        padding-top: 1.5%;
        width: 810px;
        height:530px;
    }
    h2{
    	font-family: "Adobe Gothic Std";
    	font-size: 30px;
    	padding-top:20px;
    	margin-bottom:0px;
        position: absolute;
        top: 19%;
        left: 42%;
        transform: translate(-50%, -50%);
        color:#FFF9E7;
        z-index:3;
    }
    .textBg{
	  position: absolute;
	  z-index:2;
	  width:500px;
	  margin-left:400px;
	  margin-top:115px;
	}
	.iconContainer{
	  position: absolute;
	  z-index:4;
	  right:420px;
	  width:170px;
	  height:200px;
	  margin-top:116px;
	}
	.iconContainer img{
	  width:170px;
	  height:170px;
	  border-radius:12px;
	  object-fit:cover;
	}
	.qrContainer{
	  position: absolute;
	  z-index:4;
	  right:420px;
	  width:170px;
	  margin-top:305px;
	}
	.qrContainer img{
	  border-radius:12px;
	}
    .userDetails{
	  font-family:"Acherus Militant 1";
	  text-align:center;
	 position: absolute;
	  z-index:5;
	}
	#lbl{
	  margin-top: 135px;
	  margin-left:500px;
	}
	 #lbl1{
	  margin-left:500px;	  
	  font-weight:normal;
	}
	#lbl2{
	  font-weight:normal;
	  margin-left:120px;
	  font-style:italic;
	  position:absolute;
	}
	#lblName{
	  font-weight:bolder;
	  margin-left:40px;
	  position:absolute;
	}
	#lblName2{
	  font-weight:normal;
	  position:absolute;
	  margin-left:100px;
	  width:350px;
	  text-align:left;
	}
	#lblSex{
	  font-weight:bolder;
	  margin-left:40px;
	  position:absolute;
	}
	#lblSex2{
	  font-weight:normal;
	  position:absolute;
	  margin-left:80px;
	  width:370px;
	  text-align:left;
	}
	#lblContact{
	  font-weight:bolder;
	  margin-left:40px;
	  position:absolute;
	}
	#lblContact2{
	  font-weight:normal;
	  position:absolute;
	  margin-left: 205px;
	  width:250px;
	  text-align:left;
	}
	#lblAddress{
	  font-weight:bolder;
	  margin-left:40px;
	  position:fixed;
	}
	#lblStreet{
	  font-weight:normal;
	  margin-left:125px;
	  position:absolute;
	  width:407px;
	  text-align:left;
	}
	.updateBtn{
	z-index:-1;
	font-family: "Acherus Militant 1";
	font-size: 17px;
	width: 150px;
	border-radius: 7px;
	margin-top:560px;
	margin-left:700px;
	border-style:none;
	cursor: pointer;


</style>
</head>
    
<body style="background-color:#FFF9E7;">
<form action = "userHome.php" method="POST" class="displayCard">
	<input type="hidden"  name="idNum"  class="centerPass" value="<?php echo $id; ?>"/>
	<div class="ctsCard">
        <img src="images/logo.png" width="330px" alt="BAKAS" class="cenImg"/>    
        <img src="images/regFormbg.png" alt="form" class="bgForm"/>
        <h2> CONTACT TRACING SYSTEM CARD </h2>
        <img src="images/textBg.png" alt="textBg" class="textBg">
        
  		<?php
			$db = mysqli_connect("localhost","root","","db_bakascts"); 
			$sql = "SELECT * FROM tb_usersreg WHERE idNum = $id";
			$result = mysqli_query($db, $sql);
			
			while ($row=mysqli_fetch_array($result)){
			  echo"<div class='iconContainer'>";
			  echo" <img src='"."icons/".$row['image_path']."' width='170px'>";
			  echo"</div>";
			}
			
		?>
		
        <div class="qrContainer">
        <img src="<?php echo $file?>" alt="QR CODE" width="170px" />
        </div>
		
    </div>
    <div class="userDetails">
		<h3 id="lbl">Republic of the Philippines <br> Province of Batangas <br> Batangas City</h3>
		<label id="lbl1">COVID-19 Contact Tracing System Card</label><br>
		<label id="lbl2">ID Number: <input type="text" value="<?php echo $_SESSION['idNum']; ?>"> </label><br><br>
		<label id="lblName"> NAME: </label> <label id="lblName2"> <input type="text" value="<?php echo $_SESSION['firstName']; ?> <?php echo $_SESSION['lastName']; ?>"></label><br><br>
		<label id="lblSex"> SEX: </label> <label id="lblSex2"> <input type="radio" value="Male"><label for="Male">Male</label> <input type="radio" value="Female"><label for="Female">Female</label><br></label><br><br>
		<label id="lblContact"> CONTACT NUMBER: </label> <label id="lblContact2"> <input type="text" value="<?php echo $_SESSION['contactNum'];?>"> </label><br><br>
		<label id="lblAddress"> ADDRESS:</label> <label id="lblStreet"> <input type="text" value="<?php echo $_SESSION['street'] .$_SESSION['barangay'] .$_SESSION['city'];?>"> </label> <br>
	</div>

	<div class="updateBtn">
		<input type="submit" name="update_btn" value="Update"  class="btn btn-primary" style="width:105px; vertical-align: middle;">
	</div>


    </form>    
	</body>
</html>