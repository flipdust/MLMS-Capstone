<?php
    require("controller/connection.php");
    
    $fnName = $_GET['fnName'];
    switch ($fnName) {
        case 'getBlock':
            getBlock();
            break;

        case 'getLot':
            getLot();
            break;

        case 'getLevel':
            getLevel();
            break;

        case 'getAsh':
            getAsh();
            break;
        
        default:
            # code...
            break;
    }

    function getBlock() {
        $intSectionID = $_GET['intSectionID'];
        $sql = "Select * from tblBlock WHERE intStatus = 0 AND intSectionID = $intSectionID ORDER BY strBlockName ASC";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);

        if($row = mysql_fetch_array($result)){
            $intBlockID = $row['intBlockID']; 
            $strBlockName = $row['strBlockName'];
            $intNoOfLot = $row['intNoOfLot'];
            $intTypeID = $row['intTypeID'];
            //$intStatus = $row['intStatus']; 
            $sql2 = "Select * from tbltypeoflot WHERE intTypeID = $intTypeID";
            $conn2 = mysql_connect(constant('server'),constant('user'),constant('pass'));
            mysql_select_db(constant('mydb'));
            $result2 = mysql_query($sql2,$conn2);
            $dblSellingPrice = 0;
            if($row2 = mysql_fetch_array($result2)){
                $dblSellingPrice = $row2['dblSellingPrice'];
                $strTypeName = $row2['strTypeName'];
            }
            mysql_close($conn2);
            echo "$intBlockID,$strBlockName,$intNoOfLot,$dblSellingPrice,$strTypeName";
        }

        while($row = mysql_fetch_array($result)){
            $intBlockID = $row['intBlockID']; 
            $strBlockName = $row['strBlockName'];
            $intNoOfLot = $row['intNoOfLot'];
            $intTypeID = $row['intTypeID'];
            //$intStatus = $row['intStatus'];
            $sql2 = "Select * from tbltypeoflot WHERE intTypeID = $intTypeID";
            $conn2 = mysql_connect(constant('server'),constant('user'),constant('pass'));
            mysql_select_db(constant('mydb'));
            $result2 = mysql_query($sql2,$conn2);
            $dblSellingPrice = 0;
            if($row2 = mysql_fetch_array($result2)){
                $dblSellingPrice = $row2['dblSellingPrice'];
                $strTypeName = $row2['strTypeName'];
            }
            mysql_close($conn2);
            echo ",$intBlockID,$strBlockName,$intNoOfLot,$dblSellingPrice,$strTypeName";
        }
        //mysql_close($conn);
    }

    function getPrice($intTypeID) {
        
    }

    function getLot() {
        $intBlockID = $_GET['intBlockID'];
        $sql = "Select * from tblLot WHERE intStatus = 0 AND intBlockID = $intBlockID ORDER BY strLotName ASC";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);

        if($row = mysql_fetch_array($result)){
            $intLotID = $row['intLotID']; 
            $strLotName = $row['strLotName'];
            $intLotStatus = $row['intLotStatus'];
            //$intStatus = $row['intStatus']; 
            echo "$intLotID,$strLotName,$intLotStatus";
        }

        while($row = mysql_fetch_array($result)){
                    
            $intLotID = $row['intLotID']; 
            $strLotName = $row['strLotName'];
            $intLotStatus = $row['intLotStatus'];
            //$intStatus = $row['intStatus']; 

            echo ",$intLotID,$strLotName,$intLotStatus";
        }
        mysql_close($conn);
    }

    function getLevel() {
        $intAshID = $_GET['intAshID'];
        $sql = "Select * from tbllevelash WHERE intStatus = 0 AND intAshID = $intAshID ORDER BY strLevelName DESC";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);

        if($row = mysql_fetch_array($result)){
            $intLevelAshID = $row['intLevelAshID']; 
            $strLevelName = $row['strLevelName'];
            $intNoOfUnit = $row['intNoOfUnit'];
            $dblSellingPrice = $row['dblSellingPrice'];
            //$intStatus = $row['intStatus']; 
            echo "$intLevelAshID,$strLevelName,$intNoOfUnit,$dblSellingPrice";
        }

        while($row = mysql_fetch_array($result)){
                    
            $intLevelAshID = $row['intLevelAshID']; 
            $strLevelName = $row['strLevelName'];
            $intNoOfUnit = $row['intNoOfUnit'];
            $dblSellingPrice = $row['dblSellingPrice'];
            //$intStatus = $row['intStatus']; 

            echo ",$intLevelAshID,$strLevelName,$intNoOfUnit,$dblSellingPrice";
        }
        mysql_close($conn);
    }

    function getAsh() {
        $intLevelAshID = $_GET['intLevelAshID'];
        $sql = "Select * from tblacunit WHERE intStatus = 0 AND intLevelAshID = $intLevelAshID ORDER BY strUnitName ASC";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        $result = mysql_query($sql,$conn);

        if($row = mysql_fetch_array($result)){
            $intUnitID = $row['intUnitID']; 
            $strUnitName = $row['strUnitName'];
            $intUnitStatus = $row['intUnitStatus'];
            $intCapacity = $row['intCapacity'];
            //$intStatus = $row['intStatus']; 
            echo "$intUnitID,$strUnitName,$intUnitStatus,$intCapacity";
        }

        while($row = mysql_fetch_array($result)){
                    
            $intUnitID = $row['intUnitID']; 
            $strUnitName = $row['strUnitName'];
            $intUnitStatus = $row['intUnitStatus'];
            $intCapacity = $row['intCapacity'];
            //$intStatus = $row['intStatus']; 

            echo ",$intUnitID,$strUnitName,$intUnitStatus,$intCapacity";
        }
        mysql_close($conn);
    }
?>