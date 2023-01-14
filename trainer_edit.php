<?php
  
$host = "localhost";
$user = "root";
$password = ""; 
$database = "gym"; 

$t_id="";
$t_name="";
$t_phone="";
$t_address="";
$salary="";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try{
	$connect = mysqli_connect($host,$user,$password,$database);
}catch(Exception $ex){
	echo "Error";
}

function getPosts()
{
	$posts=array();
	$posts[0]=$_POST['t_id'];
	$posts[1]=$_POST['t_name'];
	$posts[2]=$_POST['t_phone'];
	$posts[3]=$_POST['t_address'];
	$posts[4]=$_POST['salary'];
	return $posts;
}  
 //search
if(isset($_POST['search']))
{
	$data = getPosts();
	$search_Query="SELECT * FROM trainer WHERE t_id = $data[0]";
	$search_Result=mysqli_query($connect,$search_Query);
	if($search_Result)
	{
		if(mysqli_num_rows($search_Result))
		{
			while($row = mysqli_fetch_array($search_Result))
			{
				        $t_id=$row['t_id'];
                $t_name=$row['t_name'];
                $t_phone=$row['t_phone'];
                $t_address=$row['t_address'];
                $salary=$row['salary'];
             
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
	$insert_Query = "INSERT INTO `trainer`(`t_id`,`t_name`, `t_phone`, `t_address`, `salary`) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')";

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
	$delete_Query = "DELETE FROM `member` WHERE `t_id`=$data[0]";

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
	$update_Query = "UPDATE `trainer` SET `t_name`='$data[1]',`t_phone`='$data[2]',`t_address`='$data[3]',`salary`='$data[4]' WHERE `t_id` = $data[0]";

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
	<title>Fitness Expert Gym</title>
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
    
	.c-btn{

		height: 50px;

		width: 155px;
    padding: 10px;
    margin: 20px 0px;
    color: white;
    border: none;
    background: #74b9ff ;
 }
</style>
<body>
<div class="container">	
<form action="trainer_edit.php" method="post">
	<div class="fields">
	  <input type="number" name="t_id" placeholder="id" value="<?php echo $t_id;?>"><br><br>
      <input type="text" name="t_name" placeholder="Full Name" value="<?php echo $t_name;?>"><br><br>
      <input type="text" name="t_phone" placeholder="Phone" value="<?php echo $t_phone;?>"><br><br>
      <input type="text" name="t_address" placeholder="Address"  value="<?php echo $t_address;?>"><br><br>
      <input type="text" name="salary" placeholder="salary"  value="<?php echo $salary;?>"><br><br>
     <br>
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