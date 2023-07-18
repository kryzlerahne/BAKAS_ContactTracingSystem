<?php

session_start();

$mysqli = new mysqli("localhost", "root", "" ,"db_bakascts") or die(mysqli_error($mysqli));

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $result = $mysqli->query("DELETE FROM tb_usersreg WHERE idNum=$id") or die($mysqli->error());
    
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
    
    //$_SESSION['message'] = "Record has been deleted!";
    //$_SESSION['msg_type'] = "danger";
    
    header("location: registeredIndiv.php");
}

?>
