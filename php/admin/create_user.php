<?php
if($_POST){
    include '../connect.php';
    //Declaration
    // $id = $_POST['id'];
    
    
    $titleinput = $_POST['Input1'];
    //get the combobox
    $sql4 = "SELECT * from `title`";
    $result4 = mysqli_query($con,$sql4);
    if($result4){
        while($row = mysqli_fetch_assoc($result4)){
            $t = $row['id'];
            $hm = $row['title'];
            //cond
            if($t == $titleinput){
                $title = $hm;
            }
        }   
    }else{
        die("Adding Failed: " . mysqli_error());
    }
    // 
    $first = $_POST['Input2'];
    $last = $_POST['Input3'];
    $email = $_POST['Input4'];
    $contact = $_POST['Input5'];
    $password = $_POST['Input6'];
    $archive = "NO";
    $notify = 1;
    $OTP = rand(1000,9999);
    $verify = 0;
    $seconds = strtotime("now");
    //
    $chk = 0;
    if($title!= null && $first != null && $last != null && $email != null && $contact != null && $password != null){
        //checks same emails
        $sqli = "SELECT * from `users`";
        $resulti = mysqli_query($con,$sqli);
        if($resulti){
            while($row = mysqli_fetch_assoc($resulti)){
                $em = $row['email'];
                //cond
                if($email == $em){
                    $chk = 1;
                }
            }   
        }else{
            die("Adding Failed: " . mysqli_error());
        }
        // 
        //sql insert oo
        if($chk!= 1){
            $sql = "INSERT INTO `users`(`title`, `first`, `last`, `email`, `contact`, `password`, `archive`,`notify`,`otp`,`verify`,`seconds`) 
            VALUES ('$title','$first','$last','$email','$contact','$password','$archive','$notify','$OTP','$verify' ,'$seconds')";
            $e = "";
            $result = mysqli_query($con,$sql);
            if($result){
                $e = "Successfully created";  
            }else{
                die("Adding Failed: " . mysqli_error());
            }
            $e = "Successfully created";
        }else{
            $e = "Email already existed";
        } 
    }else{
        $e = "Fill all fields!";
    }
    echo $e;
}
?>