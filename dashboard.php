<?php
$con = mysqli_connect("localhost","root","","feedback");
if(!$con){
    echo "Problem in database connection..." .mysqli_error();
}else{
    $sql = "SELECT * FROM feedback";
    $result = mysqli_query($con,$sql);
    $chart_data = "";
   
    while($row = mysqli_fetch_array($result)){
        $No[] = $row['No'];
        $Question1[] = $row['Question1'];
        $Question2[] = $row['Question2'];
        $Question3[] = $row['Question3'];
        $Question4[] = $row['Question4'];
        $dt = $row['dt'];
    }
}
$num = json_encode(end($No));
// $count=0;
// for ($i=0; $i <16 ; $i++){ 
//     # code...
//     if(json_encode($Question1[$i])=='"On your own"'){
//         $count++;
//     }
// }
// echo $count;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>
//     <script type="text/javascript">

//     function preventback(){window.history.forward()};
//     setTimeout("preventback()",0);
//     window.onload = function(){null};

//   </script>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-left">
          <span class="material-icons-outlined"></span>
        </div>
        <p >Admin Panel</p>
        <div>
          <!-- <button id="logout" onclick="location.href=/login?dis=yes">Log out</button> -->
          <!-- <input type="button" onclick=''> -->
          <!-- <a href="login.html" id="logout" onclick="self.close" >Log Out</a> -->
          <li onclick="logout()" id="logout"><a>Logout</a></li>
        </div>
        <!-- <div class="header-right">
          <span class="material-icons-outlined">notifications</span>
          <span class="material-icons-outlined">email</span>
          <span class="material-icons-outlined">account_circle</span>
        </div> -->
      </header>
      <!-- End Header -->

      <!-- Sidebar -->
      <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
            <span class="material-icons-outlined"></span> Gujarat Police
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>

        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <span class="material-icons-outlined">dashboard</span> Dashboard
          </li>
          <li class="sidebar-list-item">
            <span class="material-icons-outlined">question1</span> <a href='pie1.php' style="text-decoration: none;  color: #9799ab; ">Analysis Of Qestion1</a> 
          </li>
          <li class="sidebar-list-item">
          <span class="material-icons-outlined">question1</span> <a href='pie2.php' style="text-decoration: none; color: #9799ab;">Analysis Of Qestion2</a>
          </li>
          <li class="sidebar-list-item"> 
          <span class="material-icons-outlined">question1</span> <a href='pie3.php'style="text-decoration: none; color: #9799ab;">Analysis Of Qestion3</a>
          </li>
          <li class="sidebar-list-item">
          <span class="material-icons-outlined">question1</span> <a href='pie4.php'style="text-decoration: none; color: #9799ab;">Analysis Of Qestion4</a>
          </li>
          <!-- <li class="sidebar-list-item">
          <span class="material-icons-outlined">question1</span> <a href='pie1.php'>Analysis Of Qestion1</a>
          </li> -->
          <!-- <li class="sidebar-list-item">
            <span class="material-icons-outlined">settings</span> Settings
          </li> -->
        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">DASHBOARD</p>
        </div>

        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">Total No Of Feedback</p>
              <span class="material-icons-outlined text-blue">inventory_2</span>
            </div>
            <span class="text-primary font-weight-bold"><?php
            echo json_decode($num);?></span>
          </div>
<!-- 
          <div class="card">
            <div class="card-inner">
              <p class="text-primary">responses</p>
              <span class="material-icons-outlined text-orange">Responses</span>
            </div>
            <span class="text-primary font-weight-bold">
            <?php
            echo ($response);?>
            </span>
          </div> -->

          <!-- <div class="card">
            <div class="card-inner">
              <p class="text-primary">SALES ORDERS</p>
              <span class="material-icons-outlined text-green">shopping_cart</span>
            </div>
            <span class="text-primary font-weight-bold">79</span>
          </div>

          <div class="card">
            <div class="card-inner">
              <p class="text-primary">INVENTORY ALERTS</p>
              <span class="material-icons-outlined text-red">notification_important</span>
            </div>
            <span class="text-primary font-weight-bold">56</span>
          </div>

        </div>

        <div class="charts">

          <div class="charts-card">
            <p class="chart-title">Top 5 Products</p>
            <div id="bar-chart"></div>
          </div>

          <div class="charts-card">
            <p class="chart-title">Purchase and Sales Orders</p>
            <div id="area-chart"></div>
          </div>

        </div> -->
      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="scripts.js"></script>
    <script>

      function logout(){
          sessionStorage.clear();
          location.href = "login.html";
      }

  </script>

  </body>
</html>



