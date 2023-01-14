<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <script  type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <title>Fitness Expert Gym</title>
</head>
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background: linear-gradient(135deg,#74b9ff,black,#74b9ff);
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: white;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: black;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  color:black;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background: linear-gradient(135deg,black,#74b9ff);
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  
  color:black
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}
 #Dashboard{
    padding: 50px 0px;

  }
  .Dashboard-info{
    text-align: center;
  }
   .Dashboard-info h1{
    font-size: 50px;
  }
  .
  .Dashboard-info p{
   font-size: 25px;
   font-weight: bold; 
  }
  .Dashboard-row{
    display: grid;
    grid-template-columns: repeat(3, 200px);
    grid-auto-rows: minmax(150px,auto);
    grid-gap: 3em;
    justify-content: center;
    padding-top: 20px;
    padding-left: 120px;
  }
  .Dashboard-box{
   box-shadow: 2px 3px 5px grey;
   padding: 10px;
   text-align: center;
   background-color:dimgray;

  }

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="admin_home.php">Dashboard</a>
  <a href="member_for_admin.php">Member</a>
  <a href="trainer_for_admin.php">Trainer</a>
  <a href="index.html">Logout</a>
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">☰ FEG</button>  
 
</div>
<section id="Dashboard">
   <br>
  <div class="Dashboard-row">
    <div class="Dashboard-box">
      
      <h2>Member</h2><br>
      <p></p>
      
    </div>

    <div class="Dashboard-box">
      <h2>Trainer</h2><br>
      <p></p>
    </div>

    <div class="Dashboard-box">
      <h2>Batches</h2>
      <p name="membership"></p>
    </div>

  </div>
<br><br>
<div
id="myChart" style="width:100%; max-width:600px; height:500px; padding-left: 350px;">
</div>

<script>

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
var data = google.visualization.arrayToDataTable([
  ['Batches', 'Mhl'],
  ["6am to 8am",54.8],
  ["8am to 10am",48.6],
  ["5pm to 7pm",44.4],
  ["7pm to 9pm",23.9],
]);

var options = {
  title:'Gym Management System',
  is3D:true
};

var chart = new google.visualization.PieChart(document.getElementById('myChart'));
  chart.draw(data, options);
}
</script>    
</section>
<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}


</script>
   
</body>
</html> 
