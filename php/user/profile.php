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
                <li class = "active">
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
                        <a href="home.php" class = "link-primary">Home</span></a> > <a href="profile.php" class="link-success">Profile</span></a>
                        </div>
                    </div>
                </div>
            </nav>
            <!--  -->
            <div class="card" id = "rs">
					<div class="card-header">
						<b>User Profile</b>
						<span class="">
                            <button type="button" class="btn btn-warning float-right" id = "edit">
                                <i class="fa fa-pencil"></i> Edit
                            </button>
						</span>
					</div>
					<div class="card-body" style="overflow-y:auto; padding-left:10%; padding-right:10%;">
						<!-- php muna -->
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
                                    $email = $row['email'];
                                    $contact = $row['contact'];
                                    $password = $row['password'];
                                }
                            }
                        ?> 
						
                        <div class="form-group">
                            <label class="control-label">Title</label>
                            <input type="text" id="title" disabled = "disabled" name = "title" class="form-control h-50"
                            placeholder="Mr. / Ms." value = "<?php echo $title;?>"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">First Name</label>
                            <input type="text" id="first" disabled = "disabled" name = "first" class="form-control h-50"
                            placeholder="Given Name" value = "<?php echo $first;?>"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Last Name</label>
                            <input type="text" id="last" disabled = "disabled" name = "last" class="form-control h-50"
                            placeholder="Family Name" value = "<?php echo $last;?>"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email Address</label>
                            <input type="email" id="email" disabled = "disabled" name = "email" class="form-control h-50 "
                            placeholder="Example@gmail.com" value = "<?php echo $email;?>"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Contact Number</label>
                            <input type="number" id="contact" disabled = "disabled "name = "contact" class="form-control h-50 "
                            placeholder="09xxxxxx" value = "<?php echo $contact;?>"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" id="password" disabled = "disabled" name = "password" class="form-control h-50 "
                            placeholder="password" value = "<?php echo $password;?>"/>
                        </div>
                        
					</div>
                    <div class="card-footer" style = "display:none;" id = "mf">
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-sm btn-primary col-sm-3 offset-md-3 m-1 float-right" data-toggle="modal" data-target="#update"> Save</button>
                                <button class="btn btn-sm btn-default col-sm-3 m-1 float-right" type="button" id = "cancel"> Cancel</button>
                            </div>
                        </div>
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
      <div class="modal-footer" >
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id = "lclose">Select</button>
      </div>
        
    </div>
  </div>
</div>
<!--  -->
<!-- mowdel -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLongTitle">Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <form method = "post"> -->
      <div class="modal-body">
            <label>Do you want to Update Information?</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" id = "upinfo">Update</button>
      </div>
        <!-- </form> -->
    </div>
  </div>
</div>
<!--  -->
<!-- script -->
<script>
    $(document).ready(function () {
        $('#edit').on('click', function () {
            $('input').prop('disabled',false);
            $('#mf').css('display','block');
            Swal.fire({
            // position: 'top-end',
            icon: 'warning',
            title: 'Editing Profile',
            showConfirmButton: false,
            timer: 1500
            })
        });
        $('#cancel').on('click', function () {
            $('input').prop('disabled',true);
            $('#mf').css('display','none');
        });
        $("#upinfo").click(function() {
        // alert("dadasda");
            $.ajax({
                type: "POST",
                url: "update.php",
                data: {title: $("#title").val(),first: $("#first").val(),last: $("#last").val(),email: $("#email").val(),contact: $("#contact").val(),password: $("#password").val()},
                success: function(e){
                    // $.toast({
                    //     heading: 'Success',
                    //     text: 'Updated Succesfully.',
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
                    title: 'Updated Successfully',
                    showConfirmButton: false,
                    timer: 1500
                    }).then(function() {
                        location.reload();
                    })
                }
            });
            
        });   
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