<?php

require ("controller/connection.php");
require('controller/viewdata.php');
require('controller/createdata.php');
require('controller/updatedata.php');
require('controller/deactivate.php');



if (isset($_POST['btnSubmit']))
      {

    //echo "Record sucessfully saved";
    $tfTypeName = $_POST['tfTypeName'];
    $tfNoOfLot = $_POST['tfNoOfLot'];
    $tfSellingPrice = $_POST['tfSellingPrice'];
    $tfStatus = $_POST['tfStatus'];
    
    
    $createtypes =  new createTypes();
    $createtypes->Create($tfTypeName,$tfNoOfLot,$tfSellingPrice,$tfStatus);
      }
    
if (isset($_POST['btnSave']))
      {

    //echo "Record sucessfully saved";
    $tfTypeID = $_POST['tfTypeID'];
    $tfTypeName = $_POST['tfTypeName'];
    $tfNoOfLot = $_POST['tfNoOfLot'];
    $tfSellingPrice = $_POST['tfSellingPrice'];
    
    
    
    $updatetype =  new updateType();
    $updatetype->update($tfTypeID,$tfTypeName,$tfNoOfLot,$tfSellingPrice);
      }
      
if (isset($_POST['btnDeactivate']))
      {

    //echo "Record sucessfully saved";
    $tfTypeID = $_POST['tfTypeID'];
    
    //$status = $_POST['status'];
    
    $deactivateType =  new deactivateType();
    $deactivateType->deactivate($tfTypeID);
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

    <title>MLMS-Unit Availment</title>

    <script src="../vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

   

    <link rel="stylesheet" href="easyWizard.css">
    <script src="easyWizard.js"></script>
      <style type="text/css">
      
          #lotMap {
            position: relative;
          }

          .lot {
            float: left;
            //background: #2db34a;
            //border: 2px solid black;
            border-radius: 4px;
            height: 90px;
            line-height: 120px;
            position: relative;
            text-align: center;
            width: 80px;
            color: #fff;
            margin: 10px;
          }
          .ashcrypt {
            //float: left;
            //background: #2db34a;
            border-left: none;
            border-radius: 4px;
            height: 80px;
            line-height: 120px;
            text-align: center;
            width: 80px;
            color: #fff;
            margin: 5px;
            margin-left: 6px; 
            display: inline-block;
          }
          .circle {
            height: 50px;
            width: 50px;
            white-space: nowrap;
            display: inline-block;
            text-align: center;
            vertical-align: middle;
            border-radius: 50%;
            color: #fff;
            position: relative;
          }

          .available {
            background: #66BB6A;
          }
          .reserved {
            background: #64B5F6;
          }
          .owned {
            background: #C62828;
          }
          .disabled {
            background: grey;
          }

          .ash {
            //background: #F5F7FA;
            //height: 92px;
            border-bottom: 2px solid #E6E9ED;
            white-space: nowrap;
            display:inline-block;
            position: relative;
          }

           .ash:first-child {
            border-top: 2px solid #E6E9ED;
            //margin-left: 10px;
            //margin-top: 10px;
          }

          .ash .ashcrypt:first-child {
            color: #333;
          }

          #levelMap {
            overflow-x: auto;
            overflow-y: auto;
            max-width: 100%;
            display: inline-block;
          }

          .ash .lot {
            display: inline-block;
          }

          .reservation {
            display: none;
          }

      </style>
        
         <script>
        $( document ).ready(function() {
            $('.containerLevelMap').width($('.ash').width());
            window.intNoUnit = 1;
        });
            function validateNumber(evt) {
                    evt = (evt) ? evt : window.event;
                    var charCode = (evt.which) ? evt.which : evt.keyCode;
                    if (charCode == 8 || (charCode >= 48 && charCode <= 57)){
                    return true;
                    }else{
                    return false;
                    }
                }
            
            $(function(){

              $('body').on('change', '#selectSection', function(){
                $('#selectBlock').html('');
                $('#lotMap').html('');
                window.intLotAvailable = 0;
                window.intLotReserved = 0;
                window.intLotOwned = 0;
                $('#legendLotAvailable').html(intLotAvailable);
                $('#legendLotReserved').html(intLotReserved);
                $('#legendLotOwned').html(intLotOwned);
                thisSectionID = $(this).val();
                $.get("getData.php?fnName=getBlock&intSectionID="+thisSectionID, function(data){
                  if(data != 0) {
                    arrayData = data.split(",");
                    $('#selectBlock').append("<option selected disabled>Choose Block</option>");
                    for(var i=0; i<arrayData.length-1; i+=5){
                      $('#selectBlock').append("<option value="+arrayData[i]+" lot="+arrayData[i+2]+" price="+arrayData[i+3]+" type='"+arrayData[i+4]+"'>"+arrayData[i+1]+"</option>");
                    }
                  }
                });
              });

              $('body').on('change', '#selectBlock', function(){
                thisBlockID = $(this).val();   
                $('#lotMap').html('');
                window.intLotAvailable = 0;
                window.intLotReserved = 0;
                window.intLotOwned = 0;
                $('#legendLotAvailable').html(intLotAvailable);
                $('#legendLotReserved').html(intLotReserved);
                $('#legendLotOwned').html(intLotOwned);
                $.get("getData.php?fnName=getLot&intBlockID="+thisBlockID, function(data){
                  if(data != 0) {
                    arrayData = data.split(",");
                    for(var i=0; i<arrayData.length-1; i+=3){
                      intLotStatus = arrayData[i+2];
                      switch (intLotStatus) {
                        case '0': lotStatus = "available"; intLotAvailable++; break;
                        case '1': lotStatus = "reserved"; intLotReserved++; break;
                        case '2': lotStatus = "owned"; intLotOwned++; break;
                        default: break;
                      }
                      strSectionName = $('#selectSection option:selected').html();
                      strBlockName = $('#selectBlock option:selected').html();
                      intPrice = $('#selectBlock option:selected').attr('price');
                      strTypeName = $('#selectBlock option:selected').attr('type');
                      $('#lotMap').append("<div class='lot "+lotStatus+"' id="+arrayData[i]+" lotStatus='"+lotStatus+"' Section='"+strSectionName+"' Block='"+strBlockName+"' Price='"+intPrice+"' Type='"+strTypeName+"'>"+arrayData[i+1]+"</div>");
                      $('#legendLotAvailable').html(intLotAvailable);
                      $('#legendLotReserved').html(intLotReserved);
                      $('#legendLotOwned').html(intLotOwned);
                    }
                  }
                });
              });

              $('body').on('change', '#selectAshBlock', function(){
                $('#selectLevel').html('');
                $('#levelMap').html('');
                window.intAshAvailable = 0;
                window.intAshReserved = 0;
                window.intAshOwned = 0;
                $('#legendAshAvailable').html(intAshAvailable);
                $('#legendAshReserved').html(intAshReserved);
                $('#legendAshOwned').html(intAshOwned);
                thisAshID = $(this).val();
                $.get("getData.php?fnName=getLevel&intAshID="+thisAshID, function(data){
                  if(data != 0) {
                    arrayData = data.split(",");
                    $('#selectLevel').append("<option selected disabled>Choose Level</option>");
                    for(var i=0; i<arrayData.length-1; i+=4){
                      var tempLevel = "#lvl"+arrayData[i];
                      $('#levelMap').append("<div class='ash' id='lvl"+arrayData[i]+"'></div>");
                      $('#levelMap').hide();
                      strLevelID = "#lvl"+arrayData[i];
                      $(strLevelID).append("<div class='ashcrypt'>Level "+arrayData[i+1]+"</div>");
                      addAshcrypt(arrayData[i],arrayData[i+1],arrayData[i+2],arrayData[i+3]);
                    }
                  }
                });
              });

              $('body').on('click', '.lot', function(){
                lotID = $(this).attr('id');
                lotID = '#' + lotID;
                displayLot(lotID);
              });

              $('#addunit').on('click', function(){
                $('#btnBill').show();
                $('#popUpWindow').modal('hide');
                $(lotID).addClass('disabled');
                $('#tableBody').append("<tr><td>"+intNoUnit+++"</td><td><a class='btn btn-round btn-info' lotID='"+lotID+"' onclick='view(this);'><i class='fa fa-eye'></i> View</a></td><td class='reservation'>1</td><td>1</td><td>1</td><td class='reservation'>1</td><td>1</td></tr>");
              });

              $('#removeunit').on('click', function(){
                $('#btnBill').show();
                $('#popUpWindow').modal('hide');
                $(lotID).removeClass('disabled');
              });

              $('body').on('click', '.ashcrypt', function(){
                 ashcryptID = $(this).attr('id');
                 ashcryptID = '#' + ashcryptID;
                 displayAsh(ashcryptID);
              });

              $('body').on('change', '#typeAvail', function(){
                if($('#typeAvail option:selected').attr('id') == "spotcash") {
                  $('.reservation').hide();
                }
                else {
                  $('.reservation').show();
                }
              });
            });


          function view(thisLotID){
            thisLotID = $(thisLotID).attr('lotID');
            displayLot(thisLotID);
          }

          function displayLot(lotID){
            //lotID = '#' + lotID;
            strSectionName = $(lotID).attr('Section');
            strBlockName = $(lotID).attr('Block');
            strLotName = $(lotID).html();
            dblPrice = $(lotID).attr('Price');
            lotStatus = $(lotID).attr('lotStatus');
            strTypeName = $(lotID).attr('Type');
            $('#inputSectionName').val(strSectionName);
            $('#inputBlockName').val(strBlockName);
            $('#inputLotType').val(strTypeName);
            $('#inputPrice').val(dblPrice);
            $('#inputUnitName').val(strLotName);
            $('#inputStatus').val(lotStatus);
            if($(lotID).hasClass("disabled")) {
              $('#addunit').hide();
              $('#removeunit').show();
            }
            else {
              $('#addunit').show();
              $('#removeunit').hide();
            }
            $('#popUpWindow').modal('show');
          }

          function addAshcrypt(intLevelID,strLevelName,intNoOfUnit,dblSellingPrice){
            $.get("getData.php?fnName=getAsh&intLevelAshID="+intLevelID, function(data){
              strLevelID = "#lvl"+intLevelID;
              if(data != '') {
                arrayData = data.split(",");
                for(var i=0; i<arrayData.length-1; i+=4){
                  switch (arrayData[i+2]) {
                    case '0': unitStatus = "available"; intAshAvailable++; break;
                    case '1': unitStatus = "reserved"; intAshReserved++; break;
                    case '2': unitStatus = "owned"; intAshOwned++; break;
                    default: break;
                  }
                  $(strLevelID).append("<div class='ashcrypt "+unitStatus+"' unitStatus="+unitStatus+" id='"+arrayData[i]+"' capacity="+arrayData[i+3]+" level='"+strLevelName+"' noUnit="+intNoOfUnit+" price="+dblSellingPrice+">"+arrayData[i+1]+"</div>");
                }
              }
              else {
                $(strLevelID).remove();
              }
              $('#levelMap').show();
              $('.ash').width($('#levelMap')[0].scrollWidth-20);
              $('#legendAshAvailable').html(intAshAvailable);
              $('#legendAshReserved').html(intAshReserved);
              $('#legendAshOwned').html(intAshOwned);
            });
          }



          function displayAsh(ashcryptID){
            strLevelName = $(ashcryptID).attr('level');
            intCapacity = $(ashcryptID).attr('capacity');
            strAshName = $(ashcryptID).html();
            dblPrice = $(ashcryptID).attr('price');
            unitStatus = $(ashcryptID).attr('unitStatus');
            $('#inputSectionName').val(strLevelName);
            $('#inputBlockName').val(intCapacity);
            $('#inputPrice').val(dblPrice);
            $('#inputUnitName').val(strAshName);
            $('#inputStatus').val(unitStatus);
            if($(ashcryptID).hasClass("disabled")) {
              $('#addunit').hide();
              $('#removeunit').show();
            }
            else {
              $('#addunit').show();
              $('#removeunit').hide();
            }
            $('#popUpWindow').modal('show');
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

              <div class="col-md-12">
                        <div class="panel panel-success ">
                                    
                            <div class="panel-body">
                                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content11" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Lot-Unit</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content22" role="tab" id="profile-tabb" data-toggle="tab" aria-controls="profile" aria-expanded="false">AshCrypt-Unit</a>
                        </li>
                      
                      </ul>
                      <div id="myTabContent2" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content11" aria-labelledby="home-tab">

                                <div class="col-md-4">
                                    <div class="panel panel-success ">
                                        <div class="panel-heading">
                                            <H3><b>Select Lot</b></H3>
                                        </div><!-- /.panel-heading -->
                     
                                        <div class="panel-body">
                                             <div class="form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Section</label>
                                              <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select class="form-control" id="selectSection">
                                                  <option selected disabled>Choose Section</option>
                                                  <?php
                                                    $sql = "Select * from tblsection WHERE intStatus = 0 ORDER BY strSectionName ASC";
                                                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                    mysql_select_db(constant('mydb'));
                                                    $result = mysql_query($sql,$conn);
                                                    
                                                    while($row = mysql_fetch_array($result))
                                                      { 
                                                        $intSectionID = $row['intSectionID']; 
                                                        $strSectionName = $row['strSectionName'];
                                                        $intNoOfBlock = $row['intNoOfBlock'];
                                                        $intStatus = $row['intStatus']; 
                                                        echo "<option value=$intSectionID>$strSectionName</option>";
                                                      }
                                                  ?>
                                                </select>
                                              </div>
                                            </div>

                                            <div class="form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Block</label>
                                              <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select class="form-control" id="selectBlock">
                                                  <option selected disabled>Choose Block</option>
                                                </select>
                                              </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- bill hide untol not adding a unit-->
                                             <div class="form-group" >
                                                <button id="btnBill" type="button" style="display:none;" class="btn btn-success btn-lg col-md-6" data-toggle="modal" data-target="#myModal" ><span class="glyphicon glyphicon-credit-card" aria-hidden="true" ></span> BILL OUT
                                                    </button>
                                            </div>

                                   <div class="panel panel-success col-md-12">
                                        <div class="panel-heading">
                                            <H3><b>Legends :</b></H3>
                                        </div><!-- /.panel-heading -->
                                        <div class="panel-body">
                                          <center>
                                            <div>
                                            <div class="panel body col-md-4">
                                              <div class="circle available" id="legendLotAvailable">
                                              </div>
                                              Available
                                              </div>
                                            </div>

                                            <div>
                                              <div class="panel-body col-md-3">
                                              <div class="circle reserved" id="legendLotReserved">
                                              </div>
                                              Reserved
                                            </div>
                                            </div>


                                            <div>
                                            <div class="panel-body col-md-4">
                                              <div class="circle owned" id="legendLotOwned">
                                              </div>
                                              Owned
                                            </div>
                                            </div>
                                          </center>
                                        </div>
                                        <div class="clearfix"></div>
                                </div>
                                </div>

                                  <div class="col-md-8">
                                    <div class="panel panel-success">
                                        <div class="panel-body" id="lotMap">
                                        </div>
                                    </div>
                                </div>
                         
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content22" aria-labelledby="profile-tab">
                          <div class="col-md-4">
                                    <div class="panel panel-success ">
                                        <div class="panel-heading">
                                            <H3><b>Select Ashcrypt</b></H3>
                                        </div><!-- /.panel-heading -->
                     
                                        <div class="panel-body">
                                             <div class="form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Ashcrypt: </label>
                                              <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select class="form-control" id="selectAshBlock">
                                                  <option selected disabled>Choose Ashcrypt</option>
                                                  <?php
                                                    $sql = "Select * from tblashcrypt WHERE intStatus = 0 ORDER BY strAshName ASC";
                                                    $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
                                                    mysql_select_db(constant('mydb'));
                                                    $result = mysql_query($sql,$conn);
                                                    
                                                    while($row = mysql_fetch_array($result))
                                                      { 
                                                        $intAshID = $row['intAshID']; 
                                                        $strAshName = $row['strAshName'];
                                                        $intNoOfLevel = $row['intNoOfLevel'];
                                                        $intStatus = $row['intStatus']; 
                                                        echo "<option value=$intAshID intNoOfLevel=$intNoOfLevel>$strAshName</option>";
                                                      }
                                                  ?>
                                                </select>
                                              </div>
                                            </div>
                                        </div>
                                    </div>

                                   <div class="panel panel-success ">
                                        <div class="panel-heading">
                                            <H3><b>Legends :</b></H3>
                                        </div><!-- /.panel-heading -->
                                        <div class="panel-body">
                                          <center>
                                            <div class="circle available" id="legendAshAvailable">
                                            </div>
                                            <div class="circle reserved" id="legendAshReserved">
                                            </div>
                                            <div class="circle owned" id="legendAshOwned">
                                            </div>
                                          </center>
                                        </div>
                                </div>
                                </div>
                                <div class="col-md-8" id="containerLevel">
                                    <div class="panel panel-success" id=".containerLevelMap">
                                        <div class="panel-body" id="levelMap">
                                        </div>
                                    </div>
                                </div>
                        </div>
                      </div>
                    </div>


                            </div>
                        </div>
              </div>


        
            </div><!--/page content-->
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
  </body>

 
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="js/moment/moment.min.js"></script>
    <script src="js/datepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
     <!-- jquery.inputmask -->
    <script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>



    <script>
      $(document).ready(function() {
        $('#birthday').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
    </script>
    <!-- /bootstrap-daterangepicker -->

      <!-- Select2 -->
    <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Select a Customer",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->

    <!-- jquery.inputmask -->
    <script>
      $(document).ready(function() {
        $(":input").inputmask();
      });
    </script>
    <!-- /jquery.inputmask -->

     <script>
        $('#tfPriceCreate').mask('000000000000.00',{reverse:true});
        $('.tfPriceUpdate').mask('000000000000.00',{reverse:true});
 </script>   



              <!--------------------------------------LOT DETAILS---->

<div class = "modal fade" id = "popUpWindow" style="z-index:1501;">
    <div class = "modal-dialog" style = "width:70%; height: 60% ; z-index:1002;">
       <div class = "modal-content">
         <!--header-->
          
      <div class = "modal-header" style="background:#b3ffb3;">
          <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
          <center><h3 class = "modal-title">Lot Details</h3></center>
         </div>
                        
         <!--body (form)-->
         <div class = "modal-body">
                    
                          
           <form class="form-horizontal" role="form" action = "reservation.php" method= "post">             
                  
      
                      
                 <div class="row">
                       <div class=  "col-lg-12">
                          <div class="panel panel-default">
                        
                                <div class="panel-body">
                                      <div class="row">
                                          <div class="col-lg-6">
                                              <form role="form">
                                                 <div class="form-group">
                                                  <div class="col-sm-10">

                                                  <legend>Unit</legend>      

                                                  <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Section: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                      <input id="inputSectionName" type="text" class="form-control" readonly="readonly" placeholder="East">
                                                    </div>
                                                  </div>

                                                      <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Block: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                      <input id="inputBlockName" type="text" class="form-control" readonly="readonly" placeholder="St.Mattew">
                                                    </div>
                                                  </div>


                                                   <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Lot type: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                      <input id="inputLotType" type="text" class="form-control" readonly="readonly" placeholder="St.Mattew">
                                                    </div>
                                                  </div>

                                                      <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Unit Name: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                      <input id="inputUnitName" type="text" class="form-control" readonly="readonly" placeholder="A0001">
                                                    </div>
                                                  </div>
                                                    
                                                
                                                    </div>
                                                 </div>
                                                </form>
                                          </div>

                                            <div class="col-xs-6 col-sm-3">
                                              <legend> Customer</legend>
                                                    
                                             <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                      <input id="inputStatus" type="text" class="form-control" readonly="readonly" placeholder="Available">
                                                    </div>
                                                  </div>

                                                   <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Owner: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                      <input id="inputOwner" type="text" class="form-control" readonly="readonly" placeholder="N/A">
                                                    </div>
                                                  </div>

                                                   <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Price: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                      <input id="inputPrice" type="text" class="form-control" readonly="readonly" placeholder="P500,000">
                                                    </div>
                                                  </div>
                                                  
                                               <br>
                                                </div>
                           
                                                 <div class="modal-footer col-md-6" >
                                                    <button  id= "addunit" type="button" class="btn btn-success btn-lg col-md-8" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Unit
                                                    </button>
                                                    <button  id="removeunit" type="button" class="btn btn-success btn-lg col-md-8" style="display:none;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Remove Unit
                                                    </button>
                                                  </div>
                            </div>

                           </div> <!--PANEL BODY-->

                                               

                          </div>
                          </div>
                        </div>
                        </form>                        
                             </div>

                            </div>
                           </div> <!--PANEL BODY-->
                 
              </div>




               <!--------------------------------------Ashcrypt Details---->

<div class = "modal fade" id = "ashDetails" style="z-index:1501;">
    <div class = "modal-dialog" style = "width:70%; height: 60% ; z-index:1002;">
       <div class = "modal-content">
         <!--header-->
          
      <div class = "modal-header" style="background:#b3ffb3;">
          <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
          <center><h3 class = "modal-title">Ashcrypt Details</h3></center>
         </div>
                        
         <!--body (form)-->
         <div class = "modal-body">
                    
                          
           <form class="form-horizontal" role="form" action = "reservation.php" method= "post">             
                  
      
                      
                 <div class="row">
                       <div class=  "col-lg-12">
                          <div class="panel panel-default">
                        
                                <div class="panel-body">
                                      <div class="row">
                                          <div class="col-lg-6">
                                              <form role="form">
                                                 <div class="form-group">
                                                  <div class="col-sm-10">

                                                  <legend>Unit</legend>      

                                                  <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Block: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                      <input id="inputAshBlock" type="text" class="form-control" readonly="readonly" placeholder="East">
                                                    </div>
                                                  </div>

                                                      <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Level: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                      <input id="inputAshLevel" type="text" class="form-control" readonly="readonly" placeholder="St.Mattew">
                                                    </div>
                                                  </div>

                                                      <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Unit Name: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                      <input id="inputAshUnit" type="text" class="form-control" readonly="readonly" placeholder="A0001">
                                                    </div>
                                                  </div>
                                                    
                                                
                                                    </div>
                                                 </div>
                                                </form>
                                          </div>

                                            <div class="col-xs-6 col-sm-3">
                                              <legend> Customer</legend>
                                                    
                                             <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                      <input id="inputStatus" type="text" class="form-control" readonly="readonly" placeholder="Available">
                                                    </div>
                                                  </div>

                                                   <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Owner: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                      <input id="inputOwner" type="text" class="form-control" readonly="readonly" placeholder="N/A">
                                                    </div>
                                                  </div>

                                                   <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Price: </label>
                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                      <input id="inputPrice" type="text" class="form-control" readonly="readonly" placeholder="P500,000">
                                                    </div>
                                                  </div>
                                                  
                                               <br>
                                                </div>
                           
                                                 <div class="modal-footer col-md-6" >
                                                    <button  id= "addunit" type="button" class="btn btn-success btn-lg col-md-8" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Unit
                                                    </button>
                                                    <button  id="removeunit" type="button" class="btn btn-success btn-lg col-md-8" style="display:none;"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Remove Unit
                                                    </button>
                                                  </div>
                            </div>

                           </div> <!--PANEL BODY-->

                                               

                          </div>
                          </div>
                        </div>
                        </form>                        
                             </div>

                            </div>
                           </div> <!--PANEL BODY-->
                 
              </div>
  

               <!----------------------------------------------BILL OUT FORM---------------------------------->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 1500;">
    <div class="modal-dialog" role="document" style = "width:80%; height: 90%;">
          <div class="modal-content">
                <div class="modal-header">
                     <button type = "button" class = "close" data-dismiss = "modal">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">BIll OUT FORM</h4>
                </div>

                <div class="modal-body wizard-content">
                    <div class="wizard-step">
                        <h2 class="StepTitle">Select Customer</h2>
                        <form class="form-horizontal form-label-left">

                              <div class= "col-md-12">
                                  <span class="section">Personal Info</span>
                                  <button onclick="add();" type="submit" class="btn btn-success pull-left" name= "btnGo">Add customer</button>
                                  
                                  <div class="form-group">       
                                        <select class="select2_single form-control" style="width: 350px; z-index:2000;" tabindex="-1" >
                                          <option></option>
                                          <option>Jeron Cruz</option>
                                          <option>Daniella Soriano</option>
                                        </select>
                                  </div>
                              

                              <div class="col-md-7" style="margin-left: -9em;"> 
                                  <div class="form-group">
                                      <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">First Name
                                          <span class="required">*</span>
                                      </label>
                                      <div class="col-md-5 col-sm-6 col-xs-12">
                                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                      </div>
                                  </div>
                              

                              <div class="form-group">
                                  <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">Last Name
                                      <span class="required">*</span>
                                  </label>
                                  <div class="col-md-5 col-sm-6 col-xs-12">
                                      <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label for="middle-name" class="control-label col-md-4 col-sm-3 col-xs-12">Middle Name
                                  </label>
                                  <div class="col-md-5 col-sm-6 col-xs-12">
                                      <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="control-label col-md-4 col-sm-3 col-xs-12" for="address">Contact No.
                                      <span class="required">*</span>
                                  </label>
                                  <div class="col-md-4 col-sm-6 col-xs-12">
                                      <input type="text" class="form-control"  required= "required" data-inputmask="'mask' : '(9999) 999-9999'">
                                  </div>
                              </div>
                          
                              <div class="form-group">
                                  <label class="control-label col-md-4 col-sm-3 col-xs-12" for="address">Address
                                      <span class="required">*</span>
                                  </label>
                                  <div class="col-md-8 col-sm-6 col-xs-12">
                                      <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-9 col-xs-12">
                                  </div>
                              </div>
                              </div>
                          
                              <div class="col-md-5">
                                 <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Date Of Birth 
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" data-inputmask="'mask' : '99/99/9999'">
                                    </div>
                                  </div>
                              

                              <div class="item form-group">
                                  <label class="control-label col-md-4 col-sm-3 col-xs-12" for="email">Email: 
                                      <span class="required">*</span>
                                  </label>
                                  <div class="col-md-8 col-sm-6 col-xs-12">
                                      <input type="email" id="email" name="email" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12">
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Gender</label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                      <div id="gender" class="btn-group" data-toggle="buttons">
                                          <label class="btn btn-default" data-toggle-class="btn-success" data-toggle-passive-class="btn-default">
                                              <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                                          </label>
                                          <label class="btn btn-primary" data-toggle-class="btn-default" data-toggle-passive-class="btn-default">
                                              <input type="radio" name="gender" value="female"> Female
                                          </label>
                                      </div>
                                  </div>
                              </div>
                         
                              <br>
                              <div class="form-group">
                                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Civil Status 
                                  <span class="required">*</span></label>
                                  Single: 
                                  <input type="radio" class="flat" name="gender" id="Single" value="Single" checked="" required class="form-control col-md-7 col-xs-12" />   
                                  Married:  
                                  <input type="radio" class="flat" name="gender" id="Married" value="Married" checked="" required class="form-control col-md-7 col-xs-12" />  
                                  Widow: 
                                  <input type="radio" class="flat" name="gender" id="Widow" value="Widow"  class="form-control col-md-7 col-xs-12"/>   
                              </div>
                              </div>
                              </div>
                        </form>
                    </div>
                

                <div class="wizard-step">
                    <h2 class="StepTitle">Step 2 Content</h2>
                    <form class="form-horizontal form-label-left">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Unit List</h2>
                                    <div class="col-md-6 col-sm-9 col-xs-12">
                                            <select class="form-control" id="typeAvail">
                                              <option disabled selected>Type of Availment:</option>
                                              <option id="spotcash">Spotcash</option>
                                              <option id="reserve">Reservation</option>
                                              <option id="atneed">At need</option>
                                            </select>
                                          </div>
                                    <div class="clearfix"></div>
                                  
                                </div>


                                        
                                <div class="table-responsive">
                                    <table class="table table-striped jambo_table bulk_action">
                                        <thead>
                                            <tr class="headings">
                        
                                                <th class="column-title">Unit ID</th>
                                                <th class="column-title">Unit Details</th>
                                                <th class="column-title reservation">Years to pay</th>
                                                <th class="column-title">Price</th>
                                                <th class="column-title">Discounted Price </th>
                                                <th class="column-title reservation">Monthly</th>
                                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                                </th>
                                                <th class="bulk-actions" colspan="7">
                                                  <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                                </th>
                                            </tr>
                                      </thead>

                                      <tbody id="tableBody">
                                          <tr class="even pointer">
                                  
                                              <td class=" ">Unit No.1</td>
                                              <td class=" "><button data-target="#popUpWindow" data-toggle="modal">View</button><i class="success fa fa-long-arrow-up"></i></td>
                                              <td class="  reservation">
                                                  <select class="form-control">
                                                                <option>1</option>
                                                  </select>
                                              </td>
                                              <td class=" ">P76,230.00</td>
                                              <td class="a-right a-right ">P9,147.60</td>
                                              <td class="  reservation">P6,352.50</td>
                                              <td class=" last"><a href="#"><button>Remove</button></a>
                                              </td>
                                          </tr>
                                    </tbody>
                                  </table>
                              </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="wizard-step">
                 <h2 class="StepTitle">Step 3 Content</h2>
                  <div class="panel panel-default">
                        <div class="panel-body">


                    <div class="form-group col-md-12">

                    <div class="col-md">

                      <div class="col-md-6">
                          <p class="lead">Amount Due: mm/dd/yyyy</p>
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th style="width:50%">Total Unit Price:</th>
                                  <td>P250.30</td>
                                </tr>
                                <tr>
                                <th>Reservation Fee:</th>
                                  <td>P1000.00</td>
                                </tr>
                                <tr>
                                <th>UNIT ORDER:</th>
                                <td>LAWN</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>

                    </div>

                    <div class="col-md-4 col-sm-9 col-xs-12">
                                            <select class="form-control">
                                              <option>Mode of Payment</option>
                                              <option>Cash</option>
                                              <option>Cheque</option>
                                            </select>
                                          </div>

                                       <button>Cheque Details</button>  
                        

                          <!-- /.col -->
                        <div class="col-md-6">
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <th style="width:50%">Total amount to pay:</th>
                                  <td>$250.30</td>
                                </tr>
                                <tr>
                                  <th>Amount paid:</th>
                                  <td>
                          <input type="text" class="form-control"  required= "required" data-inputmask="'mask' : 'P 999,999,999'">
                        </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <!-- /.col -->

                         


                            </div>
                                    </div>
                                    </div>
            </div>

            <div class="wizard-step">
                <form>
                      <p>GENERATE RECEIPT</p>
                </form>
                                         
            </div>

            <div class="modal-footer wizard-buttons">
                <!-- The wizard button will be inserted here. -->
            </div>
            </div>
        </div>
    </div>

                      <!--Sencya kana pre Formula for monthly amortization 

                        MA = ((((BasePrice - Downpayment)*Interest Rate)*No of years) + BasePrice - Downpayment)) / (No.of years * 12)



                        pre magagamit mo tong formula :P :()
                      ---->


                        <script type="text/javascript">
                                function add() {
                                      $(".select2_single").append("<option>Alex Uy</option>");
                                      //alert("asdsd");
                                    }
                                  </script>
<script src="easyWizard.js"></script>

<script type="text/javascript">
  $(document).on("ready", function(){
            $("#myModal").wizard({
        exitText: 'exit',
                onfinish:function(){
                    console.log("Hola mundo");
                }
            });
        });

</script>


                     </div><!--/modal body-->
                  </div><!--/content-->
                </div>
            </div><!--/modal 2-->

  </body>
</html>