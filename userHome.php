<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

session_start();

$mysqli = new mysqli("localhost", "root", "" ,"db_bakascts") or die(mysqli_error($mysqli));

		$id=$_SESSION['idNum'];
		$width = "250";
		$height = "250";
		
		$url = "https://chart.googleapis.com/chart?cht=qr&chs={$width}x{$height}&chl={$id}";
		$file = $url;
		
		/**$db = mysqli_connect("localhost","root","","db_bakascts"); 
		$sql = "SELECT * FROM tb_usersreg WHERE idNum = $id";
		$sth = $db->query($sql);
		$result=mysqli_fetch_array($sth);
		echo '<img src="data:icons/jpg;base64,'.base64_encode( $result['image_path'] ).'"/>';**/

/**include('phpqrcode/qrlib.php');

$id=$_SESSION['idNum'];
$file = 'qrcodes/'.$id.".png";

$ecc = 'L'; // error correction capability
$pixel_Size = 170;
$frame_size = 5;

QRcode::png($id, $file, $ecc, $pixel_Size, $frame_size);**/
		
?>
<html>
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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
        z-index:-1;
        width: 790px;
        height:530px;
    }
    .h2{
    	font-family: "Adobe Gothic Std";
    	font-size: 30px;
    	padding-top:20px;
    	margin-bottom:0px;
        position: absolute;
        top: 3%;
        left: 38%;
        transform: translate(-50%, -50%);
        color:#FFF9E7;
        z-index:3;
    }
    .textBg{
	  position: absolute;
	  width:500px;
	  margin-left:50px;
	  margin-top:11%;
	}
	.iconContainer{
	  position: absolute;	
	  right:65px;
	  width:170px;
	  height:200px;
	  margin-top:90px;
	}
	.iconContainer img{
	  width:170px;
	  height:170px;
	  border-radius:12px;
	  object-fit:cover;
	}
	.qrContainer{
	  position: absolute;
	  right:65px;
	  width:170px;
	  margin-top:286px;
	}
	.qrContainer img{
	  border-radius:12px;
	}
    .userDetails{
	  font-family:"Acherus Militant 1";
	  font-size:15px;
	  text-align:center;
	  position: absolute;
	  top:-4%;
	  left:auto;
	}
	#lbl10{
	  margin-top: 135px;
	  margin-left:175px;
	  font-weight:bolder;
	}
	 #lbl1{
	  margin-left:155px;	  
	  font-weight:normal;
	}
	#lbl2{
	  font-weight:normal;
	  margin-left:15px;
	  font-style:italic;
	  position:absolute;
	}
	#lblName{
	  font-weight:bolder;
	  margin-left:-125px;
	  position:absolute;
	}
	#lblName2{
	  font-weight:normal;
	  position:absolute;
	  margin-left:-72px;
	  width:360px;
	  text-align:left;
	}
	#lblSex{
	  font-weight:bolder;
	  margin-left:-125px;
	  position:absolute;
	}
	#lblSex2{
	  font-weight:normal;
	  position:absolute;
	  margin-left:-51px;
	  width:61px;
	  text-align:left;
	}
	#lblContact{
	  font-weight:bolder;
	  margin-left:-125px;
	  position:absolute;
	}
	#lblContact2{
	  font-weight:normal;
	  position:absolute;
	  margin-left: 27px;
	  width:250px;
	  text-align:left;
	}
	#lblAddress{
	  font-weight:bolder;
	  margin-left:-125px;
	  position:absolute;
	}
	#lblStreet{
	  font-weight:normal;
	  margin-left:-125px;
	  position:absolute;
	  width:407px;
	  text-align:left;
	}
	.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index:99; /* Sit on top */
		padding-top: 80px; /* Location of the box */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.3); /* Black w/ opacity */
	}
	.modal-content {
		background-color: #fefefe;
		margin-left:450px;
		padding:20px;
		border: 1px solid #888;
		width: 40%;
		height:75%;
		font-family: "Acherus Militant 1";
		overflow: auto;
	}
	.close {
		color: #aaaaaa;
		float: right;
		font-size: 28px;
		font-weight: bold;
	}
	.close:hover,
	.close:focus {
		color: #000;
		text-decoration: none;
		cursor: pointer;
	}
	#notice{
		top:87%;
		margin-left:315px;
		position: absolute;
		z-index:8;
		font-size:17px;
		font-family: "Acherus Militant 1";
		color:#FFF9E7;
		cursor:pointer;
	}
	#notice:hover{
		color: black;
		background-color: transparent;
		text-decoration: underline;
	}
	.modalTxt{
		font-family: "Adobe Gothic Std";
		font-size:30px;
    	color:#33A9AB;
    	text-align: justify;
	}
	p{
    	text-align: justify;
	}
	b {
		color:#33A9AB;
		font-weight:bolder;
	}
	.printBtn{
        position:absolute;
        z-index:9;
        width:100px;
        left: 68%;
        top:5%;
    }
	.printBtn .printBtn_hover{
        position:absolute;
        z-index:99;
        width:100px; 	
        cursor: pointer;
		display: none;
		left: 68%;
		top:5%;
		z-index: 99;
    }
	.printBtn:hover .printBtn_hover{
		display:inline;
	}
	.logoutBtn{
        position:absolute;
        z-index:20;
        width:145px;
        left: 46%;
        top:101%;
    }
	.logoutBtn .logoutBtn_hover{
        position:absolute;
        z-index:99;
        width:145px;          
        cursor: pointer;
		display: none;
		left: 46%;
		top:101%;
		z-index: 99;
    }
	.logoutBtn:hover .logoutBtn_hover{
		display:inline;
	}
	.editBtn{
        position:absolute;
        z-index:20;
        width:145px;
        left: 30%;
        top:101%;
    }
	.editBtn .editBtn_hover{
        position:absolute;
        z-index:99;
        width:145px;          
        cursor: pointer;
		display: none;
		left: 30%;
		top:101%;
		z-index: 99;
    }
	.editBtn:hover .editBtn_hover{
		display:inline;
	}	
	#shape{
		max-width:830px;
		width:100%;
		height:550px;
		margin-top:25px;
		z-index:7;
}	

.modal-backdrop {
  z-index: -1;
}

.modal-ku {
  width: 1500px;
  margin: auto;
   z-index: 1024;
}

@media print{
			body * {
				visibility:hidden;
			}
			.bgForm{
			  left:0;
			  height:500px;
			}
			#shape *{
				visibility:visible;
			}
			#shape{
				position: absolute;
				top: 15%;
			}
			#notice{
				display:none;
			}
			.qrContainer{
				left:73%;
				margin-top:274px;
			}
			.iconContainer{
				left:73%;
				margin-top:78px;
			}
			.h2{
				color:#FFF9E7;
				top:15px;
				left:37%;
				font-size:25px;
			}
			.editBtn{
			  display:none;
			}	
			.logoutBtn{
			  display:none;
			}		
			.userDetails{
			  left:-5%;
			  top:-5%;
			}
			.textBg{
			  left:-3%;
			  width:460px;
			  height:370px;
			}
			.printBtn{
			  width:80px;
			  left:72%;
			}
			.printBtn_hover{
			  display:none;
			}
}


</style>
</head>
    
<body style="background-color:#FFF9E7;">
 <img src="images/logo.png" width="330px" alt="BAKAS" class="cenImg"/>    
	<div class="col-lg-3"></div>
			<div class="ctsCard col-lg-7" id="shape">
			<img src="images/regFormbg.png" alt="form" class="bgForm"/>
			<form action = "userHome.php" method="POST" class="displayCard">
				<input type="hidden"  name="idNum"  class="centerPass" value="<?php echo $id; ?>"/>
				
				   
					<label class="h2"> <center>CONTACT TRACING SYSTEM CARD </center></label>
					<img src="images/textBg.png" alt="textBg" class="textBg">
					
					<?php
						$db = mysqli_connect("localhost","root","","db_bakascts"); 
						$sql = "SELECT * FROM tb_usersreg WHERE idNum = $id";
						$result = mysqli_query($db, $sql);
						
						while ($row=mysqli_fetch_array($result)){
							
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
					      
						  echo"<div class='iconContainer'>";
						  echo" <img src='"."icons/".$row['image_path']."' width='170px'>";
						  echo"</div>";
						}
						
					?>
					
					<div class="qrContainer">
					<img src="<?php echo $file?>" alt="QR CODE" width="170px" />
					</div>
					
				
				<div class="userDetails">
					<h4 id="lbl10">Republic of the Philippines <br> Province of Batangas <br> Batangas City</h4>
					<label id="lbl1">COVID-19 Contact Tracing System Card</label><br>
					<label id="lbl2">ID Number: <?php echo $id?> </label><br><br>
					<label id="lblName"> NAME: </label> <label id="lblName2"> <?php echo $fn?> <?php echo $ln?></label><br><br>
					<label id="lblSex"> GENDER: </label> <label id="lblSex2"> <?php echo $gen?></label><br><br>
					<label id="lblContact"> CONTACT NUMBER: </label> <label id="lblContact2"> <?php echo $cn?> </label><br><br>
					<label id="lblAddress"> ADDRESS:</label> <label id="lblStreet"><?php echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp".$st.", ".$brgy.", ".$ct;?> </label> <br>
				</div>
				
<div class="logoutBtn">
	<img src="images/logoutBtn_hover.png" alt="logout hover" class="logoutBtn_hover" onclick="location.href='userLogin.php';"/>
    <img src="images/logoutBtn.png" alt="logout" class="logoutBtn" onclick="location.href='userLogin.php';"/>
</div>

<div class="printBtn">
	<img src="images/printBtn_hover.png" alt="logout hover" class="printBtn_hover" onclick="window.print();"/>
    <img src="images/printBtn.png" alt="logout" class="printBtn" onclick="window.print();"/>
</div>

<div class="editBtn">
<img src="images/editBtn.png" alt="edit hover" class="editBtn_hover" data-id='<?php echo $row['idNum']; ?>'/>
<img src="images/editBtn_hover.png" alt="edit" class="editBtn" data-id='<?php echo $row['idNum']; ?>'/>
</div >

 
<form action = "userHome.php" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<div class="modal fade" id="empModal" role="dialog">
        <div class="modal-dialog modal-lg modal-ku">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="margin-left:150px;">Edit User Information</h4>
                    <button type="button" class="close" data-dismiss="modal" style="margin-left:20px;">&times;</button>
                </div>
                <div class="modal-body">
					<div class="form-group">
					<label>First Name:</label>
					<input type="text" name="firstName" class="form-control" value="<?php echo $fn?>">
					</div>
					<div class="form-group">
					<label>Last Name:</label>
					<input type="text" name="lastName" class="form-control" value="<?php echo $ln?>">
					</div>
					<div class="form-group">
					<label>Gender:</label>
					<br><input type="radio" name="gender" 
					value="Male" <?php if($gen == 'Male'){echo "checked";}?> ><label id="male">Male</label> 
					<input type="radio" name="gender" 
					value="Female" <?php if($gen == 'Female'){echo "checked";}?>> <label id="female">Female </label>
					</div>
					<div class="form-group">
					<label>Contact Number:</label>
					<input type="text" name="contactNum" class="form-control" value="<?php echo $cn?>">
					</div>
					<div class="form-group">
					<label>Street:</label>
					<input type="text" name="street" class="form-control" value="<?php echo $st?>">
					</div>
					<div class="form-group">
					<label>Barangay:</label>
					<select name="barangay"class="form-control" >
						<option value="<?php echo $brgy?>" selected><?php echo $brgy?></option>
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
						<option value="Santo Niño">Santo Niño</option>
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
						
					</select>
					</div>
					<div class="form-group">
					<label>City:</label>
					<input type="text" name="city" class="form-control" value="<?php echo $ct?>">
					</div>
					
					<div> 
						<input type="hidden" name="idNum" class="form-control" 
						value="<?php echo $id?>">
					</div>
				
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" name="update_Btn">Update</button>
                </div>
            </div>
        </div>
</div>	
 </form>
		<label id="notice">Terms and Privacy Notice</label>
		</div>	
</div>	

<!-- Modal -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    
    <label class="modalTxt"> PRIVACY NOTICE </label>
    
    <p>BAKAS: A Contact Tracing System is Batangas City&apos;s QR Code contact tracing solution to help stop the spread of Covid-19 throughout the city. The outcome and idea of this project is to have an automated log and record system for all individuals who visit a particular establishment without any physical contact by simply scanning either the generated QR code or the specified ID numbers. As one of the technology-driven responses to the pandemic, this system will offer the community with a contact tracing mechanism for tracking any covid positive patients in real-time circumstances. It is our mission to provide administrators and health facilitators with sufficient access to reliable information in a timely, accessible, systematized, and organized manner to assist them in reducing their workloads and stresses. This technology platform aims to prevent the likelihood of overlapping data and information by generating exclusive and one-time QR Codes for each individual to avoid duplicates and recurring registration. </p>

	<label class="modalTxt"> WHY WE COLLECT YOUR INFORMATION </label>
	<p>We collect your information to enable you to report your health condition and provide you with basic medical information and the recommended actions of the DILG based on your condition. <br><br>
1. Provide you with information on emergency contact details, medical services, distribution of relief goods and other forms of government assistance, and Government alerts and announcements.<br>
2. Administrators will send you SMS notification related to contact tracing.<br>
3. Information collected via the electronic logbook QR code function is paramount for establishments to conduct proper and efficient contact tracing.<br>
4. Ensure that BAKAS works as it should and you are able to browse BAKAS safely and securely. We also collect your information to track bugs, errors, and usage statistics. In case of any security incident or data breach, we may also use your information in our investigative reporting to the National Privacy Commission.</p>

	<label class="modalTxt"> DATA PRIVACY ACT </label>
	<p> The Data Privacy Act affords you the following rights with regards to your personal data/information: <br><br>

i. To be informed whether Personal Data pertaining to him or her shall be, are being, or have been processed;<br>
ii. To reasonable access to any Personal Data collected and processed in duration of employment;<br>
iii. To suspend, withdraw, or order the blocking, removal, or destruction of Personal Data from the relevant company&apos;s filing system;<br>
iv. To dispute the inaccuracy or error in Personal Data, and the relevant company shall correct it immediately and accordingly, upon the request unless the request is vexatious or otherwise unreasonable;<br>
v. Where the Data Subject&apos;s Personal Data is processed through electronic means and in a structured and commonly used format, the Data Subject has the right to obtain a copy of such data in an electronic or structured format that is commonly used and allows for further use by the Data Subject;<br>
vi. The Data Subject has the right to be indemnified for any damages sustained pursuant to the provisions of the Data Privacy Act or Other Privacy Laws </p>
	
	<p>If you want to exercise your rights or learn more about how StaySafe.PH processes your information, please contact our Data Protection Officer at <b> help@bakascts.ph.</b></p>
  </div>
</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("notice");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];


// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

</script>	

 <script type='text/javascript'>
            $(document).ready(function(){
				$('.editBtn').on('click',function(){
					$('#empModal').modal('show');     
                });
            });
</script>

<?php
if (isset($_POST['update_Btn']))
{	
	
	$id = $_POST['idNum'];
    $fn = $_POST['firstName'];
    $ln = $_POST['lastName'];

    
    $cn = $_POST['contactNum'];
	$st = $_POST['street'];
	$ct = $_POST['city'];
	$brgy = $_POST['barangay'];
	$gen = $_POST['gender'];
	
	$query = ("UPDATE tb_usersreg SET firstName='$fn', lastName='$ln', contactNum='$cn', street='$st', barangay='$brgy', city='$ct', gender='$gen' WHERE idNum='$id'");
	$result = mysqli_query($mysqli,$query);
	
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
	
   header('location: userHome.php');
}

?>

    </form>    
	</body>	
</html>