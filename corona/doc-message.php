<?php 
require_once "importance.php"; 
if (!User::loggedIn()) {
	Config::redir("login.php");
}
?> 

<html>
<head>
	<title>Message - <?php echo CONFIG::SYSTEM_NAME; ?></title>
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
				Message<small> Doctor and Police Officer</small>
				</div>
				<div class='content-body'> 
					<div class='form-holder'>
                    <h2>Sender</h2>
                    <br>
						<?php
						
							if(isset($_POST['p-fullname'])){
								$name = $_POST['p-fullname']; 
								$phone = $_POST['p-phone']; 
								$message = $_POST['message'];
								$patient = $_POST['a-patient'];
								
								if($message == "" || $patient == ""){
									Messages::error("You must fill in all the fields");
								} else {
									Appointment::sendMessageToPatient($name,  $patient, $phone, $message);
								}
                            }

                            $doctor = $_SESSION['doctor'];
							$form = new Form(2,"post"); 
							$form->init(); 
							$form->textBox("","Full Name", "p-fullname", "text", Doctor::getDoc($doctor, "firstName")." ".Doctor::getDoc($doctor, "secondName"), array("readonly") );
							$form->textBox("","Phone", "p-phone", "number", Doctor::getDoc($doctor, "phone"), array("readonly"));
							$form->textarea("Message", "message", "" );
							Patient::patientList("a-patient", 2);
							$form->close("Send Message");
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
