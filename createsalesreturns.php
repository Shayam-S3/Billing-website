

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>Sri Balaji Maligai-New Sales</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/vio.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <style>
         #confirm {
            background-color: #ff3333;
            color: #ffffff;
            border: 1px solid #aaa;
            width: 200px;
            height: 30px;
            left: 40%;
            top: 40%;
            float: right;
            box-sizing: border-box;
            text-align: center;
         }
         #confirm button {
            background-color: #FFFFFF;
            display: inline-block;
            border-radius: 12px;
            border: 4px solid #aaa;
            padding: 5px;
            text-align: center;
            width: 60px;
            cursor: pointer;
         }
         #confirm .message {
            text-align: center;
         }
      </style>
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

            <a id="mobile_btn" class="mobile_btn" href="#sidebar">
                <span class="bar-icon">
                <span></span>
                <span></span>
                <span></span>
                </span>
            </a>

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
                <div class="page-header">
                    <div class="page-title">
                        <h4>Create New Sales Return</h4>
                        <h6>Add New Sales</h6>
                    </div>
                </div>
                <?php
                $current_time=time();
                $DateTime=strftime("%d-%m-%y",$current_time);
                $DateTime;
                $connection=mysqli_connect('localhost','root','','billing_retail');
                $check_sql = "SELECT invoice FROM savesales ORDER BY invoice DESC LIMIT 1";
                $sno_checkResult = mysqli_query($connection,$check_sql);

  
                while($row=mysqli_fetch_assoc($sno_checkResult)){
                    $invoice=$row['invoice'];
                ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Today Date</label>
                                    <div class="input-groupicon">
                                        <input type="text" placeholder="DD-MM-YYYY" class="datetimepicker" readonly value="<?php echo $DateTime;?>">
                                        <div class="addonset">
                                            <img src="assets/img/icons/calendars.svg" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12" id="invoiceno">
                                <div class="form-group">
                                    <label>Invoice No.</label>
                                    <input type="text" value="<?php echo $invoice+1; ?>" readonly>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <br>
                                <a href="javascript:void(0);"  id = "newsales" class="btn btn-warning me-2" onclick="deleteSales()">New Sales</a>
                                <a href="javascript:void(0);" class="btn btn-cancel" id="cancel">Cancel</a>
                            </div>
                            
                            
                            
                        <!-- <div class="container">
                        	<div class="row">
                        	    <form class="col-md-12" id="productdetails">
                        	        <label>Search Your Product</label>
                        	        <select class="form-control select2" onchange="showProductBarcode(this.value)">
                        	           <option>Search..</option> 
                        	           <?php
                                        //$connection=mysqli_connect('localhost','root','','billing_retail');
                                        //$query_grap="select * from item ORDER BY productname ASC";
                                        //$query_exe=mysqli_query($connection,$query_grap);
                                        //while($row=mysqli_fetch_assoc($query_exe)){
                                         //   $productname=$row['productname'];
                                           // $barcode=$row['barcode'];
                                         ?>     
                        	           <option value="<?php //echo $barcode ?>"><?php //echo $productname ?> <?php //echo $barcode ?></option>
                        	        <?php //} ?>
                        	        </select>
                        	    </form>
                         	</div>
                        </div>
                        <script>
                            $('.select2').select2();
                        </script> -->
                            
                            <div class="col-lg-12 col-sm-6 col-12">
                                <div class="form-group" id="productdetails" >
                                    <label>Product</label><h6 class='text-danger text-center mt-3' id="fetcherr"></h6>
                                    <div class="input-groupicon">
                                        <input type="text"  id="barcode" autocomplete="off" placeholder="Scan/Search Product by code and select..." onkeyup="showProductBarcode(this.value)">
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
                            <div class='row'>
                                <div class='col-lg-6'>
                                    <a href='javascript:void(0);' class='btn btn-submit me-2'  onclick='saveSales();printSales()' id = 'print'> Save & Print</a>
                                 </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 <html>


    <script>
    
        function showcode (q) {
            if (q == "") {
            
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("fetchresult").innerHTML = this.responseText;
                document.getElementById("barcode").value = "";
                document.getElementById('confirm').style.visibility = 'visible';
                setTimeout (function(){
                    document.getElementById('confirm').style.visibility = 'hidden';
                },2000);
            }
            };
            xmlhttp.open("GET","getproductbarcode.php?q="+q,true);
            xmlhttp.send();

            var xmhttp2 = new XMLHttpRequest();
            xmlhttp2.onreadystatechange = function() {

            }
            xmlhttp2.open("GET","getTotalAmount.php",true);
            
        }
        }

        function abc(q) {
         if (q == "") {
            
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("fetchresult").innerHTML = this.responseText;
                document.getElementById("barcode").value = "";
                document.getElementById('confirm').style.visibility = 'visible';
                setTimeout (function(){
                    document.getElementById('confirm').style.visibility = 'hidden';
                },2000);
            }
            };
            xmlhttp.open("GET","getproductbarcode.php?qt="+q,true);
            xmlhttp.send();

            var xmhttp2 = new XMLHttpRequest();
            xmlhttp2.onreadystatechange = function() {

            }
            xmlhttp2.open("GET","getTotalAmount.php",true);
            
        }
        }

        function showProductBarcode(str) {
        if (str == "" || isNaN(str)) {
            
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("fetchresult").innerHTML = this.responseText;
                document.getElementById("barcode").value = "";
                document.getElementById('confirm').style.visibility = 'visible';
                setTimeout (function(){
                    document.getElementById('confirm').style.visibility = 'hidden';
                },2000);
            }
            };
            xmlhttp.open("GET","getproductbarcode.php?q="+str,true);
            xmlhttp.send();
            var xmhttp2 = new XMLHttpRequest();
            xmlhttp2.onreadystatechange = function() {

            }
            xmlhttp2.open("GET","getTotalAmount.php",true);
            
        }
        }

        function functionAlert(del){
            
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("fetchresult").innerHTML = this.responseText;
                document.getElementById("barcode").value = "";
                document.getElementById('confirm').style.visibility = 'visible';
                setTimeout (function(){
                    document.getElementById('confirm').style.visibility = 'hidden';
                },2000);
            }
            };
            xmlhttp.open("GET","getproductbarcode.php?delete_id="+del,true);
            xmlhttp.send();
             var xmhttp2 = new XMLHttpRequest();
            xmlhttp2.onreadystatechange = function() {

            }
            xmlhttp2.open("GET","getTotalAmount.php",true);
            
        }
        

        function deleteSales() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            
            };
            xmlhttp.open("GET","deleteSales.php",true);
            xmlhttp.send();
        }

        function saveSales() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            
            };
            xmlhttp.open("GET","saveSales.php",true);
            xmlhttp.send();
        }
        
        
        function printSales() {
            var xmlhttpPrint = new XMLHttpRequest();
            xmlhttpPrint.onreadystatechange = function() {

            };
            xmlhttpPrint.open("GET","print.php",true);
            xmlhttpPrint.send();
            window.open(
            "print.php", "_blank");
            window.location.reload();
        }
    </script>

    <script src="assets/js/jquery-3.6.0.min.js"></script> 

    <script>
        $( document ).ready(function() {
            $("#productdetails").hide();
            $("#print").hide();
            $("#cancel").hide();
            $("#invoiceno").hide();
            $("#newsales").click(function(){
                $("#productdetails").show();
                $("#print").show();
                $("#cancel").show();
                $("#invoiceno").show();
                $("#newsales").hide();
            });
            $("#cancel").click(function(){
                $("#productdetails").hide(); 
                $("#newsales").show(); 
                $("#print").hide();
                $("#fetchresult").hide();
                $("#invoiceno").hide();
                $("#cancel").hide();
            });
        });
        
    </script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>