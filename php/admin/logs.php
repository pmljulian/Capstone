<!DOCTYPE html>
<html lang = en>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>THS: Logs</title>
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
                <p>Logs and Updates</p>
                <li>
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
                <li class="active">
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
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="row">
                        <div class="col">
                        <a href="dashboard.php" class = "link-primary">Home</span></a> > <a href="logs.php" class="link-success">Logs</span></a>
                        </div>
                    </div>
                </div>
            </nav>
            <!--  -->
            <!-- <div id="content" > -->
                <div class = "row">
                    
                    <div class = "col-8">
                        <div class="card">
                            <div class="card-header">
                                <b>Logs</b>
                                <span class="float:right">
                                <button class="btn btn-success btn-block btn-sm col-sm-2 float-right"  id="new_schedule" data-toggle="modal" data-target="#warning">
                                    <i class="fa fa-paper-plane"></i> Notify
                                </button>
                            </span>
                            </div>
                            <div class="card-body" style="overflow-y:auto;">
                                <table class="table table-bordered table-hover">
                                    <thead style="background-color: gray;">
                                        <tr>
                                            <th>Changes</th>
                                            <th>User</th>
                                            <th>Timestamp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include '../connect.php';
                                        //get data
                                        $sql = "SELECT * from `logs` WHERE `open` = '1'";
                                        $result = mysqli_query($con,$sql);
                                        
                                        //rows
                                        if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                $state = $row['state'];
                                                $user = $row['faculty'];
                                                $tee = $row['timestamp'];  
                                                //into table 
                                                echo '
                                                    <tr>
                                                        <td>'.$state.'</td>
                                                        <td>'.$user.'</td>
                                                        <td>'.$tee.'</td>
                                                    </tr>
                                                ';
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
                    <div class = "col-4">
                        <!-- textarea at field -->
                        <form action="" id="manage-subject">
                            <div class="card">
                                <div class="card-header">
                                        Print Schedules
                                </div>
                                <div class="card-body">
                                    <!--  -->
                                    <label class="control-label">Teachers</label>
                                    <button type="button" class="btn btn-secondary form-control" onclick="window.open('all.php')">Teachers</button>
                                    <label class="control-label">Section</label>
                                    <button type="button" class="btn btn-secondary form-control" onclick="window.open('all_section.php')">Section</button>
                                    <label class="control-label">Room</label>
                                    <button type="button" class="btn btn-secondary form-control" onclick="window.open('all_room.php')">Room</button>
                                        
                                </div>
                                        
                                
                            </div>
                        </form>
                    </div>
                <div>
                    
            <!-- </div> -->
        </div>
    </div>
<!--  -->
<!-- modal -->
<div class="modal fade" id="warning" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLongTitle">Warning</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
            <label>Do you want to send the updates?</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" id = "updates">Send</button>
      </div>
        
    </div>
  </div>
</div>
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
        <button type="submit" class="btn btn-success" id = "lclose">Select</button>
      </div>
        
    </div>
  </div>
</div>
<!--  -->
<!-- script -->
<script>
    $("#updates").click(function() {
        var bl = "nt";
    $.ajax({
        type: "POST",
        url: "send-update.php",
        data: {a:bl},
        success: function(e){
            // $.toast({
            //     heading: 'Success',
            //     text: 'Email/s have been sent.',
            //     showHideTransition: 'slide',
            //     position: 'top-right',
            //     icon: 'success',
            //     hideAfter: 1000, 
            //     afterHidden: function () {
            //         location.reload();
            //     },
            // })
            Swal.fire({
                  // position: 'top-end',
                  icon: 'success',
                  title: 'Email/s have been sent.',
                  showConfirmButton: false,
                  timer: 1500
                }).then(function() {
                  location.reload();
                })
        }
    });
        // location.reload();
    });
    // var btnr = document.getElementById("updates");
    // btnr.onclick = function() {
    //     window.location = "setting.php";
    //     alert("Send Success");
    // }
</script>
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
            $('table').dataTable()
        });
</script>
<!--  -->
</body>
</html>