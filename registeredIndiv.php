
<?php session_start();?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<!-- Boxicons CDN Link -->
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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
        .tableview{
           
       //   transform: translate(-50%, -50%);
            margin-left: 5%;
		    height:445px;
		
        //	display:flex;
        //	justify-content: center;
        	margin-top:10%;
            width:95%;
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
            vertical-align:middle !important;
        }
        tr:nth-child(even) {
            background-color:#f2f2f2;
        }
        td{
            border: 1px solid #ddd;
            padding: 8px;
        }
        .table > tbody > tr > td {
    		 vertical-align: middle;
		}
		.addBtn{
            position:absolute;
            z-index:16;
			height: 42px;
            width:55%;
            margin-left:28.5%;
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
			width:55%;
			height:42px;
			margin-left:155%;
			 z-index:16;
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
			margin-left:55%;
			width:55%;
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
			z-index:16;			
        }
        .search1{
			position:absolute;
			z-index:16;		
			margin-left:105%;
			
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
			margin-left:105%;
            height:42px;
            font-family: "Acherus Militant 1";
			font-size: 18px;
			color:white;
			background-color:#26797a;
			cursor: pointer;
			border-radius: 0px 13px 13px 0px;
			border:none;
			
        }
		.track:hover{
			opacity: 0.4;
			cursor: pointer;
		}
		.view:hover{
			opacity: 0.4;
			cursor: pointer;
		}
		.edit:hover{
			opacity: 0.4;
			cursor: pointer;
		}
		.delete:hover{
			opacity: 0.4;
			cursor: pointer;
		}
		.sidebar li a.indivTab{
		  background:  #FFF9E7;
		  width: 110%;
		}
		.sidebar i[class='bx bxs-user-detail']{
		  color: #33A9AB;
		}
		.sidebar li a #indivLink{
		  color:#33A9AB;
		}
		.sidebar.open ul li a.indivTab::before{
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
		.sidebar.open ul li a.indivTab::after{
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
		.modal-dialog{
		 // vertical-align:middle;
		  margin-top: 9%;
		  left:5%;
		}
		div.modal-header{
		  text-align:center;
		  display:flex;
    	  justify-content: center;
		}

		.modal-body{
  		  max-height: 350px;
  		  overflow: auto;
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
       <a href="registeredIndiv.php" class="indivTab">
         <i class='bx bxs-user-detail' ></i>
         <span class="links_name" id="indivLink">Registered Individuals</span>
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
  
  <!--CONTENT--!>
  
  <section class="home-section">
  	<div class="centerText">
    <h3 class = "h3"> LIST OF REGISTERED USERS  </h3>
    </div>

<div class="container">
           		 
<div class="row">
    
	<div class="col-sm-4"style="padding-top:3.5%;">
     <center>
	  <div class="addBtn">
			   <img src="images/addNewUser_hover2.png" alt="add hover" class="addBtn_hover" onclick="location.href='addUser.php';"/>
               <img src="images/addNewUser.png" alt="add" width="80%" height= "42px" onclick="location.href='addUser.php';"/>
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
	$searchBox =$_POST['idNum'];
	$sql = "SELECT * FROM tb_usersreg  WHERE CONCAT(idNum, lastName, firstName, gender, email, contactNum, street, barangay, city) LIKE '%".$searchBox."%'";
}elseif(isset($_POST['sortBtn_x']) && $_POST['sortBtn_y'] !='' ){
	$sql = "SELECT * FROM tb_usersreg ORDER BY lastName ASC";
}else 
$sql = "SELECT * FROM tb_usersreg ORDER BY idNum DESC" ;

$result=mysqli_query($connection,$sql) or die("Error");?>
 
	
	
    <div class="table-responsive tableview">
		<table class="table table-striped " width="95%">
		<thead class="thead-dark">
		<tr>
		<th width="2%">ID Number</th>
		<th width="20%">Name</th>
		<th width="2%">Gender</th>
		<th width="5%">Email</th>
		<th width="10%">Contact Number</th>
		<th width="24%">Address</th>
		<th width="20%">Action</th>
		</tr>
		</thead>

<?php



while($row = mysqli_fetch_array($result)){ ?>
<tr>
    <td><?php echo $row['idNum']?></td>
    <td><?php echo $row['lastName'].", ".$row['firstName']?></td>
	<td><?php echo $row['gender']?></td>
    <td><?php echo $row['email']?></td>
    <td><?php echo $row['contactNum']?></td>
    <td><?php echo $row['street'].", ".$row['barangay'].", ".$row['city']?></td>
    <td width="170px"><center>
    	<img src="images/track.png" data-id='<?php echo $row['idNum']; ?>' alt="tracking" width="35px" class="track" name="track"><img src="images/view.png" data-id='<?php echo $row['idNum']; ?>' alt="viewing" width="35px" class="view"><a href="updateUser.php?edit=<?php echo $row['idNum']?>"><img src="images/edit.png" alt="edit" width="35px" class="edit"/></a><a href="deleteUser.php?delete=<?php echo $row['idNum']?>"><img src="images/delete.png" alt="delete" width="35px" class="delete" id="deleteBtn"/></a>
    	
    </center></td>
</tr>

<?php } ?>
    </table>
    </div>
	</div>

 <script type='text/javascript'>
            $(document).ready(function(){
                $('.view').click(function(){
                    var idNum = $(this).data('id');
                    $.ajax({
                        url: 'view.php',
                        type: 'POST',
                        data: {idNum: idNum},
                        success: function(response){ 
                            $('.modal-body').html(response); 
                            $('#empModal').modal('show'); 
                        }
                    });
                });
            });
            
            $(document).ready(function(){
                $('.track').click(function(){
                    var idNum = $(this).data('id');
                    $.ajax({
                        url: 'track.php',
                        type: 'POST',
                        data: {idNum: idNum},
                        success: function(response){ 
                            $('.modal-body').html(response); 
                            $('#empModal2').modal('show'); 
                        }
                    });
                });
            });
</script>
</section>

<div class="modal fade" id="empModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="margin-left:200px;">Registered User Information</h4>
                    <button type="button" class="close" data-dismiss="modal" style="margin-left:200px;">&times;</button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
</div>

<div class="modal fade" id="empModal2" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" >
                    <h4 class="modal-title" style="margin-left:200px;">Tracking Details</h4>
                    <button type="button" class="close" data-dismiss="modal" style="margin-left:200px;">&times;</button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
</div>

</body>
</html>



