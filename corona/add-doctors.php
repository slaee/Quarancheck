<?php
require_once "importance.php";

if (!User::loggedIn()) {
	Config::redir("login.php");
}
?>

<html>

<head>
	<title>Add Doctors - <?php echo CONFIG::SYSTEM_NAME; ?></title>
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
						<?php if (isset($_GET['token'])) {
							echo "Edit Doctor <small>Edit this doctor</small>";
						} else { ?> Add Doctors <small>Add doctors into the system</small> <?php } ?>
					</div>
					<?php require_once "inc/alerts.inc.php";  ?>
					<div class='content-body'>

						<?php Messages::info("The default password is <strong>IlocosSur</strong>"); ?>
						<div class='form-holder'>
							<?php
							$firstName = "";
							$secondName = "";
							$email = "";
							$phone = "";
							$role = "";
							$license = "";
							$type = "";
							$gender = "";
							$token = "";

							if (isset($_GET['token'])) {
								$token = $_GET['token'];
								$firstName = User::get($token, "firstName");
								$secondName = User::get($token, "secondName");
								$email = User::get($token, "email");
								$type = User::get($token, "type");
								$phone = User::get($token, "phone");
								$role = User::get($token, "role");
								$license = User::get($token, "license");
								$gender = User::get($token, "gender");
							}

							if (isset($_POST['fn'])) {
								$firstName = $_POST['fn'];
								$secondName = $_POST['sn'];
								$email = $_POST['em'];
								$phone = $_POST['phone'];
								$role = $_POST['role'];
								$license = $_POST['license'];

								if ($token == "") {
									$type = $_POST['type'];
									$gender = $_POST['gender'];
									
								} else {
									$gender = "$gender";
									$type = "$type";
								}

								if ($firstName == "" || $secondName == "" || $email == "" || $phone == "" || $role == "" || $type == "" || $license == "" || $gender == "") {
									Messages::error("You must fill in all the fields");
								} else if (strlen($phone) != 11) {
									Messages::error("Phone must be 11 characters");
								} else if (strpos($email, "@") === false && strpos($email, ".")) {
									Messages::error("You entered invalid email. Email must be inform of example@example.com");
								} else {
									switch($type){
										case "doctor":
											Doctor::add($token, $firstName, $secondName, $email, $type, $phone, $gender, $license, $role);
											break;
										case "police":
											Police::add($token, $firstName, $secondName, $email, $type, $phone, $gender, $license, $role);
											break;
									}									
								}
							}

							$form = new Form(3, "post");
							$form->init();
							if (isset($_GET['token'])) {
								$form->textBox("", "First Name", "fn", "text", "$firstName", "");
								$form->textBox("", "Last Name", "sn", "text", "$secondName", "");
								$form->textBox("", "Email", "em", "text", "$email", "");
								$form->textBox("", "Contact Number", "phone", "text", "$phone", "");
								$form->textBox("", "Role e.g <i>Surgeon</i>", "role", "text", "$role", "");
								$form->textBox("", "License Number", "license", "text", "$license", "");
								$form->textBox("", "Account Type", "", "text", "$type", array("disabled"));
								$form->textBox("", "Gender", "", "text", "$gender", array("disabled"));
							} else {
								$form->select("Account Type", "type", "$type", array("doctor", "police"));
								$form->textBox("", "First Name", "fn", "text", "$firstName", "");
								$form->textBox("", "Last Name", "sn", "text", "$secondName", "");
								$form->textBox("", "Email", "em", "text", "$email", "");
								$form->textBox("", "Contact Number", "phone", "text", "$phone", "");
								$form->textBox("", "Role e.g <i>Surgeon</i>", "role", "text", "$role", "");
								$form->textBox("license", "License Number", "license", "text", "$license", "");
								$form->select("Gender", "gender", "$gender", array("Male", "Female", "Other"));
							}
							if (isset($_GET['token'])) {
								$form->close("Edit Doctor");
							} else {
								$form->close("Add Doctor");
							}

							/*Db::formSpecial(
							array("First Name", "Last Name", "Email", "Phone", "Role e.g <i>Surgeon</i>"),
							3,
							array("fn", "sn", "em", "phone", "role"), 
							array("text", "text", "text", "number", "text"),  
							"", 
							"",  
							array("Gender"), 
							array("gender"), 
							array("Male", "Female", "Other"), 
							"Add Doctor") */ ?>
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