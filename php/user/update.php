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
	$title = $_POST['title'];
	$first = $_POST['first'];
	$last = $_POST['last'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$password = $_POST['password'];

    // 
    $sql = "UPDATE `users` SET `title`='$title',`first`='$first',`last`='$last',
    `email`='$email',`contact`='$contact',`password`='$password' WHERE `id` = $user;";
    
    
    $result = mysqli_query($con,$sql);
    if($result){
        echo"Successfully Updated";
    }else{
        die("Adding Failed: " . mysqli_error());
    }
    echo "adasd";
}
?>