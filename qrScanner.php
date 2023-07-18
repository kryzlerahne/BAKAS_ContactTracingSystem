<?php session_start();?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Boxicons CDN Link -->
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">

    <title> BAKAS: A Contact Tracing System </title>
    <style>
		.col-md-6{
		  padding-top:0.5%;
		  left:25%;
		  display: flex;
  		  justify-content: center;
  		  position:absolute;
  		  z-index:2;
		}
		.alert{
		  left:0;
		  right:0;
		  bottom:13%;
		  text-align:center;
		  margin:auto;
		  width:580px;
		  position:absolute;
		  z-index:99;
		}
		.textLabels{
		  display:flex;
		  justify-content: center;
          font-family: "Adobe Gothic Std";
          font-size:16px;
          color:#FFF9E7;
		  margin-top:3%;
		}
		#scanText{
		  background:#BFBFBF;
		  z-index:10;
		  padding-bottom:4px;
		}
		#text2{
		  width:580px;
		  text-align:center;
		  padding-top:5px;
		} 
		#log_out{
		  cursor:pointer;
		}
		.home-section{
		  background-image:url("images/bg2.png");
		  background-repeat:no-repeat;
		  background-size:100% 100%;
		  padding: 1%;	 
		}
		.h3{
		  	padding-top:3%;
            font-family: "Adobe Gothic Std";
        	font-size: 35px;
            text-align:center;
        }
        .sidebar li a.qrTab{
		  background:  #FFF9E7;
		  width: 110%;
		}
		.sidebar i[class='bx bx-scan']{
		  color: #33A9AB;
		}
		.sidebar li a #qrLink{
		  color:#33A9AB;
		}
		.sidebar.open ul li a.qrTab::before{
		  content: '';
		  position:absolute;
		  top:-50px;
		  left:186px;
		  width:50px;
		  height:50px;
		  border-radius: 50%;
		  background:transparent;
		  box-shadow: 35px 35px 0 10px #FFF9E7;
		  z-index:-1;
		  pointer-events:none;
		}
		.sidebar.open ul li a.qrTab::after{
		  content: '';
		  position:absolute;
		  bottom:-50px;
		  left:186px;
		  width:50px;
		  height:50px;
		  border-radius: 50%;
		  background:transparent;
		  box-shadow: 35px -35px 0 10px #FFF9E7;
		  z-index:-1;
		  pointer-events:none;
		}
		.home-section{
		  position:absolute;
		  z-index:2;
		}
    </style>
</head>

<body style="background-color:#33A9AB;" class="container">

<!--  TABS --!>

  <div class="sidebar">
    <div class="logo-details">
      <img src="images/logo2.png" class="icon">
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="homepage.php">
          <i class='bx bx-home'></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">Home</span>
      </li>
      <li>
        <a href="qrScanner.php" class="qrTab">
          <i class='bx bx-scan' ></i>
          <span class="links_name" id="qrLink">QR Code Scanner</span>
        </a>
         <span class="tooltip">QR Code Scanner</span>
      </li>
     <li>
       <a href="registeredIndiv.php">
         <i class='bx bxs-user-detail' ></i>
         <span class="links_name">Registered Individuals</span>
       </a>
       <span class="tooltip">Registered Individuals</span>
     </li>
     <img src="images/line.png" alt="divider" class="divider">
     <li>
       <a href="ctsReport.php">
         <i class='bx bxs-report' ></i>
         <span class="links_name">CTS Report</span>
       </a>
       <span class="tooltip">CTS Report</span>
     </li>
     <li>
       <a href="closeContact.php">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Close Contacts</span>
       </a>
       <span class="tooltip">Close Contacts</span>
     </li>
     <li>
       <a href="registeredAdmin.php">
         <i class='bx bx-user-check' ></i>
         <span class="links_name">Admin Accounts</span>
       </a>
       <span class="tooltip">Admin Accounts</span>
     </li>
     <img src="images/frontliner.png" alt="frontliners" class="illustration">
     <li class="profile">
         <div class="profile-details">
           <img src="images/icon1.png" alt="profileImg">
           <div class="name_job">
             <div class="name"><?php echo $_SESSION['firstName']; ?> <?php echo $_SESSION['lastName']; ?></div>
             <div class="job">System Administrator</div>
           </div>
         </div>
         <i class='bx bx-log-out' id="log_out" onclick="location.href='logout.php';" ></i>
         <span class="tooltipOut">Logout</span>
     </li>
    </ul>
  </div>
  
  <section class="home-section">
      <!-- SCANNER -->

    <div class="centerText">
    <h3 class = "h3"> SCAN YOUR QR CODE HERE </h3>
    </div>
    
    <div class="textLabels">
		<form action="insertReport.php" method="POST" class="formTexts">
			<div id="scanText">
			<label id="text2">Please scan your QR Code:</label>
			<input type="text" name="idNum" readonly="" id="text" placeholder="ID Number" class="form-control" autofocus>
			</div>
		</form>
		</div>
	</div>
    
<div class="containerscan">
	<div class="row">
		<div class="col-md-6">
			<video id="preview" width="580px"></video>
		</div>
		<?php
				if(isset($_SESSION['error'])){
					echo "
					<div class='alert alert-danger'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					".$_SESSION['error']."
					</div>
					";
					unset($_SESSION['error']);
				}
				if(isset($_SESSION['success'])){
					echo "
					<div class='alert alert-success'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					".$_SESSION['success']."
					</div>
					";
					unset($_SESSION['success']);
				}
			?>
</div>

<script>
	let scanner = new Instascan.Scanner({video: document.getElementById('preview')});
	Instascan.Camera.getCameras().then(function(cameras){
		if (cameras.length > 0){
			scanner.start(cameras[0]);
		} else{
			alert('No cameras found!');
		}
	}).catch(function(e){
		console.error(e);
	});
	
	scanner.addListener('scan',function(c){
		document.getElementById('text').value=c;
		document.forms[0].submit();
	});	
</script>
  </section> 
  
   <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });
  
  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>
</body>
</html>



