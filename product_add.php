<?php 
 if(isset($_POST['v_submit']))
 {
    $connection=mysqli_connect('localhost','root','','billing_retail');
    $p_name= $_POST['p_name'];
    $p_code= $_POST['p_code'];
    $p_price= $_POST['p_price'];
    $p_qty= $_POST['p_qty'];
    $p_anothername= $_POST['p_anothername'];
    $date = date('d/m/Y');

    $product_query = "SELECT * FROM item WHERE barcode='$p_code' ";
    $product_query_run = mysqli_query($connection, $product_query);
    $result_checkRow = mysqli_num_rows($product_query_run);

    if($result_checkRow<=0){

        $sql = "INSERT INTO item (barcode,productname,rate,datereg,qty,anothername)
                VALUES ('$p_code','$p_name','$p_price','$date','$p_qty','$p_anothername')";
    
        $run = mysqli_query($connection,$sql);
        if($run)
        {
            echo ("<script LANGUAGE='JavaScript'>
            window.location.href='product_add.php';
            </script>");
        }
    }
    
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Sri Balaji Maligai-Add Product</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/vio.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<style>
    .form_error span {
    width: 80%;
    height: 35px;
    padding:0;
    font-size: 1.1em;
    color: #D83D5A;
    }
    .form_error input {
    border: 1px solid #D83D5A;
    }
    .form_success span {
    width: 80%;
    height: 35px;
    padding:0;
    font-size: 1.1em;
    color: green;
    }
    .form_success input {
    border: 1px solid green;
    }
    #error_msg {
    color: red;
    text-align: center;
    margin: 10px auto;
    }
</style>
<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">
        <div class="header">
            <div class="header-left active">
                <a href="createsalesreturns.php" class="logo">
                <img src="assets/img/vio.png" alt="">
                </a>
                <a href="createsalesreturns.php" class="logo-small">
                <img src="assets/img/vio.png" alt="">
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
                        <h4 class="card-title">Add Products</h4>
                        <div class="table-responsive dataview">
                            <form id="myForm" action="" method="POST">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="text" name="p_name" placeholder="Enter Product Name" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="text" name="p_anothername" placeholder="Enter Product Another Name" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="text" name="p_code" id="p_code" placeholder="Enter Product Barcode" autocomplete="off" required>
                                    <span></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="text" name="p_price" placeholder="Enter Product Price" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="text" name="p_qty" placeholder="Enter Product Quantity" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <button  class="btn btn-primary btn-block" id="submit" type="submit" name="v_submit" >Submit</button>
                                </div>
                                <div class="col">
                                    <button  class="btn btn-danger btn-block" id="reset" type="reset" name="v_reset" >Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    $('document').ready(function(){
        var barcode_state = false;
        $('#p_code').on('blur', function(){
        var barcode = $('#p_code').val();
        if (barcode == '') {
            barcode_state = false;
            return;
        }
        $.ajax({
            url: 'barcodeCheck.php',
            type: 'post',
            data: {
                'barcode_check' : 1,
                'barcode' : barcode,
            },
            success: function(response){
            if (response == 'taken' ) {
                barcode_state = false;
                $('#p_code').parent().addClass("form_error");
                $('#p_code').siblings("span").text('Barcode already taken');
            }else if (response == 'not_taken') {
                barcode_state = true;
                $('#p_code').parent().addClass("form_success");
                $('#p_code').siblings("span").text('Barcode available');
            }
            }
        });
    });
});
    </script>
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