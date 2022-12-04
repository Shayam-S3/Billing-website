
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Sri Balaji Maligai-New Sales</title>
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
                        
                        <li class="submenu">
                            <a href="javascript:void(0);"><img src="assets/img/icons/return1.svg" alt="img"><span>Product</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="product.php">Manage Product</a></li>
                                <li><a href="product_add.php">Add Product</a></li>
                                <li><a href="product_sale.php">Manage Sales</a></li>
                                <li><a href="generate_barcode.php">Generate Barcode</a></li>
                                <li><a href="get_barcode.php">Get Barcode</a></li>
                            </ul>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                <!-- <div class="row">
                    
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count">
                            <div class="dash-counts">
                                <h4>100</h4>
                                <h5>Customers</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das1">
                            <div class="dash-counts">
                                <h4>100</h4>
                                <h5>Suppliers</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="user-check"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das2">
                            <div class="dash-counts">
                                <h4>100</h4>
                                <h5>Purchase Invoice</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="file-text"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das3">
                            <div class="dash-counts">
                                <h4>105</h4>
                                <h5>Sales Invoice</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="file"></i>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="card mb-0">
                    <div class="card-body">
                        <h4 class="card-title">Sales</h4>
                       
                            <table class="table datatable ">
                                <thead>
                                    <tr>
                                        <th>SNo</th>
                                        <th>Product Code</th>
                                        <th>Product Name</th>
                                        <th>Product Rate</th>
                                        <th>Product Qty</th>
                                        <th>Product Amount</th>
                                        <th>Product Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $connection=mysqli_connect('localhost','root','','billing_retail');
                                $check_sql = "SELECT * FROM record ORDER BY sno DESC ";
                                $sno_checkResult = mysqli_query($connection,$check_sql);
                                $i=1; 
                                while($row=mysqli_fetch_assoc($sno_checkResult)) {
                                    $code = $row['code'];
                                    $date = $row['date'];
                                    
                                     $emailquery = "select * from record WHERE code = '$code' AND date = '$date' ";
                                        $query = mysqli_query($connection,$emailquery);
                                    
                                    $emailcount = mysqli_num_rows($query);
                                    
                                        if($emailcount>1)
                                        {   $ema = "select * from record WHERE code = '$code' AND date = '$date' limit 1 ";
                                            $qry = mysqli_query($connection,$ema);
                                            foreach($qry as $tt)
                                            {
                                                $sno = $tt['sno'];
                                                $sql = "DELETE FROM record WHERE sno='$sno'";
                                                $aa = mysqli_query($connection, $sql);
                                                if($aa)
                                                {
                                                    echo ("<script LANGUAGE='JavaScript'>
                                                    window.location.href='product_sale.php';
                                                    </script>");
                                                }
                                            }
                                        } else
                                        {
                                    
                                   ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['code']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['rate']; ?></td>
                                        <td><?php echo $row['qty']; ?></td>
                                        <td><?php echo $row['total']; ?></td>
                                        <td><?php echo $row['date']; ?></td>
                                    </tr>
                                   <?php $i++ ; } }?>
                                </tbody>
                            </table>
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
</body>

</html>