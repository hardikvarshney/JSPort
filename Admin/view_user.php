<?php
include('../db_connection.php');
session_start();
define('PAGE','view_user');
define('TITLE','View User');
include('header.php');
if($_SESSION['is_adminlogin'])
{
   $rEmail=$_SESSION['mail'];
}
else
{
    echo "<script>location.href='admin_login.php'</script>";
}
$sql="select * from user_login";
$res=$con->query($sql);
if($res->num_rows > 0)
{   ?>

        <div class="col-lg-10">
        <h5 class="text-center text-primary"><?php echo "Welcome,  $rEmail"; ?></h5>
        <?php if(isset($msg)) {echo $msg;} ?>
        <table class="table table-striped text-center table-hover">
            <thead>
                <tr class="bg-dark text-white">
                    <th>Id</th>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Instution</th>
                    <th>Country</th>
                    <th>Contact</th>
                    <th>Journal Submitted</th>
                </tr>
            </thead>
    <?php
    while($row=$res->fetch_assoc())
    {

?>
            <tbody>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php $mail=$row['email']; echo $mail;//echo $row['email']; ?></td>
                    
                    <td><?php echo $row['instution']; ?></td>
                    <td><?php echo $row['country']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <?php
                        $sqli="select count(id) from posts where user_email='$mail'";
                        $res3=$con->query($sqli);
                        $row3=$res3->fetch_row();
                        $submitrequest3 = $row3[0];
                        
                    ?>
                    <td><?php echo $submitrequest3; ?></td>
            
                </tr>
            </tbody>

            <?php } ?>
        </table>
    </div>
    <?php } 
    else
    {
        $msg='<div class="alert alert-warning  text-center mt-2" role="alert">***No Post found.***.</div>';
    }
    ?>




<?php include('../User/sfooter.php'); ?>