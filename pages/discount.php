<?php

require ("controller/connection.php");
require('controller/viewdata.php');
require('controller/createdata.php');
require('controller/updatedata.php');
require('controller/deactivate.php');
require('controller/archivedata.php');
require('controller/retrieve.php');

if (isset($_POST['btnSubmit'])){

        $serviceName = $_POST['serviceName'];
		$tfDescription = $_POST['tfDescription'];
		$tfPercent = $_POST['tfPercent'];
		$tfStatus = $_POST['tfStatus'];
		 
        $tfPercentValue = $tfPercent/100;
		
		$createDiscount =  new createDiscount();
		$createDiscount->Create($serviceName,$tfDescription,$tfPercentValue,$tfStatus);
}
	  
if (isset($_POST['btnSave'])){

		$tfDiscountID = $_POST['tfDiscountID'];
		$tfDescription = $_POST['tfDescription'];
		$tfPercent = $_POST['tfPercent'];
		
        $tfPercentValue = $tfPercent/100;
		
		$updateDiscount =  new updateDiscount();
		$updateDiscount->update($tfDiscountID,$tfDescription,$tfPercentValue);
}
	   
      
if (isset($_POST['btnDeactivate'])){

		$tfDiscountID = $_POST['tfDiscountID'];
		
		$deactivateDiscount =  new deactivateDiscount();
		$deactivateDiscount->deactivate($tfDiscountID);
}

if (isset($_POST['btnArchive'])){

        $tfDiscountID = $_POST['tfDiscountID'];
        
        $archiveDiscount =  new archiveDiscount();
        $archiveDiscount->archive($tfDiscountID);
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

    <title>MLMS-Discount</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">


    <link type="text/css" rel="stylesheet" href="../assets/css/theme-default/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="../assets/css/theme-default/material-design-iconic-font.min.css" />
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">



    <script>
        function validateServiceName(evt) {
                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if (charCode == 8 || charCode == 32 || (charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122)){
                return true;
                }else{
                return false;
                }
            }
            
        function validateNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode == 8 || (charCode >= 48 && charCode <= 57)){
            return true;
            }else{
            return false;
            }
        }
        
    </script>
</head>

<body class="nav-sm">
    <div class="container body">
        <div class="main_container">
            <?php require("sidemenu.php");
                  require("topnav.php");  ?>
                  
            <!-- page content -->
            <div class="right_col" role="main">
                <div class = "row">
                    <div class="col-md-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <H1><b>DISCOUNT</b></H2>
                            </div><!-- /.panel-heading -->
                     
                            <div class="panel-body">
                                <div class="col-md-4 column">
                                    <div class="panel panel-success ">
                                        <div class="panel-heading">
                                            <H3><b>Create New</b></H3>
                                        </div><!-- /.panel-heading -->
                     
                                        <div class="panel-body">
                                            <form class="form-horizontal" role="form" action = "discount.php" method= "post">						  
                                            
                                                <div class="form-group" >
                                                    <div class="col-sm-8">
                                                        <input type="hidden" class="form-control" value="0" name="tfStatus"/>
                                                    </div>
                                                </div>
							
                                                <div class="form-group">
                                                    <label class="col-md-4" style = "font-size: 18px;" align="right" style="margin-top:.30em">Service:</label>
                                                    <div class="col-md-7">
                                                        <select class="form-control input-md" name = "serviceName" required>
                                                        <option value=""></option>
                                                            <?php
                                                                $view = new discount();
                                                                $view->selectService();
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-4" style = "font-size: 18px;" align="right" style="margin-top:.30em">Description:</label>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control input-md" name= "tfDescription" required>
                                                    </div>
                                                </div>
														  
                                                <div class='form-group'>
                                                    <label class="col-md-4" style = "font-size: 18px;" align="right" style="margin-top:.30em">Percent:</label>
                                                    <div class="col-md-7">
                                                        <div class='input-group'>
                                                            <input type='text 'class='form-control input-md' name= 'tfPercent' onkeypress='return validateNumber(event)' required/>
                                                            <span class = 'input-group-addon'>%</span>                       
                                                        </div>
                                                    </div>
                                                </div>
                            							  
                                                 <div class="form-group modal-footer"> 
                                                    <div class="col-md-12 col-md-offset-4">
                                                        <button type="submit" class="btn btn-success col-md-3" name= "btnSubmit">Add</button>
                                                        <input class = "btn btn-default col-md-5" type="reset" name = "btnClear" value = "Clear Entries">
                                                    </div>
                                                    <h4 class="col-md-12" style = "color: red;" align="left" style="margin-top:.30em">REQUIRED ALL FIELDS</h4>
                                                </div>
                                                
                                        </form><!--Form-->
                                    </div><!-- panel body -->
                                </div><!--panel panel-success-->
                            </div><!--col-md-4 column-->
                    				 
                            <div class="col-md-8">
                                <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <form class="form-vertical" role="form" action = "discount.php" method= "post">
                                                    <div class="col-md-5">
                                                        <h4><b>Show Terminated Discount</b></h4>
                                                    </div>
                                                    <button type="submit" class="btn btn-success pull-left" name= "btnGo">Go</button>
                                                    <button type="submit" class="btn btn-default pull-left" name= "btnBack">Back</button>
                                                </form>
                     	                  </div><!-- /.panel-heading -->
                                           
                                    <div class="panel-body">         
                                        <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th class = "success" style = "text-align: center; font-size: 20px;">Service</th>
                                                        <th class = "success" style = "text-align: center; font-size: 20px;">Description</th>
                                                        <th class = "success" style = "text-align: center; font-size: 20px;">Percent</th>
                                                        <th class = "success" style = "text-align: center; font-size: 20px;">Action</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    <?php
                                                            
                                                              if (isset($_POST['btnGo'])){
                                                                    $viewDeactivate = new deactivatedDiscount();
                                                                    $viewDeactivate->viewDeactivatedDiscount();
                                                              }
                                                              else if(isset($_POST['btnBack'])){
                                                                    $view = new discount();
                                                                    $view->viewDiscount();
                                                              }
                                                              else{
                                                                    $view1 = new discount();
                                                                    $view1->viewDiscount();
                                                              }
                                                              
                                                             ?>
                                                   
                                                </tbody>
                                            </table>
                                        </div><!-- /.table-responsive -->
                                    </div><!--panel body -->
                                </div><!--panel panel-success-->
                            </div><!--col-md-8-->   
                
                        </div><!--panel body -->
                    </div><!--panel panel-success-->
                </div><!--col-md-12-->
            </div><!--row-->
        </div><!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                MLMS-Design 
            </div>
            <div class="clearfix"></div>
        </footer><!-- /footer content -->
                
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
    <!-- jQuery custom content scroller -->
    <script src="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>    
    <script src="../vendors/mask/jquery.mask.min.js"></script>


     <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "controller/viewdata/php",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

     </body>
</html>