<?php
require ("controller/connection.php");


if (isset($_POST['btnSave'])){

        for($i=0;$i<1;$i++) {
		$downpayment = $_POST[$i];
		
		
		$updateAC =  new updateAC();
		$updateAC->update($downpayment,$i);
        }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="../vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Bootstrap Colorpicker -->
    <link href="../vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="../vendors/cropper/dist/cropper.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <title>Dependencies</title>
</head>

<body class="nav-sm">
    <div class="container body">
      <div class="main_container">
        <?php require("sidemenu.php");
              require("topnav.php");  ?>

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="col-md-12">
                <div class="panel panel-success ">
                    <div class="panel-heading" style="text-align: center;" ><h1><b>Business Dependencies</b></h1></div>
                        <div class="panel-body">

                             <div class="col-md-12">
                                <div class="panel panel-success ">
                                    <div class="panel-body">
                                        
                                        <form class="form-vertical" role="form" action = "dependencies-utilities.php" method= "post">
                                            
                                            <?php
                                                $sql = "SELECT * FROM tblbusinessdependency";
                                                $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                mysql_select_db(constant('mydb'));
                                                $result = mysql_query($sql,$conn);
                                                
                                                // while($row = mysql_fetch_array($result)){ 
                                                        // $intBusinessDependency = $row['intBusinessDependency']; 
                                                        // $strBusinessDependency = $row['strBusinessDependency'];
                                                        // $deciBusinessDependencyValue = $row['deciBusinessDependencyValue'];
                                                        
                                                    // }//while($row = mysql_fetch_array($result))
                                                    // mysql_close($conn);         
                                            
                                            ?>		

                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Downpayment:</label>
                                                    <div class="col-md-2">
                                                        <?php 
                                                        $sql = "SELECT * FROM tblbusinessdependency";
                                                        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                        mysql_select_db(constant('mydb'));
                                                        $result = mysql_query($sql,$conn);
                                                
                                                        
                                                        $row = mysql_fetch_array($result);
                                                        $downpayment = $row[2];
                                                        
                                                        
                                                          echo " <input name='1' type='text' class='form-control input-md'  data-inputmask='mask': '99.99%'  value='$downpayment' required>";
                                                            
                                                         
                                                        ?>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Reservation Fee:</label>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control input-md"  name= "tfReservationFee" data-inputmask="'mask': '99,999.99'"  required>
                                                    </div>
                                                </div>
                                            </div><!--ROW-->
                                            
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-md-4" align="right" style="margin-top:.30em">Discounted Price for SpotCash:</label>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control input-md"  name= "tfDiscountSpotcash" data-inputmask="'mask': '99.99%'"  required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Refund for cancelation of Reservation:</label>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control input-md"  name= "tfRefund" data-inputmask="'mask': '99.99%'"  required>
                                                    </div>
                                                </div>
                                            </div><!--ROW-->
                                                
                                             <div class="row">
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Penalty for unpayable Balanced:</label>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control input-md"  name= "tfPenalty" data-inputmask="'mask': '99.99%'"  required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Charge for Transfering ownership:</label>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control input-md"  name= "tfCharge" data-inputmask="'mask': '99,999.99%'"  required>
                                                    </div>
                                                </div>
                                            </div><!--ROW-->
                                            
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Grace Period days:</label>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control input-md"  name= "tfGracePeriod" data-inputmask="'mask': ''"  required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Day/s Before Forfeting Reservation w/ No Downpayment:</label>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control input-md"  name= "tfReservationNoDownpayment" data-inputmask="'mask': ''"  required>
                                                    </div>
                                                </div>
                                            </div><!--ROW-->
                                             
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Day/s Before Forfeting Reservation w/out Full Payment:</label>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control input-md"  name= "tfReservationNotFullPayment" data-inputmask="'mask': ''"  required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Overdue months for forfeiting ownership:</label>
                                                    <div class="col-md-2">
                                                        <input type="text" class="form-control input-md"  name= "tfOwnershipOverDue" data-inputmask="'mask': ''"  required>
                                                    </div>
                                                </div>
                                            </div><!--ROW-->
                                            
                                            <div class="row">
                                                <h4 class="col-md-9" style = "color: red;" style="margin-top:.70em">REQUIRED ALL FIELDS</h4>
                                                <div class="form-group"> 
                                                    <button type="submit" class="btn btn-success col-md-1" style="margin-top:.70em" name= "btnSubmit">Save</button>
                                                    <input class = "btn btn-default col-md-1 " type="reset" style="margin-top:.70em" name = "btnClear" value = "Clear Entries">
                                                </div>
                                            </div>
                                            
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div><!--panel body -->
                </div><!--panel panel-success-->
            </div><!--col-md-12-->
        </div><!-- /page content -->                 
 
 
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            MLMS-Design 
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      
        </div><!-- main_container -->
    </div><!-- container body -->
   

		 <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="js/moment/moment.min.js"></script>
    <script src="js/datepicker/daterangepicker.js"></script>
    <!-- Ion.RangeSlider -->
    <script src="../vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <!-- Bootstrap Colorpicker -->
    <script src="../vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- jQuery Knob -->
    <script src="../vendors/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- Cropper -->
    <script src="../vendors/cropper/dist/cropper.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>



     <!-- jquery.inputmask -->
    <script>
      $(document).ready(function() {
        $(":input").inputmask();
      });
    </script>
    <!-- /jquery.inputmask -->

</body>
</html>

