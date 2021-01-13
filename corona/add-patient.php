<?php
require_once "importance.php";

if (!User::loggedIn()) {
	Config::redir("login.php");
}
?>

<html>

<head>
	<title>Add Patients - <?php echo CONFIG::SYSTEM_NAME; ?></title>
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
						Add Patient <small>New patient? Add them here</small>
					</div>
					<?php require_once "inc/alerts.inc.php";  ?>
					<div class='content-body'>
						<div class='form-holder' style='margin-top: 50px;'>
							<div class='badge-header'>Patient Details</div>

							<?php

							if (isset($_GET['p-number'])) {
								$patientNumber = $_GET['p-number'];
								echo "<h3>Patient Number: $patientNumber</h3>";

								$name = $_GET['name'];
								$street_address = $_GET['street_adress'];
								$municipality = $_GET['municipality'];
								$dateOfBirth = $_GET['dateOfBirth'];

								$dataBirth = explode("-", $dateOfBirth);
								$dateOfBirth = preg_replace("#[^0-9-]#", "", $dataBirth[2] . "-" . $dataBirth[1] . "-" . $dataBirth[0]);
								$age = $_GET['age'];
								$gender = $_GET['gender'];
								$phone = $_GET['phone'];
								$traveled = $_GET['traveled'];
								$entered = $_GET['entered'];
								$origin = $_GET['origin'];
								$destination = $_GET['destination'];
								$dname = $_GET['dname'];
								$vtype = $_GET['vtype'];
								$plate = $_GET['plate'];
								$antigen = $_GET['antigen'];
								$diagnosis = "";
								$prescription = "";
								$condition = "";
							} else {
								$patientNumber = substr(preg_replace("#[^0-9]#", "", md5(uniqid() . time())), 0, 4);
								echo "<h3 style='color: #EF3235;'>Patient Number: <strong>$patientNumber</strong></h3>";
								$name = "";
								$street_address = "";
								$municipality = "";
								$dateOfBirth = "";
								$age = "";
								$gender = "";
								$phone = "";
								$traveled = "";
								$entered = "";
								$origin = "";
								$destination = "";
								$dname = "";
								$vtype = "";
								$plate = "";
								$antigen = "";
								$diagnosis = "";
								$prescription = "";
								$condition = "";
							}

							if (isset($_POST['p-name'])) {
								$name = $_POST['p-name'];
								$street_address = $_POST['p-street'];
								$municipality = $_POST['p-municipality'];
								$dateOfBirth = $_POST['p-birth'];
								$age = $_POST['p-age'];
								$phone = $_POST['p-phone'];
								$traveled = $_POST['p-traveled'];
								$entered = $_POST['p-entered'];
								$origin = $_POST['p-origin'];
								$destination = $_POST['p-destination'];
								$dname = $_POST['p-dname'];
								$vtype = $_POST['p-vtype'];
								$plate = $_POST['p-plate'];
								$antigen = $_POST['antigen'];
								$diagnosis = $_POST['p-diagnosis'];
								$prescription = $_POST['p-prescription'];
								$gender = $_POST['gender'];
								$condition = $_POST['condition'];

								Patient::add($name, $street_address, $municipality, $dateOfBirth, $age, $gender, $phone, $traveled, $entered, $origin, $destination, $dname, $vtype, $plate, $antigen,  $diagnosis, $prescription, User::getToken(), $patientNumber, $condition);
							}

							$form = new Form(3, "post");
							$form->init();
							$form->textBox("","Full Name", "p-name", "text",  "$name", "");
							$form->textBox("","Street Address", "p-street", "text", "$street_address", "");
							$form->textBox("","Municipality", "p-municipality", "text", "$municipality", "");
							$form->textBox("date-of-birth","Date of Birth", "p-birth", "date", "$dateOfBirth", "");
							$form->textBox("age","Age", "p-age", "text",  "$age", "");
							$form->textBox("","Phone", "p-phone", "text",  "$phone", "");
							$form->textBox("","Date Traveled", "p-traveled", "date",  "$traveled", "");
							$form->textBox("","Date Entered", "p-entered", "date",  "$entered", "");
							$form->textBox("","Point of Origin", "p-origin", "text",  "$origin", "");
							$form->textBox("","Place of Destination", "p-destination", "text",  "$destination", "");
							$form->textBox("","Driver's Name", "p-dname", "text",  "$dname", "");
							$form->textBox("","Vehicle Type", "p-vtype", "text",  "$vtype", "");
							$form->textBox("","Plate Number", "p-plate", "text",  "$plate", "");
							$form->select("Undergo with Antigen or Swab test", "antigen", "$antigen", array("Yes", "No"));
							$form->select("Diagnosis", "p-diagnosis", "$diagnosis", array("Positive", "Negative"));
							$form->textarea("Prescription", "p-prescription", "$prescription", array("Positive", "Negative"));
							$form->select("Gender", "gender", "$gender", array("Male", "Female", "Other"));
							$form->select("Condition", "condition", "$condition", array("Inpatient", "Outpatient"));
							$form->close("Submit and Print");


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