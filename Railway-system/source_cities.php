<?php 

    $con = mysqli_connect('localhost','root','root');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
      }
    else{

    }


    mysqli_select_db($con,'railwayreservation');

    $q = " select SOURCE from train" ;

    $query = mysqli_query($con,$q);
    $trains=array();

    if(mysqli_num_rows($query) > 0){
        while ($result = mysqli_fetch_array($query)){
            if(!(in_array($result['SOURCE'],$trains))){
                $trains[]=$result['SOURCE'];
            }
            
        }       
    }

    $q = $_REQUEST["q"];

$hint = "";

if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($trains as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= "<br> $name";
      }
    }
  }
}

echo $hint === "" ? "no trains" : $hint;

    mysqli_close($con);

?>