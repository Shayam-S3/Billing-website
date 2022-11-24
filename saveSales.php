<!DOCTYPE html>
<html>

<body>

<?php

$con = mysqli_connect('localhost','root','','billing_retail');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
$val=0;

mysqli_select_db($con,"billing_retail");
$check_sql = "SELECT invoice FROM savesales ORDER BY invoice DESC LIMIT 1";
$sno_checkResult = mysqli_query($con,$check_sql);
$sno_checkRow = mysqli_num_rows($sno_checkResult);
$sno_fetchRow = mysqli_fetch_assoc($sno_checkResult);
if($sno_checkRow>0){
    $value = $sno_fetchRow['invoice'];
    if($value>=1){
        $val = $value+1;
    }
    else{
        $val=1;
    }
   
}else{
    $val=1;
}
$sql="INSERT INTO savesales (invoice) VALUES ('{$val}')";
$result = mysqli_query($con,$sql);



mysqli_close($con);
?>
</body>
</html>