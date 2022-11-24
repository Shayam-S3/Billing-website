<?php
$connection = mysqli_connect('localhost','root','','billing_retail');
if(isset($_POST['delete_product']))
{
    $player_delete_id = $_POST['delete_id'];

    $query = "DELETE FROM item WHERE id='$player_delete_id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Product is Deleted";
        $_SESSION['status_code']="success";
        header('Location: product.php');
    }
    else{
        $_SESSION['status'] = "Product is Not Deleted";
        $_SESSION['status_code']="error";
        header('Location: product.php');
    }
}



if(isset($_POST['product_updatebtn']))
{
    $id=$_POST['edit_id'];
    $editbarcode = $_POST['edit_barcode'];
    $editproductname = $_POST['edit_productname'];
    $editproductdate = $_POST['edit_productdate'];
    $editproductqty = $_POST['edit_productqty'];

    $product_query = "SELECT * FROM item WHERE id!='$id' AND barcode='$editbarcode' ";
    $product_query_run = mysqli_query($connection, $product_query);
    $result_checkRow = mysqli_num_rows($product_query_run);
    if($result_checkRow<=0)
    {
        $query = "UPDATE item SET barcode = '$editbarcode',productname='$editproductname',rate='$editproductdate',qty='$editproductqty' WHERE id = '$id' ";
        $query_run = mysqli_query($connection, $query);
        if($query_run)
        {
            $_SESSION['status']="Product Data Updated";
            $_SESSION['status_code']="info";
            header('Location: product.php');        
        }
        else{
    
            $_SESSION['status'] = "Product Data is Not Updated";
            $_SESSION['status_code']="error";
            header('Location: product.php');
        } 
    }
    else {
        
        $_SESSION['status'] = "Product Data is Not Updated Existing barcode";
        $_SESSION['status_code']="error";
        header('Location: product.php');
    }
    
   
}
?>