<?php
    if($_POST){
        include '../connect.php';
        //variables
        $faculty = $_POST['fy'];
        $day = $_POST['day'];
        $section = $_POST['section'];
        $time = $_POST['time'];
        $subject = $_POST['subject'];
        // day value
        //manipulate and error checking
        $ctrf = 0;
        $ctrs = 0;
        $r_d;
        $r_t;
        $r_f;
        $r_sc;
        $r_sb;
        //recess
        if($subject == 0){
            $section = 0;
        }
        // checks if schedule is already existing
        if($day !=0){
            //check if recess or not
            $sqlc = "SELECT * from `schedule`";
            $resultc = mysqli_query($con,$sqlc);
            if($resultc){
                while($row = mysqli_fetch_assoc($resultc)){
                    $id = $row['id'];
                    $d_check = $row['day'];
                    $t_check = $row['time'];
                    $f_check = $row['faculty'];
                    $sc_check = $row['section'];
                    $sb_check = $row['subject'];

                    //cond
                    if($d_check == $day && $t_check == $time && $f_check == $faculty){
                        $ctrf = 1;
                        $r_d = $d_check;
                        $r_t =  $t_check;
                        $r_f =  $f_check;
                        $r_sc = $sc_check;
                        $r_sb = $sb_check;
                    }else if($d_check == $day && $t_check == $time && $sc_check == $section){
                        $ctrs = 1;
                        $r_d = $d_check;
                        $r_t =  $t_check;
                        $r_f =  $f_check;
                        $r_sc = $sc_check;
                        $r_sb = $sb_check;
                    }
                }   
            }else{
                die("Adding Failed: " . mysqli_error());
            }
            //creating
            if($ctrf !=1 && $ctrs !=1){
                $sql = "INSERT INTO `schedule`(`day`, `time`, `faculty`, `section`, `subject`) 
                VALUES ('$day','$time','$faculty','$section','$subject')";
                $e = "";
                $result = mysqli_query($con,$sql);
                if($result){
                    $e = "Sucessfully created";  
                }else{
                    die("Adding Failed: " . mysqli_error());
                }
                $e = "Sucessfully created";
                
            }else{
                // showing real names
                
                $e_d = $d_check;
                $e_t =  $t_check;
                $e_f =  $f_check;
                $e_sc = $sc_check;
                $e_sb = $sb_check;
                //day
                if($r_d == 1){
                    $e_d = "Monday";
                }else if($r_d == 2){
                    $e_d = "Tuesday";
                }else if($r_d == 3){
                    $e_d = "Wednesday";
                }else if($r_d == 4){
                    $e_d = "Thusday";
                }else{
                    $e_d = "Friday";
                }
                // time
                $sqlt = "SELECT * from `time` WHERE `id` = $r_t;";
                $resultt = mysqli_query($con,$sqlt);
                
                if($resultt){
                    while($row = mysqli_fetch_assoc($resultt)){
                        $start=date("h:i a",strtotime($row['time_start']));
                        $end=date("h:i a",strtotime($row['time_end']));
                        $fullt = implode(' - ', array($start, $end));

                        $e_t = $fullt;
                    }     
                }else{
                    die("Adding Failed: " . mysqli_error());
                }
                //faculty
                $sqlf = "SELECT * from `users` WHERE `id` = $r_f;";
                $resultf = mysqli_query($con,$sqlf);
                
                if($resultt){
                    while($row = mysqli_fetch_assoc($resultf)){
                        $title = $row['title'];
                        $first = $row['first'];
                        $last = $row['last'];
                        $full = implode(' ', array($title, $first,$last));

                        $e_f = $full;
                    }     
                }else{
                    die("Adding Failed: " . mysqli_error());
                }
                //section
                $sqlsc = "SELECT * from `section` WHERE `id` = $r_sc;";
                $resultsc = mysqli_query($con,$sqlsc);
                
                if($resultsc){
                    while($row = mysqli_fetch_assoc($resultsc)){
                        $sc = $row['section'];

                        $e_sc = $sc;
                    }     
                }else{
                    die("Adding Failed: " . mysqli_error());
                }
            
                //error
                if($ctrf ==1){
                    $e = "Faculty Time Conflict </br>
                    Faculty had same time and day in another section:</br>
                    Section: ".$e_sc." </br>
                    ";
                }else if($ctrs ==1){
                    $e = "Section Conflict </br>
                    Time and day already occupied by another Faculty:</br>
                    Faculty: ".$e_f." </br>
                    ";
                }
            }

            echo $e;
            
        }else{
            $days = array(1, 2, 3, 4, 5);
            $e = 0;
            //looping
            for($i = 0; $i <5; $i++){
                //
                $tempday = $days[$i];
                //uulitin uli yung asa taas
                $sqlc = "SELECT * from `schedule`";
                $resultc = mysqli_query($con,$sqlc);
                if($resultc){
                    while($row = mysqli_fetch_assoc($resultc)){
                        $id = $row['id'];
                        $d_check = $row['day'];
                        $t_check = $row['time'];
                        $f_check = $row['faculty'];
                        $sc_check = $row['section'];
                        $sb_check = $row['subject'];

                        //cond
                        if($d_check == $tempday && $t_check == $time && $f_check == $faculty){
                            $ctrf = 1;
                            $r_d = $d_check;
                            $r_t =  $t_check;
                            $r_f =  $f_check;
                            $r_sc = $sc_check;
                            $r_sb = $sb_check;
                        }else if($d_check == $tempday && $t_check == $time && $sc_check == $section){
                            $ctrs = 1;
                            $r_d = $d_check;
                            $r_t =  $t_check;
                            $r_f =  $f_check;
                            $r_sc = $sc_check;
                            $r_sb = $sb_check;
                        }
                    }   
                }else{
                    die("Adding Failed: " . mysqli_error());
                }
                //creating
                if($ctrf !=1 && $ctrs !=1){
                    $sql = "INSERT INTO `schedule`(`day`, `time`, `faculty`, `section`, `subject`) 
                    VALUES ('$tempday','$time','$faculty','$section','$subject')";
                    // $e = "";
                    $result = mysqli_query($con,$sql);
                    if($result){
                        // $e++;  
                    }else{
                        die("Adding Failed: " . mysqli_error());
                    }
                    // $e++;
                    
                }else{
                    $e++;
                }

                
                $ctrf = 0;
                $ctrs = 0;
            }
            echo $e;
            
        }
    }
?>