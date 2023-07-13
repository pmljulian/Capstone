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
                <li >
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
                <li class = "active">
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
                        <a href="home.php" class = "link-primary">Home</span></a> > <a href="settings.php" class="link-success">Settings</span></a>
                        </div>
                    </div>
                </div>
            </nav>
            <!--  -->
            <div class="card">
                <?php
                    include '../connect.php';
                    //get data
                    $sql = "SELECT * from `users` WHERE `id` = '$user'";
                    $result = mysqli_query($con,$sql);
                    
                    //rows
                    if($result){
                        while($row = mysqli_fetch_assoc($result)){
                            $notify = $row['notify'];
                        }
                        
                        
                    }else{
                        die("Adding Failed: " . mysqli_error());
                    }
                ?>
					<div class="card-header">
						<b>Settings</b>
                        <span class = "float-right">
                            <b>Notify</b>
						    <input type="range" style = "width:45px;" class="form-control-range float-right ml-3 mt-1" id="slide" min = 0  max = 1 value = '<?php echo $notify;?>'>
                        </span>
					</div>
					<div class="card-body" style="overflow-y:auto; height:480px;">
						
						<table class="table table-bordered table-condensed table-hover" >
							<thead style = "background-color: gray;">
								<tr>
									<!-- <th class="text-center">#</th> -->
									<th class="">Changes</th>
									<th class="">Timestamp</th>
								</tr>
							</thead>
							<tbody>
                                <?php
                                    include '../connect.php';
                                    //get data
                                    $sql = "SELECT * from `logs` WHERE `faculty` = '$user'";
                                    $result = mysqli_query($con,$sql);
                                    
                                    //rows
                                    if($result){
                                        while($row = mysqli_fetch_assoc($result)){
                                            $state = $row['state'];
                                            $tee = $row['timestamp'];  
                                            //into table 
                                            echo '
                                                <tr>
                                                    <td>'.$state.'</td>
                                                    <td id = "hh">'.$tee.'</td>
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
    $('#slide').change(function() { 
        var sliderAmount = $("#slide").val();
        $.ajax({
            type: "POST",
            url: "notif.php",
            data: {value: sliderAmount},
            success: function(e){
                // alert(e);
                location.reload();
            }
        });
            location.reload();
            window.location.href = 'settings.php';
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