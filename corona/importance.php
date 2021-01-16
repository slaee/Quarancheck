<?php 

// this is the important file in the system, 
// it initializes all the classes and objects of the system


ob_start();
@session_start();

//use spl_autoload_register to avoid warnings
spl_autoload_register(function($file){
	require_once "classes/$file.class.php"; 
});

// functions

// get all information about this user

if(User::loggedIn()){
	$token = $_COOKIE['emr-user']; 
	$userFirstName = User::get($token, "firstName");
	$userSecondName = User::get($token, "secondName");
	$userEmail = User::get($token, "email");
	$userPassword = User::get($token, "password");
	$userToken = User::get($token, "token");
	$userStatus = User::get($token, "type");
	$userPhone = User::get($token, "phone");
	$userProfile = User::get($token, "profile");
	$userGender = User::get($token, "gender");
	$userRole = User::get($token, "role");
	$userLicense = User::get($token, "license");
	
	if($userStatus == "admin"){
		$userRole = "Admin";
	} else {
		$userRole = $userRole;
	}
}

$query = Db::fetch("patients", "name", "", "", "", "", "");

if (Db::count($query)) {
    while($data = Db::assoc($query)){
		$token = $data['token'];
		$id = Patient::get($token, "id");
        $name = Patient::get($token, "name");
        $number = Patient::get($token, "number");
        $diagnosis = Patient::get($token, "diagnosis");

        if($diagnosis == "Positive"){
            Set::reAdd($id, $token, $name, $number, 1);
        } else {
            Set::reAdd($id, $token, $name, $number, 2);
        }
    }
}