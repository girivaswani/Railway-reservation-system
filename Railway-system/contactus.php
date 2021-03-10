<?php 

$server = "localhost";
$username = "root";
$password = "root";
$database = "railwayreservation";
// Create a database connection
$con = mysqli_connect($server, $username, $password, $database);

if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
}

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $NAME = $_POST['name'];
        $Email = $_POST['email'];
        $Message = $_POST['message'];
         $NULL = 'NULL';

        $sql = "INSERT INTO feedback VALUES($NULL,'$NAME','$Email','$Message');";
        if($con->query($sql)){
            echo "<script> alert('Feedback submitted successfully');window.location.href = 'index.php';</script>";
        }
      


   }

$con->close();

?>


<html>
    <head>
        <title>Railway Reservation System</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
                integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" 
                crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css" >
        <script src="jquery-3.5.1.min.js"></script>
        <script src="atrain.js"></script>
    </head>

    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            session_start();
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
        <div class='container'>
            <div class='form-main'>
                <div class='form-div'>
                    <form class='form1' method="post" action = 'contactus.php'>  
                        <p style="padding:8px;"  class="name">
                            <input name="name" type="text" class="form-control" required placeholder="Name" id="name" />
                        </p>
                        <p style="padding:8px;" class="email">
                            <input name="email" type="email" required class="feedback-input form-control" id="email" placeholder="Email" />
                        </p>
                        <p style="padding:8px;" class="text">
                            <textarea name="message" style = 'width: 100%; height: 150px;line-height: 150%;resize:vertical;' class="feedback-input form-control" id="comment" placeholder="Message"></textarea>
                        </p>
                        <div style="padding:8px;" class="submit">
                            <button type="submit" class="btn" style="background-color: #d5fab6;">SUBMIT</button>
                       
                        </div>
                    </form>    
                <div>
            <div>
        <div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    </body>
</html>    