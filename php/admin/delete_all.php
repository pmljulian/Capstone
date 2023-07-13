
<!DOCTYPE html>
<html lang = en>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>THS: Schedule</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../../css/index.css'>
    <script src="../../jquery-3.6.1.js"></script>
    <link rel="stylesheet" href="../../dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../../dist/font-awesome-4.7.0/css/font-awesome.css" crossorigin="anonymous">
    <!--  -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script> -->
    <script src = "../../dist/js/bootstrap.min.js"></script>
    <!-- eto pag ala net -->
    <script src="../../dist/chart.js"></script>
    <!-- jquery -->
    <script src="../../dist/toast/jquery.toast.min.js"></script>
    <link rel="stylesheet" href="../../dist/toast/jquery.toast.min.css" crossorigin="anonymous">
</head>
<body>
</body>
</html>
<?php
	include '../connect.php';
	
	//gumagana kung link type
	if(isset($_GET['deleteid'])){
		//Declaration
		$m = $_GET['deleteid'];
		$t = explode(" ",$m);
		$user = $t[0];
		$time = $t[1];
		
		//sql insert
		$sql = "DELETE from `schedule` WHERE `faculty` = $user AND `time` = $time";
		$result = mysqli_query($con,$sql);
		if($result){
			//alter
			echo"
                <script>
                    $.toast({
                        heading: 'Success',
                        text: 'Succesfully Deleted.',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        icon: 'success',
                        hideAfter: 1000, 
                        beforeHide: function () {
                            window.location.href = 'schedule.php';
                        },
                    })   
                </script>;
            ";
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