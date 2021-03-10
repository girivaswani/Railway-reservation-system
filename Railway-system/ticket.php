<?php  
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Railway Reservation System</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body class="bgimg">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            if(isset($_SESSION['fname'])){ 

            echo '<ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link adv">Welcome '.$_SESSION["fname"].'!</a>
                </li>
            </ul>';
            }
            
            ?>
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
                <?php
                
                if(isset($_SESSION['fname'])){ 


                echo '<li class="nav-item">
                        <a class="nav-link adv" href="logout.php" >Logout</a>
                    </li>';
            }
            else{
              echo '<li class="nav-item">
                        <a class="nav-link adv" href="login1.php">Login</a>
                    </li>';
            }
            
            ?>
            </ul>
          </div>
        </nav>
<marquee direction="left" scrollamount='10' class="text-light">Welcome to RAILWAY RESERVATION PORTAL</marquee>
<h1 class="text-center" style="color: #bff5cd;">ONLINE RAIL RESERVATION</h1>
<?php  
 echo '<table class=" listtable table-light text-center table table-bordered table-hover mt-5" style="opacity: 0.9; width: 80%; margin: auto;">
 <tr>
     <th>Ticket No.</th>
     <th>Train Number</th>
     <th>Name</th>
     <th>From</th>
     <th>To</th>
     <th>Departure Time</th>
     <th>No of Passengers</th>
     <th>Seat No</th>
     <th>Sleeper/Seater</th>
     <th>Ac/Non-Ac</th>
     <th>Price</th>
     
 </tr>';
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
    $uname=$_SESSION['uname'];
     $sql = "SELECT * FROM ticket WHERE name= '".$uname."';";
        $result=mysqli_query($con,$sql);
        if (mysqli_num_rows($result)== 0){
            
            echo ' <tr><td colspan="11"><span style="color:red;";>NO    TICKETS BOOKED    </span></td></tr>  ';
            
        }else{
        while($row=mysqli_fetch_array($result)){
            // var_dump($row);
            echo '<tr>
            <td>'.$row["TICKET_NO"].'</td>
            <td>'.$row["TRAIN_NUMBER"].'</td>
            <td>'.$row["NAME"].'</td>
            <td>'.$row["SOURCE"].'</td>
            <td>'.$row["DESTINATION"].'</td>
            <td>'.$row["ARRIVAL_TIME"].'</td>
            <td>'.$row["PASSENGERS"].'</td>
            <td>'.$row["SEAT_NO"].'</td>
            <td>'.$row["SEAT_TYPE"].'</td>
            <td>'.$row["AC_TYPE"].'</td>
            <td>'.$row["PRICE"].'</td>
            
        </tr>';


          }
        }
    
    $con->close();
 
 
 echo'</table>'
        

?>

<script src="index.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>