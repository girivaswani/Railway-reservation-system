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
            </ul>
          </div>
        </nav>
        <?php
    if($_SERVER['REQUEST_METHOD']=="POST")
{
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $conn = mysqli_connect("localhost","root","root","railwayreservation");
    $sql = "SELECT username from customer where username = '$uname' ";
    $res = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($res);
    if($res){

    
    if($num>0){
        if($pass==$cpass){
            $sql = "UPDATE customer SET password = '$pass' WHERE username = '$uname' ";
            $res = mysqli_query($conn,$sql);
            if($res){
                   echo "<script>alert('Password updated.');window.location.href='login1.php'</script>";
            }else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>Something went wrong.Please try again.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }
            }
            else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failed!</strong> Password mismatch.Please try again.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';            }
    }
    else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong> Account not found.Please try again.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
}else{
    echo mysqli_connect_error($conn);
}
}
?>


        <form class="cont" style="opacity: 0.9;" action="forget.php" method="POST">
	  <div class="form-group">
	    <label class="text-light" for="UserEmail">User name</label>
	    <input type="text" class="form-control" id="UserEmail" name="uname" aria-describedby="emailHelp" required>
	  </div>
	  <div class="form-group">
	    <label class="text-light" for="UserPassword">New Password</label>
	    <input type="password" class="form-control" id="UserPassword" name="pass" required>
      </div>
      <div class="form-group">
	    <label class="text-light" for="UserCPassword">Confirm New Password</label>
	    <input type="password" class="form-control" id="UserCPassword" name="cpass" required>
	  </div>
	  <button type="submit" class="btn btn-success">Submit</button>
	  
	  	</form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
