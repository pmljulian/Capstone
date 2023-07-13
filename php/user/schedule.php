
<?php
   session_start();
   
   if( isset( $_SESSION['user'] ) ) {
      $user =  $_SESSION['user'];
   }else {
    header('Location: ../index.php');
   }
?><!DOCTYPE html>
<html lang = en>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Prof Sched</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/page.css'>
    <script src="../jquery-3.6.1.js"></script>
    <link rel="stylesheet" href="../../dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../../dist/font-awesome-4.7.0/css/font-awesome.css" crossorigin="anonymous">
    <!--  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/update.css'>
    <link rel='stylesheet' type='text/css' media='print' href='../../css/print.css'>
    <!-- eto pag ala net -->
    <!-- <script src="../dist/chart.js"></script> -->
    <script src="../../dist/swal/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../../dist/swal/dist/sweetalert2.min.css">
</head>
<body onload="window.print()">
<!-- php -->
<?php
    include '../connect.php';
    $sql = "SELECT * from `users` WHERE `id` = $user";
    $result = mysqli_query($con,$sql);
    
    //rows
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $title = $row['title'];
            $first = $row['first'];
            $last = $row['last'];
            $full = implode(' ', array($title, $first, $last));
        }
    }
    $timezone = "Asia/Hong_Kong";
    date_default_timezone_set($timezone);
    $today = date("Y");
?> 
<!--center  -->
<div class="container mx-auto mt-2 p-3 border-bottom"  style = "max-height:1500px;min-height:1500px;">
    <div class="row">
        <div class="col-12 text-center m-0 p-0">
            <img src =  "../../images/deped.png" class = "m-3" style = "width:10%">
            <p style = "font-size:12px; margin:0;"> Republic of the Philippines	 </p>
            <p style = "font-size:12px; margin:0;"> Department of Education	</p>
            <p style = "font-size:12px; margin:0;"> Region III</p>
            <p style = "font-size:12px; margin:0;"> Schools Division of Bulacan	</p>
            <p style = "font-size:12px; margin:0;"> TAAL HIGH SCHOOL</p>
            <p style = "font-size:12px; margin:0;"> SENIOR HIGH SCHOOL	</p>
            <p style = "font-size:12px; margin:0;">Macam St., Taal, Bocaue, Bulacan</p>
            <p style = "font-size:12px; margin:0;">Senior High School Class Program for Face-to-Face Instruction</p>
        </div>
    </div>
    <div class = row>
        <div class = "col-6">
            <p style = "margin:0;"><b>Teacher Id: </b><?php echo $user?></p>
            <p style = "margin:0;"><b>Name: </b><?php echo $full?></p>
        </div>
        <div class = "col-6">

        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center mt-3">
            <table class="table table-striped mb-0 border border-5 p-3 mr-5" id = "table-user" style = "font-size:10px;">
                <thead style="background-color: #FFC0CB;" class ="text-black">
                    <tr>
                        <th>Time</th>
                        <th class = "text-left">Monday</th>
                        <th class = "text-left">Tuesday</th>
                        <th class = "text-left">Wednesday</th>
                        <th class = "text-left">Thursday</th>
                        <th class = "text-left">Friday</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan = 6 style = "background-color: #fff6c9;" id = "am"> AM</td>
                </tr>
                <tr>
                    <!-- get the content -->
                    <?php
                        include '../connect.php';
                        //get data
                        $sql = "SELECT * from `time` ORDER BY `id`;";
                        $result = mysqli_query($con,$sql);
                        
                        //rows
                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                $t_id= $row['id'];
                                $t_start = $row['time_start'];
                                $t_end = $row['time_end'];
                                $fullt = implode(' to ', array($t_start, $t_end));
                                if ($t_id == 7){
                                    echo'<tr>
                                    <td colspan = 6 style = "background-color: #fff6c9;" id = "am"> PM</td>
                                </tr>';
                                }
                                echo '
                                    <tr>
                                    <td>'.$fullt.'</td>
                                ';
                                $m= " ";
                                $t= " ";
                                $w= " ";
                                $th= " ";
                                $f= " ";
                                //monday
                                $sqlm = "SELECT * from `schedule` WHERE `time` = $t_id AND `faculty` = $user AND `day` = 1;";
                                $resultm = mysqli_query($con,$sqlm);
                                if($resultm){
                                    while($rowm = mysqli_fetch_assoc($resultm)){
                                        //dine
                                        $sched_id = $rowm['id'];
                                        $sj_id = $rowm['subject'];
                                        $sc_id = $rowm['section'];
                                        $r_id = $rowm['room'];
                                        
                                        //puro sql
                                        //subject
                                        $sqlsub = "SELECT * from `subject` WHERE `id` = $sj_id;";
                                        $resultsub = mysqli_query($con,$sqlsub);
                                        if($resultsub){
                                            while($rowsub = mysqli_fetch_assoc($resultsub)){
                                                $subject = $rowsub['subject'];
                                                // $m =$subject;
                                            }
                                        }
                                        
                                        $m = $m . "</br>";
                                        //section
                                        $sqlsec = "SELECT * from `section` WHERE `id` = $sc_id;";
                                        $resultsec = mysqli_query($con,$sqlsec);
                                        if($resultsec){
                                            while($rowsec = mysqli_fetch_assoc($resultsec)){
                                                $section = $rowsec['section'];
                                                // $m =$m . $section;
                                            }
                                        }
                                        $m = $m . "</br>";
                                        //room
                                        $sqlr = "SELECT * from `room` WHERE `id` = $r_id;";
                                        $resultr = mysqli_query($con,$sqlr);
                                        if($resultr){
                                            while($rowr = mysqli_fetch_assoc($resultr)){
                                                $room = $rowr['room'];
                                                // $m =$m ." Room " .$room;
                                            }
                                        }
                                        $m = $subject . "&emsp;" . $section;
                                        $m = $m . " </br>Room " .$room;
                                        // $m = $m . "</br>" . "<a class = 'deleteid' href = 'delete_sched.php?deleteid=".$sched_id . " " .$user."'>DELETE</a>";
                                    }
                                }
                                //tuesday
                                $sqlt = "SELECT * from `schedule` WHERE `time` = $t_id AND `faculty` = $user AND `day` = 2";
                                $resultt = mysqli_query($con,$sqlt);
                                if($resultt){
                                    while($rowt = mysqli_fetch_assoc($resultt)){
                                        //dine
                                        $sched_id = $rowt['id'];
                                        $sj_id = $rowt['subject'];
                                        $sc_id = $rowt['section'];
                                        $r_id = $rowt['room'];
                                        

                                        //puro sql
                                        //subject
                                        $sqlsub = "SELECT * from `subject` WHERE `id` = $sj_id;";
                                        $resultsub = mysqli_query($con,$sqlsub);
                                        if($resultsub){
                                            while($rowsub = mysqli_fetch_assoc($resultsub)){
                                                $subject = $rowsub['subject'];
                                                // $t =$subject;
                                            }
                                        }
                                        
                                        $t = $t . "</br>";
                                        //section
                                        $sqlsec = "SELECT * from `section` WHERE `id` = $sc_id;";
                                        $resultsec = mysqli_query($con,$sqlsec);
                                        if($resultsec){
                                            while($rowsec = mysqli_fetch_assoc($resultsec)){
                                                $section = $rowsec['section'];
                                                // $t =$t . $section;
                                            }
                                        }
                                        $t = $t . "</br>";
                                        //room
                                        $sqlr = "SELECT * from `room` WHERE `id` = $r_id;";
                                        $resultr = mysqli_query($con,$sqlr);
                                        if($resultr){
                                            while($rowr = mysqli_fetch_assoc($resultr)){
                                                $room = $rowr['room'];
                                                // $t =$t ." Room " .$room;
                                            }
                                        }
                                        $t = $subject . "&emsp;" . $section;
                                        $t = $t . " </br>Room " .$room;
                                        // $t = $t . "</br>" . "<a class = 'deleteid' href = 'delete_sched.php?deleteid=".$sched_id . " " .$user."'>DELETE</a>";
                                    }
                                }
                                //wednesday
                                $sqlw = "SELECT * from `schedule` WHERE `time` = $t_id AND `faculty` = $user AND `day` = 3";
                                $resultw = mysqli_query($con,$sqlw);
                                if($resultw){
                                    while($roww = mysqli_fetch_assoc($resultw)){
                                        //dine
                                        $sched_id = $roww['id'];
                                        $sj_id = $roww['subject'];
                                        $sc_id = $roww['section'];
                                        $r_id = $roww['room'];
                                        

                                        //puro sql
                                        //subject
                                        $sqlsub = "SELECT * from `subject` WHERE `id` = $sj_id;";
                                        $resultsub = mysqli_query($con,$sqlsub);
                                        if($resultsub){
                                            while($rowsub = mysqli_fetch_assoc($resultsub)){
                                                $subject = $rowsub['subject'];
                                                // $w =$subject;
                                            }
                                        }
                                        
                                        $w = $w . "</br>";
                                        //section
                                        $sqlsec = "SELECT * from `section` WHERE `id` = $sc_id;";
                                        $resultsec = mysqli_query($con,$sqlsec);
                                        if($resultsec){
                                            while($rowsec = mysqli_fetch_assoc($resultsec)){
                                                $section = $rowsec['section'];
                                                // $w =$w . $section;
                                            }
                                        }
                                        $w = $w . "</br>";
                                        //room
                                        $sqlr = "SELECT * from `room` WHERE `id` = $r_id;";
                                        $resultr = mysqli_query($con,$sqlr);
                                        if($resultr){
                                            while($rowr = mysqli_fetch_assoc($resultr)){
                                                $room = $rowr['room'];
                                                // $w =$w ." Room " .$room;
                                            }
                                        }
                                        $w = $subject . "&emsp;" . $section;
                                        $w = $w . " </br>Room " .$room;
                                        // $w = $w . "</br>" . "<a class = 'deleteid' href = 'delete_sched.php?deleteid=".$sched_id . " " .$user."'>DELETE</a>";
                                    }
                                }
                                
                                //thursday
                                $sqlth = "SELECT * from `schedule` WHERE `time` = $t_id AND `faculty` = $user AND `day` = 4";
                                $resultth = mysqli_query($con,$sqlth);
                                if($resultth){
                                    while($rowth = mysqli_fetch_assoc($resultth)){
                                        //dine
                                        $sched_id = $rowth['id'];
                                        $sj_id = $rowth['subject'];
                                        $sc_id = $rowth['section'];
                                        $r_id = $rowth['room'];
                                        

                                        //puro sql
                                        //subject
                                        $sqlsub = "SELECT * from `subject` WHERE `id` = $sj_id;";
                                        $resultsub = mysqli_query($con,$sqlsub);
                                        if($resultsub){
                                            while($rowsub = mysqli_fetch_assoc($resultsub)){
                                                $subject = $rowsub['subject'];
                                                // $th =$subject;
                                            }
                                        }
                                        
                                        $th = $th . "</br>";
                                        //section
                                        $sqlsec = "SELECT * from `section` WHERE `id` = $sc_id;";
                                        $resultsec = mysqli_query($con,$sqlsec);
                                        if($resultsec){
                                            while($rowsec = mysqli_fetch_assoc($resultsec)){
                                                $section = $rowsec['section'];
                                                // $th =$th . $section;
                                            }
                                        }
                                        $th = $th . "</br>";
                                        //room
                                        $sqlr = "SELECT * from `room` WHERE `id` = $r_id;";
                                        $resultr = mysqli_query($con,$sqlr);
                                        if($resultr){
                                            while($rowr = mysqli_fetch_assoc($resultr)){
                                                $room = $rowr['room'];
                                                // $th =$th ." Room " .$room;
                                            }
                                        }
                                        $th = $subject . "&emsp;" . $section;
                                        $th = $th . " </br>Room " .$room;
                                        // $th = $th . "</br>" . "<a class = 'deleteid' href = 'delete_sched.php?deleteid=".$sched_id . " " .$user."'>DELETE</a>";
                                    }
                                }
                                //friday
                                
                                $sqlf = "SELECT * from `schedule` WHERE `time` = $t_id AND `faculty` = $user AND `day` = 5";
                                $resultf = mysqli_query($con,$sqlf);
                                if($resultf){
                                    while($rowf = mysqli_fetch_assoc($resultf)){
                                        //dine
                                        $sched_id = $rowf['id'];
                                        $sj_id = $rowf['subject'];
                                        $sc_id = $rowf['section'];
                                        $r_id = $rowf['room'];
                                        

                                        //puro sql
                                        //subject
                                        $sqlsub = "SELECT * from `subject` WHERE `id` = $sj_id;";
                                        $resultsub = mysqli_query($con,$sqlsub);
                                        if($resultsub){
                                            while($rowsub = mysqli_fetch_assoc($resultsub)){
                                                $subject = $rowsub['subject'];
                                                // $f =$subject;
                                            }
                                        }
                                        
                                        $f = $f . "</br>";
                                        //section
                                        $sqlsec = "SELECT * from `section` WHERE `id` = $sc_id;";
                                        $resultsec = mysqli_query($con,$sqlsec);
                                        if($resultsec){
                                            while($rowsec = mysqli_fetch_assoc($resultsec)){
                                                $section = $rowsec['section'];
                                                // $f =$f . $section;
                                            }
                                        }
                                        $f = $f . "</br>";
                                        //room
                                        $sqlr = "SELECT * from `room` WHERE `id` = $r_id;";
                                        $resultr = mysqli_query($con,$sqlr);
                                        if($resultr){
                                            while($rowr = mysqli_fetch_assoc($resultr)){
                                                $room = $rowr['room'];
                                                // $f =$f ." Room " .$room;
                                            }
                                        }
                                        $f = $subject . "&emsp;" . $section;
                                        $f = $f . " </br>Room " .$room;
                                        // $f = $f . "</br>" . "<a class = 'deleteid' href = 'delete_sched.php?deleteid=".$sched_id . " " .$user."'>DELETE</a>";
                                    }
                                    
                                }
                            
                                echo'<td class = "text-left">'.$m.'</td>';
                                echo'<td class = "text-left">'.$t.'</td>';
                                echo'<td class = "text-left">'.$w.'</td>';
                                echo'<td class = "text-left">'.$th.'</td>';
                                echo'<td class = "text-left">'.$f.'</td>';
                                echo '</tr>';
                            }
                            
                        
                            
                        }else{
                            die("Adding Failed: " . mysqli_error());
                        }
                        
                    ?>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="row p-3">
            <div class="col-12 text-left mt-3 " style = "position:relative;bottom:0;">
                <p class = "pt-5">Prepared By:</p>
                <p class = "pt-5">Recomending Approval:</p>
                <p class = "pt-5">Approval:</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>