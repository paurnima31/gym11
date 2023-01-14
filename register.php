<?php
    //ob_get_clean();
    include "mysql_gym_conn.php";
    $sql="SELECT * FROM membership";
    $result=mysqli_query($conn,$sql);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Fitnee Expert Gym</title>
</head>
<script type="text/javascript">
    var total=0;
    function priceCal(feesCheck){
      if(feesCheck.checked){
        total+=parseInt(feesCheck.value);
        document.getElementById("id").value=total;
        //alert("checked ");
      }else{
        //alert("Unchecked "+flavorCheck.value);
        total-=parseInt(feesCheck.value);
        document.getElementById("id").value=total;
      }
    }
   </script> 
<style type="text/css">
	*{
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: 'Poppins',sans-serif;
	}
	body{
		display: flex;
		height: 100vh;
		justify-content: center;
		align-items: center;
		padding: 10px;
		background: linear-gradient(135deg,#74b9ff,black,#74b9ff);
	}
	.container{
		max-width: 700px;
		width: 100%;
		background: #fff;
		padding: 25px 30px;
		border-radius: 5px;
	}
	.container .title{
		font-size: 25px;
		font-weight: 500;
		position: relative;
	}
    .container .title::before{
       content: '';
       position: absolute;
       left: 0;
       bottom: 0;
       height: 3px;
       width: 30px;
       background: linear-gradient(135deg,#74b9ff,black,#74b9ff);
    }
    .container form .user-details{
	   display: flex;
	   flex-wrap: wrap;
	   justify-content: space-between;
	   margin: 20px 0 12px 0;
    }
    form .user-details .input-box{
       margin: 20px 0 12px 0;
       width: calc(100% / 2 - 20px);
    }
    .user-details .input-box .details{
    	display: block;
    	font-weight: 500;
    	margin-bottom: 5px;
    }
    .user-details .input-box input{
    	height: 45px;
    	width: 100%;
    	outline: none;
    	border-radius: 5px;
    	border: 1px solid #ccc;
    	padding-left: 15px;
    	font-size: 16px;
    	border-bottom-width: 2px;
    	transition: all 0.3s ease;
    }
   .user-details .input-box select{

      height: 45px;
      width: 100%;
      outline: none;
      border-radius: 5px;
      border: 1px solid #ccc;
      padding-left: 15px;
      font-size: 16px;
      border-bottom-width: 2px;
      transition: all 0.3s ease;
      border-color: #74b9ff;
   }
    
    .user-details .input-box input:focus,
    .user-details .input-box input:valid{
       border-color:#74b9ff ;
    }
    form .gender-details .gender-title{
       font-size: 20px;
       font-weight: 500; 
    }
    form .gender-details .category{
	 display: flex;
	 width: 80%;
	 margin: 14px 0;
   justify-content: space-between;
   }
   form .gender-details label{
    display: flex;
    align-items: center;
   }
   form .gender-details .dot{
   	height: 18px;
   	width: 18px;
   	background: #d9d9d9;
   	border-radius: 50% ;
   	margin-right: 10px;
   	border: 5px solid transparent;
   	transition: all 0.3s ease;
   }
   #dot-1:checked ~ .category label .one,
   #dot-2:checked ~ .category label .two,
   #dot-3:checked ~ .category label .three{
   	border-color: #d9d9d9;
   	background:#74b9ff ;
   }
   form input[type="radio"]{
   	display: none;
   }
    .user-details .membership span{
      font-size: 17px;
    }
    .user-details .membership input[type="checkbox"]{
      
    }
    .user-details .fees span{
      font-size: 17px;
    }
    .user-details .fees input{
      border-color:#74b9ff  ;
    }
   form . button{
   	height: 45px;
   	margin: 45px 0;
   }
   form .button input{
   	height: 30px;
   	width: 100%;
   	outline: none;
   	color: #fff;
   	border: none;
   	border-radius: 5px;
   	font-size: 18px;
   	font-weight: 500;
   	letter-spacing: 2px;
   	background: linear-gradient(135deg,#74b9ff,black,#74b9ff);
   }
</style>
<body>
   <div class="container">
  	<div class="title">Register</div>
  	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  	<div class="user-details">
  			<div class="input-box">
  				<span class="details">Name</span>
  				<input type="text" placeholder="Enter Your Name" id="fullname" name="fullname"> 
  			</div>
  			<div class="input-box">
  				<span class="details">Username</span>
  				<input type="text" placeholder="Enter Your Username" id="username" name="username"> 
  			</div>
  			<div class="input-box">
  				<span class="details">Email</span>
  				<input type="text" placeholder="Enter Your Email" id="email" name="email"> 
  			</div>
  			<div class="input-box">
  				<span class="details">Phone Number</span>
  				<input type="text" placeholder="Enter Your Phone Number" id="phone" name="phone"> 
  			</div>
  			<div class="input-box">
  				<span class="details">Password</span>
  				<input type="password" placeholder="Enter Your Password" id="password" name="password"> 
  			</div>
  			<div class="input-box">
  				<span class="details"> Confirm Password</span>
  				<input type="password" placeholder="Enter Your Confirm Password" id="cpassword" name="cpassword"> 
  			</div>
         <div class="input-box">
            <span class="details">Date</span>
            <input type="Date" placeholder="DD/MM/YYYY" id="join_date" name="join_date"> 
         </div>
         <div class="input-box">
               <span name="batch_span">Batch Time</span><br>
            <select name="batch" required>
               <option value="6to8">6am to 8am</option>
               <option value="8to10">8am to 10am</option>
               <option value="5to7">5pm to 7pm</option>
               <option value="7to9">7pm to 9pm</option>
            </select>
         </div>
         <div class="gender-details">
         <input type="radio" name="gender" id="dot-1" value="m" required>
         <input type="radio" name="gender" id="dot-2" value="f" required>
         <input type="radio" name="gender" id="dot-3" value="t" required>
         <span class="gender-title">Gender</span>
            <div class="category">
               <label for="dot-1">
                  <span class="dot one"></span>
                  <span>Male</span>
               </label>
               <label for="dot-2">
                  <span class="dot two"></span>
                  <span>Female</span>
               </label>
               <label for="dot-3">
                  <span class="dot three"></span>
                  <span>Transgender</span>
               </label>
            </div>
  
   	   <br>
         <?php
          while($rows=$result->fetch_assoc())
         {
          ?>
         <div class="membership">
            
            <input type="checkbox" name="membership" id="membership" value="<?php echo $rows['fees']?>" onclick="priceCal(this);"><?php echo $rows['membership_time']?>
         </div>
         <?php
}
?>
        <br>
        <div class="fees">
           <span>Fees(acoourding to membership)</span>
          <input type="text" name="fees" id="id" required>
        </div>
   </div>
</div>
  		
  		<div class="button">
  			<input type="submit" value="Register">
  		</div>
  
  	</form>
<?php
    //ob_get_clean();
    include "mysql_gym_conn.php";

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $maxsql="SELECT MAX(id) as max FROM member";
        $max_run_query=mysqli_query($conn,$maxsql);
        $row=mysqli_fetch_array($max_run_query);
        $idVal=$row['max'];
        $idVal=$idVal+1;
        $fullname=$_POST['fullname'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $join_date=$_POST['join_date'];
        $gender=$_POST['gender'];
        $batch=$_POST['batch'];
        $membership=$_POST['membership'];
        $insert_sql="INSERT INTO member VALUES('$idVal','$fullname','$username','$email','$phone','$password','$cpassword','$join_date','$gender','$batch','$membership')";
          if(mysqli_query($conn,$insert_sql))
         {
           echo"<script>location.href='user_profile.php';</script>";
          }
        else
        {
            echo (mysqli_error($conn));
            exit();
        }
    } 
     
     ?>   
    </body> 
</html>