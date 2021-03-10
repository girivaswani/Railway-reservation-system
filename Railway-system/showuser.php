
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
<?php  
 echo '<table class=" listtable table-light text-center table table-bordered table-hover mt-5" style="opacity: 0.9; width: 80%; margin: auto;">
 <tr>
     <th>Name</th>
     <th>Username</th>
     <th>GENDER</th>
     <th>AGE</th>
     <th>Email Id</th>
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

      
     $sql = "SELECT FIRST_NAME,AGE,GENDER,USERNAME,EMAIL_ID FROM customer ;";

        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_array($result)){
            // var_dump($row);
            
            echo '<tr>
            <td>'.$row["FIRST_NAME"].'</td>
            <td>'.$row["USERNAME"].'</td>
            <td>'.$row["GENDER"].'</td>
            <td>'.$row["AGE"].'</td>
            <td>'.$row["EMAIL_ID"].'</td>
        </tr>';

        
          }
    $con->close();
 
 
 echo'</table>'


?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>