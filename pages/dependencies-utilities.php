<?php
require ("controller/connection.php");

require ("controller/utilities-update.php");


if (isset($_POST['btnSave'])){


        for($id=1;$id<=10;$id++) {
		$deciBusinessDependencyValue = $_POST[$id];
		
       
		$updateDependencies =  new updateDependencies();
		$updateDependencies->update($deciBusinessDependencyValue, $id);
        
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

    
     <script type="text/javascript" src="../build/js/jquery-3.1.0.js"></script>
     <script type="text/javascript" src="../build/js/jquery-3.1.0.min.js"></script>
    
    
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
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Downpayment:</label>
                                                    <div class="col-md-2">
                                                        
                                                         <?php
                                                            $sql = "SELECT * FROM tblbusinessdependency WHERE intBusinessDependencyId='1'";
                                                            $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                            mysql_select_db(constant('mydb'));
                                                            $result = mysql_query($sql,$conn);
                                                            $row = mysql_fetch_array($result);
                                                            $downpayment = $row['deciBusinessDependencyValue'];
                                                            
                                                            
                                                        
                                                        ?>		

                                                          <input type='text' class='form-control input-md' name=<?php echo"1";?> value="<?php echo"$downpayment";?>"  required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Reservation Fee:</label>
                                                    <div class="col-md-2">

                                                        <?php
                                                            $sql = "SELECT * FROM tblbusinessdependency WHERE intBusinessDependencyId='2'";
                                                            $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                            mysql_select_db(constant('mydb'));
                                                            $result = mysql_query($sql,$conn);
                                                            $row = mysql_fetch_array($result);
                                                            $reservationFee = $row['deciBusinessDependencyValue'];
                                                        
                                                        ?>
                                                        
                                                        <input type="text" class="form-control input-md"  name= "<?php echo"2";?>" value="<?php echo"$reservationFee";?>" required>

                                                    </div>
                                                </div>
                                            </div><!--ROW-->
                                            
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-md-4" align="right" style="margin-top:.30em">Discounted Price for SpotCash:</label>
                                                    <div class="col-md-2">

                                                        <?php
                                                            $sql = "SELECT * FROM tblbusinessdependency WHERE intBusinessDependencyId='3'";
                                                            $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                            mysql_select_db(constant('mydb'));
                                                            $result = mysql_query($sql,$conn);
                                                            $row = mysql_fetch_array($result);
                                                            $discountSpotcash = $row['deciBusinessDependencyValue'];
                                                        
                                                        ?>
                                                  
                                                        <input type="text" class="form-control input-md" name=<?php echo"3";?> value="<?php echo"$discountSpotcash";?>"  required>

                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Refund for cancelation of Reservation:</label>
                                                    <div class="col-md-2">

                                                        <?php
                                                            $sql = "SELECT * FROM tblbusinessdependency WHERE intBusinessDependencyId='4'";
                                                            $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                            mysql_select_db(constant('mydb'));
                                                            $result = mysql_query($sql,$conn);
                                                            $row = mysql_fetch_array($result);
                                                            $refund = $row['deciBusinessDependencyValue'];
                                                        
                                                        ?>
                                                        <input type="text" class="form-control input-md" name=<?php echo"4";?> value="<?php echo"$refund";?>"  required>
                                                    </div>
                                                </div>
                                            </div><!--ROW-->
                                                
                                             <div class="row">
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Penalty for unpayable Balanced:</label>
                                                    <div class="col-md-2">

                                                         <?php
                                                            $sql = "SELECT * FROM tblbusinessdependency WHERE intBusinessDependencyId='5'";
                                                            $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                            mysql_select_db(constant('mydb'));
                                                            $result = mysql_query($sql,$conn);
                                                            $row = mysql_fetch_array($result);
                                                            $penalty = $row['deciBusinessDependencyValue'];
                                                        
                                                        ?>
                                                        <input type="text" class="form-control input-md"  name=<?php echo"5";?> value="<?php echo"$penalty";?>"   required>

                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Charge for Transfering ownership:</label>
                                                    <div class="col-md-2">

                                                        <?php
                                                            $sql = "SELECT * FROM tblbusinessdependency WHERE intBusinessDependencyId='6'";
                                                            $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                            mysql_select_db(constant('mydb'));
                                                            $result = mysql_query($sql,$conn);
                                                            $row = mysql_fetch_array($result);
                                                            $charge = $row['deciBusinessDependencyValue'];
                                                        
                                                        ?>
                                                        <input type="text" class="form-control input-md"  name=<?php echo"6";?> value="<?php echo"$charge";?>"  required>

                                                    </div>
                                                </div>
                                            </div><!--ROW-->
                                            
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Grace Period days:</label>
                                                    <div class="col-md-2">

                                                         <?php
                                                            $sql = "SELECT * FROM tblbusinessdependency WHERE intBusinessDependencyId='7'";
                                                            $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                            mysql_select_db(constant('mydb'));
                                                            $result = mysql_query($sql,$conn);
                                                            $row = mysql_fetch_array($result);
                                                            $gracePeriod = $row['deciBusinessDependencyValue'];
                                                        
                                                        ?>
                                                        <input type="text" class="form-control input-md" name=<?php echo"7";?> value="<?php echo"$gracePeriod";?>" required>

                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Day/s Before Forfeting Reservation w/ No Downpayment:</label>
                                                    <div class="col-md-2">

                                                        <?php
                                                            $sql = "SELECT * FROM tblbusinessdependency WHERE intBusinessDependencyId='8'";
                                                            $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                            mysql_select_db(constant('mydb'));
                                                            $result = mysql_query($sql,$conn);
                                                            $row = mysql_fetch_array($result);
                                                            $reservationNoDown = $row['deciBusinessDependencyValue'];
                                                        
                                                        ?>
                                                        <input type="text" class="form-control input-md" name=<?php echo"8";?> value="<?php echo"$reservationNoDown";?>"  required>

                                                    </div>
                                                </div>
                                            </div><!--ROW-->
                                             
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Day/s Before Forfeting Reservation w/out Full Payment:</label>
                                                    <div class="col-md-2">

                                                        <?php
                                                            $sql = "SELECT * FROM tblbusinessdependency WHERE intBusinessDependencyId='9'";
                                                            $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                            mysql_select_db(constant('mydb'));
                                                            $result = mysql_query($sql,$conn);
                                                            $row = mysql_fetch_array($result);
                                                            $reservationNotFull = $row['deciBusinessDependencyValue'];
                                                        
                                                        ?>
                                                        <input type="text" class="form-control input-md" name=<?php echo"9";?>  value="<?php echo"$reservationNotFull";?>"  required>

                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-4"  align="right" style="margin-top:.30em">Overdue months for forfeiting ownership:</label>
                                                    <div class="col-md-2">

                                                        <?php
                                                            $sql = "SELECT * FROM tblbusinessdependency WHERE intBusinessDependencyId='10'";
                                                            $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                            mysql_select_db(constant('mydb'));
                                                            $result = mysql_query($sql,$conn);
                                                            $row = mysql_fetch_array($result);
                                                            $overdue = $row['deciBusinessDependencyValue'];
                                                        
                                                        ?>
                                                        <input type="text" class="form-control input-md" name=<?php echo"10";?> value="<?php echo"$overdue";?>"  required>

                                                    </div>
                                                </div>
                                            </div><!--ROW-->
                                            
                                            <div class="row">

                                                <h4 class="col-md-10" style = "color: red;" style="margin-top:.70em">REQUIRED ALL FIELDS</h4>
                                                <div class="form-group"> 
                                                    <button type="submit" class="btn btn-success col-md-1" style="margin-top:.70em" name= "btnSave">Save</button>

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

