<?php

require('controller/connection.php');
require('controller/viewdata.php');
require('controller/createdata.php');
require('controller/updatedata.php');
require('controller/deactivate.php');

if (isset($_POST['btnSubmit']))
      {

    //echo "Record sucessfully saved";
    //$tfSectionID = $_POST['tfSectionID'];
    $tfSectionName = $_POST['tfSectionName'];
    $tfNoOfBlock = $_POST['tfNoOfBlock'];
        $tfStatus = $_POST['tfStatus'];
        
    $createsec =  new createSection();
    $createsec->Create($tfSectionName,$tfNoOfBlock,$tfStatus);
      }

if (isset($_POST['btnSave']))
      {

    //echo "Record sucessfully saved";
    $tfSectionID = $_POST['tfSectionID'];
    $tfSectionName = $_POST['tfSectionName'];
    $tfNoOfBlock = $_POST['tfNoOfBlock'];
        //$status = $_POST['status'];
    
    $updatesec =  new updateSection();
    $updatesec->update($tfSectionID,$tfSectionName,$tfNoOfBlock);
      }

if (isset($_POST['btnDeactivate']))
      {

    //echo "Record sucessfully saved";
    $tfSectionID = $_POST['tfSectionID'];
    
    //$status = $_POST['status'];
    
    $deactivatesec =  new deactivateSection();
    $deactivatesec->deactivate($tfSectionID);
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

    <title>MLMS-Home</title>

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
    <link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/DataTables/jquery.dataTables.css" />
    <link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css" />
    <link type="text/css" rel="stylesheet" href="../assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css" />

    <link rel="stylesheet" href="../css/section.css" media="screen" title="Cascading Styles Sheet" charset="utf-8">
    <script src="../assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
    <script src="../assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
    
    <script src="../assets/js/libs/spin.js/spin.min.js"></script>
    <script src="../assets/js/libs/autosize/jquery.autosize.min.js"></script>
    <script src="../assets/js/libs/mask/jquery.mask.min.js"></script>
        
    <script src="../assets/js/libs/DataTables/jquery.dataTables.min.js"></script>
    <script src="../assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js"></script>
    <script src="../assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>


    <script type="text/javascript">
            $(document).ready(function(){
                $('#datatables-section').DataTable();
                
            });
        </script>
        
        <script>
            function validateNumber(evt) {
                    evt = (evt) ? evt : window.event;
                    var charCode = (evt.which) ? evt.which : evt.keyCode;
                    if (charCode == 8 || (charCode >= 48 && charCode <= 57)){
                    return true;
                    }else{
                    return false;
                    }
                }
                
              function validateSectionName(evt) {
                    evt = (evt) ? evt : window.event;
                    var charCode = (evt.which) ? evt.which : evt.keyCode;
                    if (charCode == 8 || charCode == 32 || (charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122)){
                    return true;
                    }else{
                    return false;
                    }
                }
            
        </script>
  </head>

   <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php require("sidemenu.php");
                  require("topnav.php");  ?>

        <!-- page content -->
        <div class="right_col" role="main">
      
        
          </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            MLMS-Design 
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
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

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>