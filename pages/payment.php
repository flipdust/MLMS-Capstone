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

    <title>MLMS-Payment</title>

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
                                <H1><b>PAYMENT</b></H2>
                            </div><!-- /.panel-heading -->
                     
                            <div class="panel-body">
                    
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="collection-tab" role="tab" data-toggle="tab" aria-expanded="true">Customer Collection</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="downpayment-tab" data-toggle="tab" aria-expanded="false">Customer Downpayment</a>
                        </li>
                        
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="collection-tab">
                          <div class="panel-body">          
                                            <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                                <tr>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Customer Name</th>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Action</th>
                                                                   
                                                                </tr>
                                                        </thead>
                                                
                                                        <tbody>
                                                          <td>Daniella Soriano</td>
                                                          <td align='center'>
                                                            <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Edit' data-target = '#viewCollection'>
                                                            <i class='glyphicon glyphicon-eye-open'> VIEW</i></button>
                                                            </td>
                                                         
                                                        </tbody>
                                                </table>
                                            </div><!-- /.table-responsive -->
                            </div><!--panel body -->
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="downpayment-tab">
                          <div class="panel-body">          
                                            <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                                <table id="datatable-responsive1dp" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                                <tr>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Customer Name</th>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Action</th>
                                                                   
                                                                </tr>
                                                        </thead>
                                                
                                                        <tbody>
                                                          <td>Daniella Soriano</td>
                                                          <td align='center'>
                                                            <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Edit' data-target = '#viewDownpayment'>
                                                            <i class='glyphicon glyphicon-eye-open'> VIEW</i></button>
                                                            </td>
                                                         
                                                        </tbody>
                                                </table>
                                            </div><!-- /.table-responsive -->
                            </div><!--panel body -->
                        </div>
                        
                      </div>
                    </div><!--TAB-->
  
                
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

 <!--VIEW COLLECTION MODAL-->
                            <div class = 'modal fade' id = 'viewCollection'>
                            <div class = 'modal-dialog' style = 'width: 60%;'>
                                <div class = 'modal-content' style = 'height: 320px;'>
                                                
                                                    <!--header-->
                                        <div class = 'modal-header'>
                                            <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                            <h3 class = 'modal-title'>Collection: (Name of customer)</h3>
                                        </div>
                                                    
                                                    <!--body (form)-->
                                        <div class = 'modal-body'>
                                            <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                                <table id="datatable-responsive2col" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                                <tr>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Transaction code</th>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Unit</th>
                                                                   <th class = "success" style = "text-align: center; font-size: 20px;">Action</th>                                                                 
                                                                </tr>
                                                        </thead>
                                                
                                                        <tbody>
                                                          <td>Collection 1</td>
                                                          <td>Unit 1</td>
                                                          <td align='center'>
                                                            <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Edit' data-target = '#collectCollection'>
                                                            <i class='glyphicon glyphicon-folder-open'> COLLECT</i></button>
                                                            </td>
                                                         
                                                        </tbody>
                                                </table>
                                            </div><!-- /.table-responsive -->
                                           
                                    </div><!-- content-->
                                </div>
                            </div>
                        </div>

     <!--COLLECT COLLECTION MODAL-->
                            <div class = 'modal fade' id = 'collectCollection'>
                            <div class = 'modal-dialog' style = 'width: 60%;'>
                                <div class = 'modal-content' style = 'height: 520px;'>
                                                
                                                    <!--header-->
                                        <div class = 'modal-header'>
                                            <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                            
                                        </div>
                                                    
                                                    <!--body (form)-->
                                        <div class = 'modal-body'>
                                             
                                            
                                            <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                                <table id="datatable-responsive3col" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                                <tr>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;"><input type="checkbox" name="" value="null"></th>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Due Date</th>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Transaction Date</th>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Penalty</th> 
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Payment</th> 
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Status</th> 
                                                                                                                                   
                                                                </tr>
                                                        </thead>
                                                
                                                        <tbody>
                                                          
                                                        </tbody>
                                                </table>
                                            </div><!-- /.table-responsive -->
                                                                                   
                                    </div><!-- content-->
                                     <div class="form-group modal-footer">
                                                   
                                                    
                                                    <div class="col-md-8 col-md-6">
                                                        <button type = 'button' class="btn btn-success col-md-3" data-toggle = 'modal' title='Edit' data-target = '#payCollection'>PAY</button>
                                                        <button type="close" data-dismiss="modal"  class="btn btn-success col-md-3" name= "btnCancel">CANCEL</button>
                                                        
                                                    </div>
                                                   
                                    </div>
                                </div>
                            </div>
                        </div>

    <!--PAY COLLECTION MODAL-->
                            <div class = 'modal fade' id = 'payCollection'>
                            <div class = 'modal-dialog' style = 'width: 60%;'>
                                <div class = 'modal-content' style = 'height: 520px;'>
                                                
                                                    <!--header-->
                                        <div class = 'modal-header'>
                                            <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                            
                                        </div>
                                                    
                                                    <!--body (form)-->
                                        <div class = 'modal-body'>
                                             
                                             <div class="form-group">
                                                  <form class="form-horizontal" role="form" action = "payment.php" method= "post">
                                                <div class="form-group">
                                                    <label class="col-md-5" style = " font-size: 14px;" align="right" style="margin-top:.30em">Total Amount to Pay:</label>
                                                    <div class="col-md-5">
                                                      <input type="text" class="form-control input-md" name="totalCollection" onkeypress='return validateNumber(event)' disabled />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-5" style = " font-size: 14px;" align="right" style="margin-top:.30em">Mode of Payment:</label>
                                                    <div class="col-md-5">
                                                        <select class="form-control" name = "modePayment"  required>
                                                            <option value="">Cash</option>
                                                             <option value="">Cheque</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="col-md-5" style = " font-size: 14px;" align="right" style="margin-top:.30em">Amount Paid:</label>
                                                    <div class="col-md-5">
                                                      <input type="number" class="form-control input-md" name="downpaymentAmtPaid" onkeypress='return validateNumber(event)' required/>
                                                    </div>
                                                </div>

                                                </form>
                                            </div><!--form control-->

                                            <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                                <table id="datatable-responsive3col" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                                <tr>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Due Date</th>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Penalty</th>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Payment</th> 
                                                                                                                                   
                                                                </tr>
                                                        </thead>
                                                
                                                        <tbody>
                                                          
                                                        </tbody>
                                                </table>
                                            </div><!-- /.table-responsive -->
                                                                                   
                                    </div><!-- content-->
                                    <div class="form-group modal-footer">
                                                   
                                                    
                                                    <div class="col-md-8 col-md-6">
                                                        <button type = 'submit' class="btn btn-success col-md-3" data-dismiss="modal">SUBMIT</button>
                                                        <button type="close" data-dismiss="modal"  class="btn btn-success col-md-3" name= "btnCancel">CANCEL</button>
                                                        
                                                    </div>
                                                   
                                    </div>
                                </div>
                            </div>
                        </div>

    <!--VIEW DOWNPAYMENT MODAL-->
                            <div class = 'modal fade' id = 'viewDownpayment'>
                            <div class = 'modal-dialog' style = 'width: 60%;'>
                                <div class = 'modal-content' style = 'height: 320px;'>
                                                
                                                    <!--header-->
                                        <div class = 'modal-header'>
                                            <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                            <h3 class = 'modal-title'>Downpayment: (Name of customer)</h3>
                                        </div>
                                                    
                                                    <!--body (form)-->
                                        <div class = 'modal-body'>
                                            <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                                <table id="datatable-responsive2dp" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                                <tr>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Transaction code</th>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Unit</th>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Balance</th> 
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Due Date</th>   
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Action</th>                                                                 
                                                                </tr>
                                                        </thead>
                                                
                                                        <tbody>
                                                          <td>Downpayment 1</td>
                                                          <td>Unit 1</td>
                                                          <td>9.00</td>
                                                          <td>September 30, 2016</td>
                                                          <td align='center'>
                                                            <button type = 'button' class = 'btn btn-success' data-toggle = 'modal' title='Edit' data-target = '#collectDownpayment'>
                                                            <i class='glyphicon glyphicon-folder-open'> COLLECT</i></button>
                                                            </td>
                                                         
                                                        </tbody>
                                                </table>
                                            </div><!-- /.table-responsive -->
                                           
                                    </div><!-- content-->
                                </div>
                            </div>
                        </div>

 <!--COLLECT DOWNPAYMENT MODAL-->
                            <div class = 'modal fade' id = 'collectDownpayment'>
                            <div class = 'modal-dialog' style = 'width: 60%;'>
                                <div class = 'modal-content' style = 'height: 520px;'>
                                                
                                                    <!--header-->
                                        <div class = 'modal-header'>
                                            <button type = 'button' class = 'close' data-dismiss = 'modal'>&times;</button>
                                            
                                        </div>
                                                    
                                                    <!--body (form)-->
                                        <div class = 'modal-body'>
                                             
                                             <div class="form-group">
                                                  <form class="form-horizontal" role="form" action = "payment.php" method= "post">
                                                <div class="form-group">
                                                    <label class="col-md-5" style = " font-size: 14px;" align="right" style="margin-top:.30em">Balance:</label>
                                                    <div class="col-md-5">
                                                      <input type="text" class="form-control input-md" name="downpaymentBal" onkeypress='return validateNumber(event)' disabled />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-5" style = " font-size: 14px;" align="right" style="margin-top:.30em">Mode of Payment:</label>
                                                    <div class="col-md-5">
                                                        <select class="form-control" name = "modePayment"  required>
                                                            <option value="">Cash</option>
                                                             <option value="">Cheque</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="col-md-5" style = " font-size: 14px;" align="right" style="margin-top:.30em">Amount Paid:</label>
                                                    <div class="col-md-5">
                                                      <input type="number" class="form-control input-md" name="downpaymentAmtPaid" onkeypress='return validateNumber(event)' required/>
                                                    </div>
                                                </div>

                                                </form>
                                            </div><!--form control-->

                                            <div class="table-responsive col-md-12 col-lg-12 col-xs-12">
                                                <table id="datatable-responsive3dp" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                                <tr>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Date</th>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Transaction Code</th>
                                                                    <th class = "success" style = "text-align: center; font-size: 20px;">Payment</th> 
                                                                                                                                   
                                                                </tr>
                                                        </thead>
                                                
                                                        <tbody>
                                                          
                                                        </tbody>
                                                </table>
                                            </div><!-- /.table-responsive -->
                                                                                   
                                    </div><!-- content-->
                                    <div class="form-group modal-footer">
                                                   
                                                    
                                                    <div class="col-md-8 col-md-6">
                                                        <button type = 'submit' class="btn btn-success col-md-3" data-dismiss="modal">SUBMIT</button>
                                                        <button type="close" data-dismiss="modal"  class="btn btn-success col-md-3" name= "btnCancel">CANCEL</button>
                                                        
                                                    </div>
                                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                                        
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

        $('#datatable-responsive1dp').DataTable();

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

        $('#datatable-responsive2dp').DataTable({bFilter: false, bInfo: false});

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

        $('#datatable-responsive3dp').DataTable({bFilter: false, bInfo: false, bPaginate: false});

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
    <!--/Datatables-->

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

        $('#datatable-responsive2col').DataTable({bFilter: false, bInfo: false});

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
     <!--/Datatables-->

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

        $('#datatable-responsive3col').DataTable({bFilter: false, bInfo: false, bPaginate: false});

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