<?php

class Patient
{
	public static function add($name, $street_address, $municipality, $dateOfBirth, $age, $gender, $phone, $traveled, $entered, $origin, $destination, $dname, $vtype, $plate, $antigen,  $diagnosis, $prescriptions, $doctor, $number, $condition)
	{


		if ($name == "" || $street_address == "" || $municipality == "" || $dateOfBirth == "" || $age == "" || $gender == "" || $phone == ""  || $traveled == ""  || $entered == ""  || $origin == ""  || $destination == ""  || $dname == ""  || $vtype == ""  || $plate == ""  || $antigen == ""  || $diagnosis == "" || $prescriptions == "" || $condition == "") {
			Messages::error("All fields are required");
			return;
		}

		if (strlen($phone) != 11) {
			Messages::error("Please note phone must be inform of 09*********, i.e eleven digits");
			return;
		}


		$time = time();
		$patientToken = md5(uniqid() . time() . unixtojd() . $name . $age . $phone);
		$diagnosis = str_replace("\n", "<br />", $diagnosis);
		$prescriptions = str_replace("\n", "<br />", $prescriptions);

		Db::insert(
			"patients",
			array("name", "street", "municipality", "dateOfBirth", "age", "gender", "phone", "traveled", "entered", "origin", "destination", "dname", "vtype", "plate", "antigen", "cTime", "diagnosis", "prescription", "token", "doctor", "number", "pcondition"),
			array($name, $street_address, $municipality, $dateOfBirth, $age, $gender, $phone,  $traveled, $entered, $origin, $destination, $dname, $vtype, $plate, $antigen,  $time, $diagnosis, $prescriptions, $patientToken, $doctor, $number, $condition)
		);

		Config::redir("print.php?patient=$patientToken");
	}

	public static function get($token, $field)
	{
		$query = Db::fetch("patients", "$field", "token = ? ", $token, "", "", "");
		if (Db::count($query)) {
			$data = Db::num($query);
			return $data[0];
		}

		Messages::error("Invalid patient token!");
	}

	public static function getNumber($number, $field){
		$query = Db::fetch("patients", "$field", "number = ? ", $number, "", "", "");
		if (Db::count($query)) {
			$data = Db::num($query);
			return $data[0];
		}

		Messages::error("Invalid patient token!");
	}

	public static function getP($number, $field)
	{
		$query = Db::fetch("patients", "$field", "number = ? ", $number, "", "", 1);
		if (Db::count($query)) {
			$data = Db::num($query);
			return $data[0];
		}

		Messages::error("Invalid patient token!");
	}

	public static function printP($token)
	{
		$name = self::get($token, "name");
		$street_address = self::get($token, "street");
		$municipality = self::get($token, "municipality");
		$dateOfBirth = self::get($token, "dateOfBirth");
		$age = self::get($token, "age");
		$phone = self::get($token, "phone");
		$traveled =  self::get($token, "traveled");
		$entered =  self::get($token, "entered");
		$origin =  self::get($token, "origin");
		$destination =  self::get($token, "destination");
		$dname =  self::get($token, "dname");
		$vtype =  self::get($token, "vtype");
		$plate =  self::get($token, "plate");
		$antigen =  self::get($token, "antigen");
		$time = self::get($token, "cTime");
		$diagnosis = self::get($token, "diagnosis");
		$prescription = self::get($token, "prescription");
		$date = strftime(date("d/m/Y", $time));
		$doctor = self::get($token, "doctor");
		$number = self::get($token, "number");


		echo "
			<div class='badge-header print-p-data' style='cursor: pointer;'>Print</div>
			<div class='print-data'>
				<div class='form-holder' style='background:#fff;'>
					<div class='row'>
						<div class='col-md-7 p-data'><div class='p-date'>$date</div></div>
						<div class='col-md-5 p-data'>
							<div><strong>Patient No:</strong> <span>$number</span></div>
							<div><strong>Name:</strong> <span>$name</span></div>
							<div><strong>Age:</strong> <span>$age</span></div>
							<div><strong>Contact:</strong> <span>$phone</span></div>
							<div><strong>Street Address:</strong> <span>".ucfirst($street_address)."</span></div>
						</div>
						
					</div>
					<div>
						<strong>Street Municipality:</strong> <span>".ucfirst($municipality)."</span>
					</div>
					<br>
					<div class='row'>
						<div class='col-md-7 p-ref'>
							<div>Undergo with Antigen/Swab Test?</div>
							$antigen
						
						</div>
						
					</div> 
					<div class='row'>
						<div class='col-md-7 p-ref'>
							<div>Diagnosis</div>
							$diagnosis
						</div>
						
					</div>
					<div class='row'>
						<div class='col-md-7 p-ref'>
							<div>PRESCRIPTIONS</div>
							$prescription
						</div>
					</div><br />
					<div class='row'>
						<div class='col-md-7'><strong>Province of Ilocos Sur</strong></div>
						<div class='col-md-5'>
							<strong>Served By: </strong> <span class='service-name'> " . User::get($doctor, "firstName") . " " . User::get($doctor, "secondName") . "</span> <span class='service-title'><i>" . User::get($doctor, "role") . "</i></span>
						</div>
						
					</div>
				</div> 
			</div> 
		";
	}


	public static function positivePatientsBooks()
	{

		$query = Db::fetch("patients", "", "diagnosis=?", "Positive", "", "", "");

		if (Db::count($query)) {
			if (Db::count($query) == 1) {
				$countP = Db::count($query) . " Record";
			} else {
				$countP = Db::count($query) . " Records";
			}
			echo "<div class='badge-header'>$countP</div>";


			echo "<div class='form-holder'><table class='table table-bordered'>";

			echo "
					<tr>
						<td><strong>Name</strong></td>
						<td><strong>Street Address</strong></td>
						<td><strong>Municipality</strong></td>
						<td><strong>Age</strong></td>
						<td><strong>Date of Birth</strong></td>
						<td><strong>Date Entered</strong></td>
						<td><strong>Date traveled</strong></td>
						<td><strong>Place Destination</strong></td>
						<td><strong>Point of Origin</strong></td>
						<td><strong>Result</strong></td>
						<td><strong>Print</strong></td>
						
					<tr>
			";

			while ($data = Db::assoc($query)) {
				$token = $data['token'];
				$name = self::get($token, "name");
				$street_address = self::get($token, "street");
				$municipality = self::get($token, "municipality");
				$dateOfBirth = self::get($token, "dateOfBirth");
				$age = self::get($token, "age");
				$phone = self::get($token, "phone");
				$traveled =  self::get($token, "traveled");
				$entered =  self::get($token, "entered");
				$origin =  self::get($token, "origin");
				$destination =  self::get($token, "destination");
				$dname =  self::get($token, "dname");
				$vtype =  self::get($token, "vtype");
				$plate =  self::get($token, "plate");
				$antigen =  self::get($token, "antigen");
				$time = self::get($token, "cTime");
				$diagnosis = self::get($token, "diagnosis");
				$prescription = self::get($token, "prescription");
				//*$date = strftime(date("d/m/Y", $time));*//
				$doctor = self::get($token, "doctor");
				$docName = User::get($doctor, "firstName") . " " . User::get($doctor, "secondName");


				echo "
					<tr>
						<td>$name</td>
						<td>$street_address</td>
						<td>$municipality</td>
						<td>$age</td>
						<td>$dateOfBirth</td>
						<td>$entered</td>
						<td>$traveled</td>
						<td>$destination</td>
						<td>$origin</td>
						<td>$diagnosis</td>
						<td><a href='print.php?patient=$token'>Print</a></td>
						
					<tr>
			";
			}

			echo "</table></div>";
		} else {
			Messages::info("There is no record in the moment");
		}
	}

	public static function negativePatientsBooks()
	{
		$query = Db::fetch("patients", "", "diagnosis=?", "Negative", "", "", "");

		if (Db::count($query)) {
			if (Db::count($query) == 1) {
				$countP = Db::count($query) . " Record";
			} else {
				$countP = Db::count($query) . " Records";
			}
			echo "<div class='badge-header'>$countP</div>";


			echo "<div class='form-holder'><table class='table table-bordered'>";

			echo "
					<tr>
						<td><strong>Name</strong></td>
						<td><strong>Street Address</strong></td>
						<td><strong>Municipality</strong></td>
						<td><strong>Age</strong></td>
						<td><strong>Date of Birth</strong></td>
						<td><strong>Date Entered</strong></td>
						<td><strong>Date traveled</strong></td>
						<td><strong>Place Destination</strong></td>
						<td><strong>Point of Origin</strong></td>
						<td><strong>Result</strong></td>
						<td><strong>Print</strong></td>
						
					<tr>
			";
			while ($data = Db::assoc($query)) {
				$token = $data['token'];
				$name = self::get($token, "name");
				$street_address = self::get($token, "street");
				$municipality = self::get($token, "municipality");
				$dateOfBirth = self::get($token, "dateOfBirth");
				$age = self::get($token, "age");
				$phone = self::get($token, "phone");
				$traveled =  self::get($token, "traveled");
				$entered =  self::get($token, "entered");
				$origin =  self::get($token, "origin");
				$destination =  self::get($token, "destination");
				$dname =  self::get($token, "dname");
				$vtype =  self::get($token, "vtype");
				$plate =  self::get($token, "plate");
				$antigen =  self::get($token, "antigen");
				$time = self::get($token, "cTime");
				$diagnosis = self::get($token, "diagnosis");
				$prescription = self::get($token, "prescription");
				//*$date = strftime(date("d/m/Y", $time));*//
				$doctor = self::get($token, "doctor");
				$docName = User::get($doctor, "firstName") . " " . User::get($doctor, "secondName");


				echo "
					<tr>
						<td>$name</td>
						<td>$street_address</td>
						<td>$municipality</td>
						<td>$age</td>
						<td>$dateOfBirth</td>
						<td>$entered</td>
						<td>$traveled</td>
						<td>$destination</td>
						<td>$origin</td>
						<td>$diagnosis</td>
						<td><a href='print.php?patient=$token'>Print</a></td>
						
					<tr>
			";
			}

			echo "</table></div>";
		} else {
			Messages::info("There is no record in the moment");
		}
	}

	public static function patientList($name, $labelDistance){
		$nextLabel = 12 - (int) $labelDistance; 
		$query = Db::fetch("patients", "", "", "", "id DESC", "", "");
		echo "<div class='form-group'>
				<label class='col-md-".$labelDistance."' >To</label>
				<div class='col-md-".$nextLabel."'>
				<select name='$name' class='form-control'>
					<option value='' >--Select a Patient--</option>
				";
				
		while($data = Db::assoc($query)){
			$number = $data['number']; 
			$fullName = self::getNumber($number,"name"); 
			
			echo "<option value='$number'>$fullName</option> ";
		}
		echo "</select></div></div> ";
	}

	public static function checkPatient($number)
	{
		$query = Db::fetch("patients", "", "number =? ", $number, "", "", 1);
		if (!Db::count($query)) {
			Messages::error("This number does not exist in the system");
			return;
		}

		if ($number == "" || strpos($number, " ") === true) {
			Messages::error("You must provide a number");
			return;
		}

		// user basic details
		$data = Db::assoc($query);

		$name = $data['name'];
		$street_address = $data['street'];
		$municipality = $data['municipality'];
		$dateOfBirth = $data['dateOfBirth'];
		$age = $data['age'];
		$gender = $data['gender'];
		$phone = $data['phone'];
		$traveled =$data['traveled'];
		$entered = $data['entered'];
		$origin = $data['origin'];
		$destination = $data['destination'];
		$dname = $data['dname'];
		$vtype = $data['vtype'];
		$plate = $data['plate'];
		$antigen = $data['antigen'];
		

		Config::redir("add-patient.php?p-number=$number&name=$name&street_address=$street_address&municipality=$municipality&dateOfBirth=$dateOfBirth&age=$age&phone=$phone&gender=$gender&traveled=$traveled&entered=$entered&origin=$origin&destination=$destination&dname=$dname&vtype=$vtype&plate=$plate&antigen=$antigen");
	}


	public static function authorize($phone, $number)
	{
		$query = Db::fetch("patients", "", "phone = ? AND number = ? ", array($phone, $number), "", "", 1);
		if (!Db::count($query)) {
			Messages::error("Details you entered could not match any of our records");
			return;
		}

		if ($phone == "" || $number == "" || strpos($phone, " ") === true || strpos($number, " ")  == true) {
			Messages::error("Details entered are not valid. Make sure you fill in all the fields or check for white spaces");
			return;
		}

		@session_start();

		$_SESSION['patient'] = $number;

		Config::redir("patient-data.php");
	}

	public static function getPatientData($patient)
	{
		$query = Db::fetch("patients", "", "number = ? ", "$patient", "", "", "");
		if (!Db::count($query)) {
			Messages::info("You currently have not data in the system");
			return;
		}

		Table::start();

		$heading = array("Name", "Street Address", "Municipality", "Date of Birth", "Age", "Phone",  "Served On:", "Diagnosis", "Prescriptions", "Served By", "Print");
		$body = array();
		Table::header($heading);

		while ($data = Db::assoc($query)) {
			$token = $data['token'];
			$name = self::get($token, "name");
			$street_address = self::get($token, "street");
			$municipality = self::get($token, "municipality");
			$dateOfBirth = self::get($token, "dateOfBirth");
			$age = self::get($token, "age");
			$phone = self::get($token, "phone");
			$time = self::get($token, "cTime");
			$diagnosis = self::get($token, "diagnosis");
			$prescription = self::get($token, "prescription");
			$date = strftime(date("d/m/Y", $time));
			$doctor = self::get($token, "doctor");

			$doctorFirstName = User::get($doctor, "firstName");
			$doctorSecondName = User::get($doctor, "secondName");
			$servedBy = "$doctorFirstName $doctorSecondName";
			Table::body(array($name, $street_address, $municipality, $dateOfBirth, $age, $phone, $date, $diagnosis, $prescription, $servedBy, "<a href='print.php?patient=$token'>Print</a>"));
			//array_push($body, ); 

		}
		//Table::create($heading, $body); 
		Table::close();
	}

	public static  function isPatientIn()
	{
		if (isset($_SESSION['patient'])) {
			return true;
		}
		return;
	}
}
