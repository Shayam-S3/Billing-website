
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Sri Balaji Maligai-Manage Product</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/vio.png">
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
                <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="dele_close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="code.php" method="POST">

                            <div class="modal-body">
                            <input type="hidden" name="delete_id" id="delete_id" >
                            <h4> Do you want to Delete this Data ?</h4>
                                
                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary no" data-dismiss="modal">No</button>
                                <button type="submit" name="delete_product" class="btn btn-primary">Yes</button>
                            </div>
                        </form>

                        </div>
                    </div>
                </div>


                <div class="card mb-0">
                    <div class="card-body">
                        <h4 class="card-title">Products</h4>
                            <table class="table datatable ">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Product Code</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Product Quantity</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $connection=mysqli_connect('localhost','root','','billing_retail');
                                $check_sql = "SELECT * FROM item ORDER BY id ";
                                $sno_checkResult = mysqli_query($connection,$check_sql);
                                while($row=mysqli_fetch_assoc($sno_checkResult)) {
                                   ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['barcode']; ?></td>
                                        <td><?php echo $row['productname']; ?></td>
                                        <td><?php echo $row['rate']; ?></td>
                                        <td><?php echo $row['qty']; ?></td>
                                        <td>
                                            <form action="product_edit.php" method="post">
                                                <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
                                                <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                            </form>                                        
                                        </td>
                                        <td><button type="submit"  class="btn btn-danger deletebtn"> DELETE</button></td>
                                    </tr>
                                   <?php  } ?>
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
    <script>
        $(document).ready(function () { 
        $('.deletebtn').on('click', function() {
            $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();
            console.log(data);
            $('#delete_id').val(data[0]);
        })
        })

        $(document).ready(function () { 
        $('.close').on('click', function() {
            $('#deletemodal').modal('hide');
        })
        $('.no').on('click', function() {
            $('#deletemodal').modal('hide');
        })
        })
  </script>
   <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->

<script src="js/sb-admin-2.min.js"></script>
<script src="js/custom_admin.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?php
    //include('scripts.php'); 
  ?>
</body>

</html>