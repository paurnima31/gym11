<!DOCTYPE html>
<html>
<head>
  <title> Fitness Expert Gym</title>
  <script type="text/javascript">
    function userType(userTypeChk){
      if(userTypeChk.checked){
        document.getElementById("userTypeHdn").value="admin";
      }else{
        document.getElementById("userTypeHdn").value="member";
      }
    }
   </script> 
</head>
<style type="text/css">
 *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family:  sans-serif;
  outline: none;
 }
 body{
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background:linear-gradient(30deg,#74b9ff,black,#74b9ff); ;
 }
 .box{
  width: 350px;
  height: 500px;
  background: white;
  position: relative;
  overflow: hidden;
 }
.user{
  position: absolute;
  bottom: 0;
  left: 0;
  background:;
  width: 100%;
  height: 400px;
  padding: 0px 20px;
  transition: 0.5s;
}
.btn{
  background: transparent;
  padding: 10px 20px;
  color: #74b9ff;
  border: 1px solid #74b9ff;
  border-radius: 8px;
}

.admin{
  position: absolute;
  bottom: 0;
  left: 101%;
  background:;
  width: 100%;
  height:400px;
  padding: 0px 20px;
  transition: 0.5s;
}
.input-group{
  margin-top: 10px;
}
.input-group span{
  color: grey;
}
.input-group .inp{
  width: 100%;
  padding: 10px 15px;
  border-radius: 100px;
  border: 1px solid #c6c6c6;
  margin-top: 5px ;
  border-color:#74b9ff ;  
}
.submit-inp{
  background:linear-gradient(30deg,#74b9ff,black,#74b9ff);
  border:none !important;
  color: white;
  font-weight: bolder;
  font-variant: small-caps;
  font-size: 18px;

}
.toggle-btn{
  -webkit-appearance: none;
  width: 150px;
  height: 40px;
  border: 1px solid gray;
  position: absolute;
  top: 30px;
  left: calc(50% - 75px);
  border-radius: 100px;
}
.toggle-btn:before{
  content: 'User';
  font-weight: bolder;
  color: white;
  position: absolute;
  top: 0;
  left: 0;
  width: 50%;
  height: 100%;
  background:linear-gradient(30deg,#74b9ff,black,#74b9ff); 
  border-radius: 100px;
  display: grid;
  place-items: center;
  transition: 0.5s;
}
.toggle-btn:checked:before{
  content: 'Admin';
  left: 50%;
}
.toggle-btn:checked + .user{
  left: -101%;
}
.toggle-btn:checked +.user + .admin{
  left: 0%;
}
</style>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <input type="hidden" name="userTypeHdn" id="userTypeHdn" value="member"/>
<div class="box">
  <input type="checkbox" class="toggle-btn" name="usertype" id="usertype" onclick="userType(this);" />
  
 <div class="user">
   <div class="input-group">
     <span>  Username</span>
     <input type="text" placeholder="Username" name="username" id="username" class="inp"><br><br>
      <span> Password</span>
     <input type="password" placeholder="Password" name="cpassword" id="cpassword" class="inp">
   </div>
   <div class="input-group" style="margin-top: 20px;">
     <input type="submit" value="Login" class="inp submit-inp" >
   </div>
   <h3>You don't have account?<a href="register.php"><br>Register Now</a></h3>
 </div>

 <div class="admin">
   <div class="input-group">
     <span>  Admin name</span>
     <input type="text" placeholder="Admin name" name="adminname" id="adminname"  class="inp"><br><br>
      <span>  Password</span>
     <input type="Password" placeholder="Password" name="password" id="password" class="inp">
   </div>
   <div class="input-group" style="margin-top: 20px;">
     <input type="submit" value="Login" class="inp submit-inp" >
   </div>
 </div>
</div>
</form>
</body>

  <?php
    //ob_get_clean();
    include "mysql_gym_conn.php";

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {

        $usertype=$_POST['userTypeHdn'];

        if($usertype=="member"){
          $name=$_POST['username'];
          $password=$_POST['cpassword'];
          $sql="SELECT * FROM member WHERE username='$name' AND cpassword='$password'";
          $run_query=mysqli_query($conn,$sql);
          $count=mysqli_num_rows($run_query);
          //echo "before if new log";
          if($count==1){
              echo "Successful Login";
              header('Location: user_profile.php');
          }else{
            echo "User or Password are wrong".$usertype;
          }
        }else{

          $name=$_POST['adminname'];
          $password=$_POST['password'];
          $sql="SELECT * FROM admin WHERE adminname='$name' AND password='$password'";
          $run_query=mysqli_query($conn,$sql);
          $count=mysqli_num_rows($run_query);
          //echo "before if new log";
          if($count==1){
              echo "Successful Login";
              header('Location: admin_home.php');
          }else{
            echo "User or Password are wrong".$usertype;
          }
              

        }
        
    } 

     ?>     
</html>