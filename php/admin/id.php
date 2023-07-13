<?php
if($_POST){
    $id = $_POST['id'];
    // echo $id;
    include '../connect.php';
    //get data
    $sql = "SELECT * from `users` WHERE `id` = $id";
    $result = mysqli_query($con,$sql);
    
    //rows
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $idp = $row['id'];
            $title = $row['title'];
            $first = $row['first'];
            $last = $row['last'];
            $email = $row['email'];
            $contact = $row['contact'];
            $password = $row['password'];
            
        }
    }else{
        die("Adding Failed: " . mysqli_error());
    }
    echo '
    <div class="row">
        <input type="hidden" name="id" id = "id">
            <div class="col-4 text-left">
                <label for="Input1">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Mr / Ms" value = "'.$title.'">
            </div>
            <div class="col-4 text-left">
                <label for="Input2">First Name</label>
                <input type="text" class="form-control" id="first" name="first" placeholder="Given Name" value = "'.$first.'">
            </div>
            <div class="col-4 text-left">
                <label for="Input3">Last Name</label>
                <input type="text" class="form-control" id="last" name="last" placeholder="Family Name" value = "'.$last.'">
            </div>
        </div>
        <div class="row">
            <div class="col-4 text-left">
                <label for="Input4">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" value = "'.$email.'">
            </div>
            <div class="col-4 text-left">
                <label for="Input5">Contact</label>
                <input type="number" class="form-control" id="contact" name="contact" placeholder="+63 / 09" value = "'.$contact.'">
            </div>
            <div class="col-4 text-left">
                <label for="Input6">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Strong Password" value = "'.$password.'">
            </div>
        </div>';
}
?>
