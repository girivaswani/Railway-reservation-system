<?php 
session_start();

?>

<?php
$t_number=$_SESSION["tnumber"];
$uname=$_SESSION["uname"];
$source=$_SESSION['source'];
$dest=$_SESSION['dest'];
$a_time=$_SESSION['a_time'];
$seattable=$_SESSION['seattable'];

$seat_type=$_SESSION['seat_type'];
$ac_type=$_SESSION['ac_type'];
$totalprice=$_SESSION['totalprice'];
$seats=$_SESSION['seats'];
$totalseats=$_SESSION['totalseats'];

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
    $tno=$_SESSION['tnumber'];
    $sql1="INSERT INTO `ticket` (`NAME`, `SOURCE`, `DESTINATION`, `ARRIVAL_TIME`, `PASSENGERS`, `SEAT_NO`, `AC_TYPE`, `SEAT_TYPE`, `PRICE`,`TRAIN_NUMBER`) VALUES ('".$uname."','".$source."','".$dest."','".$a_time."','".$seats."','".$totalseats."','".$ac_type."','".$seat_type."','".$totalprice."','".$tno."')";
    // echo $sql1;
            $result=mysqli_query($con,$sql1);
    
    if($result){
        // echo "Iserted<br>";
        $sql2='DELETE FROM '.$seattable.' limit '.$seats;
        // echo $sql2;
        $result=mysqli_query($con,$sql2);
        if($result){
            // echo "<br>Deleted";
            echo "<script> alert('Payment Successfull');window.location.href = 'index.php';</script>";
        }
    }
    else{
        echo mysqli_error($con);
    }
}
?>