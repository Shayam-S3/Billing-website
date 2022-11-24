
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Sri Balaji Maligai-Edit Product</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">
        <div class="header">
            <div class="header-left active">
                <a href="createsalesreturns.php" class="logo">
                <img src="assets/img/logo.png" alt="">
                </a>
                <a href="createsalesreturns.php" class="logo-small">
                <img src="assets/img/logo-small.png" alt="">
                </a>
                <a id="toggle_btn" href="javascript:void(0);">
                </a>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="createsalesreturns.php"><img src="assets/img/icons/dashboard.svg" alt="img"><span> Dashboard</span> </a>
                        </li>
                        
                        <li>
                            <a href="product.php"><img src="assets/img/icons/return1.svg" alt="img"><span>Back to Product</span> </a>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class=" card-header py-3">
        <h6 class="m-0 font-weight-bold-text-primary"> Edit Product Data</h6> 
    </div>
    <div class="card-body">
<?php
$connection = mysqli_connect("localhost","root","","billing_retail");
if(isset($_POST['edit_btn']))
{
    $id = $_POST['edit_id'];
    $query = "SELECT * FROM item WHERE id ='$id' ";
    $query_run = mysqli_query($connection,$query);
    
    foreach($query_run as $row)
    { 
      ?>  
        <form action="code.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="edit_id"  value="<?php echo $row['id'] ?>" > 
            <div class="form-group">
                <label> Barcode </label>
                <input type="text" name="edit_barcode" value="<?php echo $row['barcode'] ?>" class="form-control" placeholder="Enter Barcode">
            </div>
            <div class="form-group">
                <label> Name </label>
                <input type="text" name="edit_productname" value="<?php echo $row['productname'] ?>" class="form-control" placeholder="Enter Product Name">
            </div>
            <div class="form-group">
                <label> Rate </label>
                <input type="text" name="edit_productdate" value="<?php echo $row['rate'] ?>" class="form-control" placeholder="Enter Product Rate">
            </div>
            <div class="form-group">
                <label> Qty </label>
                <input type="text" name="edit_productqty" value="<?php echo $row['qty'] ?>" class="form-control" placeholder="Enter Qty">
            </div>
            
            <a href="product.php" class="btn btn-danger" > CANCEL </a>
            <button type="submit" name="product_updatebtn" class="btn btn-primary"> Update </button>
        </form>
<?php
    }
}
?>
            
    </div>
    </div>
</div>
</div>
</div>



<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/plugins/apexchart/chart-data.js"></script>

<script src="assets/js/script.js"></script>

<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->

<script src="js/sb-admin-2.min.js"></script>
<script src="js/custom_admin.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>