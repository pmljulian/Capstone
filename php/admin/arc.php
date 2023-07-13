<?php
	include '../connect.php';
    // session_start();
	//id
	if($_POST){
		
		//Declaration
		$id = $_POST['id'];
		$sql = "SELECT * from `users` WHERE `id` = $id;";
		$result = mysqli_query($con,$sql);
		if($result){
            while($row = mysqli_fetch_assoc($result)){
				$arc = $row['archive'];
            }
		}

		//check
		if($arc == "YES"){
			$arc = "NO";
		}else{
			$arc = "YES";
		}

		//sql insert
		$sql = "UPDATE `users` SET `archive` = '$arc' WHERE `id` = $id;";
		
		$result = mysqli_query($con,$sql);
		if($result){
			// header('location:user.php');
			echo "Modified";
			exit();
		}else{
			die("Adding Failed: " . mysqli_error());
		}
	}
	exit();
	
?>
