<?php
include('../db_connection.php');
session_start();
define('TITLE','Forget Password');
if(isset($_POST['change']))
{
    $userid = $_POST['id'];
    //$email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "Update user_login set password='$password' where user_id='$userid'";
    $result=$con->query($sql);
    if($result==TRUE)
    {
        $msg='<div class="alert alert-success text-primary text-center mt-2" role="alert">Password Successfully Changed. <a href="login_form_user.php">login</a></div>';
    }
    else
    {
        $msg='<div class="alert alert-danger text-danger text-center mt-2" role="alert">Id does not match.</div>';
    }
}
?>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">
      <img src="../images/logo.png" alt="" width="80" height="50" class="d-inline-block align-top">
      Journal Submission Portal
    </a>
    <span class="text-success" style="font-size:18px;"><?php //echo "Welcome, $rEmail" ; ?></span>
  </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <form action="" method=post class="mt-2 px-3 py-3" style="background-color: rgb(220,220,220);border-radius: 15px;">
            <h3 class="text-center">Change Password</h3>
            <hr>
            <div class="row">
            <?php if(isset($msg)){echo $msg;}?>     
                <div class="mb-3">
                    <label for="id" class="form-label" style="font-size:18px;"><i class="fas fa-id-badge me-2"></i>Id:</label>
                    <input type="number" class="form-control" id="id" name="id" required>
                </div>
                <!-- <div class="mb-3">
                    <label for="email" class="form-label" style="font-size:18px;"><i class="fas fa-envelope me-2"></i>Email Address:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div> -->
                <div class="mb-3">
                    <label for="password" class="form-label" style="font-size:18px;"><i class="fas fa-key me-2"></i>New Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="d-grid gap-2 mb-3" >
                    <button type="submit" name="change" class="btn btn-outline-success mt-3" style="font-size:18px;font-weight:bold;">Update</button>
                </div>
            </form>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>

<?php
include('sfooter.php');
?>