<?php

session_start();

error_reporting(E_ALL & ~E_NOTICE);

$conn = new mysqli("localhost", "root", "" ,"db_bakascts") or die(mysqli_error($mysqli));

if(isset($_POST['idNum'])){

	$idNum =$_POST['idNum'];
	date_default_timezone_set('Asia/Manila');
	$date = date('F j, Y');
	$time = date('h:i:s A');
	
	$sql = "SELECT * FROM tb_usersreg WHERE idNum = '$idNum'";
	$query = $conn->query($sql);
	
	if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find ID Number '.$idNum.'. Please make sure you are registered.';
		}else{
		  $row = $query->fetch_assoc();
		  $idNum = $row['idNum'];
		  $sql = "INSERT INTO tb_ctsreport(idNum,time,date) VALUES('$idNum','$time','$date')";
		  $query=$conn->query($sql);
		  $_SESSION['success'] = 'Scanned successfully. Keep safe and enjoy, '.$row['firstName'].'.';
		  
		}
		
	/**$sql = "INSERT INTO tb_ctsreport(idNum,time,date) VALUES('$text','$time','$date')";
	if ($mysqli->query($sql)===TRUE){
		$_SESSION['success'] = 'Scanned successfully. Keep safe and enjoy!';
	}else{
		$_SESSION['error'] = $conn->error;
	}**/
}
header("location:qrScanner.php");

$mysqli->close();

?>