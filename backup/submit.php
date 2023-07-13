<?php
include '../connect.php';
$isa = 0;
if($_POST){
    //select
    $teacher = $_POST['faculty_id'];
    $section = $_POST['sections'];
	$subject = $_POST['subjects'];
	$room = $_POST['rooms'];
	
    //checkboxes

    if(isset($_POST['monday'])){
        $monday = $_POST['monday'];
    }else{
        $monday = array();
    }
    if(isset($_POST['tuesday'])){
        $tuesday = $_POST['tuesday'];
    }
    else{
        $tuesday = array();
    }
    if(isset($_POST['wednesday'])){
        $wednesday = $_POST['wednesday'];
    }
    else{
        $wednesday = array();
    }
    if(isset($_POST['thursday'])){
        $thursday = $_POST['thursday'];
    }
    else{
        $thursday = array();
    }
    if(isset($_POST['friday'])){
        $friday = $_POST['friday'];
    }
    else{
        $friday = array();
    }
    
    

    //counters
    
    //monday check
    
    foreach($monday as $day){
        // //counters
        $count_t = 0;
        $count_s = 0;
        $count_r= 0;
        // //for error handle
        $success = 0;
        $error = 0;
        // //note to self di pa nakukuha time desc saka member name kasi iniispi pa paano

        // //check teacher
        //$sql_t = "SELECT * from `schedule`";
        // //get data
        $sql_t = "SELECT * from `schedule`";
        $result_t = mysqli_query($con,$sql_t);
        if($result_t){
            while($row = mysqli_fetch_assoc($result_t)){
                $d = $row['day'];
                $t = $row['time'];
                $p = $row['faculty'];
                $sj = $row['section'];
                $sc = $row['subject'];
                $r = $row['room'];
                // icon
                //us
                $sql_tt = "SELECT * from `users` WHERE `id` = $p ";
                $result_tt = mysqli_query($con,$sql_tt);
                if($result_tt){
                    while($rowtt = mysqli_fetch_assoc($result_tt)){
                        $title = $rowtt['title'];
                        $first = $rowtt['first'];
                        $last = $rowtt['last'];
                        $full = implode(' ', array($title, $first, $last));
                    }
                }
                //t
                $sql_tz = "SELECT * from `time` WHERE `id` = $t ";
                $result_tz = mysqli_query($con,$sql_tz);
                if($result_tz){
                    while($rowtz = mysqli_fetch_assoc($result_tz)){
                        $t_s = $rowtz['time_start'];
                        $t_e = $rowtz['time_end'];
                        $time = implode('-', array($t_s, $t_e));
                    }
                }
                //s
                $sql_ts = "SELECT * from `section` WHERE `id` = $sc ";
                $result_ts = mysqli_query($con,$sql_ts);
                if($result_ts){
                    while($rowts = mysqli_fetch_assoc($result_ts)){
                        $sec = $rowts['section'];
                    }
                }
                //r
                $sql_ty = "SELECT * from `room` WHERE `id` = $r ";
                $result_ty = mysqli_query($con,$sql_ty);
                if($result_ty){
                    while($rowty = mysqli_fetch_assoc($result_ty)){
                        $rum = $rowty['room'];
                    }
                }

                //check teacher
                if($teacher == $p && $day == $t && $d == 1){
                    $count_t = 1;
                }
                //check section
                if($section == $sc && $day == $t && $d == 1){
                    $count_s = 1;
                }
                //
                if($room == $r && $day == $t && $d == 1){
                    $count_r = 1;
                }
                //malaking desisyon
            }
            
        }else{
            die("Existed: " . mysqli_error());
        }
        $ww = 0;
        $xx = 0;
        $yy = 0;
        $zz = 0;

        /// adding
        if (($count_t==0) && ($count_s==0) && ($count_r==0)){
            $sql = "INSERT INTO `schedule`(`day`, `time`, `faculty`, `section`, `subject`, `room`) 
            VALUES (1,'$day','$teacher','$section','$subject','$room')";

            $result = mysqli_query($con,$sql);
            if($result){
                $ww = 1;
                // echo"Sucessfully created";
            }else{
                die("Adding Failed: " . mysqli_error());
            }

        }else{
            if($count_t > 0){
                // echo $error_t."<br>";
                $xx = 1;
            }

            if($count_s > 0){
                // echo $error_s."<br>";
                $yy = 1;
            }

            if($count_r > 0){
                // echo $error_r."<br>";
                $zz = 1;
            }
        }
        
        if($ww == 1){
            echo"Sucessfully created </br>";
            $isa = 1;
        }else{
            $sql_tz = "SELECT * from `time` WHERE `id` = $day ";
            $result_tz = mysqli_query($con,$sql_tz);
            if($result_tz){
                while($rowtz = mysqli_fetch_assoc($result_tz)){
                    $t_s = $rowtz['time_start'];
                    $t_e = $rowtz['time_end'];
                    $time = implode('-', array($t_s, $t_e));
                }
            }
            $errors = "Monday time " .$time. " is already occupied by | ";
            if($xx == 1){
                $errors .= " <b>Teacher: ".$full . "</b> | ";
            }
            if($yy == 1){
                $errors .= "<b> Section: " .$sec . "</b> | ";
            }
            if($zz == 1){
                $errors .= "<b> Room: ".$rum . "</b> | ";
            }
            echo $errors."</br>";
        }
        
        
    }

    //choosdae
    foreach($tuesday as $day){
        // //counters
        $count_t = 0;
        $count_s = 0;
        $count_r= 0;
        // //for error handle
        // //note to self di pa nakukuha time desc saka member name kasi iniispi pa paano

        // //check teacher
        //$sql_t = "SELECT * from `schedule`";
        // //get data
        $sql_t = "SELECT * from `schedule`";
        $result_t = mysqli_query($con,$sql_t);
        if($result_t){
            while($row = mysqli_fetch_assoc($result_t)){
                $d = $row['day'];
                $t = $row['time'];
                $p = $row['faculty'];
                $sj = $row['section'];
                $sc = $row['subject'];
                $r = $row['room'];
                // icon
                //us
                $sql_tt = "SELECT * from `users` WHERE `id` = $p ";
                $result_tt = mysqli_query($con,$sql_tt);
                if($result_tt){
                    while($rowtt = mysqli_fetch_assoc($result_tt)){
                        $title = $rowtt['title'];
                        $first = $rowtt['first'];
                        $last = $rowtt['last'];
                        $full = implode(' ', array($title, $first, $last));
                    }
                }
                //t
                $sql_tz = "SELECT * from `time` WHERE `id` = $t ";
                $result_tz = mysqli_query($con,$sql_tz);
                if($result_tz){
                    while($rowtz = mysqli_fetch_assoc($result_tz)){
                        $t_s = $rowtz['time_start'];
                        $t_e = $rowtz['time_end'];
                        $time = implode('-', array($t_s, $t_e));
                    }
                }
                //s
                $sql_ts = "SELECT * from `section` WHERE `id` = $sc ";
                $result_ts = mysqli_query($con,$sql_ts);
                if($result_ts){
                    while($rowts = mysqli_fetch_assoc($result_ts)){
                        $sec = $rowts['section'];
                    }
                }
                //r
                $sql_ty = "SELECT * from `room` WHERE `id` = $r ";
                $result_ty = mysqli_query($con,$sql_ty);
                if($result_ty){
                    while($rowty = mysqli_fetch_assoc($result_ty)){
                        $rum = $rowty['room'];
                    }
                }

                //check teacher
                if($teacher == $p && $day == $t && $d == 2){
                    $count_t = 1;
                }
                //check section
                if($section == $sc && $day == $t && $d == 2){
                    $count_s = 1;
                }
                //
                if($room == $r && $day == $t && $d == 2){
                    $count_r = 1;
                }
                //malaking desisyon
            }
            
        }else{
            die("Existed: " . mysqli_error());
        }
        $ww = 0;
        $xx = 0;
        $yy = 0;
        $zz = 0;

        /// adding
        if (($count_t==0) && ($count_s==0) && ($count_r==0)){
            $sql = "INSERT INTO `schedule`(`day`, `time`, `faculty`, `section`, `subject`, `room`) 
            VALUES (2,'$day','$teacher','$section','$subject','$room')";

            $result = mysqli_query($con,$sql);
            if($result){
                $ww = 1;
                // echo"Sucessfully created";
            }else{
                die("Adding Failed: " . mysqli_error());
            }

        }else{
            if($count_t > 0){
                // echo $error_t."<br>";
                $xx = 1;
            }

            if($count_s > 0){
                // echo $error_s."<br>";
                $yy = 1;
            }

            if($count_r > 0){
                // echo $error_r."<br>";
                $zz = 1;
            }
        }
        
        if($ww == 1){
            echo"Sucessfully created </br>";
            $isa = 1;
        }else{
            $sql_tz = "SELECT * from `time` WHERE `id` = $day ";
            $result_tz = mysqli_query($con,$sql_tz);
            if($result_tz){
                while($rowtz = mysqli_fetch_assoc($result_tz)){
                    $t_s = $rowtz['time_start'];
                    $t_e = $rowtz['time_end'];
                    $time = implode('-', array($t_s, $t_e));
                }
            }
            $errors = "Monday time " .$time. " is already occupied by | ";
            if($xx == 1){
                $errors .= " <b>Teacher: ".$full . "</b> | ";
            }
            if($yy == 1){
                $errors .= "<b> Section: " .$sec . "</b> | ";
            }
            if($zz == 1){
                $errors .= "<b> Room: ".$rum . "</b> | ";
            }
            echo $errors."</br>";
        }
        
        
    }
    //wednesday
    foreach($wednesday as $day){
        // //counters
        $count_t = 0;
        $count_s = 0;
        $count_r= 0;
        // //for error handle
        // //note to self di pa nakukuha time desc saka member name kasi iniispi pa paano

        // //check teacher
        //$sql_t = "SELECT * from `schedule`";
        // //get data
        $sql_t = "SELECT * from `schedule`";
        $result_t = mysqli_query($con,$sql_t);
        if($result_t){
            while($row = mysqli_fetch_assoc($result_t)){
                $d = $row['day'];
                $t = $row['time'];
                $p = $row['faculty'];
                $sj = $row['section'];
                $sc = $row['subject'];
                $r = $row['room'];
                // icon
                //us
                $sql_tt = "SELECT * from `users` WHERE `id` = $p ";
                $result_tt = mysqli_query($con,$sql_tt);
                if($result_tt){
                    while($rowtt = mysqli_fetch_assoc($result_tt)){
                        $title = $rowtt['title'];
                        $first = $rowtt['first'];
                        $last = $rowtt['last'];
                        $full = implode(' ', array($title, $first, $last));
                    }
                }
                //t
                $sql_tz = "SELECT * from `time` WHERE `id` = $t ";
                $result_tz = mysqli_query($con,$sql_tz);
                if($result_tz){
                    while($rowtz = mysqli_fetch_assoc($result_tz)){
                        $t_s = $rowtz['time_start'];
                        $t_e = $rowtz['time_end'];
                        $time = implode('-', array($t_s, $t_e));
                    }
                }
                //s
                $sql_ts = "SELECT * from `section` WHERE `id` = $sc ";
                $result_ts = mysqli_query($con,$sql_ts);
                if($result_ts){
                    while($rowts = mysqli_fetch_assoc($result_ts)){
                        $sec = $rowts['section'];
                    }
                }
                //r
                $sql_ty = "SELECT * from `room` WHERE `id` = $r ";
                $result_ty = mysqli_query($con,$sql_ty);
                if($result_ty){
                    while($rowty = mysqli_fetch_assoc($result_ty)){
                        $rum = $rowty['room'];
                    }
                }

                //check teacher
                if($teacher == $p && $day == $t && $d == 3){
                    $count_t = 1;
                }
                //check section
                if($section == $sc && $day == $t && $d == 3){
                    $count_s = 1;
                }
                //
                if($room == $r && $day == $t && $d == 3){
                    $count_r = 1;
                }
                //malaking desisyon
            }
            
        }else{
            die("Existed: " . mysqli_error());
        }
        $ww = 0;
        $xx = 0;
        $yy = 0;
        $zz = 0;

        /// adding
        if (($count_t==0) && ($count_s==0) && ($count_r==0)){
            $sql = "INSERT INTO `schedule`(`day`, `time`, `faculty`, `section`, `subject`, `room`) 
            VALUES (3,'$day','$teacher','$section','$subject','$room')";

            $result = mysqli_query($con,$sql);
            if($result){
                $ww = 1;
                // echo"Sucessfully created";
            }else{
                die("Adding Failed: " . mysqli_error());
            }

        }else{
            if($count_t > 0){
                // echo $error_t."<br>";
                $xx = 1;
            }

            if($count_s > 0){
                // echo $error_s."<br>";
                $yy = 1;
            }

            if($count_r > 0){
                // echo $error_r."<br>";
                $zz = 1;
            }
        }
        
        if($ww == 1){
            echo"Sucessfully created </br>";
            $isa = 1;
        }else{
            $sql_tz = "SELECT * from `time` WHERE `id` = $day ";
            $result_tz = mysqli_query($con,$sql_tz);
            if($result_tz){
                while($rowtz = mysqli_fetch_assoc($result_tz)){
                    $t_s = $rowtz['time_start'];
                    $t_e = $rowtz['time_end'];
                    $time = implode('-', array($t_s, $t_e));
                }
            }
            $errors = "Monday time " .$time. " is already occupied by | ";
            if($xx == 1){
                $errors .= " <b>Teacher: ".$full . "</b> | ";
            }
            if($yy == 1){
                $errors .= "<b> Section: " .$sec . "</b> | ";
            }
            if($zz == 1){
                $errors .= "<b> Room: ".$rum . "</b> | ";
            }
            echo $errors."</br>";
        }
        
        
    }

    //thursday
    foreach($thursday as $day){
        // //counters
        $count_t = 0;
        $count_s = 0;
        $count_r= 0;
        // //for error handle
        // //note to self di pa nakukuha time desc saka member name kasi iniispi pa paano

        // //check teacher
        //$sql_t = "SELECT * from `schedule`";
        // //get data
        $sql_t = "SELECT * from `schedule`";
        $result_t = mysqli_query($con,$sql_t);
        if($result_t){
            while($row = mysqli_fetch_assoc($result_t)){
                $d = $row['day'];
                $t = $row['time'];
                $p = $row['faculty'];
                $sj = $row['section'];
                $sc = $row['subject'];
                $r = $row['room'];
                // icon
                //us
                $sql_tt = "SELECT * from `users` WHERE `id` = $p ";
                $result_tt = mysqli_query($con,$sql_tt);
                if($result_tt){
                    while($rowtt = mysqli_fetch_assoc($result_tt)){
                        $title = $rowtt['title'];
                        $first = $rowtt['first'];
                        $last = $rowtt['last'];
                        $full = implode(' ', array($title, $first, $last));
                    }
                }
                //t
                $sql_tz = "SELECT * from `time` WHERE `id` = $t ";
                $result_tz = mysqli_query($con,$sql_tz);
                if($result_tz){
                    while($rowtz = mysqli_fetch_assoc($result_tz)){
                        $t_s = $rowtz['time_start'];
                        $t_e = $rowtz['time_end'];
                        $time = implode('-', array($t_s, $t_e));
                    }
                }
                //s
                $sql_ts = "SELECT * from `section` WHERE `id` = $sc ";
                $result_ts = mysqli_query($con,$sql_ts);
                if($result_ts){
                    while($rowts = mysqli_fetch_assoc($result_ts)){
                        $sec = $rowts['section'];
                    }
                }
                //r
                $sql_ty = "SELECT * from `room` WHERE `id` = $r ";
                $result_ty = mysqli_query($con,$sql_ty);
                if($result_ty){
                    while($rowty = mysqli_fetch_assoc($result_ty)){
                        $rum = $rowty['room'];
                    }
                }

                //check teacher
                if($teacher == $p && $day == $t && $d == 4){
                    $count_t = 1;
                }
                //check section
                if($section == $sc && $day == $t && $d == 4){
                    $count_s = 1;
                }
                //
                if($room == $r && $day == $t && $d == 4){
                    $count_r = 1;
                }
                //malaking desisyon
            }
            
        }else{
            die("Existed: " . mysqli_error());
        }
        $ww = 0;
        $xx = 0;
        $yy = 0;
        $zz = 0;

        /// adding
        if (($count_t==0) && ($count_s==0) && ($count_r==0)){
            $sql = "INSERT INTO `schedule`(`day`, `time`, `faculty`, `section`, `subject`, `room`) 
            VALUES (4,'$day','$teacher','$section','$subject','$room')";

            $result = mysqli_query($con,$sql);
            if($result){
                $ww = 1;
                // echo"Sucessfully created";
            }else{
                die("Adding Failed: " . mysqli_error());
            }

        }else{
            if($count_t > 0){
                // echo $error_t."<br>";
                $xx = 1;
            }

            if($count_s > 0){
                // echo $error_s."<br>";
                $yy = 1;
            }

            if($count_r > 0){
                // echo $error_r."<br>";
                $zz = 1;
            }
        }
        
        if($ww == 1){
            echo"Sucessfully created </br>";
            $isa = 1;
        }else{
            $sql_tz = "SELECT * from `time` WHERE `id` = $day ";
            $result_tz = mysqli_query($con,$sql_tz);
            if($result_tz){
                while($rowtz = mysqli_fetch_assoc($result_tz)){
                    $t_s = $rowtz['time_start'];
                    $t_e = $rowtz['time_end'];
                    $time = implode('-', array($t_s, $t_e));
                }
            }
            $errors = "Monday time " .$time. " is already occupied by | ";
            if($xx == 1){
                $errors .= " <b>Teacher: ".$full . "</b> | ";
            }
            if($yy == 1){
                $errors .= "<b> Section: " .$sec . "</b> | ";
            }
            if($zz == 1){
                $errors .= "<b> Room: ".$rum . "</b> | ";
            }
            echo $errors."</br>";
        }
        
        
    }
    //friday
    foreach($friday as $day){
        // //counters
        $count_t = 0;
        $count_s = 0;
        $count_r= 0;
        // //for error handle
        // //note to self di pa nakukuha time desc saka member name kasi iniispi pa paano

        // //check teacher
        //$sql_t = "SELECT * from `schedule`";
        // //get data
        $sql_t = "SELECT * from `schedule`";
        $result_t = mysqli_query($con,$sql_t);
        if($result_t){
            while($row = mysqli_fetch_assoc($result_t)){
                $d = $row['day'];
                $t = $row['time'];
                $p = $row['faculty'];
                $sj = $row['section'];
                $sc = $row['subject'];
                $r = $row['room'];
                // icon
                //us
                $sql_tt = "SELECT * from `users` WHERE `id` = $p ";
                $result_tt = mysqli_query($con,$sql_tt);
                if($result_tt){
                    while($rowtt = mysqli_fetch_assoc($result_tt)){
                        $title = $rowtt['title'];
                        $first = $rowtt['first'];
                        $last = $rowtt['last'];
                        $full = implode(' ', array($title, $first, $last));
                    }
                }
                //t
                $sql_tz = "SELECT * from `time` WHERE `id` = $t ";
                $result_tz = mysqli_query($con,$sql_tz);
                if($result_tz){
                    while($rowtz = mysqli_fetch_assoc($result_tz)){
                        $t_s = $rowtz['time_start'];
                        $t_e = $rowtz['time_end'];
                        $time = implode('-', array($t_s, $t_e));
                    }
                }
                //s
                $sql_ts = "SELECT * from `section` WHERE `id` = $sc ";
                $result_ts = mysqli_query($con,$sql_ts);
                if($result_ts){
                    while($rowts = mysqli_fetch_assoc($result_ts)){
                        $sec = $rowts['section'];
                    }
                }
                //r
                $sql_ty = "SELECT * from `room` WHERE `id` = $r ";
                $result_ty = mysqli_query($con,$sql_ty);
                if($result_ty){
                    while($rowty = mysqli_fetch_assoc($result_ty)){
                        $rum = $rowty['room'];
                    }
                }

                //check teacher
                if($teacher == $p && $day == $t && $d == 5){
                    $count_t = 1;
                }
                //check section
                if($section == $sc && $day == $t && $d == 5){
                    $count_s = 1;
                }
                //
                if($room == $r && $day == $t && $d == 5){
                    $count_r = 1;
                }
                //malaking desisyon
            }
            
        }else{
            die("Existed: " . mysqli_error());
        }
        $ww = 0;
        $xx = 0;
        $yy = 0;
        $zz = 0;

        /// adding
        if (($count_t==0) && ($count_s==0) && ($count_r==0)){
            $sql = "INSERT INTO `schedule`(`day`, `time`, `faculty`, `section`, `subject`, `room`) 
            VALUES (5,'$day','$teacher','$section','$subject','$room')";

            $result = mysqli_query($con,$sql);
            if($result){
                $ww = 1;
                // echo"Sucessfully created";
            }else{
                die("Adding Failed: " . mysqli_error());
            }

        }else{
            if($count_t > 0){
                // echo $error_t."<br>";
                $xx = 1;
            }

            if($count_s > 0){
                // echo $error_s."<br>";
                $yy = 1;
            }

            if($count_r > 0){
                // echo $error_r."<br>";
                $zz = 1;
            }
        }
        
        if($ww == 1){
            echo"Sucessfully created </br>";
            $isa = 1;
        }else{
            $sql_tz = "SELECT * from `time` WHERE `id` = $day ";
            $result_tz = mysqli_query($con,$sql_tz);
            if($result_tz){
                while($rowtz = mysqli_fetch_assoc($result_tz)){
                    $t_s = $rowtz['time_start'];
                    $t_e = $rowtz['time_end'];
                    $time = implode('-', array($t_s, $t_e));
                }
            }
            $errors = "Monday time " .$time. " is already occupied by | ";
            if($xx == 1){
                $errors .= " <b>Teacher: ".$full . "</b> | ";
            }
            if($yy == 1){
                $errors .= "<b> Section: " .$sec . "</b> | ";
            }
            if($zz == 1){
                $errors .= "<b> Room: ".$rum . "</b> | ";
            }
            echo $errors."</br>";
        }
        
        
    }
// //tuesday check

//     foreach($tuesday as $day){
//         // //counters
//         $count_t = 0;
//         $count_s = 0 ;
//         $count_r= 0;
//         // //for error handle
//         $error_t;
//         $error_s;
//         $error_r;
//         // //note to self di pa nakukuha time desc saka member name kasi iniispi pa paano

//         // icon
//         //us
        

//         // //check teacher
//         // //get data
//         $sql_t = "SELECT * from `schedule`";
//         $result_t = mysqli_query($con,$sql_t);
//         if($result_t){
//             while($row = mysqli_fetch_assoc($result_t)){
//                 $d = $row['day'];
//                 $t = $row['time_id'];
//                 $p = $row['prof_id'];
//                 $sj = $row['subject_id'];
//                 $sc = $row['section_id'];
//                 $r = $row['room_id'];
//                 //

//                 $sql_tt = "SELECT * from `user` WHERE `prof_id` = $p ";
//                 $result_tt = mysqli_query($con,$sql_tt);
//                 if($result_tt){
//                     while($rowtt = mysqli_fetch_assoc($result_tt)){
//                         $affix = $rowtt['affix'];
//                         $first = $rowtt['first'];
//                         $last = $rowtt['last'];
//                         $full = implode(' ', array($affix, $first, $last));
//                     }
//                 }
//                 //t
//                 $sql_tz = "SELECT * from `time` WHERE `time_id` = $t ";
//                 $result_tz = mysqli_query($con,$sql_tz);
//                 if($result_tz){
//                     while($rowtz = mysqli_fetch_assoc($result_tz)){
//                         $t_s = $rowtz['time_start'];
//                         $t_e = $rowtz['time_end'];
//                         $time = implode('-', array($t_s, $t_e));
//                     }
//                 }
//                 //s
//                 $sql_ts = "SELECT * from `section` WHERE `section_id` = $sc ";
//                 $result_ts = mysqli_query($con,$sql_ts);
//                 if($result_ts){
//                     while($rowts = mysqli_fetch_assoc($result_ts)){
//                         $sec = $rowts['section'];
//                     }
//                 }
//                 //r
//                 $sql_ty = "SELECT * from `room` WHERE `room_id` = $r ";
//                 $result_ty = mysqli_query($con,$sql_ty);
//                 if($result_ty){
//                     while($rowty = mysqli_fetch_assoc($result_ty)){
//                         $rum = $rowty['room'];
//                     }
//                 }

//                 //check teacher
//                 if($teacher == $p && $day == $t && $d == "T"){
//                     $count_t = 1;
//                 }
//                 //check section
//                 if($section == $sc && $day == $t && $d == "T"){
//                     $count_s = 1;
//                 }
//                 //
//                 if($room == $r && $day == $t && $d == "T"){
//                     $count_r = 1;
//                 }
//             }
            
//         }else{
//             die("Existed: " . mysqli_error());
//         }
//         $ww = 0;
//         $xx = 0;
//         $yy = 0;
//         $zz = 0;
//         // /// adding
//         if (($count_t==0) and ($count_s==0) and ($count_r==0)){
//             $sql = "INSERT INTO `schedule`(`day`, `time_id`, `prof_id`, `subject_id`, `section_id`, `room_id`) 
//             VALUES ('T','$day','$teacher','$subject','$section','$room')";

//             $result = mysqli_query($con,$sql);
//             if($result){
//                 // echo"Sucessfully created";
//                 $ww = 1;
//             }else{
//                 die("Adding Failed: " . mysqli_error());
//             }

//         }else{
//             if($count_t > 0){
//                 $xx = 1;
//             }

//             if($count_s > 0){
//                 $yy = 1;
//             }

//             if($count_r > 0){
//                 $zz = 1;
//             }
//         }
//         // 
//         if($ww == 1){
//             echo"Sucessfully created</br>";
//             $isa = 1;
//         }else{
//             $sql_tz = "SELECT * from `time` WHERE `time_id` = $day ";
//             $result_tz = mysqli_query($con,$sql_tz);
//             if($result_tz){
//                 while($rowtz = mysqli_fetch_assoc($result_tz)){
//                     $t_s = $rowtz['time_start'];
//                     $t_e = $rowtz['time_end'];
//                     $time = implode('-', array($t_s, $t_e));
//                 }
//             }
//             $errors = "Tuesday time " .$time. " is already occupied by | ";
//             if($xx == 1){
//                 $errors .= " <b>Teacher: ".$full . "</b> | ";
//             }
//             if($yy == 1){
//                 $errors .= "<b> Section: " .$sec . "</b> | ";
//             }
//             if($zz == 1){
//                 $errors .= "<b> Room: ".$rum . "</b> | ";
//             }
//             echo $errors."</br>";
//         }
//     }

// //wednesday

//     foreach($wednesday as $day){
//         // //counters
//         $count_t = 0;
//         $count_s = 0 ;
//         $count_r= 0;
//         // //for error handle
//         $error_t;
//         $error_s;
//         $error_r;
//         // //note to self di pa nakukuha time desc saka member name kasi iniispi pa paano

//         // //check teacher

//         // //get data
//         $sql_t = "SELECT * from `schedule`";
//         $result_t = mysqli_query($con,$sql_t);
//         if($result_t){
//             while($row = mysqli_fetch_assoc($result_t)){
//                 $d = $row['day'];
//                 $t = $row['time_id'];
//                 $p = $row['prof_id'];
//                 $sj = $row['subject_id'];
//                 $sc = $row['section_id'];
//                 $r = $row['room_id'];

//                 // icon
//                 //us
//                 $sql_tt = "SELECT * from `user` WHERE `prof_id` = $p ";
//                 $result_tt = mysqli_query($con,$sql_tt);
//                 if($result_tt){
//                     while($rowtt = mysqli_fetch_assoc($result_tt)){
//                         $affix = $rowtt['affix'];
//                         $first = $rowtt['first'];
//                         $last = $rowtt['last'];
//                         $full = implode(' ', array($affix, $first, $last));
//                     }
//                 }
//                 //t
//                 $sql_tz = "SELECT * from `time` WHERE `time_id` = $t ";
//                 $result_tz = mysqli_query($con,$sql_tz);
//                 if($result_tz){
//                     while($rowtz = mysqli_fetch_assoc($result_tz)){
//                         $t_s = $rowtz['time_start'];
//                         $t_e = $rowtz['time_end'];
//                         $time = implode('-', array($t_s, $t_e));
//                     }
//                 }
//                 //s
//                 $sql_ts = "SELECT * from `section` WHERE `section_id` = $sc ";
//                 $result_ts = mysqli_query($con,$sql_ts);
//                 if($result_ts){
//                     while($rowts = mysqli_fetch_assoc($result_ts)){
//                         $sec = $rowts['section'];
//                     }
//                 }
//                 //r
//                 $sql_ty = "SELECT * from `room` WHERE `room_id` = $r ";
//                 $result_ty = mysqli_query($con,$sql_ty);
//                 if($result_ty){
//                     while($rowty = mysqli_fetch_assoc($result_ty)){
//                         $rum = $rowty['room'];
//                     }
//                 }

//                 //check teacher
//                 if($teacher == $p && $day == $t && $d == "W"){  
//                     $count_t = 1;
//                 }
//                 //check section
//                 if($section == $sc && $day == $t && $d == "W"){
//                     $count_s = 1;
//                 }
//                 //
//                 if($room == $r && $day == $t && $d == "W"){
//                     $count_r = 1;
//                 }
//             }
            
//         }else{
//             die("Existed: " . mysqli_error());
//         }
//         $ww = 0;
//         $xx = 0;
//         $yy = 0;
//         $zz = 0;
//         // /// adding
//         if (($count_t==0) and ($count_s==0) and ($count_r==0)){
//             $sql = "INSERT INTO `schedule`(`day`, `time_id`, `prof_id`, `subject_id`, `section_id`, `room_id`) 
//             VALUES ('W','$day','$teacher','$subject','$section','$room')";

//             $result = mysqli_query($con,$sql);
//             if($result){
//                 $ww = 1;
//                 // echo"Sucessfully created";
//             }else{
//                 die("Adding Failed: " . mysqli_error());
//             }

//         }else{
//             if($count_t > 0){
//                 // echo $error_t."<br>";
//                 $xx = 1;
//             }

//             if($count_s > 0){
//                 // echo $error_s."<br>";
//                 $yy = 1;
//             }

//             if($count_r > 0){
//                 // echo $error_r."<br>";
//                 $zz = 1;
//             }
//         }
        
//         if($ww == 1){
//             echo"Sucessfully created</br>";
//             $isa = 1;
//         }else{
//             $sql_tz = "SELECT * from `time` WHERE `time_id` = $day ";
//             $result_tz = mysqli_query($con,$sql_tz);
//             if($result_tz){
//                 while($rowtz = mysqli_fetch_assoc($result_tz)){
//                     $t_s = $rowtz['time_start'];
//                     $t_e = $rowtz['time_end'];
//                     $time = implode('-', array($t_s, $t_e));
//                 }
//             }
//             $errors = "Wednesday time " .$time. " is already occupied by | ";
//             if($xx == 1){
//                 $errors .= " <b>Teacher: ".$full . "</b> | ";
//             }
//             if($yy == 1){
//                 $errors .= "<b> Section: " .$sec . "</b> | ";
//             }
//             if($zz == 1){
//                 $errors .= "<b> Room: ".$rum . "</b> | ";
//             }
//             echo $errors."</br>";
//         }
//     }

// //thursday


//     foreach($thursday as $day){
//         // //counters
//         $count_t = 0;
//         $count_s = 0 ;
//         $count_r= 0;
//         // //for error handle
//         $error_t;
//         $error_s;
//         $error_r;
//         // //note to self di pa nakukuha time desc saka member name kasi iniispi pa paano

//         // //check teacher

//         // //get data
//         $sql_t = "SELECT * from `schedule` ";
//         $result_t = mysqli_query($con,$sql_t);
//         if($result_t){
//             while($row = mysqli_fetch_assoc($result_t)){
//                 $d = $row['day'];
//                 $t = $row['time_id'];
//                 $p = $row['prof_id'];
//                 $sj = $row['subject_id'];
//                 $sc = $row['section_id'];
//                 $r = $row['room_id'];

//                 // icon
//                 //us
//                 $sql_tt = "SELECT * from `user` WHERE `prof_id` = $p ";
//                 $result_tt = mysqli_query($con,$sql_tt);
//                 if($result_tt){
//                     while($rowtt = mysqli_fetch_assoc($result_tt)){
//                         $affix = $rowtt['affix'];
//                         $first = $rowtt['first'];
//                         $last = $rowtt['last'];
//                         $full = implode(' ', array($affix, $first, $last));
//                     }
//                 }
//                 //t
//                 $sql_tz = "SELECT * from `time` WHERE `time_id` = $t ";
//                 $result_tz = mysqli_query($con,$sql_tz);
//                 if($result_tz){
//                     while($rowtz = mysqli_fetch_assoc($result_tz)){
//                         $t_s = $rowtz['time_start'];
//                         $t_e = $rowtz['time_end'];
//                         $time = implode('-', array($t_s, $t_e));
//                     }
//                 }
//                 //s
//                 $sql_ts = "SELECT * from `section` WHERE `section_id` = $sc ";
//                 $result_ts = mysqli_query($con,$sql_ts);
//                 if($result_ts){
//                     while($rowts = mysqli_fetch_assoc($result_ts)){
//                         $sec = $rowts['section'];
//                     }
//                 }
//                 //r
//                 $sql_ty = "SELECT * from `room` WHERE `room_id` = $r ";
//                 $result_ty = mysqli_query($con,$sql_ty);
//                 if($result_ty){
//                     while($rowty = mysqli_fetch_assoc($result_ty)){
//                         $rum = $rowty['room'];
//                     }
//                 }

//                 //check teacher
//                 if($teacher == $p && $day == $t && $d == "TH"){
//                     $count_t = 1;
//                 }
//                 //check section
//                 if($section == $sc && $day == $t && $d == "TH"){
//                     $count_s = 1;
//                 }
//                 //
//                 if($room == $r && $day == $t && $d == "TH"){
//                     $count_r = 1;
//                 }
//             }
            
//         }else{
//             die("Existed: " . mysqli_error());
//         }
        
//         // /// adding
//         if (($count_t==0) and ($count_s==0) and ($count_r==0)){
//             $sql = "INSERT INTO `schedule`(`day`, `time_id`, `prof_id`, `subject_id`, `section_id`, `room_id`) 
//             VALUES ('TH','$day','$teacher','$subject','$section','$room')";

//             $result = mysqli_query($con,$sql);
//             if($result){
//                 $ww = 1;
//                 // echo"Sucessfully created";
//             }else{
//                 die("Adding Failed: " . mysqli_error());
//             }

//         }else{
//             if($count_t > 0){
//                 // echo $error_t."<br>";
//                 $xx = 1;
//             }

//             if($count_s > 0){
//                 // echo $error_s."<br>";
//                 $yy = 1;
//             }

//             if($count_r > 0){
//                 // echo $error_r."<br>";
//                 $zz = 1;
//             }
//         }
//         if($ww == 1){
//             echo"Sucessfully created</br>";
//             $isa = 1;
//         }else{
//             $sql_tz = "SELECT * from `time` WHERE `time_id` = $day ";
//             $result_tz = mysqli_query($con,$sql_tz);
//             if($result_tz){
//                 while($rowtz = mysqli_fetch_assoc($result_tz)){
//                     $t_s = $rowtz['time_start'];
//                     $t_e = $rowtz['time_end'];
//                     $time = implode('-', array($t_s, $t_e));
//                 }
//             }
//             $errors = "Thursday time " .$time. " is already occupied by | ";
//             if($xx == 1){
//                 $errors .= " <b>Teacher: ".$full . "</b> | ";
//             }
//             if($yy == 1){
//                 $errors .= "<b> Section: " .$sec . "</b> | ";
//             }
//             if($zz == 1){
//                 $errors .= "<b> Room: ".$rum . "</b> | ";
//             }
//             echo $errors."</br>";
//         }
//     }

// //friday


//     foreach($friday as $day){
//         // //counters
//         $count_t = 0;
//         $count_s = 0 ;
//         $count_r= 0;
//         // //for error handle
//         $error_t;
//         $error_s;
//         $error_r;
//         // //note to self di pa nakukuha time desc saka member name kasi iniispi pa paano

//         // //check teacher

//         // //get data
//         $sql_t = "SELECT * from `schedule`";
//         $result_t = mysqli_query($con,$sql_t);
//         if($result_t){
//             while($row = mysqli_fetch_assoc($result_t)){
//                 $d = $row['day'];
//                 $t = $row['time_id'];
//                 $p = $row['prof_id'];
//                 $sj = $row['subject_id'];
//                 $sc = $row['section_id'];
//                 $r = $row['room_id'];

//                 // icon
//                 //us
//                 $sql_tt = "SELECT * from `user` WHERE `prof_id` = $p ";
//                 $result_tt = mysqli_query($con,$sql_tt);
//                 if($result_tt){
//                     while($rowtt = mysqli_fetch_assoc($result_tt)){
//                         $affix = $rowtt['affix'];
//                         $first = $rowtt['first'];
//                         $last = $rowtt['last'];
//                         $full = implode(' ', array($affix, $first, $last));
//                     }
//                 }
//                 //t
//                 $sql_tz = "SELECT * from `time` WHERE `time_id` = $t ";
//                 $result_tz = mysqli_query($con,$sql_tz);
//                 if($result_tz){
//                     while($rowtz = mysqli_fetch_assoc($result_tz)){
//                         $t_s = $rowtz['time_start'];
//                         $t_e = $rowtz['time_end'];
//                         $time = implode('-', array($t_s, $t_e));
//                     }
//                 }
//                 //s
//                 $sql_ts = "SELECT * from `section` WHERE `section_id` = $sc ";
//                 $result_ts = mysqli_query($con,$sql_ts);
//                 if($result_ts){
//                     while($rowts = mysqli_fetch_assoc($result_ts)){
//                         $sec = $rowts['section'];
//                     }
//                 }
//                 //r
//                 $sql_ty = "SELECT * from `room` WHERE `room_id` = $r ";
//                 $result_ty = mysqli_query($con,$sql_ty);
//                 if($result_ty){
//                     while($rowty = mysqli_fetch_assoc($result_ty)){
//                         $rum = $rowty['room'];
//                     }
//                 }

//                 //check teacher
//                 if($teacher == $p && $day == $t && $d == "F"){ 
//                     $count_t = 1;
//                 }
//                 //check section
//                 if($section == $sc && $day == $t && $d == "F"){
//                     $count_s = 1;
//                 }
//                 //
//                 if($room == $r && $day == $t && $d == "F"){
//                     $count_r = 1;
//                 }
//             }
            
//         }else{
//             die("Existed: " . mysqli_error());
//         }
        
//         // /// adding
//         if (($count_t==0) and ($count_s==0) and ($count_r==0)){
//             $sql = "INSERT INTO `schedule`(`day`, `time_id`, `prof_id`, `subject_id`, `section_id`, `room_id`) 
//             VALUES ('F','$day','$teacher','$subject','$section','$room')";

//             $result = mysqli_query($con,$sql);
//             if($result){
//                 $ww = 1;
//                 // echo"Sucessfully created";
//             }else{
//                 die("Adding Failed: " . mysqli_error());
//             }

//         }else{
//             if($count_t > 0){
//                 // echo $error_t."<br>";
//                 $xx = 1;
//             }

//             if($count_s > 0){
//                 // echo $error_s."<br>";
//                 $yy = 1;
//             }

//             if($count_r > 0){
//                 // echo $error_r."<br>";
//                 $zz = 1;
//             }
//         }
//         if($ww == 1){
//             echo"Sucessfully created</br>";
//             $isa = 1;
//         }else{
//             $sql_tz = "SELECT * from `time` WHERE `time_id` = $day ";
//             $result_tz = mysqli_query($con,$sql_tz);
//             if($result_tz){
//                 while($rowtz = mysqli_fetch_assoc($result_tz)){
//                     $t_s = $rowtz['time_start'];
//                     $t_e = $rowtz['time_end'];
//                     $time = implode('-', array($t_s, $t_e));
//                 }
//             }
//             $errors = "Friday time " .$time. " is already occupied by | ";
//             if($xx == 1){
//                 $errors .= " <b>Teacher: ".$full . "</b> | ";
//             }
//             if($yy == 1){
//                 $errors .= "<b> Section: " .$sec . "</b> | ";
//             }
//             if($zz == 1){
//                 $errors .= "<b> Room: ".$rum . "</b> | ";
//             }
//             echo $errors."</br>";
//         }
//     }
    // $timezone = "Asia/Hong_Kong";
    // date_default_timezone_set($timezone);
    // $today = date("m/d/Y g:i A");
    // // echo $isa;
    // if($isa == 1){
    //     $fc = 1;
    //     $gg = "Create Schedule";
    //     $sqlogs = "INSERT INTO `logs`(`state_name`, `user_id`,`timestamp`, `open`) VALUES ('$gg','$teacher','$today','$fc')";
    
    //     $resultlogs = mysqli_query($con,$sqlogs);
    //     if($resultlogs){
    //     }else{
    //         die("Adding Failed: " . mysqli_error());
    //     }
    // }
}
?>