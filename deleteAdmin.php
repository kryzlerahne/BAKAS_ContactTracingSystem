<?php

session_start();

$mysqli = new mysqli("localhost", "root", "" ,"db_bakascts") or die(mysqli_error($mysqli));

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $result = $mysqli->query("DELETE FROM tb_login WHERE idNum=$id") or die($mysqli->error());
    
    //$_SESSION['message'] = "Record has been deleted!";
    //$_SESSION['msg_type'] = "danger";
    
    header("location: registeredAdmin.php");
}

?>
