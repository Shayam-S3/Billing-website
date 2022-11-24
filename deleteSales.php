<!DOCTYPE html>
<html>

<body>

<?php

$con = mysqli_connect('localhost','root','','billing_retail');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"billing_retail");
$sql="DELETE FROM sales";
$result = mysqli_query($con,$sql);



mysqli_close($con);
?>
</body>
</html>