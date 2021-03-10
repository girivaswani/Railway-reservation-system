<?php 
session_start();

?>

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
                        <a href="ticket.php" class="nav-link adv">My Ticket</a>
                    </li>';

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
<form method="POST" action="cnfrmpayment.php">
<?php
$t_number=$_SESSION["tnumber"];
$uname=$_SESSION["uname"];
$source=$_SESSION['source'];
$dest=$_SESSION['dest'];
$a_time=$_SESSION['a_time'];

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
    $ac_type=$_POST['ac_type'];
    $seat_type1=$_POST['seat_type'];
    if($seat_type1=="SL"){
        $seat_type="sleeper";
    }
    else{
        $seat_type="seater";
    }

    if($ac_type=="AC"){
        $ac_type="ac";
    }
    else{
        $ac_type="non_ac";
    }

    $seats=$_POST['total_seats'];
    $seattable=$t_number.$seat_type."_".$ac_type;
    $sql="SELECT seat_no,price from $seattable LIMIT $seats ";
    $result=mysqli_query($con,$sql);
    $totalseats;
    $price;
    $row=mysqli_fetch_array($result);
    $totalseats=$row['seat_no'].",";
    $price=$row['price'];
    $totalprice=$price*$seats;
        while($row=mysqli_fetch_array($result)){
            $totalseats.=$row['seat_no'].",";
        }
    
    $_SESSION['seat_type']=$seat_type;
    $_SESSION['ac_type']=$ac_type;
    $_SESSION['totalprice']=$totalprice;
    $_SESSION['seats']=$seats;
    $_SESSION['totalseats']=$totalseats;
    $_SESSION['seattable']=$seattable;
    
    

    echo '<div class="card text-center" style="width: 18rem; margin:13rem auto;">
    <div class="card-body">
      <h4 class="card-title">Confirm Payment</h4>
      <p class="card-text">Seat Type : '.$seat_type.'</p>
      <p class="card-text">AC/Non AC : '.$ac_type.'</p>
      <p class="card-text">Price : '.$totalprice.'</p>
      <button class="btn btn-dark">Confirm</button>
    </div>
  </div>';
    }
    else{
        echo "false";
    }

}
?>
</form>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>