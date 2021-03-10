<?php 
session_start();
?>

<!DOCTYPE html> 
<head> 
<meta charset="utf-8"> 
<title>Railway Reservation System</title> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
    <div>
    <table class= "listtable text-center table table-bordered" style="width:50% ;height:80%;margin : 100px auto auto auto;background-color: #d5fab6;">
        <tr>
        <th><h1>Seat Type</h1></th>
        <th><h1>Available Seats</h1></th>
        <th><h1>Price</h1></th>
        </tr>
        <tr>
            <td><h3>Seater AC</h3></td>
            <td><h3 id = 'Seat1'></h3></td>
            <td><h3 id = 'Price1'></h3></td>
        </tr>
        <tr>    
            <td><h3>Seater NON-AC</h3></td>
            <td><h3 id = 'Seat2'></h3></td>
            <td><h3 id = 'Price2'></h3></td>
        </tr>
        <tr>
            <td><h3>Sleeper AC</h3></td>
            <td><h3 id = 'Seat3'></h3></td>
            <td><h3 id = 'Price3'></h3></td>
        </tr>    
        <tr>
            <td><h3>Sleeper NON-AC</h3></td>
            <td><h3 id = 'Seat4'></h3></td>
            <td><h3 id = 'Price4'></h3></td>
        </tr>

        

        </table>
        <?php   
        $book="login1.php";
        if(isset($_SESSION['fname'])){
            $book="reservation.php";
        }
        echo '<form action="'.$book.'" class="text-center my-5" ><button class="btn btn-lg center" style="background-color: #d5fab6;"> Book </button></form>';
        
        
        ?>
            
        
    </div>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $con = mysqli_connect('localhost','root','root');
    if (!$con ){
        die("Could not connect: ". mysqli_error($con));
    }
    mysqli_select_db($con,'railwayreservation');

  // collect value of input field
  $tno = $_POST['tno'];
  if (empty($tno)) {
    echo " empty";
  } else {
    // echo $tno."Train number is selected";
    $_SESSION['tnumber']=$tno;
    $sql = "select arrival_time from train where train_number='$tno';";
    $result1=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result1);
    // var_dump($row);
    $_SESSION['a_time']=$row["arrival_time"];
 
  }
}
?>




        <script>    

            function setSeats(){
                var _DEFAULT_SIZE = 0
            
                <?php
                
                $con = mysqli_connect('localhost','root','root');
                if (!$con ){
                    die("Could not connect: ". mysqli_error($con));
                }
                mysqli_select_db($con,'railwayreservation');

                //select train no from session
                $q = " select count(*) from ".$_SESSION['tnumber']."sleeper_ac;";
                $query = mysqli_query($con,$q);

                if(mysqli_num_rows($query) > 0){
                    while ($result = mysqli_fetch_array($query)){
                        //echo  var_dump($result) ;
                        echo "var seats_avlb_type3 =".$result['count(*)'];}} 
                echo "\n";
                $q1 = "select price from ".$_SESSION['tnumber']."sleeper_ac;";
                $query1=mysqli_query($con,$q1);
                if(mysqli_num_rows($query1) > 0){
                    $result1 = mysqli_fetch_array($query1);
                        //echo  var_dump($result) ;
                        echo "var price_type3 =".$result1['price'];}
                        
                ?>
                        
                <?php                  
                      $q = " select count(*) from ".$_SESSION['tnumber']."sleeper_non_ac;";
                    //   echo $q;
                      $query = mysqli_query($con,$q);
                    //   var_dump($query);

      
                      if(mysqli_num_rows($query) > 0){
                          while ($result = mysqli_fetch_array($query)){
                              //echo  var_dump($result) ;
                              echo "var seats_avlb_type4 =".$result['count(*)'];}}
                    //   echo "var seats_avlb_type4 =" .$_SESSION['tnumber']."sleeper_non_ac";

                    echo "\n";
                    $q1 = "select price from ".$_SESSION['tnumber']."sleeper_non_ac;";
                $query1=mysqli_query($con,$q1);
                if(mysqli_num_rows($query1) > 0){
                    $result1 = mysqli_fetch_array($query1);
                        //echo  var_dump($result) ;
                        echo "var price_type4 =".$result1['price'];}
                

                         ?>

                <?php  

                $q = " select count(*) from ".$_SESSION['tnumber']."seater_ac;";
                      $query = mysqli_query($con,$q);
      
                      if(mysqli_num_rows($query) > 0){
                          while ($result = mysqli_fetch_array($query)){
                              //echo  var_dump($result) ;
                              echo "var seats_avlb_type1 =".$result['count(*)'];}}
                        //  echo " var seats_avlb_type1 =" .$_SESSION['tnumber']."seater_ac";
                        echo "\n";
                        $q1 = "select price from ".$_SESSION['tnumber']."seater_ac;";
                $query1=mysqli_query($con,$q1);
                if(mysqli_num_rows($query1) > 0){
                    $result1 = mysqli_fetch_array($query1);
                        //echo  var_dump($result) ;
                        echo "var price_type1 =".$result1['price'];}
                

                         ?>

                <?php  
                
                $q = " select count(*) from ".$_SESSION['tnumber']."seater_non_ac;";
                      $query = mysqli_query($con,$q);
      
                      if(mysqli_num_rows($query) > 0){
                          while ($result = mysqli_fetch_array($query)){
                              //echo  var_dump($result) ;
                              echo "var seats_avlb_type2 =".$result['count(*)'];}}
                        //  echo "var seats_avlb_type2 =".$_SESSION['tnumber']."seater_non_ac";
                        echo "\n";
                        $q1 = "select price from ".$_SESSION['tnumber']."seater_non_ac;";
                $query1=mysqli_query($con,$q1);
                if(mysqli_num_rows($query1) > 0){
                    $result1 = mysqli_fetch_array($query1);
                        //echo  var_dump($result) ;
                        echo "var price_type2 =".$result1['price'];}
                

                         ?>

                         
                         
                
                if ( seats_avlb_type1 == 0) {
                    seats_avlb_type1 = 'Not Available'
                }
                if ( seats_avlb_type2 == 0 ) {
                        seats_avlb_type2 =  'Not Available'
                    }
                if (seats_avlb_type3 == 0) 
                    {
                    seats_avlb_type3 = 'Not Available'
                    }
                if ( seats_avlb_type4 == 0 )
                    {
                    seats_avlb_type4 = 'Not Available' 
                    }


                
                if ( price_type1 == 0) {
                    seats_avlb_type1 = 'Not Available'
                }
                if ( price_type2 == 0 ) {
                        seats_avlb_type2 =  'Not Available'
                    }
                if (price_type3 == 0) 
                    {
                        price_type3 = 'Not Available'
                    }
                if ( price_type4 == 0 )
                    {
                        price_type4 = 'Not Available' 
                    }
                
                document.getElementById('Seat1').innerHTML = seats_avlb_type1
                document.getElementById('Seat2').innerHTML = seats_avlb_type2
                document.getElementById('Seat3').innerHTML = seats_avlb_type3
                document.getElementById('Seat4').innerHTML = seats_avlb_type4
                
                
                
                
                document.getElementById('Price1').innerHTML = price_type1
                document.getElementById('Price2').innerHTML = price_type2
                document.getElementById('Price3').innerHTML = price_type3
                document.getElementById('Price4').innerHTML = price_type4



            }

            setSeats()


        
        </script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>



