<!DOCTYPE html>
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
</head>
<body onload="window.print()">
<!-- php -->

<?php

    include '../connect.php';
    $sqlz = "SELECT * from `users`";
    $resultz = mysqli_query($con,$sqlz);
    
    //rows
    if($resultz){
        while($rowz = mysqli_fetch_assoc($resultz)){
            $user = $rowz['id'];
            $affix = $rowz['title'];
            $first = $rowz['first'];
            $last = $rowz['last'];
            $full = implode(' ', array($affix, $first, $last));
            // dat dine
            if($user != 12344112){
            echo'<div class="container mx-auto mt-2 p-3 border-bottom" style = "max-height:1500px;min-height:1500px;">
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
            </div>';

            echo'
                <div class = row>
                    <div class = "col-6">
                        <p style = "margin:0;"><b>Teacher Id: </b>'.$user.'</p>
                        <p style = "margin:0;"><b>Name: </b>'.$full.'</p>
                    </div>
                    <div class = "col-6">
                </div>
            ';
            echo' </div>
            <div class="row">
                <div class="col-12 text-center mt-3">
                    <table class="table table-striped mb-5 border border-5" id = "table-user" style = "font-size:10px;">
                        <thead style="background-color: #002d72;" class ="text-white">
                        <colgroup>
                            <col width="15%">
                            <col width="16%">
                            <col width="16%">
                            <col width="16%">
                            <col width="16%">
                            <col width="16%">
                        </colgroup>
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
                            <td colspan = 6 class = "bg-warning" id = "am"> AM</td>
                        </tr>
                        <tr>';

                        include '../connect.php';
                        //get data
                        $sql = "SELECT * from `time` ORDER BY `id`;";
                        $result = mysqli_query($con,$sql);
                        
                        //rows
                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                $t_id = $row['id'];
                                $t_start=date("h:i a",strtotime($row['time_start']));
                                $t_end=date("h:i a",strtotime($row['time_end']));
                                $fullt = implode(' to ', array($t_start, $t_end));
                                if($t_id == 7){
                                    echo'<tr>
                                        <td colspan = 6 class = "bg-warning" id = "am"> PM</td>
                                     </tr>';
                                }
                                echo '
                                    <tr>
                                    <td>'.$fullt.'</td>
                                ';
                                //checkes
                                $m= " ";
                                $t= " ";
                                $w= " ";
                                $th= " ";
                                $f= " ";
                                //colors
                                $mc= " ";
                                $tc= " ";
                                $wc= " ";
                                $thc= " ";
                                $fc= " ";
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
                                                $ey = $rowsub['id'];
                                                $subject = $rowsub['subject'];
                                                $mc = $rowsub['color'];
                                            }
                                        }
                                        
                                        // $m = $m . "</br>";
                                        //section
                                        $sqlsec = "SELECT * from `section` WHERE `id` = $sc_id;";
                                        $resultsec = mysqli_query($con,$sqlsec);
                                        if($resultsec){
                                            while($rowsec = mysqli_fetch_assoc($resultsec)){
                                                $section = $rowsec['section'];
                                                // $m =$m . $section;
                                            }
                                        }
                                        // $m = $m . "</br>";
                                        //room
                                        $sqlr = "SELECT * from `room` WHERE `id` = $r_id;";
                                        $resultr = mysqli_query($con,$sqlr);
                                        if($resultr){
                                            while($rowr = mysqli_fetch_assoc($resultr)){
                                                $room = $rowr['room'];
                                                // $m =$m ." Room " .$room;
                                            }
                                        }
                                        if ($ey !=0){
                                            $m = $subject . "&emsp;" . $section;
                                            $m = $m . " </br>Room " .$room;
                                        }else{
                                            $m = $subject;
                                        }
                                        
                                    }
                                }
                                //tuesday
                                $sqlt = "SELECT * from `schedule` WHERE `time` = $t_id AND `faculty` = $user AND `day` = 2;";
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
                                                $ey = $rowsub['id'];
                                                $subject = $rowsub['subject'];
                                                $tc = $rowsub['color'];
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
                                        if ($ey !=0){
                                            $t = $subject . "&emsp;" . $section;
                                            $t = $t . " </br>Room " .$room;
                                        }else{
                                            $t = $subject;
                                        }
                                       
                                    }
                                }
                                //wednesday
                                $sqlw = "SELECT * from `schedule` WHERE `time` = $t_id AND `faculty` = $user AND `day` = 3;";
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
                                                $ey = $rowsub['id'];
                                                $subject = $rowsub['subject'];
                                                $wc = $rowsub['color'];
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
                                        if ($ey !=0){
                                            $w = $subject . "&emsp;" . $section;
                                            $w = $w . " </br>Room " .$room;
                                        }else{
                                            $w = $subject;
                                        }
                                        
                                    }
                                }
                                
                                //thursday
                                $sqlth = "SELECT * from `schedule` WHERE `time` = $t_id AND `faculty` = $user AND `day` = 4;";
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
                                                $ey = $rowsub['id'];
                                                $subject = $rowsub['subject'];
                                                $thc = $rowsub['color'];
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
                                        if ($ey !=0){
                                            $th = $subject . "&emsp;" . $section;
                                            $th = $th . " </br>Room " .$room;
                                        }else{
                                            $th = $subject;
                                        }
                                        
                                    }
                                }
                                //friday
                                
                                $sqlf = "SELECT * from `schedule` WHERE `time` = $t_id AND `faculty` = $user AND `day` = 5;";
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
                                                $ey = $rowsub['id'];
                                                $subject = $rowsub['subject'];
                                                $fc = $rowsub['color'];
                                                // $f =$subject;
                                            }
                                        }
                                        
                                        // $f = $f . "</br>";
                                        //section
                                        $sqlsec = "SELECT * from `section` WHERE `id` = $sc_id;";
                                        $resultsec = mysqli_query($con,$sqlsec);
                                        if($resultsec){
                                            while($rowsec = mysqli_fetch_assoc($resultsec)){
                                                $section = $rowsec['section'];
                                                // $f =$f . $section;
                                            }
                                        }
                                        // $f = $f . "</br>";
                                        //room
                                        $sqlr = "SELECT * from `room` WHERE `id` = $r_id;";
                                        $resultr = mysqli_query($con,$sqlr);
                                        if($resultr){
                                            while($rowr = mysqli_fetch_assoc($resultr)){
                                                $room = $rowr['room'];
                                                // $f =$f ." Room " .$room;
                                            }
                                        }
                                        if ($ey !=0){
                                            $f = $subject . "&emsp;" . $section;
                                            $f = $f . " </br>Room " .$room;
                                        }else{
                                            $f = $subject;
                                        }
                                        
                                    }
                                    
                                }
                                //conditions
                                
                                echo'<td class = "text-left" style = "background: '.$mc.'">'.$m.'</td>';
                                echo'<td class = "text-left" style = "background: '.$tc.'">'.$t.'</td>';
                                echo'<td class = "text-left" style = "background: '.$wc.'">'.$w.'</td>';
                                echo'<td class = "text-left" style = "background: '.$thc.'">'.$th.'</td>';
                                echo'<td class = "text-left" style = "background: '.$fc.'">'.$f.'</td>';
                                echo '</tr>';
                            }
                            
                            
                            if($t_id == 6){
                                echo'<tr>
                                    <td colspan = 6 class = "bg-warning" id = "am"> PM</td>
                                 </tr>';
                            }
                            
                        }else{
                            die("Adding Failed: " . mysqli_error());
                        }
                 echo'          </tr>
                 </tbody>
             </table>
             
         </div>
            
     </div>
     <div class="col-12 text-left mt-3 b-0" style = "position:relative; bottom:0;">
                <p class = "pt-5">Prepared By:</p>
                <p class = "pt-5">Recomending Approval:</p>
                <p class = "pt-5">Approval:</p>
            </div>
     </div>
 ';       
        }
        }
    }
    
?> 

            
     
</body>
</html>