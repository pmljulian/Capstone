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
                <p>Dashboard</p>
                <li class="active">
                    <a href="dashboard.php">
                        <i class="fa fa-dashboard text-center"></i>
                        <span class="nav-text p-2">
                            Dashboard
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-laptop text-center"></i>
                        <span class="nav-text p-2">
                            User List
                        </span>
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="user_active.php" class ="pl-5">
                                <i class="fa fa-user-plus text-center"></i>
                                <span class="nav-text p-2">
                                    Active Users
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="user_archive.php" class ="pl-5">
                                <i class="fa fa-user-times text-center"></i>
                                <span class="nav-text p-2">
                                    Archived Users
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="schedule.php"><i class="fa fa-book text-center"></i>
                        <span class="nav-text p-2">
                            Schedule
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-cogs text-center"></i>
                        <span class="nav-text p-2">
                        Department Settings
                        </span>
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="section.php" class ="pl-5">
                                <i class="fa fa-hourglass-3 text-center"></i>
                                <span class="nav-text p-2">
                                    Section
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="subject.php" class ="pl-5">
                                <i class="fa fa-flask text-center"></i>
                                <span class="nav-text p-2">
                                    Subject
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="room.php" class ="pl-5">
                                <i class="fa fa-building text-center"></i>
                                <span class="nav-text p-2">
                                    Room
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="logs.php"><i class="fa fa-clone text-center"></i>
                        <span class="nav-text p-2">
                            Logs, Updates and Print
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
                        <a href="dashboard.php" class = "link-primary">Home</span></a> > <a href="dashboard.php" class="link-success">Dashboard</span></a>
                        </div>
                    </div>
                </div>
            </nav>
            <!--  -->
            <div class="card">
					<div class="card-header">
						<b>Dashboard</b>
					</div>
					<div class="card-body" style="overflow-y:auto;">
						<!--  -->
                        <div class="row">
                            <!-- php dine -->
                            <!-- sa tech an may sched na -->
                            <?php
                                include '../connect.php';
                                $sql = "SELECT * from `schedule`";
                                $result = mysqli_query($con,$sql);
                                
                                //rows
                                $limiter = array();
                                $bilang = 0;
                                if($result){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $faculty = $row['faculty'];
                                        array_push($limiter,$faculty);
                                        $bilang++;
                                    }   
                                }else{
                                    die("Adding Failed: " . mysqli_error());
                                }
                                // echo $limiter[0];
                                // eto yung unoique
                                $filtered = array_unique($limiter);
                                $un = count($filtered);
                            
                            ?>
                            <!-- bilang ng user -->
                            <?php
                                include '../connect.php';
                                $sql = "SELECT * from `users`";
                                $result = mysqli_query($con,$sql);
                                
                                //rows
                                $users = 0;
                                $archive = 0;
                                $active = 0;
                                if($result){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $state = $row['archive'];
                                        $users++;
                                        if($state == "NO"){
                                            $active++;
                                        }else{
                                            $archive++;
                                        }
                                    }   
                                }else{
                                    die("Adding Failed: " . mysqli_error());
                                }
                            ?>
                            <!-- bilang ng subject -->
                            <?php
                                include '../connect.php';
                                $sql = "SELECT * from `subject`";
                                $result = mysqli_query($con,$sql);
                                
                                //rows
                                $subject = 0;
                                if($result){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $subject++;
                                    }   
                                }else{
                                    die("Adding Failed: " . mysqli_error());
                                }
                            ?>
                            <!-- section -->
                            <?php
                                include '../connect.php';
                                $sql = "SELECT * from `section`";
                                $result = mysqli_query($con,$sql);
                                
                                //rows
                                $section = 0;
                                if($result){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $section++;
                                    }   
                                }else{
                                    die("Adding Failed: " . mysqli_error());
                                }
                            ?>
                            <!-- room -->
                            <?php
                                include '../connect.php';
                                $sql = "SELECT * from `room`";
                                $result = mysqli_query($con,$sql);
                                
                                //rows
                                $room = 0;
                                if($result){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $room++;
                                    }   
                                }else{
                                    die("Adding Failed: " . mysqli_error());
                                }
                            ?>
                            <!-- layout dine -->
                            
                            <div class = "col-6">
                                <div class = "row">
                                    <div class = "col-7 border border-5 text-center p-3 m-1" style = "background-color: rgb(225, 224, 224);">
                                        <i class="fa fa-calendar text-center fa-3x mt-3" ></i>
                                        <span class="nav-text p-2 h2">
                                            <?php echo $bilang;?>
                                        </span>
                                        <p class = "">Total Number of Schedules</p>
                                    </div>
                                    <div class = "col border border-5 text-center p-3 m-1" style = "background-color: rgb(235, 233, 233);">
                                        <i class="fa fa-address-book-o text-center fa-2x mt-3"></i>
                                        <span class="nav-text p-2 h3 ">
                                            <?php echo $un;?>
                                        </span>
                                        <p class = "">Teachers with Schedules</p>
                                    </div>
                                </div>
                                <div class = "row align-items-center">
                                    <div class = "col border border-5 text-center p-3 m-1" style = "background-color: rgb(235, 233, 233);">
                                        <i class="fa fa-book text-center fa-2x mt-3"></i>
                                        <span class="nav-text p-2 h3">
                                            <?php echo $section;?>
                                        </span>
                                        <p class = "">Section/s</p>
                                    </div>
                                    <div class = "col border border-5 text-center p-3 m-1" style = "background-color: rgb(235, 233, 233);">
                                        <i class="fa fa-flask text-center fa-2x mt-3"></i>
                                        <span class="nav-text p-2 h3">
                                            <?php echo $subject;?>
                                        </span>
                                        <p class = "">Subject</p>
                                    </div>
                                    <div class = "col border border-5 text-center p-3 m-1" style = "background-color: rgb(235, 233, 233);">
                                        <i class="fa fa-bell text-center fa-2x mt-3"></i>
                                        <span class="nav-text p-2 h3">
                                            <?php echo $room;?>
                                        </span>
                                        <p class = "">Room/s</p>
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class = "col-7 border border-5 text-center p-2 m-1" style = "background-color: rgb(225, 224, 224);">
                                        <i class="fa fa-user text-center fa-3x mt-3"></i>
                                        <span class="nav-text p-2 h2">
                                            <?php echo $users;?>
                                        </span>
                                        <p class = "">Total Number of Users</p>
                                    </div>
                                    <div class = "col">
                                        <div class = "row border border-5 text-center p-3 mb-1" style = "background-color: rgb(235, 233, 233);">
                                            <i class="fa fa-user-plus text-center fa-2x"></i>
                                            <span class="nav-text p-2 h3">
                                                <?php echo $active;?>
                                            </span>
                                            <p class = "h6 p-2">Active</p>
                                        </div>
                                        <div class = "row border border-5 text-center p-3" style = "background-color: rgb(235, 233, 233);">
                                            <i class="fa fa-user-times text-center fa-2x"></i>
                                            <span class="nav-text p-2 h3">
                                                <?php echo $archive;?>
                                            </span>
                                            <p class = "h6 p-2">Archive</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- section -->
                            </div>
                            <div class = "col-6">
                                <div class = "row">
                                    <canvas class = "p-3 border border-5 m-3" id="myChart" style="width:100%; max-height:200px;max-width:50%px;" class = "text-center"></canvas>
                                    <script>
                                        var xValues = ["Users", "With Schedules"];
                                        var yValues = [<?php echo $users;?>];
                                        var zValues = [ <?php echo $un;?>];
                                        var barColors = ["red", "green"];

                                        new Chart("myChart", {
                                        type: "bar",
                                        data: {
                                            labels: xValues,
                                            datasets: [{
                                                label: ["Users"],
                                                backgroundColor: barColors,
                                                data: [yValues,zValues]
                                                },{
                                                backgroundColor: "green",
                                                label: "With Schedules",
                                                // data: zValues
                                                }
                                            ]
                                        },
                                        options: {
                                            legend: {display: false},
                                            title: {
                                            display: true,
                                            text: "Users"
                                            }
                                        }
                                        });
                                    </script>
                                </div>
                                <div class = "row">
                                    <canvas class = "p-3 border border-5 m-3" id="myChart1" style="width:100%; max-height:200px;max-width:50%px;" class = "text-center"></canvas>
                                    <script>
                                        var xValues = ["Active", "Archive"];
                                        var yValues = [<?php echo $active;?>, <?php echo $archive;?>];
                                        var barColors = ["#355E3B","#eacc7b" ];

                                        new Chart("myChart1", {
                                        type: "doughnut",
                                        data: {
                                            labels: xValues,
                                            datasets: [{
                                            backgroundColor: barColors,
                                            data: yValues
                                            }]
                                        },
                                        options: {
                                            // responsive:false,
                                            legend: {display: false},
                                            title: {
                                            display: true,
                                            text: "Data Graphs"
                                        }
                                            }
                                
                                        
                                        });
                                    </script>
                                </div>
                                
                            </div>
                            
                        </div>
                        <hr>
						<!--  -->
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
<script>
    var btn = document.getElementById("lclose");
    btn.onclick = function() {
        // $.toast({
        //     heading: 'Success',
        //     text: 'Logout Successfully.',
        //     showHideTransition: 'slide',
        //     position: 'top-right',
        //     icon: 'success',
        //     hideAfter: 1000, 
        //     afterHidden: function () {
        //         window.location = "../../index.php";
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