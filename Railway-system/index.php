<!DOCTYPE html>
<html>
<head>
    <title> Railway Reservation System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
            integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" 
            crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
      
    };
    xmlhttp.open("GET", "source_cities.php?q=" + str, true);
    xmlhttp.send();
  }
}

function showHint1(str) {
  if (str.length == 0) {
    document.getElementById("txtHint1").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint1").innerHTML = this.responseText;
      }
      
    };
    xmlhttp.open("GET", "dest_cities.php?q=" + str, true);
    xmlhttp.send();
  }
}

</script>
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
        <marquee direction="left" scrollamount='10' class="text-light">Welcome to RAILWAY RESERVATION PORTAL</marquee>
        <h1 class="text-center" style="color: #bff5cd;">ONLINE RAIL RESERVATION</h1>
        <form method="post" action="listOfTrains.php">
            <div class="cont text-center" style="opacity:0.9;">
                <br><p class="text-light">FROM</p><input type="text" name='source' id="source" onkeyup="showHint(this.value)" required>
                <br><span id="txtHint" style="color: #bff5cd;"></span>
                <br><br><p class="text-light">TO</p><input type="text" name='dest' onkeyup="showHint1(this.value)" required>
                <br><span id="txtHint1" style="color: #bff5cd;"></span>


                <?php
                  $tom=date("d");
                  $tomm = date("Y-m")."-".$tom."";
                  echo "<br><br><p class='text-light'>DATE</p><input type='date' name='date' min='$tomm' required>";
                ?>
                <br><br><button class="btn btn-success" type="submit" name='search'>Search</button>
            </div>
        </form>


        

    <script src="index.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>    
</body>
</html>