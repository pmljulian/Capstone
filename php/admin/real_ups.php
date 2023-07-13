<?php
if($_POST){
include '../connect.php';
//Declaration
$id = $_POST['id'];
$title = $_POST['title'];
$first = $_POST['first'];
$last = $_POST['last'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$password = $_POST['password'];

if($title != null && $first != null && $last != null && $email != null && $contact != null && $password != null){
    $sql = "UPDATE `users` SET `title`='$title',
    `first`='$first',`last`='$last',
    `email`='$email',`contact`='$contact',`password`='$password' WHERE `id` = $id;";
    
    
    $result = mysqli_query($con,$sql);
    if($result){
        // header('location:user.php');
        echo"Successfully Updated";
    }else{
        die("Adding Failed: " . mysqli_error());
    }
}else{
    echo "No Empty Fields";
}
}
?>