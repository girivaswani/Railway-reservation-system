<!DOCTYPE html>
<html>
<head>
    <title>Railway Reservation System</title>        
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="index.js"></script>


</head>
<?php
$insert = false;
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "root";
    $database = "railwayreservation";
    // Create a database connection
    $con = mysqli_connect($server, $username, $password, $database);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";
    // //Collect post variables
    if($_SERVER['REQUEST_METHOD']=='POST'){
	$fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $gender = $_POST['gender'];
      $age = $_POST['age'];
      $email = $_POST['email'];
	  $pno = $_POST['pno'];
	  
      $dob = $_POST['dob'];
      $aadhar = $_POST['aadhar'];
      $pass = $_POST['pass'];
	  $uname = $_POST['uname'];
	  if($gender=="Select"){
		  echo "<script>alert('Please select Gender');</script>";
	  }

        $checksql = "SELECT username from customer where username = '$uname'";
        $ans = mysqli_query($con,$checksql);
        $num = mysqli_num_rows($ans);
        if($num>0){
	        echo"<script>
                                    alert ('Username already exist!');</script>";
                }
        else{
	  
			if($fname && $lname && $gender!="Select" && $age && $email && $pno && strlen($pno)==10 && $dob && $aadhar && strlen($aadhar)==12 && $pass && $uname){
		$sql = "INSERT INTO customer VALUES('$fname','$lname','$pno','$gender','$dob','$age','$email','$aadhar','$uname','$pass');";
			// Execute the query
		if($con->query($sql) == true){
			echo "<script>alert('You have successfully registered please login and continue');window.location.href = 'login1.php';</script>";

			// Flag for successful insertion
			$insert = true;
		}
		else{
			echo "ERROR: $sql <br> $con->error";
		}
		}
	}
	  }

     //Close the database connection
    $con->close();
?>
<body class="bgimg">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-link adv" href="login1.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link adv" href="aboutus.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link adv" href="contactus.php">Contact Us</a>
                </li>
            </ul>
          </div>
        </nav>
	<marquee direction="left" scrollamount='10' class="text-light">Welcome to RAILWAY RESERVATION PORTAL</marquee>
<h1 class="text-center" style="color: #bff5cd;">ONLINE RAIL RESERVATION</h1>
<form class="cont" style="opacity: 0.9; height: 41.5rem;" action="signup.php" method="post">


  <div class="form-group row">
    <label for="fname" class="col-sm-4 col-form-label text-light">First Name:</label>
    <div class="col-sm-8">
	<input type="text" class="form-control" id="fname" name="fname" required>    </div>
  </div>
  <div class="form-group row">
    <label for="lname" class="col-sm-4 col-form-label text-light">Last Name: </label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="lname" name="lname" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="pno" class="col-sm-4 col-form-label text-light">Phone No: </label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="pno" name="pno"required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label text-light">Gender:  </label>
    <div class="col-sm-8">
	<select name="gender" class="form-control" id="gender"required>
					<option value="Select" id="select">Select</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					<option value="Others">Others</option>
				</select>
    </div>
  </div>
  <div class="form-group row">
    <label for="dob" class="col-sm-4 col-form-label text-light">Date of Birth: </label>
    <div class="col-sm-8">
      <input type="Date" class="form-control" id="dob" name="dob"required>
    </div>
  </div>
  <div class="form-group row">
    <label for="age" class="col-sm-4 col-form-label text-light">Age: </label>
    <div class="col-sm-8">
      <input type="Number" class="form-control" id="age" name="age"required>
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-sm-4 col-form-label text-light">Email Id: </label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="email" name="email"required>
    </div>
  </div>
  <div class="form-group row">
    <label for="aadhar" class="col-sm-4 col-form-label text-light">Aadhar No: </label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="aadhar" name="aadhar"required>
    </div>
  </div>
  <div class="form-group row">
    <label for="username" class="col-sm-4 col-form-label text-light">Username:  </label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="username" name="uname"required>
    </div>
  </div>
  <div class="form-group row">
    <label for="pass" class="col-sm-4 col-form-label text-light">Password: </label>
    <div class="col-sm-8">
      <input type="Password" class="form-control" id="pass" name="pass"required>
    </div>
  </div>
  <div class="form-group row">
    <label for="cpass" class="col-sm-4 col-form-label text-light">Confirm Password: </label>
    <div class="col-sm-8">
      <input type="Password" class="form-control" id="cpass" name="cnfrmpass"required>
    </div>
  </div>
  <button class="btn btn-success" name="submit" type="submit" onclick="signup()">Create</button>

</form>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>