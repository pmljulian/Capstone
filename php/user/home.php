<?php

   session_start();
   
   if( isset( $_SESSION['user'] ) ) {
      $user =  $_SESSION['user'];
    //   $n = 1;
    //   include 'connect.php';
    //   $sqln = "UPDATE `user` SET `verify`='$n' WHERE `prof_id` = $user;";
      
    //   $resultn = mysqli_query($con,$sqln);
    //   if($resultn){
    //       // echo"Successfully Updated";
    //       // header("location: php/home.php");
    //   }else{
    //       die("Adding Failed: " . mysqli_error());
    //   }
   }else {
        header('Location: ../../index.php');
   }
?>

<!DOCTYPE html>
<html lang = en>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>THS: Dashboard</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../../css/index.css'>
    <script src="../../jquery-3.6.1.js"></script>
    <link rel="stylesheet" href="../../dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../../dist/font-awesome-4.7.0/css/font-awesome.css" crossorigin="anonymous">
    <!--  -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script> -->
    <script src = "../../dist/js/bootstrap.min.js"></script>
    <!-- eto pag ala net -->
    <script src="../../dist/chart.js"></script>
    <!-- datatable -->
    <script src="../../dist/DataTables/datatables.min.js"></script>
    <link href="../../dist/DataTables/datatables.min.css" rel="stylesheet">
    <!-- jquery -->
    <script src="../../dist/toast/jquery.toast.min.js"></script>
    <link rel="stylesheet" href="../../dist/toast/jquery.toast.min.css" crossorigin="anonymous">
    <!--  -->
    <script src="../../dist/swal/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../../dist/swal/dist/sweetalert2.min.css">
</head>
<body>
<!--  -->
<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <span class="h6 fw-bold">
                    <img src="../../images/logo.png" class = "w-25 ">
                    <label class = "p-2 h-25">Taal High: SchdSys</label>    
                </span>
            </div>
            
            <ul class="list-unstyled components">
                <p class = "text-center">Schedule</p>
                <li class = "active">
                    <a href="home.php"><i class="fa fa-book text-center"></i>
                        <span class="nav-text p-2">
                            Schedule
                        </span>
                    </a>
                </li>
                <li>
                    <a href="profile.php"><i class="fa fa-book text-center"></i>
                        <span class="nav-text p-2">
                            Profile
                        </span>
                    </a>
                </li>
                <li>
                    <a href="settings.php"><i class="fa fa-book text-center"></i>
                        <span class="nav-text p-2">
                            Settings
                        </span>
                    </a>
                </li>
                <li >
                    <a href="schedule.php" target = "_blank"><i class="fa fa-paper-plane text-center"></i>
                        <span class="nav-text p-2">
                            Print
                        </span>
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a data-toggle="modal" data-target="#close"><i class="fa fa-power-off text-center"></i>
                        <span class="nav-text p-2">
                           Logout
                        </span>
                    </a>
                </li>
                
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-light">
                        <i class="fa fa-bars"></i>
                        <span></span>
                    </button>

                    <div class="row">
                        <div class="col">
                        <a href="home.php" class = "link-primary">Home</span></a> > <a href="home.php" class="link-success">Schedule</span></a>
                        </div>
                    </div>
                </div>
            </nav>
            <!--  -->
            <div class="card">
					<div class="card-header">
						<b>Schedule Preview</b>
						
					</div>
					<div class="card-body" style="overflow-y:auto; height:480px;">
						
						<table class="table table-bordered text-center table-hover">
							<thead>
                                
								<tr>
									<!-- <th class="text-center">#</th> -->
									<th class=""style = "width:35%;">Time</th>
									<th id = "m">Monday</th>
									<th id = "t">Tuesday</th>
									<th id = "w">Wednesday</th>
									<th id = "th">Thursday</th>
                                    <th id = "f">Friday</th>
								</tr>
							</thead>
							<tbody>
                            <?php

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
                                            // co0lors
                                            $mc;
                                            $tc;
                                            $wc;
                                            $thc;
                                            $fc;
                                            //into table
                                            echo '
                                                <tr>
                                                    <td>'.$start. '-' .$end.'</td>
                                            ';

                                            //check per timeframe
                                            //monday
                                            $sqlm = "SELECT * from `schedule` WHERE `time` = $time AND `faculty` = $user;";
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
                                                    //display

                                                    if($day == 1){
                                                        $mc = $color;
                                                        $m = $sub . "</br>" . $sec ;
                                                    }else if($day == 2){
                                                        $tc = $color;
                                                        $t = $sub . "</br>" . $sec ;
                                                    }else if($day == 3){
                                                        $wc = $color;
                                                        $w = $sub . "</br>" . $sec ;
                                                    }else if($day == 4){
                                                        $thc = $color;
                                                        $th = $sub . "</br>" . $sec ;
                                                    }else if($day == 5){
                                                        $fc = $color;
                                                        $f = $sub . "</br>" . $sec ;
                                                    }


                                                }
                                            }
                                            
                                        //display
                                            $colors = array("#A981A9","#80AF71","#E15E6F","#BF8088","#C38872","#A3B884", "#E5ACB6","#CBBEB5","#A0C29C","#F9BD98");
                                        
                                            if($m != " "){
                                                echo'
                                                    <td style = "background: '.$mc.'">'.$m.'</td>
                                                ';
                                            }else{
                                                echo'
                                                    <td class = "text-center"></td>
                                                ';
                                            }

                                            if($t != " "){
                                                echo'
                                                    <td style = "background: '.$tc.'">'.$t.'</td>
                                                ';
                                            }else{
                                                echo'
                                                    <td class = "text-center"></td>
                                                ';
                                            }

                                            if($w != " "){
                                                echo'
                                                    <td style = "background: '.$wc.'">'.$w.'</td>
                                                ';
                                            }else{
                                                echo'
                                                    <td class = "text-center"></td>
                                                ';
                                            }
                                            if($th != " "){
                                                echo'
                                                    <td style = "background: '.$thc.'">'.$th.'</td>
                                                ';
                                            }else{
                                                echo'
                                                    <td class = "text-center"></td>
                                                ';
                                            }

                                            if($f != " "){
                                                echo'
                                                    <td style = "background: '.$fc.'">'.$f.'</td>
                                                ';
                                            }else{
                                                echo'
                                                    <td class = "text-center"></td>
                                                ';
                                            }
                                            //last
                                            echo'</tr>';
                                        }
                                        
                                        
                                    }else{
                                        die("Adding Failed: " . mysqli_error());
                                    }
                                
                                ?>
							</tbody>
						</table>
					</div>
				</div>
            
        </div>
    </div>
<!--  -->
<!-- logout -->
<div class="modal fade" id="close" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
            <label>Do you want to Log Out?</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id = "lclose">Select</button>
      </div>
        
    </div>
  </div>
</div>
<!--  -->
<!-- script -->
<script type="text/javascript">
    var x = 0;
    $(document).ready(function() {
        $('#m').click(function() {
            // hide all
            if(x ==1){
                $('th:nth-child(2)').hide();
                $('td:nth-child(2)').hide();
                $('th:nth-child(3)').hide();
                $('td:nth-child(3)').hide();
                $('th:nth-child(4)').hide();
                $('td:nth-child(4)').hide();
                $('th:nth-child(5)').hide();
                $('td:nth-child(5)').hide();
                $('th:nth-child(6)').hide();
                $('td:nth-child(6)').hide();
                //show
                $('th:nth-child(2)').show();
                $('td:nth-child(2)').show();
                $('th:nth-child(3)').show();
                $('td:nth-child(3)').show();
                $('th:nth-child(4)').show();
                $('td:nth-child(4)').show();
                $('th:nth-child(5)').show();
                $('td:nth-child(5)').show();
                $('th:nth-child(6)').show();
                $('td:nth-child(6)').show();
                x = 0;
            }else{
                $('th:nth-child(2)').hide();
                $('td:nth-child(2)').hide();
                $('th:nth-child(3)').hide();
                $('td:nth-child(3)').hide();
                $('th:nth-child(4)').hide();
                $('td:nth-child(4)').hide();
                $('th:nth-child(5)').hide();
                $('td:nth-child(5)').hide();
                $('th:nth-child(6)').hide();
                $('td:nth-child(6)').hide();
                
                // if your table has header(th), use this
                //$('td:nth-child(2),th:nth-child(2)').hide();
                //show
                $('th:nth-child(2)').show();
                $('td:nth-child(2)').show();
                x++;
            }
        });
        $('#t').click(function() {
            if(x ==1){
                $('th:nth-child(2)').hide();
                $('td:nth-child(2)').hide();
                $('th:nth-child(3)').hide();
                $('td:nth-child(3)').hide();
                $('th:nth-child(4)').hide();
                $('td:nth-child(4)').hide();
                $('th:nth-child(5)').hide();
                $('td:nth-child(5)').hide();
                $('th:nth-child(6)').hide();
                $('td:nth-child(6)').hide();
                //show
                $('th:nth-child(2)').show();
                $('td:nth-child(2)').show();
                $('th:nth-child(3)').show();
                $('td:nth-child(3)').show();
                $('th:nth-child(4)').show();
                $('td:nth-child(4)').show();
                $('th:nth-child(5)').show();
                $('td:nth-child(5)').show();
                $('th:nth-child(6)').show();
                $('td:nth-child(6)').show();
                x = 0;
            }else{     
                // hide all
                $('th:nth-child(2)').hide();
                $('td:nth-child(2)').hide();
                $('th:nth-child(3)').hide();
                $('td:nth-child(3)').hide();
                $('th:nth-child(4)').hide();
                $('td:nth-child(4)').hide();
                $('th:nth-child(5)').hide();
                $('td:nth-child(5)').hide();
                $('th:nth-child(6)').hide();
                $('td:nth-child(6)').hide();
                
                // if your table has header(th), use this
                //$('td:nth-child(2),th:nth-child(2)').hide();
                //show
                $('th:nth-child(3)').show();
                $('td:nth-child(3)').show();
                x++;
            }
        });
        $('#w').click(function() {
            if(x ==1){
                $('th:nth-child(2)').hide();
                $('td:nth-child(2)').hide();
                $('th:nth-child(3)').hide();
                $('td:nth-child(3)').hide();
                $('th:nth-child(4)').hide();
                $('td:nth-child(4)').hide();
                $('th:nth-child(5)').hide();
                $('td:nth-child(5)').hide();
                $('th:nth-child(6)').hide();
                $('td:nth-child(6)').hide();
                //show
                $('th:nth-child(2)').show();
                $('td:nth-child(2)').show();
                $('th:nth-child(3)').show();
                $('td:nth-child(3)').show();
                $('th:nth-child(4)').show();
                $('td:nth-child(4)').show();
                $('th:nth-child(5)').show();
                $('td:nth-child(5)').show();
                $('th:nth-child(6)').show();
                $('td:nth-child(6)').show();
                x = 0;
            }else{
            // hide all
                $('th:nth-child(2)').hide();
                $('td:nth-child(2)').hide();
                $('th:nth-child(3)').hide();
                $('td:nth-child(3)').hide();
                $('th:nth-child(4)').hide();
                $('td:nth-child(4)').hide();
                $('th:nth-child(5)').hide();
                $('td:nth-child(5)').hide();
                $('th:nth-child(6)').hide();
                $('td:nth-child(6)').hide();
                
                // if your table has header(th), use this
                //$('td:nth-child(2),th:nth-child(2)').hide();
                //show
                $('th:nth-child(4)').show();
                $('td:nth-child(4)').show();
                x++;
            }
        });
        $('#th').click(function() {
            if(x ==1){
                $('th:nth-child(2)').hide();
                $('td:nth-child(2)').hide();
                $('th:nth-child(3)').hide();
                $('td:nth-child(3)').hide();
                $('th:nth-child(4)').hide();
                $('td:nth-child(4)').hide();
                $('th:nth-child(5)').hide();
                $('td:nth-child(5)').hide();
                $('th:nth-child(6)').hide();
                $('td:nth-child(6)').hide();
                //show
                $('th:nth-child(2)').show();
                $('td:nth-child(2)').show();
                $('th:nth-child(3)').show();
                $('td:nth-child(3)').show();
                $('th:nth-child(4)').show();
                $('td:nth-child(4)').show();
                $('th:nth-child(5)').show();
                $('td:nth-child(5)').show();
                $('th:nth-child(6)').show();
                $('td:nth-child(6)').show();
                x = 0;
            }else{
            // hide all
                $('th:nth-child(2)').hide();
                $('td:nth-child(2)').hide();
                $('th:nth-child(3)').hide();
                $('td:nth-child(3)').hide();
                $('th:nth-child(4)').hide();
                $('td:nth-child(4)').hide();
                $('th:nth-child(5)').hide();
                $('td:nth-child(5)').hide();
                $('th:nth-child(6)').hide();
                $('td:nth-child(6)').hide();
                
                // if your table has header(th), use this
                //$('td:nth-child(2),th:nth-child(2)').hide();
                //show
                $('th:nth-child(5)').show();
                $('td:nth-child(5)').show();
                x++;
            }
        });
        $('#f').click(function() {
            if(x ==1){
                $('th:nth-child(2)').hide();
                $('td:nth-child(2)').hide();
                $('th:nth-child(3)').hide();
                $('td:nth-child(3)').hide();
                $('th:nth-child(4)').hide();
                $('td:nth-child(4)').hide();
                $('th:nth-child(5)').hide();
                $('td:nth-child(5)').hide();
                $('th:nth-child(6)').hide();
                $('td:nth-child(6)').hide();
                //show
                $('th:nth-child(2)').show();
                $('td:nth-child(2)').show();
                $('th:nth-child(3)').show();
                $('td:nth-child(3)').show();
                $('th:nth-child(4)').show();
                $('td:nth-child(4)').show();
                $('th:nth-child(5)').show();
                $('td:nth-child(5)').show();
                $('th:nth-child(6)').show();
                $('td:nth-child(6)').show();
                x = 0;
            }else{
            // hide all
                $('th:nth-child(2)').hide();
                $('td:nth-child(2)').hide();
                $('th:nth-child(3)').hide();
                $('td:nth-child(3)').hide();
                $('th:nth-child(4)').hide();
                $('td:nth-child(4)').hide();
                $('th:nth-child(5)').hide();
                $('td:nth-child(5)').hide();
                $('th:nth-child(6)').hide();
                $('td:nth-child(6)').hide();
                
                // if your table has header(th), use this
                //$('td:nth-child(2),th:nth-child(2)').hide();
                //show
                $('th:nth-child(6)').show();
                $('td:nth-child(6)').show();
                x++;
            }
        });
    });
</script>
<!--  -->
<script>
    $(document).ready(function () {
    var n = "";
        $('#lclose').on('click', function () {
            $.ajax({
                type: "POST",
                url: "session.php",
                data: {value: n},
                success: function(e){
                    // alert(e);
                //     $.toast({
                //     heading: 'Success',
                //     text: 'Logout Succesfully.',
                //     showHideTransition: 'slide',
                //     position: 'top-right',
                //     icon: 'success',
                //     hideAfter: 1500, 
                //     afterHidden: function () {
                //       window.location.href = '../../index.php'
                //     },
                // })
                    Swal.fire({
                    // position: 'top-end',
                    icon: 'success',
                    title: 'Succesfully logout',
                    showConfirmButton: false,
                    timer: 1500
                    }).then(function() {
                    window.location.href = '../../index.php';
                    })
                }
            });
        });       
    });
</script>
<!--  -->
<script>
    $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
</script>
<!--  -->
</body>
</html>