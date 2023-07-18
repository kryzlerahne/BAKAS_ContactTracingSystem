<?php
		session_start();
		//$_SESSION['lastName']=$lastName;
		//$_SESSION['firstName']=$firstName;
		
function filterTable($query)
{
  $connect = mysqli_connect("localhost", "root", "", "db_bakascts");
  $filterResult = mysqli_query($connect, $query);
  return $filterResult;
}

$queryUser = "SELECT * FROM tb_usersreg";
$result = filterTable($queryUser);
$countUser = mysqli_num_rows($result);

$queryAdmin = "SELECT * FROM tb_login";
$result = filterTable($queryAdmin);
$countAdmin = mysqli_num_rows($result);

$queryReport = "SELECT * FROM tb_ctsreport";
$result = filterTable($queryReport);
$countReport = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> BAKAS: A Contact Tracing System </title>
    <link rel="stylesheet" href="style.css">
    
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
	 	.paragraph{
		  // position: absolute;
           //transform: translate(-50%, -50%);
           	font-family: "Acherus Militant 1";
            color: #33A9AB;
            text-align: justify; 
			display: inline-block;
  			margin: 18px;
  			position:absolute;
  			z-index:99;
		}
		#log_out{
		  cursor:pointer;
		}
		.sidebar li a.homeTab{
		  background:  #FFF9E7;
		  width: 110%;
		}
		.sidebar i[class='bx bx-home']{
		  color: #33A9AB;
		}
		.sidebar li a #homeLink{
		  color:#33A9AB;
		}
		.sidebar.open ul li a.homeTab::before{
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
		.sidebar.open ul li a.homeTab::after{
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
		.homeTxt{
            font-family: "Adobe Gothic Std";
        	font-size: 35px;
        	padding-top:2%;
            color: #33A9AB;
            text-align:center;
            height:80px;
		}
		.welcomeTxt{
		   color: #33A9AB;
		   font-family: "Acherus Militant 1";
		   font-size: 20px;
		   display: flex;
           justify-content: center;
           align-items: center;
		}
		.cards{
		  display:grid;
		  grid-template-columns: 21% 21% 21% 21%; //repeat(4, 1fr);
		  grid-gap:2rem;
		  margin-top:1rem;
		  margin-left:7%;
		}
		.card-single{
		  display:flex;
		  justify-content:space-between;
		  background:#F7F1E0;
		  padding:2rem;
		  border-radius:5px;
		}
		.card-single i{
		  color: #33A9AB;
		  font-size:3rem;
		}
		.recent-grid{
		  margin-top:2.5rem;
		  display:grid;
		  grid-gap:2rem;
		  grid-template-columns: 60% 30%;
		}
		.card{
		  background:#F7F1E0;
		  height:300%;
		  border-radius:5px;
		}
		.card-header,
		.card-body{
		  padding:1rem;
		}
		.contacts{
		  margin-left:11.5%;
		}
		.card-header h2,
		.card-header h3 {
		  text-align:center;
		}
		thead{
		  text-align:center;
		  background:white;
		}
		tbody{
		  text-align:center;
		}
		table{
		  margin-left:auto;
		  margin-right:auto;
		}

	 </style>
   </head>
<body style="background-color: #33A9AB;">
  <div class="sidebar">
    <div class="logo-details">
      <img src="images/logo2.png" class="icon">
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="homepage.php" class="homeTab">
          <i class='bx bx-home'></i>
          <span class="links_name" id="homeLink">Home</span>
        </a>
         <span class="tooltip">Home</span>
      </li>
      <li>
        <a href="qrScanner.php" class="qrTab">
          <i class='bx bx-scan' ></i>
          <span class="links_name">QR Code Scanner</span>
        </a>
         <span class="tooltip">QR Code Scanner</span>
      </li>
     <li>
       <a href="registeredIndiv.php" class="indivTab">
         <i class='bx bxs-user-detail' ></i>
         <span class="links_name">Registered Individuals</span>
       </a>
       <span class="tooltip">Registered Individuals</span>
     </li>
     <img src="images/line.png" alt="divider" class="divider">
     <li>
       <a href="ctsReport.php" class="reportTab">
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
       <a href="registeredAdmin.php" class="adminTab">
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
    <div class="animation start-home"></div>
  </div>
  
  <!-- CONTENT -->
  <section class="home-section">
  	  <div class="bgContent">
  	
  	  <div class="homeTxt">Home Dashboard</div>
      <div class="welcomeTxt">Welcome, <?php echo $_SESSION['firstName']; ?> <?php echo $_SESSION['lastName']; ?>!</div><br>
      
<div class="cards">
	 <div class="card-single">
	 	<div>
			<h1><?php echo $countUser; ?></h1>
			<span> Registered Users</span>
		</div>
		<div>
			<i class="las la-users"></i>
		</div>
	 </div>
	 
	 <div class="card-single">
	 	<div>
			<h1><?php echo $countAdmin; ?></h1>
			<span> Registered Admins</span>
		</div>
		<div>
			<i class="las la-users-cog"></i>
		</div>
	 </div>
	 
	 <div class="card-single">
	 	<div>
			<h1><?php echo $countReport; ?></h1>
			<span> QR Scanned </span>
		</div>
		<div>
			<i class="las la-qrcode"></i>
		</div>
	 </div>
	 
	 <div class="card-single">
	 	<div>
			<h1>1</h1>
			<span> Close Contacts </span>
		</div>
		<div>
			<i class="las la-address-card"></i>
		</div>
	 </div>
</div>

<div class="recent-grid"> 
	<div class="contacts">
		<div class="card">
			<div class="card-header">
			<h2>Close Contacts Monitoring</h2>
			<!--  <button> See all <i class="las la-arrow-right"></i> </button> -->
			</div>
			
			<div class="card-body">
				<table width="90%">
					<thead>
						<tr>
							<td>Name</td>
							<td>Contact Number</td>
							<td>Date</td>
							<td>Status</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Kryzle Rahne Enriquez</td>
							<td> 09980295159</td>
							<td>November 26, 2021</td>
							<td> Self-Isolated </td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	<div class="toDo">
		<div class="card">
			<div class="card-header">
				<h3>What to do upon contact tracing?</h3>
			</div>
		</div>
	</div>
</div>
	 
  </section>
  
  
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });

  searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
    sidebar.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
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
