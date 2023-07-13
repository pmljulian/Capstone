<?php
//dine variables na makukuha sa js
if($_POST){
    $usern = $_POST['username'];
    $passw = $_POST['password'];

    // session_start();
    // echo $usern;
    $v= 0;
    include 'connect.php';
    //get data
    $sql = "SELECT * from `users`";
    
        $result = mysqli_query($con,$sql);
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                $arch = $row['archive'];
                $id = $row['id'];
                $email = $row['email'];
                $password = $row['password'];
                $verify = $row['verify'];
                
                if($usern == $id || $email == $usern){
                    if($arch == "NO"){
                        if($passw == $password){
                            if($verify != 0){
                                // 	
                                if($id == 12344112){
                                    echo "admin";
                                }else{
                                    echo "user";
                                    session_start();
                                    $_SESSION['user'] = $id;
                                }
                                $v =2;
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
                echo"Account Disabled";
            }else if ($v == 5){
                echo"Need OTP";
                exit();
            }
            exit();
        }

}
	
    
?>