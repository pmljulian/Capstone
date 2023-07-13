<?php
include '../connect.php';
session_start();

if(isset( $_SESSION['user'] ) ) {
   $user =  $_SESSION['user'];
}else {
 header('Location: ../../index.php');
}

if($_POST){
    // vars
	$notif = $_POST['value'];

    // 
    $sql = "UPDATE `users` SET `notify`='$notif' WHERE `id` = $user;";
    
    
    $result = mysqli_query($con,$sql);
    if($result){
        echo"Successfully Updated";
    }else{
        die("Adding Failed: " . mysqli_error());
    }
}
?>