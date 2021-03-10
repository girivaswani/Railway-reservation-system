<?php 

    $con = mysqli_connect('localhost','root','root');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
      }
    else{

    }


    mysqli_select_db($con,'railwayreservation');

    $q = " select DESTINATION from train" ;

    $query = mysqli_query($con,$q);
    $trains=array();

    if(mysqli_num_rows($query) > 0){
        while ($result = mysqli_fetch_array($query)){
            if(!(in_array($result['DESTINATION'],$trains))){
                $trains[]=$result['DESTINATION'];
            }
            
        } 
          
    }

    $q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($trains as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      }
      else {
        $hint .= "<br> $name";
      }
    }
  }
}

// Output "no train" if no hint was found or output correct values
echo $hint === "" ? "no trains" : $hint;

    mysqli_close($con);

?>