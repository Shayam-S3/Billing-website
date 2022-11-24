<!DOCTYPE html>
<html>

<body>

<?php

$con = mysqli_connect('localhost','root','','billing_retail');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"billing_retail");
$sql="SELECT total FROM totalamount ORDER BY id DESC LIMIT 1";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);

echo "<input type='hidden' id='fetch_tot_amt_a' value=". $row['total'] .">";

mysqli_close($con);

?>
</body>
</html>