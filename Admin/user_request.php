<?php
include('../db_connection.php');
session_start();
define('PAGE','user_request');
define('TITLE','User Requests');
include('header.php');
if($_SESSION['is_adminlogin'])
{
    $rEmail=$_SESSION['mail'];
}
else
{
    echo "<script>location.href='admin_login.php'</script>";
}
$sql="select * from requests";
$res=$con->query($sql);
if($res->num_rows > 0)
{  ?>
    <div class="col-lg-3 mt-2">  <?php  
        while($row=$res->fetch_assoc())
        {   ?>
            <div class="card mb-2">
                <h5 class="card-header bg-success">Query Id : </span><?php echo $row['request_id']; ?></h5>
                <div class="card-body">
                    <h5 class="card-title">Name : <?php echo $row['user_name']; ?></h5>
                    <p class="card-text"><?php echo $row['query']; ?></p>
                        <form action="" method="POST">
                            <input type="hidden" value='<?php echo $row['request_id']; ?>' name="id">
                            <input type="submit" class="btn btn-primary mr-2" value="View" name="view">
                            <input type="submit" class="btn btn-secondary" value="Delete" name="delete">
                        </form>
                </div>
            </div>
<?php    }
}
?>
    </div>
    <div class="col-lg-6 mx-auto ">
        <?php
            if(isset($_POST['view']))
            {  $id=$_POST['id'];
                $sqli="select * from requests where request_id='$id'";
                $rest=$con->query($sqli);
                $rows=$rest->fetch_assoc();
                ?>
                <form action="" method="post" class="mt-3">
                    <div class="container-fluid px-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Query Id:</label>
                                    <input type="text" class="form-control" value='<?php echo $rows['request_id']; ?>' readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">User Id:</label>
                                    <input type="text" class="form-control" value='<?php echo $rows['user_id']; ?>' readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" value='<?php echo $rows['user_name']; ?>' readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address:</label>
                        <input type="email" class="form-control" value='<?php echo $rows['user_email']; ?>' readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Query:</label>
                        <input type="text" class="form-control" value='<?php echo $rows['query']; ?>' readonly>
                    </div>
                    <!-- <button type="submit" class="btn btn-primary" name="deletework" value='<?php //echo $rows['request_id'];?>'>Mark as Done<i class="fas fa-paper-plane ms-2"></i></button> -->
                </form>
<?php      }
if(isset($_POST['delete']))
{
    $id=$_REQUEST['id'];
    $sqld="delete from requests where request_id='$id'";
    $result=$con->query($sqld);
    if($result==TRUE)
    {
         ?> <meta http-equiv="refresh" content= "0;URL=?closed" />
<?php }
    else
        echo "Unable to Delete";
}

        ?>
    </div>

<?php include('../User/sfooter.php'); ?>