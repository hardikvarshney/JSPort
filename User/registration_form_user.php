<?php 
include("../db_connection.php");
session_start();
define('TITLE','Registration Form');
//include("header.php");
if(isset($_POST['register']))
{
  $userid = rand(1000,100000);
  $name = $_POST['name'];   //$name = mysqli_real_escape_string($con, $_POST['name']); => For preventing SQL Injection
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $country = $_POST['country'];
  $instution = $_POST['instution'];
  $password = $_POST['password'];  //password_hash($password, PASSWORD_BCRYPT);
  $sqli="select email from user_login where email='$email'";
  $rest=$con->query($sqli);
  if($rest->num_rows==1)
  {
    $msg='<div class="alert alert-warning  text-center mt-2" role="alert">***E-Mail Id Already Registered.***.</div>';
  }
  else
  {
    $sql="Insert into user_login (user_id, name, email, instution, country, password, contact) values ('$userid', '$name', '$email', '$instution', '$country', '$password', '$contact')";
    $res=$con->query($sql);
    if($res===TRUE)
    {
      $msg='<div class="alert alert-warning  text-center mt-2" role="alert">Registration Successful. Your Registration Id is : ' . $userid . '<br>Please note your Registration Id. <br>You can now <a href="login_form_user.php">login.</a>.</div>';
      
    }
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
  <div class="col-lg-2"></div>
    <div class="col-lg-8 col-sm-12">
      <?php if(isset($msg)) {echo "$msg"; } ?>
      <?php if(isset($_SESSION['Msg'])) {echo $_SESSION['Msg']; } unset($_SESSION['Msg']); ?>
      <form action="" method="post" class="mt-2 px-3 py-3" style="background-color: rgb(220,220,220);border-radius: 15px;">
        <h3 class="text-center">User Registration</h3>
        <div class="mb-3">
          <label for="name" class="form-label" style="font-size:18px;"><i class="fas fa-user me-2"></i>Name:</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label" style="font-size:18px;"><i class="fas fa-envelope me-2"></i>Email Address:</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <div class="mb-3">
              <label for="contact" class="form-label" style="font-size:18px;"><i class="far fa-address-book me-2"></i>Contact No.:</label>
              <input type="contact" class="form-control" id="contact" name="contact" required onkeypress="return onlyNumberKey(event)">
            </div>
          </div>
          <div class="col-lg-6 col-md-12">
            <div class="mb-3">
              <label for="country" class="form-label" style="font-size:18px;"><i class="fas fa-globe me-2"></i></i>Country:</label>
              <input type="text" class="form-control" id="country" name="country" required>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="instution" class="form-label" style="font-size:18px;"><i class="fas fa-university me-2"></i>Instution:</label>
          <input type="text" class="form-control" id="instution" name="instution" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label" style="font-size:18px;"><i class="fas fa-key me-2"></i>Password:</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="d-grid gap-2 mb-3" >
          <button type="submit" name="register" class="btn btn-outline-success mt-3" style="font-size:18px;font-weight:bold;">Register</button>
        </div>
        <hr>
        <div class="text-center">
          <a href="../index.php" type="button" class="btn btn-danger me-2"><i class="fas fa-backward me-2"></i>Back</a>     
          <a href="login_form_user.php" type="button" class="btn btn-primary me-2">Login<i class="fas fa-sign-in-alt ms-2"></i></a> 
        </div>
               
      </form>   
    </div>
  <div class="col-lg-2 "></div>
</div>
</div>
<!--Only Number Checking-->
<script>
    function onlyNumberKey(evt)
    {
        var x=(evt.which) ? evt.which : evt.keyCode
        if(x > 31 && (x < 48 || x > 57))
        {
            return false;
        }
        return true;
    }
</script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/all.min.js"></script> -->
    <?php include("sfooter.php"); ?>
</body>
</html>
