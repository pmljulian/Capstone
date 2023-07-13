<!DOCTYPE html>
<html lang = en>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>THS: Scheduling System</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='index.css'>
    <script src="jquery-3.6.1.js"></script>
    <script src = "dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="dist/font-awesome-4.7.0/css/font-awesome.css" crossorigin="anonymous">
    <link rel="stylesheet" href="dist/css/bootstrap.min.css" crossorigin="anonymous">
    <!-- jquery -->
    <script src="dist/toast/jquery.toast.min.js"></script>
    <link rel="stylesheet" href="dist/toast/jquery.toast.min.css" crossorigin="anonymous">
    <!-- Manifest File link -->
    <link rel="manifest" href="manifest.json">
    <!--  -->
    <script src="dist/swal/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="dist/swal/dist/sweetalert2.min.css">
</head>
<body style="background-color: #9A616D">
<!-- section -->
<section class="vh-100 m-2" style="background-image: url('images/main.png');background-repeat: no-repeat; background-size: cover; ">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card mt-5" style="width:100%; " >
          <div class="row g-0">
            <div class="col-md-6 col-lg-7 d-none d-md-block" style = "background:#9A616D;">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4" style = "margin-top:200px;">
                <h4 class="mb-4">What it is all about:</h4>
                <p class="small mb-0">Prof Sched: Administrator application is designed to manage user and create schedules. Can send notifications when updates are presented.</p>
              </div>
            </div>
            <div class="col-md-6 col-lg-5 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <div class="d-flex align-items-center mb-3 pb-1">
                    <img src="images/logo.png" style = "height:75px;" alt="logo">
                    <span class="h5 fw-bold mb-0 ml-3">THS: Scheduling System</span>
                </div>

                <form method = "post" id = "login" class = "mt-4">
                  <p>Please login to your account</p>

                  <div class="form-outline mb-3">
                    <input type="text" id="username" name = "username" class="form-control"
                      placeholder="User id or email or email address" />
                    <label class="form-label" for="username">User id / email</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="password" name = "password" class="form-control" placeholder = "Your password here"/>
                    <label class="form-label" for="password">Password</label>
                  </div>

                  <div class="text-center pt-1 mb-3 pb-1">
                    <label class="form-label" style = "color:red;" id = "warn"></label>
                    <button class="btn btn-primary btn-block fa-lg mb-3" type="submit" style = "background:#474A59;">Login</button>
                  </div>
                </form>
                <div class="pt-1 mb-4 text-center">
                  <a href = "images/Terms_and_Conditions.pdf" target = "_blank" class="text-muted">Terms and Conditions.</a>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- no -->
<!-- scr -->
<div class="modal fade" id="otp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="exampleModalLongTitle">One Time Pin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <form method = "post"> -->
      <div class="modal-body">
        <!-- <div class="container height-100 d-flex justify-content-center align-items-center">  -->
          <div class="position-relative"> 
            <div class="card p-2 text-center"> 
              <h6>Please enter the one time password <br> to verify your account</h6> 
              <div> 
                <span>A code has been sent to</span> 
                <small>email address</small> 
              </div> 
              <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2"> 
                <input class="m-2 text-center form-control rounded" type="text" id="first" maxlength="1" /> 
                <input class="m-2 text-center form-control rounded" type="text" id="second" maxlength="1" /> 
                <input class="m-2 text-center form-control rounded" type="text" id="third" maxlength="1" /> 
                <input class="m-2 text-center form-control rounded" type="text" id="fourth" maxlength="1" /> 
                
              </div> 
              <div class="mt-4"> 
                <span>Didn't get the code? </span> 
                <a href = "#" class="text-decoration-none ms-3" id = "resent">Resend OTP</a>
              </div>
            </div> 
          </div> 
      </div>
      <div class="modal-footer">
      <button class="btn btn-danger px-4 validate" id = "validet">Validate</button> 
      
      </div>
        <!-- </form> -->
    </div>
  </div>
</div>
<!--  -->

    <script type="text/javascript">
      $(document).on('submit', '#login', function(){  
        $.post('php/login.php', $(this).serialize(), function(data){
            
            var g = data;
            // alert(g);
            if(g == "admin"){
                // alert(g);
                //toast
                // $.toast({
                //     heading: 'Success',
                //     text: 'Login Succesfully.',
                //     showHideTransition: 'slide',
                //     position: 'top-right',
                //     icon: 'success',
                //     hideAfter: 1500, 
                //     afterHidden: function () {
                //         window.location.href = 'php/admin/dashboard.php';
                //     },
                // })
                //
                Swal.fire({
                  // position: 'top-end',
                  icon: 'success',
                  title: 'Succesfully login',
                  showConfirmButton: false,
                  timer: 1500
                }).then(function() {
                  window.location.href = 'php/admin/dashboard.php';
                })
            }else if(g == "user"){
                // alert(g);
                Swal.fire({
                  // position: 'top-end',
                  icon: 'success',
                  title: 'Succesfully login',
                  showConfirmButton: false,
                  timer: 1500
                }).then(function() {
                  window.location.href = 'php/user/home.php';
                })
                
            }else if(g == "Need OTP"){
              $.ajax({
                  type: "POST",
                  url: "php/email.php",
                  data: {input: $("#username").val()},
                  success: function(e){
                  }
              });
                $("#otp").modal("show");
            }else{
              $("#warn").html(data);
            }
                //$("#form1")[0].reset();
                // $("#check").reset();
        }); 
        return false;
      })
    </script>
    <!--  -->
<script>
  document.addEventListener("DOMContentLoaded", function(event) {
  
  function OTPInput() {
  const inputs = document.querySelectorAll('#otp > *[id]');
  for (let i = 0; i < inputs.length; i++) { 
    inputs[i].addEventListener('keydown', function(event) { 
      if (event.key==="Backspace" ) { 
        inputs[i].value='' ; if (i !==0) inputs[i - 1].focus(); 
      } else { 
        if (i===inputs.length - 1 && inputs[i].value !=='' ) { 
          return true; 
        } else if (event.keyCode> 47 && event.keyCode < 58) { 
          inputs[i].value=event.key; 
          if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); 
        } else if (event.keyCode> 64 && event.keyCode < 91) { 
          inputs[i].value=String.fromCharCode(event.keyCode); 
          if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault();
         } 
        } 
      }); } } OTPInput();

    
});
</script>
<script type="text/javascript">
  $("#resent").click(function() {
    // alert("dadasda");
    $.ajax({
        type: "POST",
        url: "php/email.php",
        data: {input: $("#username").val()},
        success: function(e){
        }
    });
    });
</script>
<script type="text/javascript">
  $(document).ready(function () {
  $("#validet").click(function() {
    // alert("dadasda");
    $.ajax({
        type: "POST",
        url: "php/otp.php",
        data: {username: $("#username").val(),password: $("#password").val(),first: $("#first").val(),second: $("#second").val(),third: $("#third").val(),fourth: $("#fourth").val()},
        success: function(x){
          // alert(x);
            if(x == "Successfully login"){
                // $.toast({
                //     heading: 'Success',
                //     text: 'Login Succesfully.',
                //     showHideTransition: 'slide',
                //     position: 'top-right',
                //     icon: 'success',
                //     hideAfter: 1500, 
                //     afterHidden: function () {
                //       window.location.href = 'php/user/home.php'
                //     },
                // })
                Swal.fire({
                  // position: 'top-end',
                  icon: 'success',
                  title: 'Succesfully login',
                  showConfirmButton: false,
                  timer: 1500
                }).then(function() {
                  window.location.href = 'php/user/home.php';
                })
             
            }else if(x == "OTP expired request another"){
              //   $.toast({
              //     heading: 'Error',
              //     text: x,
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
                  title: x,
                  showConfirmButton: false,
                  timer: 1500
                })
            }else{
              Swal.fire({
                  // position: 'top-end',
                  icon: 'error',
                  title: x,
                  showConfirmButton: false,
                  timer: 1500
                })
            }
            
        }
    });
    });
  });
</script>
<!-- manifesto -->
<!--  -->
<script>
    window.addEventListener('load', () => {
      registerSW();
    });
 
    // Register the Service Worker
    async function registerSW() {
      if ('serviceWorker' in navigator) {
        try {
          await navigator
                .serviceWorker
                .register('serviceworker.js');
        }
        catch (e) {
          console.log('SW registration failed');
        }
      }
    }
  </script>
</body>
</html>