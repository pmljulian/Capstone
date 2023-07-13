
<?php
	include '../connect.php';
	
	//gumagana kung link type
	if($_POST){
		//Declaration
		$id = $_POST['id'];
        $user =$_POST['user'];
		
		//sql insert
		$sql = "DELETE from `schedule` WHERE `id` = $id";
		$result = mysqli_query($con,$sql);
		if($result){
			echo "Succesfully Deleted";
			// header('location:schedule.php');
			
		}else{
			die("Adding Failed: " . mysqli_error());
		}
		$timezone = "Asia/Hong_Kong";
    	date_default_timezone_set($timezone);
    	$today = date("m/d/Y g:i A");
		$fc = 1;
		$gg = "Update Schedule";
		$sqlogs = "INSERT INTO `logs`(`state`, `faculty`,`timestamp`, `open`) VALUES ('$gg','$user','$today','$fc')";
	
		$resultlogs = mysqli_query($con,$sqlogs);
		if($resultlogs){
		}else{
			die("Adding Failed: " . mysqli_error());
		}
	}

?>