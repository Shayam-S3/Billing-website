<!DOCTYPE html>
<html>

<body>

<?php
$q = intval($_GET['delete_id']);
$con = mysqli_connect('localhost','root','','billing_retail');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"billing_retail");
$lat_amt = "SELECT * from sales WHERE id = '{$q}'";
$lat_res = mysqli_query($con,$lat_amt);
$lat_row = mysqli_fetch_assoc($lat_res);
$del_amt = $lat_row['amount'];
$sql="DELETE FROM sales WHERE id = '{$q}'";
$result = mysqli_query($con,$sql);
$tot_amt = "SELECT * FROM totalamount ORDER BY id DESC LIMIT 1";
$tot_res = mysqli_query($con,$tot_amt);
$tot_row = mysqli_fetch_assoc($tot_res);
$tot = $tot_row['total'];
$tot_id = $tot_row['id'];
$val = $tot-$del_amt;
echo "<input type='hidden' id='fetch_tot_amt' value=". $val .">";
$upd_tot = "UPDATE totalamount SET total = '{$val}' WHERE id = '{$tot_id}'";
$upd_res = mysqli_query($con,$upd_tot);
mysqli_close($con);

?>
</body>
</html>