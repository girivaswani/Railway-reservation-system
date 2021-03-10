
<?php
session_start();
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
if($_SERVER['REQUEST_METHOD']=='POST'){
    // echo "Inside post";
    $sql2 = "delete from train where train_number = ".$_POST['tno'];
    // echo $sql2;
    $result2=mysqli_query($con,$sql2);
    if($result2){
        // echo "Inside 2";
        $sql3="drop table if exists ".$_POST['tno']."seater_ac,".$_POST['tno']."seater_non_ac,".$_POST['tno']."sleeper_ac,".$_POST['tno']."sleeper_non_ac";
        $result3=mysqli_query($con,$sql3);
        if($result3){
            $sql4 = "delete from ticket where train_number = ".$_POST['tno'];
            $result4=mysqli_query($con,$sql4);
        }

    }
}

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

<?php  
 echo '<table class=" listtable table-light text-center table table-bordered table-hover mt-5" style="opacity: 0.9; width: 80%; margin: auto;">
 <tr>
     <th>Train No.</th>
     <th>From</th>
     <th>To</th>
     <th>Train Name</th>
     <th>Departure Time</th>
 </tr>';
      
     $sql = "SELECT TRAIN_NUMBER,SOURCE,TRAIN_NAME,DESTINATION,ARRIVAL_TIME FROM train ;";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($result)){
            $id1=$row["TRAIN_NUMBER"];
            echo '<tr>
            <td>'.$row["TRAIN_NUMBER"].'</td>
            <td>'.$row["SOURCE"].'</td>
            <td>'.$row["DESTINATION"].'</td>
            <td>'.$row["TRAIN_NAME"].'</td>
            <td>'.$row["ARRIVAL_TIME"].'</td>
        </tr>';

        $_SESSION['tnumber']=$row["TRAIN_NUMBER"];
        $_SESSION['source']=$row["SOURCE"];
        $_SESSION['dest']=$row["DESTINATION"];
        $_SESSION['a_time']=$row["ARRIVAL_TIME"];

    
    }
    
 
 
 echo'</table>';
 $sql1 = "SELECT TRAIN_NUMBER FROM train;";
 $result1=mysqli_query($con,$sql1);
 
 $con->close();

?>




<br>
<br>
<form method="POST" action="showtrain.php" style="text-align:center">
<label style="color:white">Choose the train number you want to cancel:</label>
<select id="tno" name="tno" style="width:10%" required>
    <?php while($row1=mysqli_fetch_array($result1)):; ?>
    <option value="<?php echo $row1[0]; ?>"> <?php echo $row1[0]; ?></option>
    <?php endwhile ?>

</select><br>
<button class="btn btn-success">Cancel</button>

</form>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>