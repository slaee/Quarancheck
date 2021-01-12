<?php 
require_once "importance.php"; 

if(){
	header("Location:index.php");
	return; 
}
?> 

<html>
<head>
	<title><?php echo CONFIG::SYSTEM_NAME; ?></title>
	<?php require_once "inc/head.inc.php";  ?> 
</head>
<body>
	<?php require_once "inc/header.inc.php"; ?> 
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-md-2'><?php require_once "inc/sidebar.inc.php"; ?></div> <!-- this should be a sidebar --> 
			<div class='col-md-7'>
				<div class='content-area'> 
				<div class='content-header'> 
					Police Data <small>Access your data</small>
				</div>
				<div class='content-body'>
					<div class='form-holder'><br /><br />
						<?php 
							$userEmail = ""; 
							$number = "";
							
							if(isset($_POST['email'])){
								$userEmail = $_POST['email']; 
								$number = $_POST['p-number'];
								Patient::authorize($email, $number);
							}
							
							$form = new Form(2, "post");
							$form->init();
							$form->textBox("email", "$userEmail", array("placeholder='Email'") );
							$form->textBox("phone number", "p-number", "number", "$phone", array("placeholder='Contact Number'") );							
							$form->close("Access Your Data");
						?>
					</div> 
				</div><!-- end of the content area --> 
				
				</div> 
				
			</div><!-- col-md-7 --> 

			<div class='col-md-3'>
				<img src='images/abc.jpg' class='img-responsive' /> 
			</div> <!-- this should be a sidebar -->
				
		</div> 
	</div> 
</body>
</html>
