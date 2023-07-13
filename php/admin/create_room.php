<?php
if($_POST){
    include '../connect.php';
    //Declaration
    // $id = $_POST['id'];
    $id = $_POST['id'];
    $room = $_POST['room'];
    $description = $_POST['description'];
    //
    $chk = 0;
   
    //checks same room
    $sqli = "SELECT * from `room`";
    $resulti = mysqli_query($con,$sqli);
    if($resulti){
        while($row = mysqli_fetch_assoc($resulti)){
            $id_check = $row['id'];
            //cond
            if($id_check == $id){
                $chk = 1;
            }
        }   
    }else{
        die("Adding Failed: " . mysqli_error());
    }
    // 
    //sql insert oo
    if($chk!= 1){
        $sql = "INSERT INTO `room`(`room`, `description`) 
        VALUES ('$room','$description')";
        $e = "";
        $result = mysqli_query($con,$sql);
        if($result){
            $e = "Sucessfully created";  
        }else{
            die("Adding Failed: " . mysqli_error());
        }
        $e = "Sucessfully created";
    }else{
        $sql2 = "UPDATE `room` SET `room`='$room',
        `description`='$description' WHERE `id` = $id;";
             
        $result2 = mysqli_query($con,$sql2);
        if($result2){
            // header('location:user.php');
           $e = "Sucessfully Modified";
        }else{
            die("Adding Failed: " . mysqli_error());
        }
        // $e = "Sucessfully Modified";
    } 
}
    echo $e;

    
?>