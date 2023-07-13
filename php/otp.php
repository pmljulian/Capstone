<?php
if($_POST){
    // vars
	$first = $_POST['first'];
	$second = $_POST['second'];
	$third = $_POST['third'];
	$fourth = $_POST['fourth'];

    $usern = $_POST['username'];
    $passw = $_POST['password'];

    $otp = $first . $second . $third . $fourth;
    
    //
    $v= 0;
    include 'connect.php';
    //get data
    $sql = "SELECT * from `users`";
    $x = "";
    $result = mysqli_query($con,$sql);
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $arch = $row['archive'];
            $id = $row['id'];
            $email = $row['email'];
            $password = $row['password'];
            $verify = $row['verify'];
            $op = $row['otp'];
            $sec = $row['seconds'];
            
            if($usern == $id || $email == $usern){
                if($arch == "NO"){
                    if($passw == $password){
                        if($op == $otp){
                            //5 mins
                            $ss = $sec + 300;
                            if($ss >= strtotime("now")){
                                $x = $id;
                                $v = 2;
                                session_start();
                                $_SESSION['user'] = $id;	
                                echo"Successfully login";
                                // header("location: php/home.php");
                            }else{
                                $v = 6;
                            }
                        
                        }else{
                            $v=5;
                        }
                    }else{
                        $v = 1;
                    }
                }else{
                    $v = 3;
                }	
            }
            
        }
    
        if($v == 0){
            echo"Account not registered";
        }else if ($v == 1){
            echo"Wrong password";
        }
        else if ($v == 3){
            echo"Account Blocked";
        }else if ($v == 5){
            echo"Wrong OTP input";
        }else if ($v == 2){
            $n = 1;
            $sqln = "UPDATE `users` SET `verify`='$n' WHERE `id` = $x;";
            
            $resultn = mysqli_query($con,$sqln);
            if($resultn){
                // echo"Successfully Updated";
                // header("location: php/home.php");
            }else{
                die("Adding Failed: " . mysqli_error());
            }

            
        }else if($v == 6){
            echo "OTP expired request Another";
        }
        exit();
    }
}

?>