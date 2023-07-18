<html lang="en">
<head>
	<meta charset="UTF=8">
	<meta name ="viewpoint" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	
	<title>Users Registration</title>
</head>
<style>
 .cenImg{
    	display: block;
    	margin-left: auto;
    	margin-right: auto;
        padding-top: 20px;
    }

#h2{
    	font-family: "Adobe Gothic Std";
    	font-size: 40px;
		
        position: absolute;
		vertical-align: middle;
        
        
    }
#shape{
		border-radius:25px;
		background-color:#33A9AB;
		max-width:830px;
		width:100%;
		color:white;

}	
#defaultIcon{
		
		width:130px;
	    height:130px;
	    border-radius:10px;
	    object-fit:cover;
	    border-radius:10px;
}
#padding{
		padding-top:25px;
}	
#male{
		font-family: "Arial";
    	font-size: 20px;
}
#female{
		font-family: "Arial";
    	font-size: 20px;
}
#text{
		font-family: "Adobe Gothic Std";
    	font-size: 15px;
}
#zTry{
		z-index: 99;
		bottom: 30%;
		
}
</style>

<body style="background-color:#FFF9E7;">

        <img src="images/logo.png" width="330px" alt="BAKAS" class="cenImg"/>  <br>  
<div class="container form-group">
		<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8" id="shape">
		<form action="addUser.php" method="POST" enctype="multipart/form-data"> 
		<div class="row">
		<div  class="col-sm-12" id="padding"> </div>
		</div>
		
        <div class="row justify-content-center align-items-start">
				<div  class="col-sm-4" > </div>
				<div  class="col-sm-4" > <h2 id="h2"> Registration </h2></div>	
				<div  class="col-sm-4" > </div>
		</div>
		<div class="row" id="padding"></div><div class="row" id="padding"></div><div class="row" id="padding"></div>
		<div class="row"></div>
		<div class="row">
			<div  class="col-md-3 col-sm-6" > </div>
			<div  class="col-md-4 col-sm-2" > </div>
			<div  class="col-sm-1" > 
				
		</div>
		
        <div class="row">
				<div  class="col-md-6 order-3 order-md-1" > 
					 <label id="text">First Name:</label>
					<br><input type="text" name="firstName" required class="form-control"><br> 
				</div>
				<div  class="col-md-4 order-2 order-md-2" > 
				
				 <label id="text">Image:</label>
				 <br><input type="file" name="image_path" required value="Choose File" id="imagePath" onchange="loadFile(event)" class="form-control"><br>
				
				<script>
					  var loadFile = function(event) {
						var output = document.getElementById('defaultIcon');
						output.src = URL.createObjectURL(event.target.files[0]);
						output.onload = function() {
						  URL.revokeObjectURL(output.src) // free memory
					}
				  };
				</script>     	
				</div>
				<div  class="col-md-1 order-1 order-md-2" id="zTry" > 
					<img src="images/default_icon.png" alt="icon" id="defaultIcon" >
				</div>
		
		</div>
		<div class="row">
				 <div  class="col-md-6 "> 
					 <label id="text">Last Name:</label>
					 <br><input type="text" name="lastName" required class="form-control"><br>
				 </div>
				 <div  class="col-md-6 "> 
					 <label id="text">Contact Number:</label>
					 <br><input type="text" name="contactNum" required class="form-control"><br>
				 </div>
				 
		</div>
		<div class="row">
				<div  class="col-md-6 "> 
					 <label id="text">Email:</label>
					 <br><input type="email" name="email" required class="form-control"><br>
				</div>
				<div  class="col-md-6 "> 
					 <label id="text">Password:</label>
					 <br><input type="password" name="password" required class="form-control"><br>
				</div>
				
		</div>
		<div class="row">
				<div  class="col-md-6 "> 
					 <label id="text">Street:</label>
					 <br><input type="text" name="street" required class="form-control"><br>
				</div>
				
				 <div  class="col-md-6 " > 
					 <label id="text">Barangay:</label>
					 <br><select name="barangay"  required class="form-control ">
						<option value="" disabled selected> Select the Barangay</option>
						<option value="Alangilan">Alangilan</option>
						<option value="Balagtas">Balagtas</option>
						<option value="Balete">Balete</option>
						<option value="Banaba Center">Banaba Center</option>
						<option value="Banaba Kanluran">Banaba Kanluran</option>
						<option value="Banaba Silangan">Banaba Silangan</option>
						<option value="Banaba Ibaba">Banaba Ibaba</option>
						<option value="Barangay 1">Barangay 1</option>
						<option value="Barangay 2">Barangay 2</option>
						<option value="Barangay 3">Barangay 3</option>
						<option value="Barangay 4">Barangay 4</option>
						<option value="Barangay 5">Barangay 5</option>
						<option value="Barangay 6">Barangay 6</option>
						<option value="Barangay 7">Barangay 7</option>
						<option value="Barangay 8">Barangay 8</option>
						<option value="Barangay 9">Barangay 9</option>
						<option value="Barangay 10">Barangay 10</option>
						<option value="Barangay 11">Barangay 11</option>
						<option value="Barangay 12">Barangay 12</option>
						<option value="Barangay 13">Barangay 13</option>
						<option value="Barangay 14">Barangay 14</option>
						<option value="Barangay 15">Barangay 15</option>
						<option value="Barangay 16">Barangay 16</option>
						<option value="Barangay 17">Barangay 17</option>
						<option value="Barangay 18">Barangay 18</option>
						<option value="Barangay 19">Barangay 19</option>
						<option value="Barangay 20">Barangay 20</option>
						<option value="Barangay 21">Barangay 21</option>
						<option value="Barangay 22">Barangay 22</option>
						<option value="Barangay 23">Barangay 23</option>
						<option value="Barangay 24">Barangay 24</option>
						<option value="Bilogo">Bilogo</option>
						<option value="Bolbok">Bolbok</option>
						<option value="Bukal">Bukal</option>
						<option value="Calicanto">Calicanto</option>
						<option value="Catandala">Catandala</option>
						<option value="Concepcion">Concepcion</option>
						<option value="Conde Itaas">Conde Itaas</option>
						<option value="Conde Labak">Conde Labak</option>
						<option value="Cuta">Cuta</option>
						<option value="Dalig">Dalig</option>
						<option value="Dela Paz">Dela Paz</option>
						<option value="Dela Paz Pulot Aplaya">Dela Paz Pulot Aplaya</option>
						<option value="Dela Paz Pulot Itaas">Dela Paz Pulot Itaas</option>
						<option value="Dumantay">Dumantay</option>
						<option value="Dumuclay">Dumuclay</option>
						<option value="Gulod Itaas">Gulod Itaas</option>
						<option value="Gulod Labak">Gulod Labak</option>
						<option value="Haligue Kanluran">Haligue Kanluran</option>
						<option value="Haligue Silangan">Haligue Silangan</option>
						<option value="Ilijan">Ilijan</option>
						<option value="Kumba">Kumba</option>
						<option value="Kumintang Ibaba">Kumintang Ibaba</option>
						<option value="Kumintang Ilaya">Kumintang Ilaya</option>
						<option value="Libjo">Libjo</option>
						<option value="Liponpon, Verde Island">Liponpon, Verde Island</option>
						<option value="Maapas">Maapas</option>
						<option value="Mahabang Dahilig">Mahabang Dahilig</option>
						<option value="Mahabang Parang">Mahabang Parang</option>
						<option value="Mahacot Kanluran">Mahacot Kanluran</option>
						<option value="Mahacot Silangan">Mahacot Silangan</option>
						<option value="Malalim">Malalim</option>
						<option value="Malibayo">Malibayo</option>
						<option value="Malitam">Malitam</option>
						<option value="Maruclap">Maruclap</option>
						<option value="Mabacong">Mabacong </option>
						<option value="Pagkilatan">Pagkilatan</option>
						<option value="Paharang Kanluran">Paharang Kanluran</option>
						<option value="Paharang Silangan">Paharang Silangan</option>
						<option value="Pallocan Kanluran">Pallocan Kanluran</option>
						<option value="Pallocan Silangan">Pallocan Silangan</option>
						<option value="Pinamucan">Pinamucan</option>
						<option value="Pinamucan Ibaba">Pinamucan Ibaba</option>
						<option value="Pinamucan Silangan">Pinamucan Silangan</option>
						<option value="Sampaga">Sampaga</option>
						<option value="San Agapito, Verde Island">San Agapito, Verde Island</option>
						<option value="San Agustin Kanluran, Verde Island">San Agustin Kanluran, Verde Island</option>
						<option value="San Agustin Silangan, Verde Island">San Agustin Silangan, Verde Island</option>
						<option value="San Andres, Verde Island">San Andres, Verde Island</option>
						<option value="San Antonio, Verde Island">San Antonio, Verde Island</option>
						<option value="San Isidro">San Isidro</option>
						<option value="San Jose Sico">San Jose Sico</option>
						<option value="San Miguel">San Miguel</option>
						<option value="San Pedro">San Pedro</option>
						<option value="Santa Clara">Santa Clara</option>
						<option value="Santa Rita Aplaya">Santa Rita Aplaya</option>
						<option value="Santa Rita Karsada">Santa Rita Karsada</option>
						<option value="Santo Domingo">Santo Domingo</option>
						<option value="Santo Niño">Santo Nino</option>
						<option value="Simlong">Simlong</option>
						<option value="Sirang Lupa">Sirang Lupa</option>
						<option value="Sorosoro Ibaba">Sorosoro Ibaba</option>
						<option value="Sorosoro Ilaya">Sorosoro Ilaya</option>
						<option value="Sorosoro Karsada">Sorosoro Karsada</option>
						<option value="Tabangao Aplaya">Tabangao Aplaya</option>
						<option value="Tabangao Ambulong">Tabangao Ambulong</option>
						<option value="Tabangao Dao">Tabangao Dao</option>
						<option value="Talahib Pandayan">Talahib Pandayan</option>
						<option value="Talahib Payapa">Talahib Payapa</option>
						<option value="Talumpok Kanluran">Talumpok Kanluran</option>
						<option value="Talumpok Silangan">Talumpok Silangan</option>
						<option value="Tinga Itaas">Tinga Itaas</option>
						<option value="Tinga Labak">Tinga Labak</option>
						<option value="Tulo">Tulo</option>
						<option value="Wawa">Wawa</option>
						
					
					</select><br>
				</div>
		
		</div>
		<div class="row">
				<div  class="col-md-6">
					 <label id="text">City:</label>
					 <br><input type="text" name="city" required class="form-control"><br>
				</div>
				<div  class="col-md-6"> 
					 <label id="text">Gender:</label>
					 <br><input type="radio" name="gender" required="required" value="Male" id="male"/> <label id="male">Male</label> 
							<input type="radio" name="gender" required="required" value="Female" id="female"/> <label id="female">Female </label>
								<br>
								<br>
								<br>
				</div>
				
				
		
		</div>
		<div class="row justify-content-center">

				<div class="col-md-4 ">
					<input type="submit" name="save" value="Save"  class="btn btn-light " style="width:105px; vertical-align: middle;">
					<input type="reset" name="clear" value="Reset" class="btn btn-light offset-1" onclick="resetImage()" style="width:105px; vertical-align: middle;">
				</div>
	
				<script>
					function resetImage(){
					  document.getElementById("defaultIcon").src = "images/default_icon.png";
					}
				</script>
		</div>		
	</form>
		<div class="row">
		<div  class="col-sm-12" id="padding" > </div>
		</div>

		</div>
		<div class="col-lg-2"></div>
		
		</div>
</div>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>


<?php

error_reporting(E_ALL & ~E_NOTICE);

$mysqli = new mysqli("localhost", "root", "" ,"db_bakascts") or die(mysqli_error($mysqli));

if (isset($_POST['save'])){
  
  	$target = "icons/".basename($_FILES['image_path']['name']);
  
	$id=$_POST['idNum'];
	$fn=$_POST['firstName'];
	$ln=$_POST['lastName'];
	$em=$_POST['email'];
	$pw=$_POST['password'];
	$im=$_FILES['image_path']['name'];
	$cn=$_POST['contactNum'];
	$st=$_POST['street'];
	$ct=$_POST['city'];
	$brgy=$_POST['barangay'];
	$gen=$_POST['gender'];
	
	$result = $mysqli->query("INSERT INTO tb_usersreg (firstName, lastName, email, password, image_path, contactNum, street, barangay, gender, city) VALUES('$fn', '$ln','$em', '$pw', '$im', '$cn', '$st', '$brgy', '$gen', '$ct')") or die($mysqli->error);
	
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
	
	if(move_uploaded_file($_FILES['image_path']['tmp_name'], $target)){
	  $msg = "Image uploaded";
	}else{
	  $msg = "Image fail.";
	}
	
	header('location: registeredIndiv.php');
}

?>
</html>
