<?php 
 if(isset($_POST['v_submit']))
 {
    $connection=mysqli_connect('localhost','root','','billing_retail');
    $p_name= $_POST['p_name'];
    $p_another= $_POST['p_another'];
    $date = date('d/m/Y');
    $weight= $_POST['weight'];
    $p_price= $_POST['p_price'];
    $check_sql = "SELECT barcode FROM barcode ORDER BY id DESC LIMIT 1";
    $sno_checkResult = mysqli_query($connection,$check_sql);
    $row=mysqli_fetch_assoc($sno_checkResult);
    $barcode=$row['barcode']+1;

    if($weight=='weight'){
        $weight_unit = $_POST['kg'];
        $weight_value = $_POST['p_weight'];
        $sql = "INSERT INTO barcode (barcode,productname,anothername,datereg,measure,weightunit,weightvalue)
            VALUES ('$barcode','$p_name','$p_another','$date','$weight','$weight_unit','$weight_value')";

            $run = mysqli_query($connection,$sql);
            if($run)
            {
                echo ("<script LANGUAGE='JavaScript'>
                navigator.clipboard.writeText($barcode);
                alert($barcode);
                </script>");
            }
    }

    if($weight=='size'){
        $size_value = $_POST['sizes'];
        $sql = "INSERT INTO barcode (barcode,productname,anothername,datereg,measure,sizevalue)
            VALUES ('$barcode','$p_name','$p_another','$date','$weight','$size_value')";

            $run = mysqli_query($connection,$sql);
            if($run)
            {
                echo ("<script LANGUAGE='JavaScript'>
                navigator.clipboard.writeText($barcode);
                alert($barcode);
                </script>");
            }
    }

    if($weight=='pieces'){
        $pieces_value = $_POST['p_pieces'];
        $sql = "INSERT INTO barcode (barcode,productname,anothername,datereg,measure,piecesvalue)
            VALUES ('$barcode','$p_name','$p_another','$date','$weight','$pieces_value')";

            $run = mysqli_query($connection,$sql);
            if($run)
            {
                echo ("<script LANGUAGE='JavaScript'>
                navigator.clipboard.writeText($barcode);
                alert($barcode);
                </script>");
            }
    } 
    
    $insertsql = "INSERT INTO item (barcode,productname,anothername,datereg,rate,qty)
    VALUES ('$barcode','$p_name','$p_another','$date','$p_price','1')";

    $insrun = mysqli_query($connection,$insertsql);
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
    <title>Sri Balaji Maligai-Generate Barcode</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/vio.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <script type="text/javascript">
        window.onload = function() {
            document.getElementById('weight_values').style.display = 'none';
            document.getElementById('pieces_values').style.display = 'none';
            document.getElementById('size_values').style.display = 'none';
        }
        function yesnoCheck() {
            if (document.getElementById('weight').checked) {
                document.getElementById('weight_values').style.display = 'block';
                document.getElementById('size_values').style.display = 'none';
                document.getElementById('pieces_values').style.display = 'none';
                document.getElementById("kg").required = true
                document.getElementById("g").required = true
                document.getElementById("p_weight").required = true
                document.getElementById("sizes").required = false
                document.getElementById("p_pieces").required = false
            } 
            else if(document.getElementById('size').checked) {
                document.getElementById("sizes").required = true
                document.getElementById("p_pieces").required = false
                document.getElementById("kg").required = false
                document.getElementById("g").required = false
                document.getElementById("p_weight").required = false
                document.getElementById('size_values').style.display = 'block';
                document.getElementById('weight_values').style.display = 'none';
                document.getElementById('pieces_values').style.display = 'none';
            }
            else if(document.getElementById('pieces').checked) {
                document.getElementById("p_pieces").required = true
                document.getElementById("sizes").required = false
                document.getElementById("kg").required = false
                document.getElementById("g").required = false
                document.getElementById("p_weight").required = false
                document.getElementById('pieces_values').style.display = 'block';
                document.getElementById('weight_values').style.display = 'none';
                document.getElementById('size_values').style.display = 'none';
            }
        }
</script>
</head>

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
                        <h4 class="card-title">Generate Barcode</h4>
                        <div class="table-responsive dataview">
                            <form id="myForm" action="" method="POST"  autocomplete="off">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="text" name="p_name" placeholder="Enter Product Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="text" name="p_another" placeholder="Enter Another Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                     <input type="radio" onclick="javascript:yesnoCheck();" name="weight" id="weight" value="weight" required/>    Weight <br>
                                      <input type="radio" onclick="javascript:yesnoCheck();" name="weight" id="size" value="size"/>    Size<br>
                                     <input type="radio" onclick="javascript:yesnoCheck();" name="weight" id="pieces" value="pieces"/>    Pieces<br>
                                    </div>
                                </div>
                                <div class="col-md-6" id="weight_values" style="display:none">
                                    <div class="form-group">
                                     <input type="radio" name="kg"  id ="kg" value="kilogram"/>    Kilogram <br>
                                      <input type="radio" name="kg" id ="g" value="gram"/>    Gram<br>
                                       <input type="text" name="p_weight" id = "p_weight"placeholder="Enter Product Weight">
                                    </div>
                                </div>
                                <div class="col-md-6" id="size_values" style="display:none">
                                    <div class="form-group">
                                    <label for="sizes">Choose a size:</label>
                                    <select id="sizes" name="sizes">
                                    <option value="xs">Extra small (XS)</option>
                                    <option value="s">Small (S)</option>
                                    <option value="m">Medium (M)</option>
                                    <option value="l">Large (L)</option>
                                    <option value="xl">Extra Large (XL)</option>
                                    <option value="xxl">Double Extra Large (XXL)</option>
                                    <option value="xxxl">Triple Extra Large (XXXL)</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-6" id="pieces_values" style="display:none">
                                    <div class="form-group">
                                    <input type="text" name="p_pieces" id ="p_pieces" placeholder="Enter No of Pieces">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="text" name="p_price" placeholder="Enter Product Price" required>
                                    </div>
                                </div>
                               
                                <div class="col">
                                    <button  class="btn btn-primary btn-block" id="submit" type="submit" name="v_submit" >Submit</button>
                                </div>
                            </form>
                        </div>
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