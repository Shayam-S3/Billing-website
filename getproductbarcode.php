<!DOCTYPE html>
<html>

<body>

<?php



if(isset($_GET['delete_id']))
{
  
  $dq = intval($_GET['delete_id']);
    
    $con = mysqli_connect('localhost','root','','billing_retail');
    if (!$con) {
      die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con,"billing_retail");
    
    $lat_amt = "SELECT * from sales WHERE id = '{$dq}'";
    $lat_res = mysqli_query($con,$lat_amt);
    $lat_row = mysqli_fetch_assoc($lat_res);
    $del_amt = $lat_row['amount'];
    $sql="DELETE FROM sales WHERE id = '{$dq}'";
    $result = mysqli_query($con,$sql);
  
    $display_sql = "SELECT * FROM sales WHERE code!='$dq'";
    $display_result = mysqli_query($con,$display_sql);
    
    $checkRow = mysqli_num_rows($display_result);
     if($checkRow>0){
    echo ("<script LANGUAGE='JavaScript'>
                                window.alert('bggfggfg');
                                </script>");
      echo "<table class='table'>
      <thead>
          <tr>
              <th>Sno</th>
              <th>Rate</th>
              <th>Product</th>
              <th>QTY </th>
              <th>Amount </th>
              <th></th>
          </tr>
      </thead>
      <tbody>";
      $sno = 1;
      while($row = mysqli_fetch_array($display_result)) {
       
        echo "<tr>";
        echo "<td>" . $sno . "</td>";
        echo "<td>" . $row['rate'] . "</td>";
        echo "<td>" . $row['product'] . "</td>";
        echo "<td>" . $row['qty'] . "</td>";
        
        // echo "<td> <input type='text'  id='txt1' autocomplete='off' value='1' onkeyup='showHint(this.value)'>  </td>";
        echo "<input type='hidden' id='delete_amt' value=". $row['amount'] .">";
        echo "<td>" . $row['amount'] . "</td>";
    
        echo "<td>";
        echo "<a>";
        
        $q = $row['code'];
        
        // echo "<input type='text' id='barcode' autocomplete='off' value=". $row['qty'] ."  onkeyup='showcode($q);abc(this.value);'>";
         
        echo "<button  class='btn btn-submit me-2'  type='submit' id='submit' onclick='abc($q);''>-</button>";
        echo "<button  class='btn btn-submit me-2'  type='submit' id='submit' onclick='showcode($q);''>+</button>";
        echo "</a>";
        echo "</a>";
        echo "</td>";
    
        echo "<td>";
        echo "<a class='delete-set'>";
        echo "<input type='hidden' id='delete_id' value=". $row['id'] .">";
        $dele = $row['id'];
        echo "<button type='submit' id='submit' onclick='functionAlert($dele);''> <img src='assets/img/icons/delete.svg' alt='svg'></button>";
        echo "</a>";
        echo "</td>";
        echo "</tr>";
        
        $sno ++ ;
        
      }
      $displt = "SELECT SUM(amount) FROM sales";
    $hes = mysqli_query($con, $displt) or die( mysqli_error($con));
    foreach($hes as $row)
    { $avg=$row['SUM(amount)'];
        $round_avg = (int)$avg;
        echo "<tr>";
        echo "<td>";
        echo "<a>";
        echo "<button  class='btn btn-cancel'  type='button' >Total Amount - $round_avg</button>";
        echo "</a>";
        echo "</td>";
        echo "</tr>";
        
    
    }
    }
    else{
      echo "<h6 class='text-danger text-center mt-3'>No data Found</h6>";
    
    }
     
}

if(isset($_GET['qt']))
    {          
      $qt = $_GET['qt'];  
    $con = mysqli_connect('localhost','root','','billing_retail');
    if (!$con) {
      die('Could not connect: ' . mysqli_error($con));
    }
    
    mysqli_select_db($con,"billing_retail");
    $sql="SELECT * FROM item WHERE barcode = '$qt'";
    $result = mysqli_query($con,$sql);
    $result_checkRow = mysqli_num_rows($result);
    $boolVal=0;
    if($result_checkRow>0){
      $boolVal=1;
    }
    $sno = 1;
    
    while($row = mysqli_fetch_array($result)) {
      $product=$row['productname'];
      $rate=$row['rate'];
      $t_id = $row['barcode']; 
      $qty_id = $row['qty']; 
      
      $sno_checkSql = "SELECT sno FROM sales ORDER BY sno DESC LIMIT 1";
      $sno_checkResult = mysqli_query($con,$sno_checkSql);
      $sno_checkRow = mysqli_num_rows($sno_checkResult);
      $sno_fetchRow = mysqli_fetch_assoc($sno_checkResult);
      if($sno_checkRow>0){
        $value = $sno_fetchRow['sno'];
        $sno = $value+1;
      }
    
      $product_checkSql = "SELECT * FROM sales WHERE product = '$product'";
      $product_checkResult = mysqli_query($con,$product_checkSql);
      $product_checkRow = mysqli_num_rows($product_checkResult);
      if($product_checkRow===0){
        $qty = $qty_id ;
        $amount = $qty*$rate;
        $code = $t_id;
        $insert_sql = "INSERT INTO sales (sno,rate,product,qty,amount,code) VALUES ('{$sno}','{$rate}','{$product}','{$qty}','{$amount}','{$code}')";
        mysqli_query($con,$insert_sql);
      }
      else{
        while($row = mysqli_fetch_array($product_checkResult)) {
        $product_i=$row['qty'];
        
        $qty = $product_i - 1 ;
        $amount = $qty*$rate;
        $sql = "UPDATE sales SET qty='$qty', amount='$amount' WHERE product = '$product'";
        mysqli_query($con,$sql);
        }
      }
    }
    
    
    $display_sql = "SELECT * FROM sales";
    $display_result = mysqli_query($con,$display_sql);
    
    $checkRow = mysqli_num_rows($display_result);
     if($checkRow>0){
    
      echo "<table class='table'>
      <thead>
          <tr>
              <th>Sno</th>
              <th>Rate</th>
              <th>Product</th>
              <th>QTY </th>
              <th>Amount </th>
              <th></th>
          </tr>
      </thead>
      <tbody>";
      $sno = 1;
      while($row = mysqli_fetch_array($display_result)) {
         
        echo "<tr>";
        echo "<td>" . $sno . "</td>";
        echo "<td>" . $row['rate'] . "</td>";
        echo "<td>" . $row['product'] . "</td>";
        echo "<td>" . $row['qty'] . "</td>";
        
        // echo "<td> <input type='text'  id='txt1' autocomplete='off' value='1' onkeyup='showHint(this.value)'>  </td>";
        echo "<input type='hidden' id='delete_amt' value=". $row['amount'] .">";
        echo "<td>" . $row['amount'] . "</td>";
    
        echo "<td>";
        echo "<a>";
        
        $q = $row['code'];
        
        // echo "<input type='text' id='barcode' autocomplete='off' value=". $row['qty'] ."  onkeyup='showcode($q);abc(this.value);'>";
         
        echo "<button  class='btn btn-submit me-2'  type='submit' id='submit' onclick='abc($q);''>-</button>";
        echo "<button  class='btn btn-submit me-2'  type='submit' id='submit' onclick='showcode($q);''>+</button>";
        echo "</a>";
        echo "</a>";
        echo "</td>";
    
        echo "<td>";
        echo "<a class='delete-set'>";
        echo "<input type='hidden' id='delete_id' value=". $row['id'] .">";
        $dele = $row['id'];
        echo "<button type='submit' id='submit' onclick='functionAlert($dele);''> <img src='assets/img/icons/delete.svg' alt='svg'></button>";
        echo "</a>";
        echo "</td>";
        echo "</tr>";
        
        $sno ++ ;
        
      }
    
      $displt = "SELECT SUM(amount) FROM sales";
    $hes = mysqli_query($con, $displt) or die( mysqli_error($con));
    foreach($hes as $row)
    { $avg=$row['SUM(amount)'];
        $round_avg = (int)$avg;
        echo "<tr>";
        echo "<td>";
        echo "<a>";
        echo "<button  class='btn btn-cancel'  type='button' >Total Amount - $round_avg</button>";
        echo "</a>";
        echo "</td>";
        echo "</tr>";
    }
    }
    else{
      echo "<h6 class='text-danger text-center mt-3'>No data Found</h6>";
    
    }
     
       
        
    if($boolVal==0){
      echo "<div id='confirm'>";
      echo "<div class='message' id='msg'>Product Not Found $qt </div></div>";
      
    }
    
    json_encode($boolVal);
    mysqli_close($con);
}

if(isset($_GET['q']))
    {  
      $q = $_GET['q'];          
    $con = mysqli_connect('localhost','root','','billing_retail');
    if (!$con) {
      die('Could not connect: ' . mysqli_error($con));
    }
    
    mysqli_select_db($con,"billing_retail");
    $sql="SELECT * FROM item WHERE barcode = '$q'";
    $result = mysqli_query($con,$sql);
    $result_checkRow = mysqli_num_rows($result);
    $boolVal=0;
    if($result_checkRow>0){
      $boolVal=1;
    }
    $sno = 1;
    
    while($row = mysqli_fetch_array($result)) {
      $product=$row['productname'];
      $rate=$row['rate'];
      $t_id = $row['barcode']; 
      $qty_id = $row['qty'];
      
      $sno_checkSql = "SELECT sno FROM sales ORDER BY sno DESC LIMIT 1";
      $sno_checkResult = mysqli_query($con,$sno_checkSql);
      $sno_checkRow = mysqli_num_rows($sno_checkResult);
      $sno_fetchRow = mysqli_fetch_assoc($sno_checkResult);
      if($sno_checkRow>0){
        $value = $sno_fetchRow['sno'];
        $sno = $value+1;
      }
    
      $product_checkSql = "SELECT * FROM sales WHERE product = '$product'";
      $product_checkResult = mysqli_query($con,$product_checkSql);
      $product_checkRow = mysqli_num_rows($product_checkResult);
      if($product_checkRow===0){
        $qty = $qty_id ;
        $amount = $qty*$rate;
        $code = $t_id;
        $insert_sql = "INSERT INTO sales (sno,rate,product,qty,amount,code) VALUES ('{$sno}','{$rate}','{$product}','{$qty}','{$amount}','{$code}')";
        mysqli_query($con,$insert_sql);
      }
      else{
        while($row = mysqli_fetch_array($product_checkResult)) {
        $product_i=$row['qty'];
        
        $qty = $product_i + 1 ;
        $amount = $qty*$rate;
        $sql = "UPDATE sales SET qty='$qty', amount='$amount' WHERE product = '$product'";
        mysqli_query($con,$sql);
        }
      }
    }
    
    
    $display_sql = "SELECT * FROM sales";
    $display_result = mysqli_query($con,$display_sql);
    
    $checkRow = mysqli_num_rows($display_result);
     if($checkRow>0){
    
      echo "<table class='table'>
      <thead>
          <tr>
              <th>Sno</th>
              <th>Rate</th>
              <th>Product</th>
              <th>QTY </th>
              <th>Amount </th>
              <th></th>
          </tr>
      </thead>
      <tbody>";
      $sno = 1;
      while($row = mysqli_fetch_array($display_result)) {
         
        echo "<tr>";
        echo "<td>" . $sno . "</td>";
        echo "<td>" . $row['rate'] . "</td>";
        echo "<td>" . $row['product'] . "</td>";
        echo "<td>" . $row['qty'] . "</td>";
        
        // echo "<td> <input type='text'  id='txt1' autocomplete='off' value='1' onkeyup='showHint(this.value)'>  </td>";
        echo "<input type='hidden' id='delete_amt' value=". $row['amount'] .">";
        echo "<td>" . $row['amount'] . "</td>";
    
        echo "<td>";
        echo "<a>";
        
        $q = $row['code'];
        
        // echo "<input type='text' id='barcode' autocomplete='off' value=". $row['qty'] ."  onkeyup='showcode($q);abc(this.value);'>";
         
        echo "<button  class='btn btn-submit me-2'  type='submit' id='submit' onclick='abc($q);''>-</button>";
        echo "<button  class='btn btn-submit me-2'  type='submit' id='submit' onclick='showcode($q);''>+</button>";
        echo "</a>";
        echo "</a>";
        echo "</td>";
    
        echo "<td>";
        echo "<a class='delete-set'>";
        echo "<input type='hidden' id='delete_id' value=". $row['id'] .">";
        $dele = $row['id'];
        echo "<button type='submit' id='submit' onclick='functionAlert($dele);''> <img src='assets/img/icons/delete.svg' alt='svg'></button>";
        echo "</a>";
        echo "</td>";
        echo "</tr>";
        
        $sno ++ ;
        
      }
      $displt = "SELECT SUM(amount) FROM sales";
    $hes = mysqli_query($con, $displt) or die( mysqli_error($con));
    foreach($hes as $row)
    { $avg=$row['SUM(amount)'];
        $round_avg = (int)$avg;
        echo "<tr>";
        echo "<td>";
        echo "<a>";
        echo "<button  class='btn btn-cancel'  type='button' >Total Amount - $round_avg</button>";
        echo "</a>";
        echo "</td>";
        echo "</tr>";
    }
    }
    else{
      echo "<h6 class='text-danger text-center mt-3'>No data Found</h6>";
    
    }
     
       
        
    if($boolVal==0){
      echo "<div id='confirm'>";
      echo "<div class='message' id='msg'>Product Not Found $q </div></div>";
      
    }
    
    json_encode($boolVal);
    mysqli_close($con);
}

?>
</body>
</html>
