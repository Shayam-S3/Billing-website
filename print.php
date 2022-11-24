<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <style>
            * {
                font-size: 20px;
                font-family: 'Times New Roman';
            }


            table {
                border-top: 1px solid black;
                border-collapse: collapse;
                width: 100%;
                max-width: 340px;
            }
            .centered {
                text-align: center;
                align-content: center;
            }

            .ticket {
                padding-top:0px;
                padding-left:0px;
                padding-right:0px;
                width: 340px;
                max-width: 340px;
            }

            @media print {
                .hidden-print,
                .hidden-print * {
                    display: none !important;
                }
            }
        </style>
        <title>Receipt</title>
    </head>
    <body>
        <?php
            $current_time=time();
            $DateTime=strftime("%d-%m-%y  %H:%M",$current_time);
            $DateTime;
            $connection=mysqli_connect('localhost','root','','billing_retail');
            $check_sql = "SELECT invoice FROM savesales ORDER BY invoice DESC LIMIT 1";
            $sno_checkResult = mysqli_query($connection,$check_sql);

            while($row=mysqli_fetch_assoc($sno_checkResult)){
                $invoice=$row['invoice'];
                
        ?>
        
        <div class="ticket">
            <p class="centered">Sri Balaji Maligai</p>
            <p style="text-align:left;">
                Inv No: <?php echo $invoice; ?>
                <span style="float:right;">
                    Date <?php echo $DateTime; ?>
                </span>
            </p>
        <?php
            }
        ?>
        
            <table>
                <thead style="border-bottom:1px solid black;">
                    
                    <tr>
                        <th class="quantity">Sno</th>
                        <th class="description">Rate</th>
                        <th class="price">Product</th>
                        <th class="price">Qty</th>
                        <th class="price">Amount</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                        $con=mysqli_connect('localhost','root','','billing_retail');
                    
                        $ap="select * from sales ";
                        $result = mysqli_query($con, $ap);
    
                        foreach($result as $row){
                            $sno=$row['sno'];
                            $rate=$row['rate'];
                            $product=$row['product'];
                            $qty=$row['qty'];
                            $amount=$row['amount'];
                            $code=$row['code'];
                            // $total += $row['amount'];
                            date_default_timezone_set("Asia/Calcutta"); 
                            $date = date("Y-m-d H:i");
                           
                            $qpl="INSERT INTO record (name,rate,qty,total,code,date) VALUES ('$product','$rate','$qty','$amount','$code','$date')";
                            $resu = mysqli_query($con,$qpl); 
                            
                              $displt = "SELECT SUM(amount) FROM sales";
                                $hes = mysqli_query($con, $displt) or die( mysqli_error($con));
                                foreach($hes as $row)
                                { $avg=$row['SUM(amount)'];
                                    $round_avg = (int)$avg;
                                }
                            
                    ?>
                    <tr>
                        <td class="quantity" style="padding-top:5px; padding-left:5px;"><?php echo $sno; ?></td>
                        <td class="price" style="padding-top:5px; padding-left:5px;"><?php echo $rate; ?></td>
                        <td class="description" style="padding-top:5px; padding-left:5px;"><?php echo $product; ?></td>
                        <td class="price" style="padding-top:5px; padding-left:5px;"><?php echo $qty; ?></td>
                        <td class="price" style="padding-top:5px; padding-left:5px;"><?php echo $amount; ?></td>
                    </tr>
                    <?php
                        } 
                    ?>
                    
                    <tr style="border-bottom:1px solid black; border-top:1px solid black;">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="padding-top:10px;">Total</td>
                        <td style="padding-top:10px;padding-left:5px;"><?php echo $round_avg; ?></td>
                    </tr>
                </tbody>
            </table>

            <p class="centered" style="padding-top: 20px;">Thanks for your visit again!
                
        </div>
        <script src="assets/js/jquery-3.6.0.min.js"></script> 
        <script>
            $(document).ready(function(){
            window.print();
            setTimeout(window.close, 100);
        });
        </script>
    </body>
</html>