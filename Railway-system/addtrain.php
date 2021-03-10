<!DOCTYPE html>
<head>
    <title>Railway Reservation System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css" >
    <script src="jquery-3.5.1.min.js"></script>
    <script src="atrain.js"></script>

</head>
<body >

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
    // //Collect post variables
    if($_SERVER['REQUEST_METHOD']=='POST'){
	$SOURCE = $_POST['SOURCE'];
      $DESTINATION = $_POST['DESTINATION'];
      $TRAIN_NAME = $_POST['TRAIN_NAME'];
      $TRAIN_NUMBER = $_POST['TRAIN_NUMBER'];
      $ARRIVAL_TIME = $_POST['ARRIVAL_TIME'];
      $DESTINATION_TIME = $_POST['DESTINATION_TIME'];
      $SEATER_AC = $_POST['SEATER_AC'];
      $SEATER_AC_PRICE = $_POST['SEATER_AC_PRICE'];
      $SEATER_NON_AC = $_POST['SEATER_NON_AC'];
      $SEATER_NON_AC_PRICE = $_POST['SEATER_NON_AC_PRICE'];
      $SLEEPER_AC = $_POST['SLEEPER_AC'];
      $SLEEPER_AC_PRICE = $_POST['SLEEPER_AC_PRICE'];
      $SLEEPER_NON_AC = $_POST['SLEEPER_NON_AC'];
      $SLEEPER_NON_AC_PRICE = $_POST['SLEEPER_NON_AC_PRICE'];
      $window= "Window";
      $normal="Normal";
      $upper="Upper";
      $middle="Middle";
      $lower="Lower";
      $sta=$TRAIN_NUMBER."seater_ac";
      $stn=$TRAIN_NUMBER."seater_non_ac";
      $sla=$TRAIN_NUMBER."sleeper_ac";
      $sln=$TRAIN_NUMBER."sleeper_non_ac";

     $sql = "INSERT INTO train VALUES('$SOURCE','$DESTINATION','$TRAIN_NAME','$TRAIN_NUMBER','$ARRIVAL_TIME','$DESTINATION_TIME');";
        // Execute the query
        $con->query($sql);


        $sql2 = "CREATE TABLE $sta(
            SEAT_NO INT(3) PRIMARY KEY,
            PRICE INT(4),
            SIDE_TYPE VARCHAR(15) NOT NULL
            )";
        mysqli_query($con, $sql2);

        $sql3 = "CREATE TABLE $stn(
            SEAT_NO INT(3) PRIMARY KEY,
            PRICE INT(4),
            SIDE_TYPE VARCHAR(15) NOT NULL
            )";
        mysqli_query($con, $sql3);

        $sql4 = "CREATE TABLE $sla(
            SEAT_NO INT(3) PRIMARY KEY,
            PRICE INT(4),
            BERTH_TYPE VARCHAR(15) NOT NULL
            )";
        mysqli_query($con, $sql4);

        $sql5 = "CREATE TABLE $sln(
            SEAT_NO INT(3) PRIMARY KEY,
            PRICE INT(4),
            BERTH_TYPE VARCHAR(15) NOT NULL
            )";
        mysqli_query($con, $sql5);
        
        for($i=1;$i<=$SEATER_AC;$i++){
            if($i==1){
              $sql1 ="INSERT INTO $sta VALUES('".$i."','".$SEATER_AC_PRICE."','".$window."');";
             
            }
            elseif($i%3==1){
              $sql1="INSERT INTO $sta VALUES('".$i."','".$SEATER_AC_PRICE."','".$window."');";
            
            }
            else{
              $sql1="INSERT INTO $sta VALUES('".$i."','".$SEATER_AC_PRICE."','".$normal."');";
    
            }
            mysqli_query($con, $sql1);
        }
        //mysqli_multi_query($con,$sql1);
        
        for($i=1;$i<=$SEATER_NON_AC;$i++){
            if($i==1){
              $sql6 ="INSERT INTO $stn VALUES('".$i."','".$SEATER_NON_AC_PRICE."','".$window."');";
             
            }
            elseif($i%3==1){
              $sql6 ="INSERT INTO $stn VALUES('".$i."','".$SEATER_NON_AC_PRICE."','".$window."');";
            
            }
            else{
              $sql6 ="INSERT INTO $stn VALUES('".$i."','".$SEATER_NON_AC_PRICE."','".$normal."');";
    
            }
            mysqli_query($con, $sql6);
        }
        //mysqli_multi_query($con,$sql6);
        for($i=1;$i<=$SLEEPER_AC;$i++){
            if($i==1){
              $sql7 ="INSERT INTO $sla VALUES('".$i."','".$SLEEPER_AC_PRICE."','".$upper."');";
             
            }
            elseif($i%3==1){
              $sql7 ="INSERT INTO $sla VALUES('".$i."','".$SLEEPER_AC_PRICE."','".$upper."');";
            
            }
            elseif ($i%3==2) {
                $sql7 ="INSERT INTO $sla VALUES('".$i."','".$SLEEPER_AC_PRICE."','".$middle."');";
            }
            else{
              $sql7 ="INSERT INTO $sla VALUES('".$i."','".$SLEEPER_AC_PRICE."','".$lower."');";
    
            }
            mysqli_query($con, $sql7);
        }
       // mysqli_multi_query($con,$sql7);

        for($i=1;$i<=$SLEEPER_NON_AC;$i++){
            if($i==1){
              $sql8 ="INSERT INTO $sln VALUES('".$i."','".$SLEEPER_NON_AC_PRICE."','".$upper."');";
             
            }
            elseif($i%3==1){
              $sql8 ="INSERT INTO $sln VALUES('".$i."','".$SLEEPER_NON_AC_PRICE."','".$upper."');";
            
            }
            elseif ($i%3==2) {
                $sql8 ="INSERT INTO $sln VALUES('".$i."','".$SLEEPER_NON_AC_PRICE."','".$middle."');";
            }
            else{
              $sql8 ="INSERT INTO $sln VALUES('".$i."','".$SLEEPER_NON_AC_PRICE."','".$lower."');";
    
            }
            mysqli_query($con, $sql8);
        }
        // mysqli_multi_query($con,$sql8);
        // Execute the query
    

    //  if( == true){
        echo "<script>window.location.href = 'admin.php';</script>";
    $con->close();
    
    }
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            session_start();
            if(isset($_SESSION['adminfname'])){ 

            echo '<ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link adv">Welcome '.$_SESSION["adminfname"].'!</a>
                </li>
            </ul>';
            }
            
            ?>
            <ul class="navbar-nav ml-auto">
                <?php
                
                if(isset($_SESSION['adminfname'])){ 

                echo '<li class="nav-item">
                        <a class="nav-link adv" href="logout.php" >Logout</a>
                    </li>';
            }
            else{
              echo '<li class="nav-item">
                        <a class="nav-link adv" href="adminlogin.php">Login</a>
                    </li>';
            }
            
            ?>
            </ul>
          </div>
        </nav>
    <h1 class="text-center" style="color: #bff5cd;">ONLINE RAIL RESERVATION (Admin)</h1>
    <form class="cont" style="opacity: 0.9; height: 41.5rem;" action="addtrain.php" method="POST">





    <div class="form-group row">
    <label for="fname" class="col-sm-4 col-form-label text-light">SOURCE:</label>
    <div class="col-sm-8">
	<input type="text" class="form-control" id="source" name="SOURCE" required>    </div>
  </div>
  <div class="form-group row">
    <label for="lname" class="col-sm-4 col-form-label text-light">Destination: </label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="dest" name="DESTINATION" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="pno" class="col-sm-4 col-form-label text-light">Train Name: </label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="tname" name="TRAIN_NAME"required>
    </div>
  </div>
  <div class="form-group row">
    <label for="tno" class="col-sm-4 col-form-label text-light">Train Number:  </label>
    <div class="col-sm-8">
	<input type="number" placeholder="e.g 11221" class="form-control" id="tno" name="TRAIN_NUMBER"required>
    </div>
  </div>
  <div class="form-group row">
    <label for="dob" class="col-sm-4 col-form-label text-light">Arrival Time: </label>
    <div class="col-sm-8">

    <?php
        $tom=date("d");
        $tomm = date("Y-m")."-".$tom."T00:00";
        echo "<input type='datetime-local' class='form-control' name='ARRIVAL_TIME' min='$tomm' id='dtime' required >";
    ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="age" class="col-sm-4 col-form-label text-light">Destination Time: </label>
    <div class="col-sm-8">

    <?php
        $tom=date("d");
        $tomm = date("Y-m")."-".$tom."T00:00";
        echo "<input type='datetime-local' class='form-control' name='DESTINATION_TIME' min='$tomm' id='dtime' required >";
    ?>    
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-sm-4 col-form-label text-light">No. of AC Seats : </label>
    <div class="col-sm-8">
      <input type="number" class="form-control" id="seaterac" name="SEATER_AC"required>
    </div>
  </div>
  <div class="form-group row" id="sacrow" style="display: none;">
    <label for="aadhar" class="col-sm-4 col-form-label text-light">Seater AC Price: </label>
    <div class="col-sm-8">
      <input type="number" class="form-control" id="seateracprice" name="SEATER_AC_PRICE"required>
    </div>
  </div>
  <div class="form-group row">
    <label for="seaternonac" class="col-sm-4 col-form-label text-light">No. of Non-AC Seats :  </label>
    <div class="col-sm-8">
      <input type="number" class="form-control" id="seaternonac" name="SEATER_NON_AC"required>
    </div>
  </div>
  <div class="form-group row" id="snonacrow" style="display: none;">
    <label for="seaternonacprice" class="col-sm-4 col-form-label text-light">Seater Non-AC Price: </label>
    <div class="col-sm-8">
      <input type="number" class="form-control" id="seaternonacprice" name="SEATER_NON_AC_PRICE"required>
    </div>
  </div>
  <div class="form-group row">
    <label for="sleeperac" class="col-sm-4 col-form-label text-light">No. of Sleeper AC Seats: </label>
    <div class="col-sm-8">
      <input type="number" class="form-control" id="sleeperac" name="SLEEPER_AC"required>
    </div>
  </div>
  <div class="form-group row" id="slacrow" style="display: none;">
    <label for="aadhar" class="col-sm-4 col-form-label text-light">Sleeper AC Price: </label>
    <div class="col-sm-8">
      <input type="number" class="form-control" id="sleeperacprice" name="SLEEPER_AC_PRICE"required>
    </div>
  </div>
  <div class="form-group row">
    <label for="sleepernonac" class="col-sm-4 col-form-label text-light">No. of Sleeper Non-AC Seats:  </label>
    <div class="col-sm-8">
      <input type="number" class="form-control" id="sleepernonac" name="SLEEPER_NON_AC"required>
    </div>
  </div>
  <div class="form-group row" id="slnonacrow" style="display: none;">
    <label for="seaternonacprice" class="col-sm-4 col-form-label text-light">Sleeper Non-AC Price: </label>
    <div class="col-sm-8">
      <input type="number" class="form-control" id="sleepernonacprice" name="SLEEPER_NON_AC_PRICE"required>
    </div>
  </div> 
  <button type="submit" class="btn btn-success" id="add">ADD</button>
        </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
    