<?php
  
// Username is root
$user = 'root';
$password = ''; 
  
// Database name is gfg
$database = 'gym'; 
  
// Server is localhost with
// port number 3308
$servername='localhost';
$mysqli = new mysqli($servername, $user, 
                $password, $database);
  
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' . 
    $mysqli->connect_errno . ') '. 
    $mysqli->connect_error);
}
  
// SQL query to select data from database
$sql = "SELECT * FROM trainer ORDER BY t_id";
$result = $mysqli->query($sql);
$mysqli->close(); 
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
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
 #Member{

  }
  table {
            padding-left: 50px;
            margin: 0 auto;
            font-size: large;
            border: 0px solid #74b9ff;
        }
  
        h1 {
            text-align: center;
            color: #74b9ff;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
  
        td {
            background-color: white;
            border: 1px solid #74b9ff;
            height: 30px;
        }
  
        th,
        td {
            font-weight: bold;
            border: 1px solid #74b9ff;
            padding: 10px;
            text-align: center;
        }
  
        td {
            font-weight: lighter;
        }
        .c-btn{
  width: 80px;
  height: 40px;
  margin: 20px 0px;
  color: white;
  border: none;
  background: #74b9ff ;
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
 
</div><br><br>
 <section id="Member">
        
        <!-- TABLE CONSTRUCTION-->
        <table>
            <tr>
                <th>Trainer Id</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Salary</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
           <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['t_id'];?></td>
                <td><?php echo $rows['t_name'];?></td>
                <td><?php echo $rows['t_phone'];?></td>
                <td><?php echo $rows['t_address'];?></td>
                <td><?php echo $rows['salary'];?></td>
               
            </tr>

            <?php
                }
             ?>
        </table>
    </section>
     <div>
   <form action="trainer_edit.php">
      <button class="c-btn">  Edit  </button>
    </form>
   </div>

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
