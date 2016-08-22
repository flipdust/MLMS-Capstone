<?php
class updateDependencies	{

    function update($deciBusinessDependencyValue,$id){
		$sql = "UPDATE `dbholygarden`.`tblbusinessdependency` SET `deciBusinessDependencyValue`='$deciBusinessDependencyValue' 
                        WHERE `intBusinessDependencyId`= '$id'";
        $conn = mysql_connect(constant('server'),constant('user'),constant('pass'));
        mysql_select_db(constant('mydb'));
        if(mysql_query($sql,$conn))
        {
            mysql_close($conn);
			echo "<script>alert('Succesfully updated!')</script>";
		}
    }        
}
?>