<?php 
require_once "importance.php"; 

if(User::loggedIn()){
	Config::redir("index.php"); 
}
?> 

<html>
<head>
	<title>Home - <?php echo CONFIG::SYSTEM_NAME; ?> </title>
	<?php require_once "inc/head.inc.php";  ?> 
</head>
<body>
	<?php require_once "inc/header.inc.php"; ?> 
	<div class='container-fluid' >
		
			<div class='col-md-15'>
				<div class='content-area'> 
					<div class='content-header'> 
						Login <small>Login to access the system</small>
					</div>
					<div class='content-body'> 
							<div class='row'>
								<div class='col-md-6'>
								</div> 
								<div class='col-md-3'style="padding-top: 100px;"></div>
							</div> 
										<center><a href='login.php?attempt=admin'><div class='badge-header'>Login</div></a></center> 	
										<center><a href='reg-reservation.php?attempt=1'><div class='badge-header'>Register</div></a></center> 	
					</div> 
				</div>  
			</div> 
		</div> 
	</div> 
</body>
</html>