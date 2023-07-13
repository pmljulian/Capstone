<!DOCTYPE html>
<html lang = en>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>THS: Peripherals</title>
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
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src="../../dist/swal/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../../dist/swal/dist/sweetalert2.min.css">
    <!-- datatable -->
    <script src="../../dist/DataTables/datatables.min.js"></script>
    <link href="../../dist/DataTables/datatables.min.css" rel="stylesheet">
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
                <p>Peripherals</p>
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
                <li class="active">
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
                        <a href="dashboard.php" class = "link-primary">Home</span></a> > <a href="section.php" class="link-success">Section</span></a>
                        </div>
                    </div>
                </div>
            </nav>

            <!--  -->
            <div id="content" >
                <div class = "row">
                    
                    <div class = "col-8">
                        <div class="card">
                            <div class="card-header">
                                <b>Section List</b>
                            </div>
                            <div class="card-body" style="overflow-y:auto;">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Section</th>
                                            <th class="text-center">Description</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
                                                    $description = $row['description'];
                                                    //into table
                                                    if($id != 0){
                                                    echo '
                                                        <tr>
                                                            <td>'.$id.'</td>
                                                            <td>'.$section.'</td>
                                                            <td>'.$description.'</td>
                                                            <td class = "text-center">
                                                                <button type="button" class = "ups bg-warning p-2 border border-5 text-dark" data-id="'.$id.'" data-section="'.$section.'" data-description="'.$description.'">Edit</button>
                                                                <button type="button" class = "mem bg-danger p-2 border border-5 text-light" id = "'.$id.'">Delete</button>
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
                    </div>
                    <div class = "col-4">
                        <!-- textarea at field -->
                        <form action="" id="manage-subject">
                            <div class="card">
                                <div class="card-header">
                                        Section Form
                                </div>
                                <div class="card-body">
                                        <input type="hidden" name="id" id = "id">
                                        <div class="form-group">
                                            <label class="control-label">Section</label>
                                            <input type="text" class="form-control" name="section" id = "section" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Description</label>
                                            <textarea class="form-control" cols="30" rows='3' name="description" id = "description"></textarea>
                                        </div>
                                        
                                </div>
                                        
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
                                            <button class="btn btn-sm btn-default col-sm-3" type="button" onclick="_reset()"> Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                <div>
                    
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
        <button type="submit" class="btn btn-success" id = "lclose">Select</button>
      </div>
       
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
            <label>Are you sure that you want to delete?</label>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-danger" id = "com">Yes</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
      </div>
       
    </div>
  </div>
</div>
<!-- script -->
<!-- script -->

<script type="text/javascript">
    $(document).on('submit', '#manage-subject', function(){
        // alert("dasdadasda");  
    $.post('create_section.php', $(this).serialize(), function(data){
        
        var g = data;
        // alert(g);
        if(g == "Sucessfully created"){
            // alert(g);
            // $.toast({
            //     heading: 'Success',
            //     text: 'Succesfully Created.',
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
        }else if(g == "Sucessfully Modified"){
            // alert(g);
            // $.toast({
            //     heading: 'Success',
            //     text: 'Succesfully Modified.',
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
    var ff;
    $(document).ready(function () { 
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
                url: "delete_section.php",
                data: {id: ff},
                success: function(e){
                    if(e == "Succesfully Deleted"){
                        // alert(g);
                        // $.toast({
                        //     heading: 'Success',
                        //     text: 'Succesfully Deleted.',
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
                        title: 'Succesfully deleted',
                        showConfirmButton: false,
                        timer: 1500
                        }).then(function() {
                            location.reload();
                        })
                    }else{
                        // $("#warn").html(data);
                    }
                }
            });
        });
        // edits
        $('.ups').click(function(){
            var eydi = $(this).attr('data-id');
            var sic = $(this).attr('data-section');
            var des = $(this).attr('data-description');
            // 
            $("#id").val(eydi);
            $("#section").val(sic);
            $("#description").html(des);
            
            // $.toast({
            //     heading: 'Editing',
            //     text: 'Editing Section name: ' + sic,
            //     showHideTransition: 'slide',
            //     position: 'top-right',
            //     icon: 'warning',
            //     hideAfter: 3000, 
                
            // })
            Swal.fire({
                // position: 'top-end',
                icon: 'warning',
                title: "You're editing " + sic,
                showConfirmButton: false,
                timer: 2500
                })
        })
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
    function _reset(){
		$('#manage-subject').get(0).reset()
		$('#manage-subject input,#manage-subject textarea').val('')
	}
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
            $('table').dataTable()
        });
</script>
<!--  -->
</body>
</html>