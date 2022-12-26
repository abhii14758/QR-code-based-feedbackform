<?php
 $con = mysqli_connect('localhost','root','','feedback');
?>
<!DOCTYPE HTML>
<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
 <meta charset="utf-8">
 <title>
 Analysis
 </title>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {

 var data = google.visualization.arrayToDataTable([
 ['Browser', 'Visits'],
 <?php 
 $query = "SELECT count(Question2) AS count, Question1 FROM feedback GROUP BY Question1";

 $exec = mysqli_query($con,$query);
 while($row = mysqli_fetch_array($exec)){

 echo "['".$row['Question1']."',".$row['count']."],";
 }
 ?>
 ]);

 var options = {
 title: 'Browser wise visits'
 };

 var chart = new google.visualization.PieChart(document.getElementById('piechart'));

 chart.draw(data, options);
 }
 </script>
</head>
<style>
    *{
        /* margin: 6vh;
        padding: 6vh; */
        background-color: wheat;
    }
    body{
        margin: 6vh;
        padding: 6vh;
    }
    h3{
      text-align: center;  
      font-size: 40px;
      font-family: 'Lato', sans-serif;
    }
    #piechart{
        margin: 10px 200px;
        padding: 10px 20px;
        /* border-radius: 10px; */
    }
</style>
<body>
 <h3>How did you come to the police station?</h3>
 <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>
</html>