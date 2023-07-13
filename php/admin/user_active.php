<!DOCTYPE html>
<html lang = en>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>THS: User List</title>
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
                <p>User List</p>
                <li>
                    <a href="dashboard.php">
                        <i class="fa fa-dashboard text-center"></i>
                        <span class="nav-text p-2">
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="active">
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
                        <a href="dashboard.php" class = "link-primary">Home</span></a> > <a href="user_active.php" class="link-success">Active Users</span></a>
                        </div>
                    </div>
                </div>
            </nav>

            <!--  -->
            <!-- <div class="container"> -->
                <div class="card">
					<div class="card-header">
						<b>List of Faculty (Active)</b>
						<span class="">
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalCreate">
                                <i class="fa fa-plus"></i> New
                            </button>
						</span>
					</div>
					<div class="card-body" style="overflow-y:auto;">
						
						<table class="table table-bordered table-condensed table-hover">
							<thead>
								<tr>
									<!-- <th class="text-center">#</th> -->
									<th class="">ID No</th>
									<th class="">Name</th>
									<th class="">Email</th>
									<th class="">Contact</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
                                <?php
                                    include '../connect.php';
                                    //get data
                                    $sql = "SELECT * from `users` WHERE `archive` = 'NO'";
                                    $result = mysqli_query($con,$sql);
                                    
                                    //rows
                                    if($result){
                                        while($row = mysqli_fetch_assoc($result)){
                                            $id = $row['id'];
                                            $title = $row['title'];
                                            $first = $row['first'];
                                            $last = $row['last'];
                                            $email = $row['email'];
                                            $contact = $row['contact'];
                                            $full = implode(' ', array($title, $first, $last));
                                            //into table
                                            if($id != 12344112){
                                                echo '
                                                    <tr>
                                                        <td>'.$id.'</td>
                                                        <td>'.$full.'</td>
                                                        <td>'.$email.'</td>
                                                        <td>'.$contact.'</td>
                                                        <td class = "text-center">
                                                            <button type="button" class = "ups bg-info p-2 border border-5 text-light" id = "'.$id.'">Update</button>
                                                            <button type="button" class = "mem bg-warning p-2 border border-5 text-dark" id = "'.$id.'">Archive</button>
                                                        </td>
                                                    </tr>
                                                ';
                                            }
                                            
                                        }
                                        
                                        
                                    }else{
                                        die("Adding Failed: " . mysqli_error());
                                    }
                                ?>
							</tbody>
						</table>
					</div>
				</div>
            <!-- </div>       -->
            <!--  -->
        </div>
    </div>
<!--  -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method = "post" id = "form-create">
      <div class="modal-body">
            <!-- dine yung mga cells -->
            <div class="row">
                <div class="col-4 text-left">
                    <label for="Input1">Title</label>
                    <!-- <input type="text" class="form-control" id="Input1" placeholder="Mr / Ms"> -->
                    <select class="form-control" id = "Input1" name = "Input1">
                    <!-- dine mnag php -->
                        <?php
                            include '../connect.php';
                            //get data
                            $sql = "SELECT * from `title`";
                            $result = mysqli_query($con,$sql);
                            
                            //rows
                            if($result){
                                while($row = mysqli_fetch_assoc($result)){
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    //into table
                                    echo '
                                        <option value = "'.$id.'">'.$title.'</option>
                                    ';
                                }							
                            }else{
                                die("Adding Failed: " . mysqli_error());
                            }
                        ?>
                    </select>
                </div>
                <div class="col-4 text-left">
                    <label for="Input2">First Name</label>
                    <input type="text" class="form-control" id="Input2" name="Input2" placeholder="Given Name" required>
                </div>
                <div class="col-4 text-left">
                    <label for="Input3">Last Name</label>
                    <input type="text" class="form-control" id="Input3" name="Input3" placeholder="Family Name" required>
                </div>
            </div>
            <div class="row">
                <div class="col-4 text-left">
                    <label for="Input4">Email</label>
                    <input type="email" class="form-control" id="Input4" name="Input4" placeholder="example@gmail.com" required>
                </div>
                <div class="col-4 text-left">
                    <label for="Input5">Contact</label>
                    <input type="number" class="form-control" id="Input5" name="Input5" placeholder="+63 / 09" min = "1000000000" max = "9999999999" required>
                </div>
                <div class="col-4 text-left">
                    <label for="Input6">Password</label>
                    <input type="password" class="form-control" id="Input6" name="Input6" pattern=".{8,}" placeholder="minimum of (8) characters" required>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id = "crt">Create User</button>
      </div>
    </form>
    </div>
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
            <label>Are you sure that you want to archive?</label>
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
<!--  -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method = "post" id = "form-update">
      <div class="modal-body" id = "cun">
        <input type="hidden" name="id" id = "id">
            <!-- dine yung mga cells -->
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id = "pth">Update Information</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!--  -->

<!--  -->
<!--  -->
<!-- script -->
<script id = "g">
    // $('#table-active').dataTable();
    var nt;
    $(document).ready(function () {
        //up
        $(".ups").click(function() {
            // alert("dadasda");
            nt = this.id;
            $.ajax({
                type: "POST",
                url: "id.php",
                data: {id: nt},
                success: function(e){
                    $("#cun").html(e);
                    $("#modalUpdate").modal("show");
                    $("#id").val(nt);
                }
            });
		});
        // arc
        var ff;
        $(".mem").click(function() {
            ff = this.id;
            // alert (ff);
            $("#confirm").modal("show");
            
        });
        $("#com").click(function() {
            
            // alert (ff);
            // $("#confirm").modal("show");
            $.ajax({
                type: "POST",
                url: "arc.php",
                data: {id: ff},
                success: function(e){
                    
                    Swal.fire({
                    // position: 'top-end',
                        icon: 'success',
                        title: 'Archived Succesfully',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        location.reload();
                    })
                   
                }
            });
        });
    });
    // 
    $(document).on('submit', '#form-create', function(){
        // alert("dasdadasda");  
    $.post('create_user.php', $(this).serialize(), function(data){
        
        var g = data;
        // alert(g);
        if(g == "Successfully created"){
            // alert(g);
            Swal.fire({
            // position: 'top-end',
                icon: 'success',
                title: 'Successfully created',
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                location.reload();
            })
        }else if(g == "Email already existed"){
            // alert(g);
            // $.toast({
            //     heading: 'Error',
            //     text: 'Email Already Existed.',
            //     showHideTransition: 'slide',
            //     position: 'top-right',
            //     icon: 'error',
            //     hideAfter: 1000, 
            //     afterHidden: function () {
            //         location.reload();
            //     },
            // })
                Swal.fire({
                  // position: 'top-end',
                    icon: 'error',
                    title: g,
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    location.reload();
                })
        }else{
            // $.toast({
            //     heading: 'Error',
            //     text: 'Existing / Unmodified',
            //     showHideTransition: 'slide',
            //     position: 'top-right',
            //     icon: 'error',
            //     hideAfter: 1000, 
            //     afterHidden: function () {
            //         location.reload();
            //     },
            // })
            Swal.fire({
                  // position: 'top-end',
                    icon: 'error',
                    title: g,
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    location.reload();
                })
        }
    }); 
    return false;
    })
    // update
    $(document).on('submit', '#form-update', function(){
        // alert("dasdadasda");  
    $.post('real_ups.php', $(this).serialize(), function(data){
        
        var g = data;
        // alert(g);
        if(g == "Successfully Updated"){
            // alert(g);
            // $.toast({
            //     heading: 'Success',
            //     text: 'Succesfully Updated.',
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
                    title: g,
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    location.reload();
                })
        }else{
            // $.toast({
            //     heading: 'Error',
            //     text: 'Existing / Unmodified',
            //     showHideTransition: 'slide',
            //     position: 'top-right',
            //     icon: 'error',
            //     hideAfter: 1000, 
            //     afterHidden: function () {
            //         location.reload();
            //     },
            // })
           Swal.fire({
                  // position: 'top-end',
                    icon: 'error',
                    title: g,
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    location.reload();
                })
        }
    }); 
    return false;
    })
</script>
<!--  -->
<!-- filter -->

<!-- ? -->
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