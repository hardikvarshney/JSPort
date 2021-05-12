<?php 
include('../db_connection.php');
session_start();
define('PAGE','profile');
define('TITLE','User Profile');
include('header.php'); 
if($_SESSION['is_adminlogin'])
{
    $rEmail=$_SESSION['mail'];
}
else
{
    echo "<script>location.href='admin_login.php'</script>";
}
$sql="select * from admin_login where email='$rEmail'";
$res=$con->query($sql);
if($res->num_rows==1)
{
    $row=$res->fetch_assoc();
}
if(isset($_POST['update']))
{
    $name=$_POST['name'];
    $password=$_POST['password'];
    $country=$_POST['country'];
    $contact=$_POST['contact'];
    $sql="update admin_login set name='$name', password='$password', country='$country', contact='$contact' where email='$rEmail'";
    if($con->query($sql)===TRUE)
    {
        $_SESSION['Msg']='<div class="alert alert-success text-center mt-2" role="alert">***Information Updated Successfully***</div>';
        header('location:profile.php');
        die();
    }
    else
    {
        $msg='<div class="alert alert-warning  text-center mt-2" role="alert">***Something went Wrong.***.</div>';
    }

}
?>

    <div class="col-lg-8 ">
        <h5 class="text-center text-primary"><?php echo "Welcome,  $rEmail"; ?></h5>
            <?php if(isset($msg)) { echo $msg ; } ?>
            <?php if(isset($_SESSION['Msg'])) { echo $_SESSION['Msg'] ; } unset($_SESSION['Msg']); ?>
            <form action="" method="POST" class="bg-light px-4 py-2 ms-3">
                
                <div class="form-group">
                    <label for="name"><i class="fas fa-user"></i> Name</label>
                    <input type="text" class="form-control" name="name" value=<?php echo $row['name']; ?> required>
                </div>
                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope"></i> Email address</label>
                    <input type="email" class="form-control" name="email" value=<?php echo $row['email']; ?> required readonly>
                </div>
                <div class="form-group">
                    <label for="password"><i class="fas fa-key"></i> Password</label>
                    <input type="text" class="form-control" name="password" value=<?php echo $row['password']; ?> required>
                </div>
                <div class="form-group">
                    <label for="country"><i class="fas fa-globe"></i> Country</label>
                    <input type="text" class="form-control" name="country" value=<?php echo $row['country']; ?> required>
                </div>
                <div class="form-group">
                    <label for="contact"><i class="far fa-address-book"></i> Contact</label>
                    <input type="text" class="form-control" name="contact" value=<?php echo $row['contact']; ?> required>
                </div>
                <button type="submit" class="btn btn-success btn-lg my-3 " name="update"><i class="fas fa-edit me-3"></i>Update</button>
                
            </form>
        </div>
    </div>
</div>

<?php include('../User/sfooter.php'); ?>