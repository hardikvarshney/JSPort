<?php 
include("../db_connection.php");
session_start();
define('TITLE','Login Form');
//include("header.php");

if(!isset($_SESSION['is_login']))
{
  if(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="select * from user_login where email='$email' and password='$password'";
    $res=$con->query($sql);
    if($res->num_rows==1)
    {
      $_SESSION['is_login']=true;
      $_SESSION['mail']=$email;
      echo "<script>location.href='user_dashboard.php';</script>";
      exit;
    }
    else
    {
      $msg='<div class="alert alert-warning  text-center mt-2" role="alert">***Invalid Credential.***.</div>';
    }
  }
}
else
{
  echo "<script>location.href='user_dashboard.php';</script>";
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
    <div class="col-lg-6 col-sm-12 mt-3">
    <?php if(isset($msg)) {echo "$msg"; }?>
      <form action="" method="post" class="mt-2 px-3 py-3" style="background-color: rgb(220,220,220);border-radius: 15px;">
        <h3 class="text-center">User Login</h3>
        <div class="mb-3">
          <label for="email" class="form-label" style="font-size:18px;"><i class="fas fa-envelope me-2"></i>Email Address:</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label" style="font-size:18px;"><i class="fas fa-key me-2"></i>Password:</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="d-grid gap-2" >
          <button type="submit" name="login" class="btn btn-outline-success mt-3" style="font-size:18px;font-weight:bold;">Login</button>
        </div>
        <hr>
        <div class="text-center">
          <a href="../index.php" type="button" class="btn btn-danger me-2"><i class="fas fa-backward me-2"></i>Back</a>     
          <a href="forget_password.php" type="button" class="btn btn-secondary me-2">Forget Password</a>
          <a href="registration_form_user.php" type="button" class="btn btn-primary me-2">New User<i class="fas fa-sign-in-alt ms-2"></i></a> 
        </div>
      </form>
    </div>
  <div class="col-lg-3" style="margin-bottom:479px"></div>
</div>
</div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/all.min.js"></script> -->

    <?php include("sfooter.php"); ?>
</body>
</html>