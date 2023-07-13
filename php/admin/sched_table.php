
<?php
if($_POST){
    $f_id = $_POST['id'];
    $sic = $_POST['section'];
    $rhom = $_POST['room'];
    // echo $rhom;
    include '../connect.php';
    //get data
    $sql = "SELECT * from `time`";
    $result = mysqli_query($con,$sql);
    
    //rows
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $time = $row['id'];
            $start=date("h:i a",strtotime($row['time_start']));
            $end=date("h:i a",strtotime($row['time_end']));
            
            //display single
            $m= " ";
            $t= " ";
            $w= " ";
            $th= " ";
            $f= " ";
            //colors
            $mc;
            $tc;
            $wc;
            $thc;
            $fc;
            //into table
            echo '
                <tr>
                    <td>'.$start. '-' .$end.'</br><a class = "deleteall" href = "delete_all.php?deleteid='.$f_id . ' ' .$time.'">Delete Row</a></td>
            ';

            //check per timeframe
            //monday
            $sqlm = "SELECT * from `schedule` WHERE `time` = $time AND `faculty` = $f_id;";
            $resultm = mysqli_query($con,$sqlm);
            //negator
            
            if($resultm){
                while($rowm = mysqli_fetch_assoc($resultm)){
                    //dine
                    $sched_id = $rowm['id'];
                    $day = $rowm['day'];
                    $section = $rowm['section'];
                    $subject = $rowm['subject'];
                    $room = $rowm['room'];
                    
                    //puro sql
                    //subject
                    $sqlsub = "SELECT * from `subject` WHERE `id` = $subject;";
                    $resultsub = mysqli_query($con,$sqlsub);
                    if($resultsub){
                        while($rowsub = mysqli_fetch_assoc($resultsub)){
                            $idsub = $rowsub['id'];
                            $sub = $rowsub['subject'];
                            $color = $rowsub['color'];
                            // $m =$subject;
                        }
                    }
                    //section
                    $sqlsec = "SELECT * from `section` WHERE `id` = $section;";
                    $resultsec = mysqli_query($con,$sqlsec);
                    if($resultsec){
                        while($rowsec = mysqli_fetch_assoc($resultsec)){
                            $sec = $rowsec['section'];
                            // $m =$m . $section;
                        }
                    }
                    //room
                    $sqlrum = "SELECT * from `room` WHERE `id` = $room;";
                    $resultrum = mysqli_query($con,$sqlrum);
                    if($resultrum){
                        while($rowrum = mysqli_fetch_assoc($resultrum)){
                            $rum = $rowrum['room'];
                            // $m =$m . $section;
                        }
                    }
                    //display
                    if($idsub!=0){
                        $ex = "</br>".$sec ."</br> Room " . $rum;
                    }else{
                        $ex = "";
                    }

                    // if($day == 1){
                    //     $mc = $color;
                    //     $m = $sub . "" . $ex ."</br><a class = 'deleteid' href = 'delete_sched.php?deleteid=".$sched_id . " " .$f_id."'>Delete</a>";
                    // }else if($day == 2){
                    //     $tc = $color;
                    //     $t = $sub . "" . $ex ."</br><a class = 'deleteid' href = 'delete_sched.php?deleteid=".$sched_id . " " .$f_id."'>Delete</a>";
                    // }else if($day == 3){
                    //     $wc = $color;
                    //     $w = $sub . "" . $ex ."</br><a class = 'deleteid' href = 'delete_sched.php?deleteid=".$sched_id . " " .$f_id."'>Delete</a>";
                    // }else if($day == 4){
                    //     $thc = $color;
                    //     $th = $sub . "" . $ex ."</br><a class = 'deleteid' href = 'delete_sched.php?deleteid=".$sched_id . " " .$f_id."'>Delete</a>";
                    // }else if($day == 5){
                    //     $fc = $color;
                    //     $f = $sub . "" . $ex ."</br><a class = 'deleteid' href = 'delete_sched.php?deleteid=".$sched_id . " " .$f_id."'>Delete</a>";
                    // }
                    if($day == 1){
                        $mc = $color;
                        $m = $sub . "" . $ex ."</br><a class = 'deleteid' href = '#' style = 'font-size:14px;color:#CA0505;' onclick = 'pass(".$sched_id.",".$f_id.")'>Delete</a>";
                    }else if($day == 2){
                        $tc = $color;
                        $t = $sub . "" . $ex ."</br><a class = 'deleteid' href = '#' style = 'font-size:14px;color:#CA0505;' onclick = 'pass(".$sched_id.",".$f_id.")'>Delete</a>";
                    }else if($day == 3){
                        $wc = $color;
                        $w = $sub . "" . $ex ."</br><a class = 'deleteid' href = '#' style = 'font-size:14px;color:#CA0505;' onclick = 'pass(".$sched_id.",".$f_id.")'>Delete</a>";
                    }else if($day == 4){
                        $thc = $color;
                        $th = $sub . "" . $ex ."</br><a class = 'deleteid' href = '#' style = 'font-size:14px;color:#CA0505;' onclick = 'pass(".$sched_id.",".$f_id.")'>Delete</a>";
                    }else if($day == 5){
                        $fc = $color;
                        $f = $sub . "" . $ex ."</br><a class = 'deleteid' href = '#' style = 'font-size:14px;color:#CA0505;' onclick = 'pass(".$sched_id.",".$f_id.")'>Delete</a>";
                    }

                   
                    // $m = $m . "</br>" . "<a class = 'deleteid' href = 'delete_sched.php?deleteid=".$sched_id . " " .$f_id."'>DELETE</a>";
                }
            }
            
           //display
            // $colors = array("#A981A9","#80AF71","#E15E6F","#BF8088","#C38872","#A3B884", "#E5ACB6","#CBBEB5","#A0C29C","#F9BD98");
          
            if($m != " "){
                echo'
                    <td style = "background: '.$mc.'">'.$m.'</td>
                ';
            }else{
                $sqlp = "SELECT * from `schedule` WHERE `time` = $time AND `section` = $sic AND `day` = 1";
                $resultp = mysqli_query($con,$sqlp);
                //negator
                $contf;
                $conts;
                $contr = "";
                if($resultp){
                    while($rowp = mysqli_fetch_assoc($resultp)){
                        $qt = $rowp['time'];
                        $qi = $rowp['faculty'];
                        $qs = $rowp['section'];
                        $qr = $rowp['room'];
                        // echo $qs;
                        if($qi != ""){
                            $h = 1;
                            $contf = $qi;
                            $conts = $qs;
                            $contr = $qr;
                        }
                    }
                }
                //
                $sqlq = "SELECT * from `schedule` WHERE `time` = $time AND `room` = $rhom AND `day` = 1";
                $resultq = mysqli_query($con,$sqlq);
                //negator
                
                if($resultq){
                    while($rowq = mysqli_fetch_assoc($resultq)){
                        $qtq = $rowq['time'];
                        $qiq = $rowq['faculty'];
                        $qsq = $rowq['section'];
                        $qrq = $rowq['room'];
                        // echo $qs;
                        if($qiq != ""){
                            $h = 1;
                            $contf = $qiq;
                            $conts = $qsq;
                            $contr = $qrq;
                            
                            
                        }
                    }
                }
                
                if($h != 1){
                    echo'
                    <td class = "text-center"><input class = "m-3" type="checkbox" id="check" name="monday[]" value="'.$time.'" style="width: 22px; height: 22px;"></td>
                    ';
                }else{
                    // faculty
                    $sqltt = "SELECT * from `users` WHERE `id` = $contf;";
                    $resulttt = mysqli_query($con,$sqltt);
                    if($resulttt){
                        while($rowsub = mysqli_fetch_assoc($resulttt)){
                            $title = $rowsub['title'];
                            $first = $rowsub['first'];
                            $last = $rowsub['last'];
                            $full = implode(' ', array($title, $first, $last));
                            // $m =$subject;
                        }
                    }
                    // //section
                    $sqlst = "SELECT * from `section` WHERE `id` = $conts;";
                    $resultst = mysqli_query($con,$sqlst);
                    if($resultst){
                        while($rowsec = mysqli_fetch_assoc($resultst)){
                            $ces = $rowsec['section'];
                            // $m =$m . $section;
                        }
                    }
                    // //room
                    $sqlrt = "SELECT * from `room` WHERE `id` = $contr;";
                    $resultrt = mysqli_query($con,$sqlrt);
                    if($resultrt){
                        while($rowrum = mysqli_fetch_assoc($resultrt)){
                            $mur = $rowrum['room'];
                            // $m =$m . $section;
                        }
                    }
            
                    echo'
                        <td>Not Available</br>'.$full. '</br>Section:  '.$ces. '</br>Room: ' .$mur. '</td>
                    ';
                    $h = 0;
                // $contr = "";
                }
                
                
            }

            if($t != " "){
                echo'
                    <td style = "background: '.$tc.'">'.$t.'</td>
                ';
            }else{
                $sqlp = "SELECT * from `schedule` WHERE `time` = $time AND `section` = $sic AND `day` = 2 ";
                $resultp = mysqli_query($con,$sqlp);
                //negator
                $contf;
                $conts;
                $contr = "";
                if($resultp){
                    while($rowp = mysqli_fetch_assoc($resultp)){
                        $qt = $rowp['time'];
                        $qi = $rowp['faculty'];
                        $qs = $rowp['section'];
                        $qr = $rowp['room'];
                        // echo $qs;
                        if($qi != ""){
                            $h = 1;
                            $contf = $qi;
                            $conts = $qs;
                            $contr = $qr;
                        }
                    }
                }
                //
                $sqlq = "SELECT * from `schedule` WHERE `time` = $time AND `room` = $rhom AND `day` = 2";
                $resultq = mysqli_query($con,$sqlq);
                //negator
                
                if($resultq){
                    while($rowq = mysqli_fetch_assoc($resultq)){
                        $qtq = $rowq['time'];
                        $qiq = $rowq['faculty'];
                        $qsq = $rowq['section'];
                        $qrq = $rowq['room'];
                        // echo $qs;
                        if($qiq != ""){
                            $h = 1;
                            $contf = $qiq;
                            $conts = $qsq;
                            $contr = $qrq;
                            
                            
                        }
                    }
                }
                
                if($h != 1){
                    echo'
                    <td class = "text-center"><input class = "m-3" type="checkbox" id="check" name="tuesday[]" value="'.$time.'" style="width: 22px; height: 22px;"></td>
                    ';
                }else{
                    // faculty
                    $sqltt = "SELECT * from `users` WHERE `id` = $contf;";
                    $resulttt = mysqli_query($con,$sqltt);
                    if($resulttt){
                        while($rowsub = mysqli_fetch_assoc($resulttt)){
                            $title = $rowsub['title'];
                            $first = $rowsub['first'];
                            $last = $rowsub['last'];
                            $full = implode(' ', array($title, $first, $last));
                            // $m =$subject;
                        }
                    }
                    // //section
                    $sqlst = "SELECT * from `section` WHERE `id` = $conts;";
                    $resultst = mysqli_query($con,$sqlst);
                    if($resultst){
                        while($rowsec = mysqli_fetch_assoc($resultst)){
                            $ces = $rowsec['section'];
                            // $m =$m . $section;
                        }
                    }
                    // //room
                    $sqlrt = "SELECT * from `room` WHERE `id` = $contr;";
                    $resultrt = mysqli_query($con,$sqlrt);
                    if($resultrt){
                        while($rowrum = mysqli_fetch_assoc($resultrt)){
                            $mur = $rowrum['room'];
                            // $m =$m . $section;
                        }
                    }
            
                    echo'
                        <td>Not Available</br>'.$full. '</br>Section:  '.$ces. '</br>Room: ' .$mur. '</td>
                    ';
                    $h = 0;
                // $contr = "";
                }
                
                
            }

            if($w != " "){
                echo'
                    <td style = "background: '.$wc.'">'.$w.'</td>
                ';
            }else{
                $sqlp = "SELECT * from `schedule` WHERE `time` = $time AND `section` = $sic AND `day` = 3 ";
                $resultp = mysqli_query($con,$sqlp);
                //negator
                $contf;
                $conts;
                $contr = "";
                if($resultp){
                    while($rowp = mysqli_fetch_assoc($resultp)){
                        $qt = $rowp['time'];
                        $qi = $rowp['faculty'];
                        $qs = $rowp['section'];
                        $qr = $rowp['room'];
                        // echo $qs;
                        if($qi != ""){
                            $h = 1;
                            $contf = $qi;
                            $conts = $qs;
                            $contr = $qr;
                        }
                    }
                }
                //
                $sqlq = "SELECT * from `schedule` WHERE `time` = $time AND `room` = $rhom AND `day` = 3";
                $resultq = mysqli_query($con,$sqlq);
                //negator
                
                if($resultq){
                    while($rowq = mysqli_fetch_assoc($resultq)){
                        $qtq = $rowq['time'];
                        $qiq = $rowq['faculty'];
                        $qsq = $rowq['section'];
                        $qrq = $rowq['room'];
                        // echo $qs;
                        if($qiq != ""){
                            $h = 1;
                            $contf = $qiq;
                            $conts = $qsq;
                            $contr = $qrq;
                            
                            
                        }
                    }
                }
                
                if($h != 1){
                    echo'
                    <td class = "text-center"><input class = "m-3" type="checkbox" id="check" name="wednesday[]" value="'.$time.'" style="width: 22px; height: 22px;"></td>
                    ';
                }else{
                    // faculty
                    $sqltt = "SELECT * from `users` WHERE `id` = $contf;";
                    $resulttt = mysqli_query($con,$sqltt);
                    if($resulttt){
                        while($rowsub = mysqli_fetch_assoc($resulttt)){
                            $title = $rowsub['title'];
                            $first = $rowsub['first'];
                            $last = $rowsub['last'];
                            $full = implode(' ', array($title, $first, $last));
                            // $m =$subject;
                        }
                    }
                    // //section
                    $sqlst = "SELECT * from `section` WHERE `id` = $conts;";
                    $resultst = mysqli_query($con,$sqlst);
                    if($resultst){
                        while($rowsec = mysqli_fetch_assoc($resultst)){
                            $ces = $rowsec['section'];
                            // $m =$m . $section;
                        }
                    }
                    // //room
                    $sqlrt = "SELECT * from `room` WHERE `id` = $contr;";
                    $resultrt = mysqli_query($con,$sqlrt);
                    if($resultrt){
                        while($rowrum = mysqli_fetch_assoc($resultrt)){
                            $mur = $rowrum['room'];
                            // $m =$m . $section;
                        }
                    }
            
                    echo'
                        <td>Not Available</br>'.$full. '</br>Section:  '.$ces. '</br>Room: ' .$mur. '</td>
                    ';
                    $h = 0;
                // $contr = "";
                }
                
                
            }
            if($th != " "){
                echo'
                    <td style = "background: '.$thc.'">'.$th.'</td>
                ';
            }else{
                $sqlp = "SELECT * from `schedule` WHERE `time` = $time AND `section` = $sic AND `day` = 4 ";
                $resultp = mysqli_query($con,$sqlp);
                //negator
                $contf;
                $conts;
                $contr = "";
                if($resultp){
                    while($rowp = mysqli_fetch_assoc($resultp)){
                        $qt = $rowp['time'];
                        $qi = $rowp['faculty'];
                        $qs = $rowp['section'];
                        $qr = $rowp['room'];
                        // echo $qs;
                        if($qi != ""){
                            $h = 1;
                            $contf = $qi;
                            $conts = $qs;
                            $contr = $qr;
                        }
                    }
                }
                //
                $sqlq = "SELECT * from `schedule` WHERE `time` = $time AND `room` = $rhom AND `day` = 4";
                $resultq = mysqli_query($con,$sqlq);
                //negator
                
                if($resultq){
                    while($rowq = mysqli_fetch_assoc($resultq)){
                        $qtq = $rowq['time'];
                        $qiq = $rowq['faculty'];
                        $qsq = $rowq['section'];
                        $qrq = $rowq['room'];
                        // echo $qs;
                        if($qiq != ""){
                            $h = 1;
                            $contf = $qiq;
                            $conts = $qsq;
                            $contr = $qrq;
                            
                            
                        }
                    }
                }
                
                if($h != 1){
                    echo'
                    <td class = "text-center"><input class = "m-3" type="checkbox" id="check" name="thursday[]" value="'.$time.'" style="width: 22px; height: 22px;"></td>
                    ';
                }else{
                    // faculty
                    $sqltt = "SELECT * from `users` WHERE `id` = $contf;";
                    $resulttt = mysqli_query($con,$sqltt);
                    if($resulttt){
                        while($rowsub = mysqli_fetch_assoc($resulttt)){
                            $title = $rowsub['title'];
                            $first = $rowsub['first'];
                            $last = $rowsub['last'];
                            $full = implode(' ', array($title, $first, $last));
                            // $m =$subject;
                        }
                    }
                    // //section
                    $sqlst = "SELECT * from `section` WHERE `id` = $conts;";
                    $resultst = mysqli_query($con,$sqlst);
                    if($resultst){
                        while($rowsec = mysqli_fetch_assoc($resultst)){
                            $ces = $rowsec['section'];
                            // $m =$m . $section;
                        }
                    }
                    // //room
                    $sqlrt = "SELECT * from `room` WHERE `id` = $contr;";
                    $resultrt = mysqli_query($con,$sqlrt);
                    if($resultrt){
                        while($rowrum = mysqli_fetch_assoc($resultrt)){
                            $mur = $rowrum['room'];
                            // $m =$m . $section;
                        }
                    }
            
                    echo'
                        <td>Not Available</br>'.$full. '</br>Section:  '.$ces. '</br>Room: ' .$mur. '</td>
                    ';
                    $h = 0;
                // $contr = "";
                }
                
                
            }

            if($f != " "){
                echo'
                    <td style = "background: '.$fc.'">'.$f.'</td>
                ';
            }else{
                $sqlp = "SELECT * from `schedule` WHERE `time` = $time AND `section` = $sic AND `day` = 5 ";
                $resultp = mysqli_query($con,$sqlp);
                //negator
                $contf;
                $conts;
                $contr = "";
                if($resultp){
                    while($rowp = mysqli_fetch_assoc($resultp)){
                        $qt = $rowp['time'];
                        $qi = $rowp['faculty'];
                        $qs = $rowp['section'];
                        $qr = $rowp['room'];
                        // echo $qs;
                        if($qi != ""){
                            $h = 1;
                            $contf = $qi;
                            $conts = $qs;
                            $contr = $qr;
                        }
                    }
                }
                //
                $sqlq = "SELECT * from `schedule` WHERE `time` = $time AND `room` = $rhom AND `day` = 5";
                $resultq = mysqli_query($con,$sqlq);
                //negator
                
                if($resultq){
                    while($rowq = mysqli_fetch_assoc($resultq)){
                        $qtq = $rowq['time'];
                        $qiq = $rowq['faculty'];
                        $qsq = $rowq['section'];
                        $qrq = $rowq['room'];
                        // echo $qs;
                        if($qiq != ""){
                            $h = 1;
                            $contf = $qiq;
                            $conts = $qsq;
                            $contr = $qrq;
                            
                            
                        }
                    }
                }
                
                if($h != 1){
                    echo'
                    <td class = "text-center"><input class = "m-3" type="checkbox" id="check" name="friday[]" value="'.$time.'" style="width: 22px; height: 22px;"></td>
                    ';
                }else{
                    // faculty
                    $sqltt = "SELECT * from `users` WHERE `id` = $contf;";
                    $resulttt = mysqli_query($con,$sqltt);
                    if($resulttt){
                        while($rowsub = mysqli_fetch_assoc($resulttt)){
                            $title = $rowsub['title'];
                            $first = $rowsub['first'];
                            $last = $rowsub['last'];
                            $full = implode(' ', array($title, $first, $last));
                            // $m =$subject;
                        }
                    }
                    // //section
                    $sqlst = "SELECT * from `section` WHERE `id` = $conts;";
                    $resultst = mysqli_query($con,$sqlst);
                    if($resultst){
                        while($rowsec = mysqli_fetch_assoc($resultst)){
                            $ces = $rowsec['section'];
                            // $m =$m . $section;
                        }
                    }
                    // //room
                    $sqlrt = "SELECT * from `room` WHERE `id` = $contr;";
                    $resultrt = mysqli_query($con,$sqlrt);
                    if($resultrt){
                        while($rowrum = mysqli_fetch_assoc($resultrt)){
                            $mur = $rowrum['room'];
                            // $m =$m . $section;
                        }
                    }
            
                    echo'
                        <td>Not Available</br>'.$full. '</br>Section:  '.$ces. '</br>Room: ' .$mur. '</td>
                    ';
                    $h = 0;
                // $contr = "";
                }
                
                
            }
            //last
            echo'</tr>';
        }
        
        
    }else{
        die("Adding Failed: " . mysqli_error());
    }
}
?>
