<?php session_start();?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<!-- Boxicons CDN Link -->
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="style.css">

    <title> BAKAS: A Contact Tracing System </title>
    <style>
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
            color:black;
            text-align:center;
        }	
		#log_out{
		  cursor:pointer;
		}	
        .tableview{
           
         // 	transform: translate(-50%, -50%);
            margin-left: 15%;
		    height:445px;
			width:72%;
        //	display:flex;
        //	justify-content: center;
        	margin-top:7.5%;
           
            overflow:auto;
            overflow-x:hidden;
        }
        .table{
			
            border-collapse:collapse;
        	font-family: "Acherus Militant 1";
            color: #33A9AB;
            text-align: left;
            
        }
        th{
            background-color:#33A9AB;
            color:#FFF9E7;
            height:45px;
            text-align: center;
            position:sticky;
            top:0;
        }
        tr:nth-child(even) {
            background-color:#f2f2f2;
        }
        td{
            border: 1px solid #ddd;
            padding: 8px;
        }
 
		 .addBtn{
            position:absolute;
            z-index:16;
			height: 42px;
            width:15%;
            margin-left:18.5%;
        }
		.addBtn .addBtn_hover{
           position:absolute;		   
			height: 42px;
            width:80%;          
            cursor: pointer;
			display: none;
			left: %;
			z-index: 99;
        }
		.addBtn:hover .addBtn_hover{
			display:inline;
		}
		
        .sortBtn{						
			position:absolute;
			width:15%;
			height:42px;
			margin-left:12.5%;
        }
        .moveBtn{
			position:relative;
            margin-top: 23%;
			margin-left:10%;
            position:absolute;
			z-index: 19;
        }
        .searchBox{ 
			position:absolute;
			//margin-top:10%;
			margin-left:-10.5%;
			width:15%;
			height:42px;
            box-sizing: border-box;
            border-radius: 10px;
            border-style:solid;
            border-width:1.5px; 
            border-color:#2B8F91;
            outline:none;
        	font-size: 15px;
            font-family: "Acherus Militant 1";
            background-image:url(images/searchicon.png);
            background-position:left;
			padding-left:30px;
            background-size:25px;
            background-repeat:no-repeat;                      
        }
        .search1{
			position:absolute;
			
			margin-left:2%;
			
			width:85px;
            height:42px;
            font-family: "Acherus Militant 1";
			font-size: 18px;
			color:white;
			background-color:#33A9AB;
			cursor: pointer;
			border-radius: 0px 13px 13px 0px;
			border:none;
			
        }
		.search1:hover{ 
			position:absolute;		
			width:85px;
			margin-left:2%;
            height:42px;
            font-family: "Acherus Militant 1";
			font-size: 18px;
			color:white;
			background-color:#26797a;
			cursor: pointer;
			border-radius: 0px 13px 13px 0px;
			border:none;
			
        }
		.searchBox .search1{
			display:inline;
		}
		.edit:hover{
			opacity: 0.4;
			cursor: pointer;
		}
		.delete:hover{
			opacity: 0.4;
			cursor: pointer;
		}
		.sidebar li a.adminTab{
		  background:  #FFF9E7;
		  width: 110%;
		}
		.sidebar i[class='bx bx-user-check']{
		  color: #33A9AB;
		}
		.sidebar li a #adminLink{
		  color:#33A9AB;
		}
		.sidebar.open ul li a.adminTab::before{
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
		.sidebar.open ul li a.adminTab::after{
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
<form action="" method="POST">

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
        <a href="qrScanner.php">
          <i class='bx bx-scan' ></i>
          <span class="links_name">QR Code Scanner</span>
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
       <a href="registeredAdmin.php" class="adminTab">
         <i class='bx bx-user-check' ></i>
         <span class="links_name" id="adminLink">Admin Accounts</span>
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
  
  
<!--CONTENT--!>
  
  <section class="home-section">
    <div class="centerText">
    <h3 class = "h3">ADMIN ACCOUNTS</h3>
    </div>
            
<div class="container">
           		 
<div class="row">
    
	<div class="col-sm-4"style="padding-top:2.5%;">
     <center>
	  <div class="addBtn">
			   <img src="images/addNewAdmin_hover2.png" alt="add hover" class="addBtn_hover" onclick="location.href='addAdmin.php';"/>
               <img src="images/addNewAdmin.png" alt="add" width="80%" height= "42px" onclick="location.href='addAdmin.php';"/>
	   </div> 
		  <input type="text" name="idNum" class="searchBox " placeholder="Search">
		  <input type="Submit" value="Search" class="search1" name="searchBtn">
		  <input type="Image" src="images/aaasort.png" class="sortBtn  " name="sortBtn" onMouseOver="this.src='images/aaasort_hover2.png'" onMouseOut="this.src='images/aaasort.png'">
	  </center>
	</div>

    
  </div>

		 
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
  
</form> 

<?php

ini_set('display_errors',1);
error_reporting(E_ALL & ~E_NOTICE);

$connection = mysqli_connect("localhost", "root", "", "db_bakascts") or die(mysqli_error($mysqli)); 
if(isset($_POST['searchBtn'])){
	$searchBox = $_POST['idNum'];
	$sql = "SELECT * FROM tb_login WHERE CONCAT(idNum, lastName, firstName, user) LIKE '%".$searchBox."%'";
}elseif(isset($_POST['sortBtn_x']) && $_POST['sortBtn_y'] !='' ){
	$sql = "SELECT * FROM tb_login ORDER BY lastName ASC";
}else 
$sql = "SELECT * FROM tb_login";

$result=mysqli_query($connection,$sql) or die("Error");?>
 <div class="affix" >   
    <div class="table-responsive tableview">
		<table class="table table-striped " width="100%">
		<thead class="thead-dark">
		<tr>
		<th width="15%">ID Number</th>
		<th width="30%">Name</th>
		<th width="20%">Username</th>
		<th width="20%">Password</th>
		<th width="15%">Action</th>
		</tr>
		</thead>
        
<?php

//$pw = $row['password'];
//$password = preg_replace("|.|","*",$pw);

while($row = mysqli_fetch_array($result)){ ?>
<tr>
    <td><?php echo $row['idNum']?></td>
    <td><?php echo $row['lastName'].", ".$row['firstName']?></td>
    <td><?php echo $row['user']?></td>
    <td><?php echo $row ['password']?></td>
    <td width="100px"><center>
<a href="updateAdmin.php?edit=<?php echo $row['idNum']?>"><img src="images/edit.png" alt="edit" width="35px" class="edit"/></a><a href="deleteAdmin.php?delete=<?php echo $row['idNum']?>"><img src="images/delete.png" alt="delete" width="35px" class="delete"/></a>
    </center></td>
</tr>

<?php } ?>
    </table>
    </div>
	</div>
	</div>
	</section>
</body>
</html>



