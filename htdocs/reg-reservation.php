<?php 


	session_start();
	if (isset($_POST['register'])) {
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $brgy = $_POST['brgy'];
        $city = $_POST['city'];
        $province = $_POST['province'];
		$zipcode = $_POST['zipcode'];
		$contact = $_POST['contact'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$c_password = $_POST['c_password'];
/*$contact = $_POST['contact'];
		$photo = explode('.', $_FILES['photo']['name']);
		$photo= end($photo);
		$photo_name= $username.'.'.$photo;


		$input_error = array();
		if (empty($fname)) {
			$input_error['firstname'] = "The Name Filed is Required";
		}
		if (empty($email)) {
			$input_error['email'] = "The Email Filed is Required";
		}
		if (empty($username)) {
			$input_error['username'] = "The UserName Filed is Required";
		}
		if (empty($contact)) {
			$input_error['contact'] = "The Position Filed is Required";
		}
		if (empty($password)) {
			$input_error['password'] = "The Password Filed is Required";
		}

		if (!empty($password)) {
			if ($c_password!==$password) {
				$input_error['notmatch']="You Typed Wrong Password!";
			}
		}
		
        

		if (count($input_error)==0) {
			$check_email= mysqli_query($db_con,"SELECT * FROM `admin` WHERE `email`='$email';");

			if (mysqli_num_rows($check_email)==0) {
				$check_username= mysqli_query($db_con,"SELECT * FROM `admin` WHERE `username`='$username';");
				if (mysqli_num_rows($check_username)==0) {
					if (strlen($username)>7) {
						if (strlen($password)>7) {
								$password = sha1(md5($password));
							$query = "INSERT INTO `reservation`(`Firstname`, `Middlename`, `Lastname`, `Brgy`, `City`, `Province`, `Zipcode`, `Contact_Number`, `Username`, `Email`, `Password`) VALUES ('$fname', '$mname', '$lname', '$brgy', '$city', '$province', '$zipcode', '$contact', '$username', '$email', '$password');";
									$result = mysqli_query($db_con,$query);
								if ($result) {
									move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo_name);
									header('Location: register.php?insert=sucess');
								}else{
									header('Location: register.php?insert=error');
								
						/*}else{
							$passlan="This password more than 8 charset";
						}
					}else{
						$usernamelan= 'This username more than 8 charset';
					}
				}else{
					$username_error="This username already exists!";
				}
			}else{
				$email_error= "This email already exists";
			}
			
		}
		
    }
} */

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "covid-19";

$con = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);



$query = "INSERT INTO `reservation` (`Firstname`, `Middlename`, `Lastname`, `Brgy`, `City`, `Province`, `Zipcode`, `Contact_Number`, `Username`, `Email`, `Password`) VALUES ('$fname', '$mname', '$lname', '$brgy', '$city', '$province', '$zipcode', '$contact', '$username', '$email', '$password')";
$result = mysqli_query($con,$query);
	}
                
            

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>REGISTER | Quarancheck</title>
  </head>
  <body>
    <div class="container"><br>
          <h1 class="text-center">Register!</h1><hr><br>
          <div class="d-flex justify-content-center">
          	<?php 
          		if (isset($_GET['insert'])) {
          			if($_GET['insert']=='sucess'){ echo '<div role="alert" aria-live="assertive" aria-atomic="true" align="center" class="toast alert alert-success fade hide" data-delay="2000">Your Data Inserted!</div>';}
          		}
          	;?>
          </div>
          
            <div class="col-md-8 offset-md-2">

				  <div class="form-group row">

				    <div class="col-sm-6">
				      <input type="text" class="form-control" value="<?= isset($fname)? $fname:'' ?>" name="fname" placeholder="First Name" id="inputEmail3"><?= isset($input_error['fname'])? '<label for="inputEmail3" class="error">'.$input_error['fname'].'</label>':'';  ?>
				    </div>

                    <div class="col-sm-6">
				      <input type="text" class="form-control" value="<?= isset($mname)? $mname:'' ?>" name="mname" placeholder="Middle Name" id="inputEmail3"><?= isset($input_error['mname'])? '<label for="inputEmail3" class="error">'.$input_error['mname'].'</label>':'';  ?>
				    </div>

                    <div class="col-sm-6">
				      <input type="text" class="form-control" value="<?= isset($lname)? $lname:'' ?>" name="lname" placeholder="Last Name" id="inputEmail3"><?= isset($input_error['lname'])? '<label for="inputEmail3" class="error">'.$input_error['lname'].'</label>':'';  ?>
				    </div>
					</div>

					<div class="col-sm-6">
				      <input type="text" class="form-control" value="<?= isset($brgy)? $brgy:'' ?>" name="brgy" placeholder="Barangay" id="inputEmail3"><?= isset($input_error['brgy'])? '<label for="inputEmail3" class="error">'.$input_error['brgy'].'</label>':'';  ?>
				    </div>

                    <div class="col-sm-6">
				      <input type="text" class="form-control" value="<?= isset($city)? $city:'' ?>" name="city" placeholder="City" id="inputEmail3"><?= isset($input_error['city'])? '<label for="inputEmail3" class="error">'.$input_error['city'].'</label>':'';  ?>
				    </div>

                    <div class="col-sm-6">
				      <input type="text" class="form-control" value="<?= isset($province)? $province:'' ?>" name="province" placeholder="Province" id="inputEmail3"><?= isset($input_error['province'])? '<label for="inputEmail3" class="error">'.$input_error['province'].'</label>':'';  ?>
				    </div>
					</div>

					<div class="col-sm-6">
				      <input type="number" class="form-control" value="<?= isset($zipcode)? $zipcode:'' ?>" name="zipcode" id="inputEmail3"><?= isset($input_error['zipcode'])? '<label class="error">'.$input_error['zipcode'].'</label>':'';  ?>
				    </div>
				  </div>
				  <div class="col-sm-6">
				      <input type="number" class="form-control" value="<?= isset($contact)? $contact:'' ?>" name="contact" id="inputEmail3"><?= isset($input_error['contact'])? '<label class="error">'.$input_error['contact'].'</label>':'';  ?>
				    </div>
				  </div>

				    <div class="col-sm-6">
				      <input type="email" class="form-control" value="<?= isset($email)? $email:'' ?>" name="email" placeholder="Email" id="inputEmail3"><?= isset($input_error['email'])? '<label class="error">'.$input_error['email'].'</label>':'';  ?>
				      <?= isset($email_error)? '<label class="error">'.$email_error.'</label>':'';  ?>
				    </div>
				  </div>

				  <div class="form-group row">
				  	<div class="col-sm-6">
				      <input type="text" name="username" value="<?= isset($username)? $username:'' ?>" class="form-control" id="inputPassword3" placeholder="Username"><?= isset($input_error['username'])? '<label class="error">'.$input_error['username'].'</label>':'';  ?><?= isset($username_error)? '<label class="error">'.$username_error.'</label>':'';  ?><?= isset($usernamelan)? '<label class="error">'.$usernamelan.'</label>':'';  ?>
				    </div>
				    
				     <div class="form-group row">
				    <div class="col-sm-6">
				      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password"><?= isset($input_error['password'])? '<label class="error">'.$input_error['password'].'</label>':'';  ?> <?= isset($passlan)? '<label class="error">'.$passlan.'</label>':'';  ?>  
				    </div>
				    <div class="col-sm-6">
				      <input type="password" name="c_password" class="form-control" id="inputPassword3" placeholder="Confirm Password"><?= isset($input_error['notmatch'])? '<label class="error">'.$input_error['notmatch'].'</label>':'';  ?> <?= isset($passlan)? '<label class="error">'.$passlan.'</label>':'';  ?>
				    </div>
				  </div>
				  <div class="text-center">
				      <button type="submit" name="register" class="btn btn-danger">Register!</button>
				    </div>
				  </div>
				</form>
            </div>
          </div>
             <center><p>If you have account, you can <a href="login.php">Login</a> your account!</p></center>
    </div> 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
    	$('.toast').toast('show')
    </script>
  </body>
</html>