<?php
  
$host = "localhost";
$user = "root";
$password = ""; 
$database = "gym"; 

$id="";
$fullname="";
$username="";
$email="";
$phone="";
$password="";
$cpassword="";
$join_date="";
$gender="";
$batch="";
$membership="";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try{
	$connect = mysqli_connect($host,$user,$password,$database);
}catch(Exception $ex){
	echo "Error";
}

function getPosts()
{
	$posts=array();
	$posts[0]=$_POST['id'];
	$posts[1]=$_POST['fullname'];
	$posts[2]=$_POST['username'];
	$posts[3]=$_POST['email'];
	$posts[4]=$_POST['phone'];
	$posts[5]=$_POST['password'];
	$posts[6]=$_POST['cpassword'];
	$posts[7]=$_POST['join_date'];
	$posts[8]=$_POST['gender'];
	$posts[9]=$_POST['batch'];
	$posts[10]=$_POST['membership'];
	return $posts;
}  
 //search
if(isset($_POST['search']))
{
	$data = getPosts();
	$search_Query="SELECT * FROM member WHERE id = $data[0]";
	$search_Result=mysqli_query($connect,$search_Query);
	if($search_Result)
	{
		if(mysqli_num_rows($search_Result))
		{
			while($row = mysqli_fetch_array($search_Result))
			{
				        $id=$row['id'];
                $fullname=$row['fullname'];
                $username=$row['username'];
                $email=$row['email'];
                $phone=$row['phone'];
                $password=$row['password'];
                $cpassword=$row['cpassword'];
                $join_date=$row['join_date'];
                $gender=$row['gender'];
                $batch=$row['batch'];
                $membership=$row['membership'];
			}
		}else
		{
			echo 'no data for this id';
		}
	}else
	{
		echo 'Result Error';
	}
}
if(isset($_POST['insert']))
{
	$data = getPosts();
	$insert_Query = "INSERT INTO `member`(`id`,`fullname`, `username`, `email`, `phone`, `password`, `cpassword`, `join_date`, `gender`, `batch`, `membership`) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]')";

	try{
		$insert_Result = mysqli_query($connect,$insert_Query);

		   if($insert_Result)
		   {
		   	if(mysqli_affected_rows($connect) > 0)
		   	{
		   		echo 'Data inserted';
		   	}else{
		   		echo 'Data not inserted';
		   	}		   	

		   }

    	}catch(Exception $ex){
    		echo 'Error Insert '.$ex->getMessage();
    	}
}

if(isset($_POST['delete']))
{
	$data = getPosts();
	$delete_Query = "DELETE FROM `member` WHERE `id`=$data[0]";

	try{
		$delete_Result = mysqli_query($connect,$delete_Query);

		   if($delete_Result)
		   {
		   	if(mysqli_affected_rows($connect) > 0)
		   	{
		   		echo 'Data deleted';
		   	}else{
		   		echo 'Data not deleted';
		   	}		   	

		   }

    	}catch(Exception $ex){
    		echo 'Error delete '.$ex->getMessage();
    	}
}

if(isset($_POST['update']))
{
	$data = getPosts();
	$update_Query = "UPDATE `member` SET `fullname`='$data[1]',`username`='$data[2]',`email`='$data[3]',`phone`='$data[4]',`password`='$data[5]',`cpassword`='$data[6]',`join_date`='$data[7]',`gender`='$data[8]',`batch`='$data[9]',`membership`='$data[10]' WHERE  `id` = $data[0]";

	try{
		$update_Result = mysqli_query($connect,$update_Query);

		   if($update_Result)
		   {
		   	if(mysqli_affected_rows($connect) > 0)
		   	{
		   		echo 'Data updated';
		   	}else{
		   		echo 'Data not updated';
		   	}		   	

		   }

    	}catch(Exception $ex){
    		echo 'Error update '.$ex->getMessage();
    	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
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
		padding-right: 50px;
		max-width: 700px;
		width: 100%;
		background: #fff;
		padding: 25px 30px;
		border-radius: 5px;

	}
	 .container form .fields{
	   display: flex;
	   flex-wrap: wrap;
	   justify-content: space-between;
	   margin: 20px 0 12px 0;
    }
    form .fields input{
       margin: 20px 0 12px 0;
       width: calc(100% / 2 - 20px);
    }
   
    .fields input{
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
    .fields select{

      margin-top: 22px;
      height: 45px;
      width: 48%;
      outline: none;
      border-radius: 5px;
      border: 1px solid #ccc;
      padding-left: 15px;
      font-size: 16px;
      border-bottom-width: 2px;
      transition: all 0.3s ease;
   }
    
    
	.c-btn{
		height: 50px;
		width: 150px;
    padding: 10px;
    margin: 20px 0px;
    color: white;
    border: none;
    background: #74b9ff ;
 }
</style>
<body>
<div class="container">	
<form action="edit.php" method="post">
	<div class="fields">
	  <input type="number" name="id" placeholder="id" value="<?php echo $id;?>"><br><br>
      <input type="text" name="fullname" placeholder="Full Name" value="<?php echo $fullname;?>"><br><br>
      <input type="text" name="username" placeholder="Username" value="<?php echo $username;?>"><br><br>
      <input type="text" name="email" placeholder="Email"  value="<?php echo $email;?>"><br><br>
      <input type="text" name="phone" placeholder="Phone"  value="<?php echo $phone;?>"><br><br>
      <input type="password" name="password" placeholder="Password" value="<?php echo $password;?>"><br><br>
      <input type="password" name="cpassword" placeholder=" Confirm Password"  value="<?php echo $cpassword;?>"><br><br>
      <input type="date" name="join_date" placeholder="Joining Date"  value="<?php echo $join_date;?>"><br><br>
      <input type="gender" name="gender" placeholder="Gender"  value="<?php echo $gender;?>"><br><br>
      <input type="text" name="batch" placeholder="Batch Time"  value="<?php echo $batch;?>"><br><br>
      <input type="text" name="membership" placeholder="Fees"  value="<?php echo $membership;?>"><br><br>

    </div>
    <div class="buttons">
      <input type="submit" class="c-btn" name="insert" value="  Add ">
      <input type="submit" class="c-btn" name="update" value="Update">
      <input type="submit" class="c-btn" name="delete" value="Delete">	
      <input type="submit" class="c-btn" name="search" value=" Find ">
    </div>
</form>
</div>
</body>
</html>