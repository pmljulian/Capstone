
<?php
if($_POST){
    $f_id = $_POST['id'];
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
                    
                    //puro sql
                    //subject
                    $sqlsub = "SELECT * from `subject` WHERE `id` = $subject;";
                    $resultsub = mysqli_query($con,$sqlsub);
                    if($resultsub){
                        while($rowsub = mysqli_fetch_assoc($resultsub)){
                            $sub = $rowsub['subject'];
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
                    //display

                    if($day == 1){
                        $m = $sub . "</br>" . $sec . "</br><a class = 'deleteid' href = 'delete_sched.php?deleteid=".$sched_id . " " .$f_id."'>Delete</a>";
                    }else if($day == 2){
                        $t = $sub . "</br>" . $sec. "</br><a class = 'deleteid' href = 'delete_sched.php?deleteid=".$sched_id . " " .$f_id."'>Delete</a>";
                    }else if($day == 3){
                        $w = $sub . "</br>" . $sec. "</br><a class = 'deleteid' href = 'delete_sched.php?deleteid=".$sched_id . " " .$f_id."'>Delete</a>";
                    }else if($day == 4){
                        $th = $sub . "</br>" . $sec. "</br><a class = 'deleteid' href = 'delete_sched.php?deleteid=".$sched_id . " " .$f_id."'>Delete</a>";
                    }else if($day == 5){
                        $f = $sub . "</br>" . $sec. "</br><a class = 'deleteid' href = 'delete_sched.php?deleteid=".$sched_id . " " .$f_id."'>Delete</a>";
                    }


                   
                    // $m = $m . "</br>" . "<a class = 'deleteid' href = 'delete_sched.php?deleteid=".$sched_id . " " .$f_id."'>DELETE</a>";
                }
            }
            // $r1 = rand(001,255);
            // $r2 = rand(001,255);
            // $r3 = rand(001,255);
            $colors = array("#A981A9","#80AF71","#E15E6F","#BF8088","#C38872","#A3B884", "#E5ACB6","#CBBEB5","#A0C29C","#F9BD98");
            //row display
            // echo '  <td style = "background: '.$colors[rand(0,7)].'">'.$m.'</td>
            //         <td style = "background: '.$colors[rand(0,7)].'">'.$t.'</td>
            //         <td style = "background: '.$colors[rand(0,7)].'">'.$w.'</td>
            //         <td style = "background: '.$colors[rand(0,7)].'">'.$th.'</td>
            //         <td style = "background: '.$colors[rand(0,7)].'">'.$f.'</td>
            //     </tr>';
            //differ
            if($m != " "){
                echo'
                    <td style = "background: '.$colors[rand(0,9)].'">'.$m.'</td>
                ';
            }else{
                echo'
                    <td>'.$m.'</td>
                ';
            }

            if($t != " "){
                echo'
                    <td style = "background: '.$colors[rand(0,9)].'">'.$t.'</td>
                ';
            }else{
                echo'
                    <td>'.$t.'</td>
                ';
            }

            if($w != " "){
                echo'
                    <td style = "background: '.$colors[rand(0,9)].'">'.$w.'</td>
                ';
            }else{
                echo'
                    <td>'.$w.'</td>
                ';
            }
            if($th != " "){
                echo'
                    <td style = "background: '.$colors[rand(0,9)].'">'.$th.'</td>
                ';
            }else{
                echo'
                    <td>'.$th.'</td>
                ';
            }

            if($f != " "){
                echo'
                    <td style = "background: '.$colors[rand(0,9)].'">'.$f.'</td>
                ';
            }else{
                echo'
                    <td>'.$f.'</td>
                ';
            }
            //last
            echo'</tr>';
        }
        
        
    }else{
        die("Adding Failed: " . mysqli_error());
    }
}
?>
