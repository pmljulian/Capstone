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
                        <a href="dashboard.php" class = "link-primary">Home</span></a> > <a href="schedule.php" class="link-success">Create Schedule</span></a>
                        </div>
                    </div>
                </div>
            </nav>

            <!--  -->
            <div>
            <form method = "post" id = "reg-form">
                <div class = "row">
               
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <b>Create Schedule</b>
                            </div>
                            <!-- <form method = "post" id = "reg-form"> -->
                            <div class="card-body">
                                <div class="row">
                                    <label for="" class="control-label col-md-3 offset-md-2">View Schedule of:</label>
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
                                <div id="schedule" style = "height : 450px; overflow-y:auto;">
                                    <!--  -->
                                    <table class="table table-bordered table-condensed table-hover">
                                        <thead>
                                        <colgroup>
                                            <col width="15%">
                                            <col width="16%">
                                            <col width="16%">
                                            <col width="16%">
                                            <col width="16%">
                                            <col width="16%">
                                        </colgroup>
                                            <tr>
                                                <!-- <th class="text-center">#</th> -->
                                                <th class="">Time</th>
                                                <th class="">Mon</th>
                                                <th class="">Tue</th>
                                                <th class="">Wed</th>
                                                <th class="">Thu</th>
                                                <th class="">Fri</th>
                                            </tr>
                                        </thead>
                                        <tbody id = "tbody" style = "font-size: 10px;">
                                            <!-- basta dine php ng sched -->
                                            <?php include 'sched_table.php';?>
                                        </tbody>
                                    </table>
                                    
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "col-4">
                        <!-- textarea at field -->
                        <!-- <form action="" id="manage-subject"> -->
                            <div class="card">
                                <div class="card-header">
                                        Schedule Form
                                </div>
                                <div class="card-body" style = "display:none" id = "cb">
                                        <!-- <input type="hidden" name="id" id = "id"> -->
                                        <div class="form-group">
                                            <label class="control-label">Subject</label>
                                            <select class="form-control" name = "subjects" id = "subjects">
                                            
                                            <!-- dine mnag php -->
                                                <?php
                                                    include '../connect.php';
                                                    //get data
                                                    $sql = "SELECT * from `subject`";
                                                    $result = mysqli_query($con,$sql);
                                                    
                                                    //rows
                                                    if($result){
                                                        while($row = mysqli_fetch_assoc($result)){
                                                            $id = $row['id'];
                                                            $subject = $row['subject'];
                                                            //into table
                                                            if($id != 0){
                                                                echo '
                                                                    <option value = "'.$id.'">'.$subject.'</option>
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
                                        <div class="form-group" id = "lbl_sec">
                                            <label class="control-label">Section</label>
                                            <select class="form-control" name = "sections" id = "sections">
                                            <!-- dine mnag php -->
                                                <?php
                                                    include '../connect.php';
                                                    //get data
                                                    $sql = "SELECT * from `section`";
                                                    $result = mysqli_query($con,$sql);
                                                                
                                                    //rows
                                                    if($result){
                                                        while($row = mysqli_fetch_assoc($result)){
                                                            $id = $row['id'];
                                                            $section = $row['section'];
                                                            //into table
                                                            if($id != 0){
                                                                echo '
                                                                    <option value = "'.$id.'">'.$section.'</option>
                                                                ';
                                                            }
                                                        }							
                                                    }else{
                                                        die("Adding Failed: " . mysqli_error());
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Room</label>
                                            <select class="form-control" name = "rooms" id = "rooms">
                                                <!-- dine mnag php -->
                                                <?php
                                                    include '../connect.php';
                                                    //get data
                                                    $sql = "SELECT * from `room`";
                                                    $result = mysqli_query($con,$sql);
                                                    
                                                    //rows
                                                    if($result){
                                                        while($row = mysqli_fetch_assoc($result)){
                                                            $id = $row['id'];
                                                            $room = $row['room'];
                                                            //into table
                                                            if($id != 0){
                                                                echo '
                                                                    <option value = "'.$id.'">'.$room.'</option>
                                                                ';
                                                            }
                                                        }							
                                                    }else{
                                                        die("Adding Failed: " . mysqli_error());
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                </div>
                                        
                                <div class="card-footer" style = "display:none" id = "cf">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-sm btn-primary col-sm-3 offset-md-3">Submit</button>
                                            <button class="btn btn-sm btn-default col-sm-3" type="reset" id = "uncheck"> Clear</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- </form> -->
                    </div>
                    
                <div>
            </div>
            </form>
            <!--  -->
        </div>
    </div>
<!--  -->
<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
            <label>You wish to delete this?</label>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-danger" id = "com">Yes</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
      </div>
        
        
    </div>
  </div>
</div>
<!--  -->
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
        <button type="submit" class="btn btn-success" id = "lclose">Select</button>
      </div>
        
        
    </div>
  </div>
</div>
<!--  -->
<!-- script -->
<script>
    $("#uncheck").click(function () {
        // $.toast({
        //     heading: 'Warning',
        //     text: "Checkbox Cleared!",
        //     showHideTransition: 'slide',
        //     position: 'top-right',
        //     icon: 'warning',
        //     hideAfter: 1000, 
            
        // })
        Swal.fire({
        // position: 'top-end',
            icon: 'warning',
            title: 'Cleared all the checkboxes',
            showConfirmButton: false,
            timer: 1500
        })
    });
</script>
<script>

    $(document).on('submit', '#reg-form', function()
    {  
        $.post('submit.php', $(this).serialize(), function(data)
        {
            // $(".cpp").html(data);  
            // $("#reg-form")[0].reset();

            // alert(data);
            let arr = data.split('|');
            let len =arr.length;
            // for (let i = 0; i < arr.length-1; i++) {
            //     if(arr[i] == "Sucessfully created" ){
            //         $.toast({
            //             heading: 'Success',
            //             text: arr[i],
            //             showHideTransition: 'slide',
            //             position: 'top-right',
            //             icon: 'success',
            //             hideAfter: 3000, 
            //             afterHidden: function () {
            //                 van = $("#faculty_id").val();
            //                 ven = $("#sections").val();
            //                 vin = $("#rooms").val();
            //                 // alert(van);
            //                 if(van != 0){
            //                     $('#cb').css('display','block');
            //                     $('#cf').css('display','block');
            //                     $.ajax({
            //                         type: "POST",
            //                         url: "sched_table.php",
            //                         data: {id: van,section: ven, room:vin},
            //                         success: function(e){
            //                             $("#tbody").html(e);
                                        
            //                         }
            //                     });
            //                 }else{
            //                     $("#tbody").empty();
            //                     $('#cb').css('display','none');
            //                     $('#cf').css('display','none');
            //                 }
            //             },
            //         })
            //     }else if(arr == ""){
            //         $.toast({
            //             heading: 'Warning',
            //             text: "Select First cells to create",
            //             showHideTransition: 'slide',
            //             position: 'top-right',
            //             icon: 'warning',
            //             hideAfter: 3000, 
            //             afterHidden: function () {
            //                 location.reload();
            //             },
            //         })
            //     }else{
            //         $.toast({
            //             heading: 'Error',
            //             text: arr[i],
            //             showHideTransition: 'slide',
            //             position: 'top-right',
            //             icon: 'error',
            //             hideAfter: 3000, 
            //             afterHidden: function () {
            //                 location.reload();
            //             },
            //         })
            //     }
            // }
            Swal.fire({
            // position: 'top-end',
                icon: 'success',
                title: 'Schedule/s Created Successfully',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                van = $("#faculty_id").val();
                    ven = $("#sections").val();
                    vin = $("#rooms").val();
                    // alert(van);
                    if(van != 0){
                        $('#cb').css('display','block');
                        $('#cf').css('display','block');
                        $.ajax({
                            type: "POST",
                            url: "sched_table.php",
                            data: {id: van,section: ven, room:vin},
                            success: function(e){
                                $("#tbody").html(e);
                                
                            }
                        });
                    }else{
                        $("#tbody").empty();
                        $('#cb').css('display','none');
                        $('#cf').css('display','none');
                    }
            })
            //mamaya magfifilter ako ayusin lng yung schedule
            
        });
        return false;
    })

    //filter
    $( "#faculty_id" ).change(function() {
        van = $(this).val();
        ven = $("#sections").val();
        vin = $("#rooms").val();
        // alert(van);
        if(van != 0){
            $('#cb').css('display','block');
            $('#cf').css('display','block');
            $.ajax({
                type: "POST",
                url: "sched_table.php",
                data: {id: van,section: ven, room:vin},
                success: function(e){
                    $("#tbody").html(e);
                    // alert(e);
                }
            });
        }else{
            $("#tbody").empty();
            $('#cb').css('display','none');
            $('#cf').css('display','none');
        }
    });
    // 
    $("#sections").change(function() {
        van = $("#faculty_id").val();
        ven = $(this).val();
        vin = $("#rooms").val();
        // alert(van);
        if(van != 0){
            $('#cb').css('display','block');
            $('#cf').css('display','block');
            $.ajax({
                type: "POST",
                url: "sched_table.php",
                data: {id: van,section: ven, room:vin},
                success: function(e){
                    $("#tbody").html(e);
                    // alert(e);
                }
            });
        }else{
            $("#tbody").empty();
            $('#cb').css('display','none');
            $('#cf').css('display','none');
        }
    });
    //
    $("#rooms").change(function() {
        van = $("#faculty_id").val();
        ven = $("#sections").val();
        vin = $(this).val();
        // alert(van);
        if(van != 0){
            $('#cb').css('display','block');
            $('#cf').css('display','block');
            $.ajax({
                type: "POST",
                url: "sched_table.php",
                data: {id: van,section: ven, room:vin},
                success: function(e){
                    $("#tbody").html(e);
                    // alert(e);
                }
            });
        }else{
            $("#tbody").empty();
            $('#cb').css('display','none');
            $('#cf').css('display','none');
        }
    }); 
    // 
    $( "#subjects" ).change(function() {
        hmm = $(this).val();
        // alert(van);
        if(hmm == 0){
            $('#lbl_sec').css('display','none');
            $('#sections').css('display','none');
        }else{
            $('#lbl_sec').css('display','block');
            $('#sections').css('display','block');
        }
        
    });
    
    
    
   //
   
    
    
</script>
<!--  -->
<script>
    var gf;
    var fg;
    function pass(x,y){
        gf = x;
        fg = y;
        $("#confirm").modal("show");
    }
    $(document).ready(function () { 
        $("#com").click(function() {
            
            // alert (ff);
            // $("#confirm").modal("show");
            $.ajax({
                type: "POST",
                url: "delete_sched.php",
                data: {id: gf, user : fg},
                success: function(e){
                    // $.toast({
                    //     heading: 'Success',
                    //     text: e,
                    //     showHideTransition: 'slide',
                    //     position: 'top-right',
                    //     icon: 'success',
                    //     hideAfter: 1000, 
                    //     afterHidden: function () {
                    //         van = $("#faculty_id").val();
                    //         ven = $("#sections").val();
                    //         vin = $("#rooms").val();
                    //         // alert(van);
                    //         if(van != 0){
                    //             $('#cb').css('display','block');
                    //             $('#cf').css('display','block');
                    //             $.ajax({
                    //                 type: "POST",
                    //                 url: "sched_table.php",
                    //                 data: {id: van,section: ven, room:vin},
                    //                 success: function(e){
                    //                     $("#tbody").html(e);
                                        
                    //                 }
                    //             });
                    //         }else{
                    //             $("#tbody").empty();
                    //             $('#cb').css('display','none');
                    //             $('#cf').css('display','none');
                    //         }
                    //         $("#confirm").modal("hide");
                    //     },
                    // })
                    Swal.fire({
                    // position: 'top-end',
                        icon: 'success',
                        title: 'Schedule is deleted permanently.',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        van = $("#faculty_id").val();
                            ven = $("#sections").val();
                            vin = $("#rooms").val();
                            // alert(van);
                            if(van != 0){
                                $('#cb').css('display','block');
                                $('#cf').css('display','block');
                                $.ajax({
                                    type: "POST",
                                    url: "sched_table.php",
                                    data: {id: van,section: ven, room:vin},
                                    success: function(e){
                                        $("#tbody").html(e);
                                        
                                    }
                                });
                            }else{
                                $("#tbody").empty();
                                $('#cb').css('display','none');
                                $('#cf').css('display','none');
                            }
                            
                    })
                    $("#confirm").modal("hide");
                }
            });
        });
        // edits
        
    })
</script>
<!--  -->
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