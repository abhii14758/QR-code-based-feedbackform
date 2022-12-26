<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "feedback";

$con = mysqli_connect($server, $username, $password, $database);

if(!$con)
{
    die("Database not connected due to ".mysqli_connect_error());
}

echo "Sucess connecting Database <br>";


$sql = "SELECT * FROM `feedback`";
$result = mysqli_query($con,$sql);

//Find the number of record in returned in database

$num =  mysqli_num_rows($result);
echo $num;
echo "<br>";

// create data object
$data = array();

for ($x = 0; $x < mysqli_num_rows($result); $x++) {
  $data[] = mysqli_fetch_assoc($result);
}

// encode data to json format
echo json_encode($data);

// // close connection
// mysqli_close($server);

//Display the rows returned by the sql query

// if($num>0){
//     // $row = mysqli_fetch_all($result);
//     // echo var_dump($row);
//     // echo "<br>";

//     // $row = mysqli_fetch_assoc($result);
//     // echo var_dump($row);
//     // echo "<br>";

//     while($row = mysqli_fetch_assoc($result)){
//         echo $row['No.']. "  " . $row['How did you come to the police station?'] . "  " . $row['After how much time you were heard in Police Station'] . "  " . $row['How would you describe your experience with police officer'] . "  " . $row['dt'];
//         echo "<br>";
//     }
// }

?>