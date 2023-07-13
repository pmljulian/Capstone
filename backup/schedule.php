<!DOCTYPE html>
<html lang = en>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>THS: Schedule</title>
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
                <p>Schedules</p>
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
                
                <li class="active">
                    <a href="schedule.php"><i class="fa fa-book text-center"></i>
                        <span class="nav-text p-2">
                            Schedule
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-cogs text-center"></i>
                        <span class="nav-text p-2">
                            Peripherals
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
                            Logs and Updates
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
                        <a href="dashboard.php" class = "link-primary">Home</span></a> > <a href="schedule.php" class="link-success">Create Schedule</span></a>
                        </div>
                    </div>
                </div>
            </nav>

            <!--  -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <b>Create Schedule</b>
                            <span class="float:right">
                                <button class="btn btn-primary btn-block btn-sm col-sm-2 float-right"  id="new_schedule" data-toggle="modal" data-target="#modalCreate">
                                    <i class="fa fa-plus"></i> New Entry
                                </button>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label for="" class="control-label col-md-2 offset-md-2">View Schedule of:</label>
                                <div class=" col-md-4">
                                <select name="faculty_id" id="faculty_id" class="custom-select select2">
                                    <!--  -->
                                    <option value="0">---</option>
                                    <?php
                                        include '../connect.php';
                                        //get data
                                        $sql = "SELECT * from `users`";
                                        $result = mysqli_query($con,$sql);
                                        
                                        //rows
                                        if($result){
                                            while($row = mysqli_fetch_assoc($result)){
                                                $id = $row['id'];
                                                $title = $row['title'];
                                                $first = $row['first'];
                                                $last = $row['last'];
                                                $full = implode(' ', array($title, $first, $last));
                                                //into table
                                                if($id != 12344112){
                                                    echo '
                                                        <option value='.$id.'>'.$full.'</option>    
                                                    ';
                                                }
                                                
                                            }
                                            
                                            
                                        }else{
                                            die("Adding Failed: " . mysqli_error());
                                        }
                                    ?>
                                    <!--  -->
                                </select>
                                </div>
                            </div>
                            <hr>
                            <div id="schedule">
                                <!--  -->
                                <table class="table table-bordered table-condensed table-hover">
                                    <thead>
                                    <colgroup>
                                        <col width="10%">
                                        <col width="18%">
                                        <col width="18%">
                                        <col width="18%">
                                        <col width="18%">
                                        <col width="18%">
                                    </colgroup>
                                        <tr>
                                            <!-- <th class="text-center">#</th> -->
                                            <th class="">Time</th>
                                            <th class="">Monday</th>
                                            <th class="">Tuesday</th>
                                            <th class="">Wednesday</th>
                                            <th class="">Thursday</th>
                                            <th class="">Friday</th>
                                        </tr>
                                    </thead>
                                    <tbody id = "tbody">
                                        <!-- basta dine php ng sched -->
                                        <?php include 'sched_table.php';?>
                                    </tbody>
                                </table>
                                
                                <!--  -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table Panel -->
            </div>
            <!--  -->
        </div>
    </div>
<!--  -->
<!-- create schedule modal -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">New Schedule</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method = "post" id = "form-new">
            <div class="modal-body">
                <!-- dine yung mga cells -->
                <div class="row">
                    <div class="col">
                        <label for="fy">Faculty</label>
                        <select class="form-control" id = "fy" name = "fy">
                        <!-- dine mnag php -->
                            <?php
                                include '../connect.php';
                                //get data
                                $sql = "SELECT * from `users`";
                                $result = mysqli_query($con,$sql);
                                
                                //rows
                                if($result){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $fy_id = $row['id'];
                                        $title = $row['title'];
                                        $first = $row['first'];
                                        $last = $row['last'];
                                        $full = implode(' ', array($title, $first,$last));
                                        //into table
                                        if($fy_id != 12344112){
                                            echo '
                                                <option value = "'.$fy_id.'">'.$full.'</option>
                                            ';
                                        }
                                    }							
                                }else{
                                    die("Adding Failed: " . mysqli_error());
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="day">Day</label>
                        <select class="form-control" id = "day" name = "day">
                            <!--  -->
                            <option value = "0">All</option>
                            <option value = "1">Monday</option>
                            <option value = "2">Tuesday</option>
                            <option value = "3">Wednesday</option>
                            <option value = "4">Thursday</option>
                            <option value = "5">Friday</option>
                            <!--  -->
                        </select>
                    </div>
                </div>
                <!--  -->
                <div class="row">
                    <div class="col">
                        <label for="subject">Subject</label>
                        <select class="form-control" id = "subject" name = "subject">
                        <!-- dine mnag php -->
                            <?php
                                include '../connect.php';
                                //get data
                                $sql = "SELECT * from `subject`";
                                $result = mysqli_query($con,$sql);
                                
                                //rows
                                if($result){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $sub_id = $row['id'];
                                        $subject = $row['subject'];
                                        //into table
                                        if($sub_id != 0){
                                        echo '
                                            <option value = "'.$sub_id.'">'.$subject.'</option>
                                        ';
                                        }
                                    }							
                                }else{
                                    die("Adding Failed: " . mysqli_error());
                                }
                            ?>
                            <option value = "0">Recess</option>
                        </select>
                        
                    </div>
                    <div class="col">
                        <label for="time">Time</label>
                        <select class="form-control" id = "time" name = "time">
                        <!-- dine mnag php -->
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
                                    $fullt = implode(' - ', array($start, $end));
                                    //into table
                                   
                                    echo '
                                            <option value = "'.$time.'">'.$fullt.'</option>
                                        ';
                                    
                                    
                                }
                                
                                
                            }else{
                                die("Adding Failed: " . mysqli_error());
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <!--  -->
                <div class="row">
                    <div class="col">
                        <label for="section" id = "lbl_sec">Section</label>
                        <select class="form-control" id = "section" name = "section">
                        <!-- dine mnag php -->
                            <?php
                                include '../connect.php';
                                //get data
                                $sql = "SELECT * from `section`";
                                $result = mysqli_query($con,$sql);
                                
                                //rows
                                if($result){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $sec_id = $row['id'];
                                        $section = $row['section'];
                                        //into table
                                        if($sec_id != 0){
                                        echo '
                                            <option value = "'.$sec_id.'">'.$section.'</option>
                                        ';
                                        }
                                    }							
                                }else{
                                    die("Adding Failed: " . mysqli_error());
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        
                    </div>
                </div>
                <!--  -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Schedule</button>
            </div>
        </form>
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
      <form method = "post" name = "rmodal" id = "rmodal" action = "room-sched.php" target="_blank">
      <div class="modal-body">
            <label>Do you want to Log Out?</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" id = "lclose">Select</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!--  -->
<!-- script -->
<script>
    $(document).on('submit', '#form-new', function(){
        // alert("dasdadasda");  
    $.post('create_schedule.php', $(this).serialize(), function(data){
        
        var g = data;
        // alert(g);
        if ($.isNumeric(g)) {
            // alert(g);
            cnt = 5 - g;
            if(cnt > 0){
                $.toast({
                    heading: 'Success',
                    text: 'Succesfully Created Schedule: ' + cnt,
                    showHideTransition: 'slide',
                    position: 'top-right',
                    icon: 'success',
                    hideAfter: 1000, 
                    afterHidden: function () {
                        location.reload();
                    },
                })
            }else{
                $.toast({
                    heading: 'Error',
                    text: 'All attempted schedules are already existing',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    icon: 'error',
                    hideAfter: 3000, 
                    afterHidden: function () {
                        location.reload();
                    },
                })
            }
        }else{
            if(g == "Sucessfully created"){
                // alert(g);
                $.toast({
                    heading: 'Success',
                    text: 'Succesfully Created.',
                    showHideTransition: 'slide',
                    position: 'top-right',
                    icon: 'success',
                    hideAfter: 1000, 
                    afterHidden: function () {
                        location.reload();
                    },
                })
            }else{
                $.toast({
                    heading: 'Error',
                    text: g,
                    showHideTransition: 'slide',
                    position: 'top-right',
                    icon: 'error',
                    hideAfter: 3000, 
                    afterHidden: function () {
                        location.reload();
                    },
                })
            }
        }
    }); 
    return false;
    })
    //filter
    $( "#faculty_id" ).change(function() {
        van = $(this).val();
        // alert(van);
        if(van != 0){
            $.ajax({
                type: "POST",
                url: "sched_table.php",
                data: {id: van},
                success: function(e){
                    $("#tbody").html(e);
                    
                }
            });
        }else{
            $("#tbody").empty();
        }
    });
    $( "#subject" ).change(function() {
        hmm = $(this).val();
        // alert(van);
        if(hmm == 0){
            $('#lbl_sec').css('display','none');
            $('#section').css('display','none');
        }else{
            $('#lbl_sec').css('display','block');
            $('#section').css('display','block');
        }
        
    });
    $( "#sige" ).change(function() {
       alert("eto na");
        
    });
   //
   
    
    
</script>
<!--  -->
<script>
    var btn = document.getElementById("lclose");
    btn.onclick = function() {
        window.location = "../../index.php";
        alert("Logout Success");
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