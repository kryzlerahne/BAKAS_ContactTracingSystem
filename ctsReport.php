<?php 

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

session_start();

if(isset($_POST['searchBtn']))
{
  $searchBox = $_POST['searchBox'];
  $query = "SELECT * FROM tb_ctsreport LEFT JOIN tb_usersreg ON tb_ctsreport.idNum=tb_usersreg.idNum WHERE CONCAT(qr_id, tb_ctsreport.idNum, time, date, lastName, firstName, status) LIKE '%".$searchBox."%'";
  $searchResult = filterTable($query);  
} 
elseif(isset($_POST['filterBtn']))
{
	$dateTxt = $_POST['dateTxtBox'];
	$query = "SELECT * FROM tb_ctsreport LEFT JOIN tb_usersreg ON tb_ctsreport.idNum=tb_usersreg.idNum WHERE date='$dateTxt'";
	$searchResult = filterTable($query);
	$count = mysqli_num_rows($searchResult);
	
	//if(!$count || mysqli_num_rows($count) == 0)
	//{
	  //echo "<h2> No Records found. </h2>";
	//} 
	//else{}
}
else{
  $query = "SELECT * FROM tb_ctsreport LEFT JOIN tb_usersreg ON tb_ctsreport.idNum=tb_usersreg.idNum ORDER BY qr_id DESC";
  $searchResult = filterTable($query);
}

function filterTable($query)
{
  $connect = mysqli_connect("localhost", "root", "", "db_bakascts");
  $filterResult = mysqli_query($connect, $query);
  return $filterResult;
}

?>

<!DOCTYPE html>
<html>
<head>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<link rel="shortcut icon" href="#">

	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
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
            padding-top:2%;
            font-family: "Adobe Gothic Std";
        	font-size: 35px;
            color:black;
            text-align:center;
        }
        #log_out{
		  cursor:pointer;
		}
        #tableview{
            transform: translate(-50%, -50%);
          	top: 39%;
            left: 50%;
		    position:absolute; 
        //	display:flex;
        //	justify-content: center;
        	margin-top:10%;
            height:445px;
            overflow:auto;
            overflow-x:hidden;
        }
        .table{
            border-collapse:collapse;
        	font-family: "Acherus Militant 1";
            color: #33A9AB;
            text-align: left;
            width:1070px;
        }
        .theader{
            background-color:#33A9AB;
            color:#FFF9E7;
            height:45px;
            text-align: center;
            position:sticky;
            top:0;
            border: 1px solid #ddd;
        }
        #trow:nth-child(even) {
            background-color:#f2f2f2;
        }
        .tdata{
            border: 1px solid #ddd;
            padding: 8px;
        }
		.moveBtn{
            top: 20%;
			right:19%;
            position:absolute;
			z-index: 19;
        }
        .searchBox{
            margin-left:1020px;
            width:250px;
            height: 38px;
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
        .search{
            position:absolute;
            width:6%;
            height:38px;
            left: 99%; 
            font-family: "Acherus Militant 1";
			font-size: 18px;
			color:white;
			background-color:#33A9AB;
			cursor: pointer;
			border-radius: 0px 13px 13px 0px;
			border:none;
        }
		.search:hover{
            position:absolute;
            width:6%;
            height:38px;
            left: 99%; 
            font-family: "Acherus Militant 1";
			font-size: 18px;
			color:white;
			background-color:#26797a;
			cursor: pointer;
			border-radius: 0px 13px 13px 0px;
			border:none;
        }
        .container2{
		  	position:absolute;
			z-index: 20;
			padding-left:360px;
			top:20%;
			left:15%;
		}
		.datepicker{
		  	position:absolute;
		  	color:black;
		  	background-color:white;
		  	font-family: "Acherus Militant 1";
		}
		.form-control{
		  left:0;
		  position:absolute;
		  z-index: 18;
		  width:55%;
		  height: 38px;
		  box-sizing: border-box;
          border-radius: 10px;
          border-style:solid;
          border-width:1.5px; 
          border-color:#2B8F91;
          outline:none;
          font-size: 15px;
          font-family: "Acherus Militant 1";
          padding-left:5%;
          margin-left:7%;
		}
		#calendarIcon{
		  left:0;
		  width:10.5%;
		  position:absolute;
		  z-index:22;
		}
		.filterBtn{
		  left:65%;
		  position:absolute;
		  z-index:23;
		  width:30%;
          height:37px;
          top:20%;
          font-family: "Acherus Militant 1";
		  font-size: 18px;
		  color:white;
		  background-color:#33A9AB;
		  cursor: pointer;
		  border-radius: 10px;
	      border:none;
		}
		.filterBtn:hover{
		  left:65%;
		  position:absolute;
		  z-index:99;
		  width:30%;
          height:37px;
          top:20%;
          font-family: "Acherus Militant 1";
		  font-size: 18px;
		  color:white;
		  background-color:#237577;
		  cursor: pointer;
		  border-radius: 10px;
	      border:none;
		}
		.refreshBtn{
		  position:absolute;
		  z-index:25;
		  width:32%;
		  top:20%;
		  left:75%;
		}
		.refreshBtn .refreshBtn_hover{
		  position:absolute;
		  z-index:99;
		  width:32%;
		  top:20%;
		  left:75%;
		  cursor:pointer;
		  display:none;
		}
		.refreshBtn:hover .refreshBtn_hover{
		  display:inline;
		}
		.resultTxt {
		  font-weight:normal;
		  font-family: "Acherus Militant 1";
		  font-size: 18px;
		  position:absolute;
		  transform: translate(-50%, -50%);
		  top: 93%;
          left: 50%;
		}
		.resultTxt2{
		  font-weight:normal;
		  font-family: "Acherus Militant 1";
		  font-size: 18px;
		  position:absolute;
		  transform: translate(-50%, -50%);
		  top: 93%;
          left: 50%;
		}
		.printBtn{
		  position:absolute;
		  z-index:25;
		  width:110px;
		  top:0;
		  right:19%;
		}
		.printBtn .printBtn_hover{
		  position:absolute;
		  z-index:99;
		  width:110px;
		  top:0;
		  right:19%;
		  cursor:pointer;
		  display:none;
		}
		.printBtn:hover .printBtn_hover{
		  display:inline;
		}
		.sidebar li a.reportTab{
		  background:  #FFF9E7;
		  width: 110%;
		}
		.sidebar i[class='bx bxs-report']{
		  color: #33A9AB;
		}
		.sidebar li a #reportLink{
		  color:#33A9AB;
		}
		.sidebar.open ul li a.reportTab::before{
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
		.sidebar.open ul li a.reportTab::after{
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
       <a href="ctsReport.php" class="reportTab">
         <i class='bx bxs-report' ></i>
         <span class="links_name" id="reportLink">CTS Report</span>
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
  
<!--CONTENT--!>
  
<section class="home-section">

<div class="container2">
		<div class="row">
		</div>
		<div class="row">
	        <div class='col-sm-3'>
	        	<form method="POST" autocomplete="off">
		            <div class="form-group">
		                <div class='input-group date' id='datepicker'>
		                    <input type='text' class="form-control" placeholder="Select Date" name="dateTxtBox">
		                    <span class="input-group-addon">
		                       <img src="images/calendar.png" id="calendarIcon">
		                    </span>
		                </div>
		            </div>
		            <input type="Submit" value="Filter Data" class="filterBtn" name="filterBtn">
		            <div class="refreshBtn">
			            <img src="images/refresh_hover.png" class="refreshBtn_hover" onclick="location.href='ctsReport.php';"> 
						<img src="images/refresh.png" class="refreshBtn">  
					</div>
		        </form>
		         
	        </div>
	    </div>
	</div>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
	<script >
	    $(function () {
	        $('#datepicker').datepicker({
	            format: "MM d, yyyy",
	            autoclose: true,
	            todayHighlight: true,
		        showOtherMonths: true,
		        selectOtherMonths: true,
		        autoclose: true,
		        changeMonth: true,
		        changeYear: true,
		        orientation: "button"
	        });
	    });
	</script>

<form action="" method="POST" autocomplete="off">

			<h3 class = "h3"> CTS REPORT  </h3>
            
            <div class="moveBtn">
           		<input type="text" name="searchBox" class="searchBox" placeholder="Search..." >   
				<input type="Submit" value="Search" class="search" name="searchBtn">  
				
				<div class="printBtn">
					<img src="images/printBtn_hover.png" class="printBtn_hover" onclick="printDiv('tableview')">
					<img src="images/printBtn.png" class="printBtn" alt="print" onclick="printDiv('tableview')">
				</div>				 		
            </div>   
			
			<script>
			function printDiv(tableview) {
		     var printContents = document.getElementById(tableview).innerHTML;
		     var originalContents = document.body.innerHTML;
		
		     document.body.innerHTML = printContents;
		
		     window.print();
		
		     document.body.innerHTML = originalContents;
			}
			</script>
			
			

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

    <div id="tableview">
    <table class="table">
    
        <tr>
		<th class="theader">Entry Code</th>
		<th class="theader">User ID Number</th>
		<th class="theader">Name</th>
		<th class="theader">Date of Visit</th>
		<th class="theader">Time of Visit</th>
		<th class="theader">Status</th>
		<th class="theader">Action</th>
        </tr>
        
        <tbody>
        <?php
        
        while ($row = mysqli_fetch_array($searchResult)):?>
        
        <tr  id="trow">
        	<td class="tdata"><?php echo $row['qr_id'];?></td>
        	<td class="tdata"><?php echo $row['idNum'];?></td>
        	<td class="tdata"><?php echo $row['lastName'].", ".$row['firstName']?></td>
            <td class="tdata"><?php echo $row['date'];?></td>
            <td class="tdata"><?php echo $row['time'];?></td>
            <td class="tdata"><?php echo $row['status'];?></td>
            <td class="tdata"><img src="images/edit.png" alt="edit" width="35px" class="edit"/></td>
        </tr>
        
        <?php endwhile;	
        ?>
        
    	</tbody>
    	
    </table>
    </div>
    
    
    <?php
        $count = mysqli_num_rows($searchResult);
        
        if($count == 0){
		  echo "<h3 class='resultTxt2'> No results. </h3>";
		} else {
		echo "<h3 class='resultTxt'> Showing " . $count . " results </h3>" ;
		}
    ?>
    
</section>   
</body>
</html>



