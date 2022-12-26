<?php
$insert = false;
if(isset($_POST['Question-1'])){

    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "feedback";

    $con = mysqli_connect($server, $username, $password, $dbname);

    if(!$con)
    {
        die("Database not connected due to ".mysqli_connect_error());
    }

    //echo "Sucess connecting Database";

    $Station = $_POST['Station'];
    $question_1 = $_POST['Question-1'];
    $question_2 = $_POST['Question-2'];
    $question_3 = $_POST['Question-3'];
    $question_4 = $_POST['Question-4'];

    $sql = "INSERT INTO `feedback`. `feedback` (`Station`,`Question1`, `Question2`, `Question3`, `Question4`, `dt`) VALUES ('$Station','$question_1', '$question_2', '$question_3','$question_4', current_timestamp());";


    if($con->query($sql)== true){
        //echo "Sucessfully inserted";
    }
    else{
        echo "Error: $sql </br> $con->error ";
    }

    $con->close();
    // header("Location: pop.html");
    echo '<script>window.location="pop.html"</script>';
}
?>

