<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Sri Balaji Maligai-Get Barcode</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/vio.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
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
                        <h4 class="card-title">Get Barcodes</h4>
                        <div class="container">
                        	<div class="row">
                        	    <form class="col-md-12" id="productdetails">
                        	        <label>Search Your Product</label>
                        	        <select class="form-control select2" onchange="showProductBarcode(this.value)">
                        	           <option>Search..</option> 
                        	           <?php
                                        $connection=mysqli_connect('localhost','root','','billing_retail');
                                        $query_grap="select * from barcode ORDER BY productname ASC";
                                        $query_exe=mysqli_query($connection,$query_grap);
                                        while($row=mysqli_fetch_assoc($query_exe)){
                                            $productname=$row['productname'];
                                            $barcode=$row['anothername'];
                                         ?>     
                        	           <option value="<?php echo $productname ?>"><?php echo $productname ?> <?php echo $barcode ?></option>
                        	        <?php } ?>
                        	        </select>
                        	    </form>
                         	</div>
                        </div>
                        <script>
                            $('.select2').select2();
                        </script>
                             <div class="col-lg-12 col-sm-6 col-12" style="display:none;">
                                <div class="form-group" id="productdetails" >
                                    <label>Product</label><h6 class='text-danger text-center mt-3' id="fetcherr"></h6>
                                    <div class="input-groupicon">
                                        <input type="text"  id="barcode" autocomplete="off" placeholder="Scan/Search Product by code and select..." onclick="showProductBarcode(this.value)">
                                        <div class="addonset ">
                                            <img src="assets/img/icons/scanners.svg" alt="img">
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="table-responsive" id="fetchresult">
                            
                            </tbody>
                            </table>
                            </div>                          
                            
                        </div>
                        <div class="card mb-0">
                    <div class="card-body">
                        <h4 class="card-title">Barcodes</h4>
                        
                            <table class="table datatable ">
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
                                    <!-- <th></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $connection=mysqli_connect('localhost','root','','billing_retail');
                                $check_sql = "SELECT * FROM barcode ORDER BY id DESC ";
                                $sno_checkResult = mysqli_query($connection,$check_sql);
                                while($row=mysqli_fetch_assoc($sno_checkResult)) {
                                   ?>
                                    <tr>
                                        <td><?php echo $row['productname']; ?></td>
                                        <td><?php echo $row['anothername']; ?></td>
                                        <td><?php echo $row['barcode']; ?></td>
                                        <td><?php echo $row['measure']; ?></td>
                                        <td><?php echo $row['weightunit']; ?></td>
                                        <td><?php echo $row['weightvalue']; ?></td>
                                        <td><?php echo $row['sizevalue']; ?></td>
                                        <td><?php echo $row['piecesvalue']; ?></td>
                                        <td><?php echo $row['datereg']; ?></td>

                                        <!-- <td>
                                            <a>
                                        <input type='hidden' id='barcode' value=<?php echo $row['barcode']; ?>>
                                        <?php$dele = $row['barcode'];?>
                                        <button type='submit' class='btn btn-submit me-2' id='submit' onclick='functionAlert(this.value);'>Copy</button></a></td> -->
                                    </tr>
                                   <?php  } ?>
                                </tbody>
                            </table>
                        
                    </div>
                </div>
                        <!-- <div class="table-responsive dataview">
                            <form id="myForm" action="" method="POST">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="text" name="p_name" placeholder="Enter Product Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="text" name="p_price" placeholder="Enter Product Price">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="text" name="p_qty" placeholder="Enter Product Quantity">
                                    </div>
                                </div>
                                <div class="col">
                                    <button  class="btn btn-primary btn-block" id="submit" type="submit" name="v_submit" >Submit</button>
                                </div>
                            </form>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showProductBarcode(str) {
        if (str == "") {
            
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("fetchresult").innerHTML = this.responseText;
                document.getElementById("barcode").value = "";
               
            }
            };
            xmlhttp.open("GET","getgeneratedbarcode.php?q="+str,true);
            xmlhttp.send();

            
        }
        }
        function functionAlert(del){
            navigator.clipboard.writeText(del);
        }
    
    </script>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/plugins/select2/js/select2.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>