<!DOCTYPE html> 
<head> 
<meta charset="utf-8"> 
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
<marquee direction="left" scrollamount='10' class="text-light">Welcome to RAILWAY RESERVATION PORTAL</marquee>
<h1 class="text-center" style="color:white">About Us</h1>
<div class="cont" style="width:600px"> 
<p>
<ul style="color:white">
    <li>Users will be able to select source ,and destination along with departure date.</li>
    <li>Accordingly the list of trains will be displayed from which the user have select
      according to his preference.</li>
    <li>User can see available seats in ‘details’.</li>
    <li>If the seats
    are available the user will be able to book the seat and payment will be done
    accordingly.</li>
    <li>User can see ticket details in ‘my ticket’ option
    User have to log in to book the tickets.</li>
    <li>Though user can see available seats of
    the train without log in.</li>
    <li>To get login credentials user have to sign up through
    form.</li>
    </ul>
      </p>
 </div>
 <div class="text-center"><h5 style="color:orange">This is a mini-project done in group by Girish Vaswani
     , Chetan Urkude, Nishikant Patil of class D12B of VESIT college </h5></div>
 <div class="text-center"><img src="emoji1.jpg" alt="emoji" width="130px" height="130px"></div>


 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>
