<?php
include '../connect.php';
if($_POST){
    $id = $_POST['id'];
    $sql = "DELETE from `section` WHERE  `id` = $id";
    $result = mysqli_query($con,$sql);
    if($result){
        echo"Succesfully Deleted";
    }else{
        die("Adding Failed: " . mysqli_error());
    }
}
?>