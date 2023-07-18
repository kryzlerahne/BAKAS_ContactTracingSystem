<?php

$conn = new mysqli('localhost','root','','db_bakascts');
if ($conn->connect_error) {
    die('Error : ('. $conn->connect_errno .') '. $conn->connect_error);
}

$idNum = $_POST['idNum'];
 
$sql = "select * from tb_usersreg where idNum=".$idNum;
$result = mysqli_query($conn,$sql);
while( $row = mysqli_fetch_array($result) ){
?>
<table border='0' width='100%'>
<tr>
    <td width="200"><img src="icons/<?php echo $row['image_path']; ?>" width="200">
    <td style="padding:20px;">
    <p><b>Name: </b> <?php echo $row['firstName'].' '.$row['lastName']; ?></p>
    <p><b>Email: </b><?php echo $row['email']; ?></p>
    <p><b>Gender: </b><?php echo $row['gender']; ?></p>
    <p><b>Contact Number: </b><?php echo $row['contactNum']; ?></p>
    <p><b>Street: </b><?php echo $row['street']; ?></p>
    <p><b>Barangay: </b><?php echo $row['barangay']; ?></p>
    <p><b>City: </b><?php echo $row['city']; ?></p>
    </td>
</tr>
</table>
 
<?php } ?>