<!DOCTYPE html>
<html>

<body>

<?php
$q = $_GET['q'];
if(isset($_GET['q']))
{            
    $con = mysqli_connect('localhost','root','','billing_retail');
    if (!$con) {
      die('Could not connect: ' . mysqli_error($con));
    }    
    
    $display_sql = "SELECT * FROM barcode WHERE productname LIKE '%$q%' OR anothername LIKE '%$q%'";
    $display_result = mysqli_query($con,$display_sql);
    
    $checkRow = mysqli_num_rows($display_result);
    if($checkRow>0){
    
      echo "<table class='table'>
      <thead>
          <tr>
              <th>Product Name</th>
              <th>Another Name</th>
              <th>Barcode</th>
              <th>Measure</th>
              <th>Weight Unit</th>          
              <th>Weight Value</th>
              <th>Size Value</th>
              <th>Pieces Value</th>
              <th>Date Saved</th>
              <th></th>
          </tr>
      </thead>
      <tbody>";
      while($row = mysqli_fetch_array($display_result)) {
        echo "<tr>";
        echo "<td>" . $row['productname'] . "</td>";
        echo "<td>" . $row['anothername'] . "</td>";
        echo "<td>" . $row['barcode'] . "</td>";
        echo "<td>" . $row['measure'] . "</td>";
        echo "<td>" . $row['weightunit'] . "</td>";
        echo "<td>" . $row['weightvalue'] . "</td>";
        echo "<td>" . $row['sizevalue'] . "</td>";
        echo "<td>" . $row['piecesvalue'] . "</td>";
        echo "<td>" . $row['datereg'] . "</td>";
        echo "<td>";
        echo "<a>";
        echo "<input type='hidden' id='barcode' value=". $row['barcode'] .">";
        $dele = $row['barcode'];
        echo "<button type='submit' class='btn btn-submit me-2' id='submit' onclick='functionAlert($dele);''>Copy</button>";
        echo "</a>";
        echo "</td>";
        echo "</tr>";
        
      }
      
    }
    else{
        echo "<h6 class='text-danger text-center mt-3'>No data Found</h6>";
    
    }
     
    mysqli_close($con);
}

?>
</body>
</html>
