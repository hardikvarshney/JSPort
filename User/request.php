<?php
include('../db_connection.php');
session_start();
define('PAGE','request');
define('TITLE','Request Admin');
include('header.php');
if($_SESSION['is_login'])
{
    $rEmail=$_SESSION['mail'];
}
else
{
    echo "<script>location.href='login_form_user.php'</script>";
}
$sql="select * from user_login where email='$rEmail'";
$res=$con->query($sql);
if($res->num_rows==1)
{
    $row=$res->fetch_assoc();
}
if(isset($_POST['send']))
{
    $id=$row['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $request=$_POST['request'];
    $sqli="insert into requests (user_id, user_name, user_email, query) values ('$id', '$name', '$email', '$request')";
    $rest=$con->query($sqli);
    if($rest == 1)
    {
        $_SESSION['Msg']='<div class="alert alert-success text-center mt-2" role="alert">***Request Sent Successfully***</div>';
        header('location:request.php');
        die();
    }
    else
    {
        $msg='<div class="alert alert-warning  text-center mt-2" role="alert">***Something went wrong.***.</div>';
    }
}
else
{
    //$msg='<div class="alert alert-warning  text-center mt-2" role="alert">***Something went wrong.***.</div>';
}
?>
<div class="col-lg-8 ">
        <h5 class="text-center text-primary"><?php echo "Welcome,  $rEmail"; ?></h5>
            <?php if(isset($msg)) { echo $msg; } ?>
            <?php if(isset($_SESSION['Msg'])) { echo $_SESSION['Msg'] ; } unset($_SESSION['Msg']); ?>
            <form action="" method="POST" class="bg-light px-4 py-2 ms-3">
                
                <div class="form-group mt-2">
                    <label for="name"><i class="fas fa-user"></i> Name</label>
                    <input type="text" class="form-control" name="name" value=<?php echo $row['name']; ?> required readonly>
                </div>
                <div class="form-group mt-2">
                    <label for="email"><i class="fas fa-envelope"></i> Email address</label>
                    <input type="email" class="form-control" name="email" value=<?php echo $row['email']; ?> required readonly>
                </div>
                <div class="form-group mt-2">
                    <label for="request"><i class="far fa-address-book"></i> Request</label>
                    <textarea class="form-control" id="request" rows="3" name="request" required></textarea>
                </div>
                <button type="submit" class="btn btn-success btn-lg my-3 " name="send"></i>Send <i class="far fa-paper-plane ms-2"></i></button>
                
            </form>
        </div>
    </div>
</div>


<?php include('sfooter.php'); ?>