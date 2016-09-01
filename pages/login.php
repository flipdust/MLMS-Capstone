 <?php

    require("controller/loginuser.php");
  ?>


<!DOCTYPE html>
<html lang = "en">
  <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  
		<title>MLMS-Login</title>
		
		<style>
			
			body{
				margin-left: 25px;
				margin-right: 25px;
				margin-top: 25px;
				background: #f0f5f5;
			}

			#header{
				background: #b3ffb3;
				width: 100%;
				height:  90px;
			}

			#headerLogo{
				height:  80px;
				width: 700px;
				margin-left: 10px;
			}

			#left{
				width: 120px;
				height: 120px;
				float: left;
				background: #d6d6c2;
				margin-left: 50px;
				margin-top: 30px;
			}
			#left-logo{
				width: 120px;
				height: 120px;

			}	
			#eam1{
				font-family: Arial;
				font-size: 20px;
				font-weight: bold;
				text-align: center;
				padding-left: 10px;
			}

			.modal-dialog{
				width: 500px;
				float: left;
				margin-left: 50px;
			}

			.right{
				width: 500px;
				height: 50px;
				margin-left: 20px;
				margin-top: 30px;
				font-weight: normal;
			}


			#footer{
				height: 30px;
				width: 100%;
				float: left;
				background: #b3ffb3;
				font-family: 'Poiret One', cursive;
				text-align: center;
				margin-top: 120px;
				
			}

		</style>
  </head>
  
  <body>
		<div id = "header">
			<img class="img-responsive" id = "headerLogo"  src = "images/logoboy.png"/>
		</div>
		
	
			
			<div id = "left">
				<img class="img-responsive" id = "left-logo" src = "images/employeeLogo.png"/>
				<label id = "eam1">Employee<br>Access<br>Module</label>
			</div>
			
				
				
			<div class = "modal-dialog">
			
				<?php
					
            if(isset($_POST['btnLogin']))
            {   
                $tfUsername = $_POST['tfUsername'];
                $tfPassword = $_POST['tfPassword'];
                $user = new User($tfUsername,$tfPassword);
                $sql = $user->checkUser($tfUsername,$tfPassword);
                echo $sql;
                
            }
 	
				?>
				<div class = "modal-content">
					<div class = "modal-header" style = "background: #b3ffb3;">	
						<label style = "font-size:20px;">User Authentication:</label>
					</div>
					<div class = "modal-body">
						
						<form class="form-horizontal" role="form" action = "login.php" method= "post">
						  <div class="form-group">
							<label style = "margin-left: 50px;">Please sign-in using your username and password.</label><br><br>
							<label class="control-label col-sm-2">Username:</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name= "tfUsername" placeholder="Enter Username" required>
							</div>
						  </div>
						  <div class="form-group">
							<label class="control-label col-sm-2">Password:</label>
							<div class="col-sm-10"> 
							  <input type="password" class="form-control" name= "tfPassword" placeholder="Enter password" required>
							</div>
						  </div>
						 
						  <div class="form-group"> 
							<span style = "margin-left: 100px;"><a href = "forgot.php">Forgot Password?</a></span>
							<div style= "margin-top:20px;" class="col-sm-offset-2 col-sm-10">
								
							  <button type="submit" class="btn btn-success" name= "btnLogin">Login</button>
							  <input class = "btn btn-success" type="reset" name = "btnClear" value = "Clear Entries">
							</div>
						  </div>
						</form>
				
					</div>
				</div>
			</div>
						
			<div >
				<label class = "right">This module is exclusively for employees of Holy Garden only. Functions included are:
					<ul>
						<li>Maintenance</li>
						<li>Transaction</li>
						<li>Queries</li>
						<li>Reports</li>
						<li>Utilities</li>
					</ul>
				</label>
				<label class = "right">Instructions:
					<ul>
						<li>To sign-in, specify your username and password and click on the Login button.</li>
						<li>To clear entries, click on the Clear Entries button</li>
						<li>If you forgot your password, clik on the Forgot Password link for assistance.</li>	
					</ul>
				</label>
				
			</div>
						
  </body>
</html>

