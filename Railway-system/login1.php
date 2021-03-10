<!DOCTYPE html> 
<head> 
<meta charset="utf-8"> 
<title> Railway Reservation System</title> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="index.js"> </script>

</head> 

<body class="bgimg">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-link adv" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link adv" href="aboutus.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link adv" href="contactus.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link adv" href="adminlogin.php" id="Admin">Admin Login</a>
                </li>
            </ul>
          </div>
        </nav>
<div>

<?php
  $username='root';
  $password='root';
  $server='localhost';
  $database = "railwayreservation";
  $con = mysqli_connect($server, $username, $password, $database);

  // Check for connection success
  if(!$con){
      die("connection to this database failed due to" . mysqli_connect_error());
  }
  else{   
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $uname=$_POST['username'];
      $pass=$_POST['pass'];
      $sql="Select FIRST_NAME,PASSWORD from customer where username = '$uname'";
      $result=mysqli_query($con,$sql);
      $rpass="";
      while($row=mysqli_fetch_array($result)){
        $rpass=$row['PASSWORD'];
        $fname=$row['FIRST_NAME'];
      }
        if($rpass==$pass){
          session_start();
          $_SESSION['fname']=$fname;
          $_SESSION['uname']=$uname;
          echo "<script>
        window.location.href = 'index.php';
        </script>";
        }
        else{
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failed!</strong> Username or Password is incorrect.Please try again.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
        }
    }
  }
?>

	<marquee direction="left" scrollamount='10' class="text-light">Welcome to RAILWAY RESERVATION PORTAL</marquee>
    <h1 class="text-center" style="color: #bff5cd;">ONLINE RAIL RESERVATION</h1>
	
	<form class="cont1" style="opacity: 0.9;" action="login1.php" method="POST">
	  <div class="form-group">
	    <label class="text-light" for="UserEmail">User name</label>
	    <input type="text" class="form-control" id="UserEmail" name="username" aria-describedby="emailHelp" required>
	  </div>
	  <div class="form-group">
	    <label class="text-light" for="UserPassword">Password</label>
	    <input type="password" class="form-control" id="UserPassword" name="pass" required>
	  </div>
	  <a class="text-light" href="forget.php">Forgot password</a><br>
	  <a class="text-light" href="signup.php">Register</a><br><br>
	  <button type="submit" class="btn btn-success" onclick="UserLogin()">Login</button>
	  <p id="para"></p>
	  	</form>	
</div> 

</section><!-- content --> 
</div><!-- container --> 



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>
