<!DOCTYPE html>
<html>

<body>

<?php
$q = intval($_GET['q']);
$qarr = split ("\A", $q); 
$con = mysqli_connect('localhost','root','','billing_retail');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"billing_retail");
$sql="UPDATE totalamount SET total = '{$qarr[0]}' WHERE id = '{$qarr[1]}'";
$result = mysqli_query($con,$sql);
mysqli_close($con);

?>
</body>
</html>