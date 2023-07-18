<?php

$conn = new mysqli('localhost','root','','db_bakascts');
if ($conn->connect_error) {
    die('Error : ('. $conn->connect_errno .') '. $conn->connect_error);
}

$idNum = $_POST['idNum']; 
$sql = "SELECT qr_id, time, date FROM tb_ctsreport WHERE idNum=$idNum";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);

if($count!==0){?>

<table border='0' width='100%' height='50%' style="overflow-y:auto; text-align:center;">

<?php
echo"
<th>Entry Code</th>
<th>Time</th>
<th>Date</th>
";

while( $row = mysqli_fetch_array($result) ){
?>

<tr>
    <td><?php echo $row['qr_id']?></td>
    <td><?php echo $row['time']?></td>
    <td><?php echo $row['date']?></td>
</tr>

<?php 
	} 
} else {
  echo "<h3 class='resultTxt2' style='text-align:center;'> No results. </h3>";
}

?>
</table>
 
