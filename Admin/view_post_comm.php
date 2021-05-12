<?php
include('../db_connection.php');
session_start();
define('PAGE','view_all');
define('TITLE','View All Post With Comments');
include('header.php');
if($_SESSION['is_adminlogin'])
{
    $rEmail=$_SESSION['mail'];
}
else
{
    echo "<script>location.href='admin_login.php'</script>";
}
//$id=$_REQUEST['id'];
if(isset($_POST['view']))
{
    $sql="select * from posts where id={$_REQUEST['id']}";
    $res=$con->query($sql);
    $row=$res->fetch_assoc();  ?>

            <div class="col-lg-7">
                <h1 class="display-3 text-center"><?php echo $row['title']; ?></h1>
                <hr>
                <h5 class="mb-3" style="text-align: justify;"><?php echo $row['content']; ?></h5>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="card">
                    <div class="card-header text-center text-secondary" style="font-weight:bold;font-size:20px;">
                        Comments
                    </div>
                    <?php 
                        $sql="select * from comments where post_id={$_REQUEST['id']}";
                        $rest=$con->query($sql);
                    ?>
                    <ul class="list-group list-group-flush">
                    <?php
                        if($rest->num_rows > 0)
                        { 
                            while($rows=$rest->fetch_assoc())
                            {  
                    ?>
                        <li class="list-group-item"><?php echo $rows['comment']; ?> <small class="text-secondary " style="padding-left:100px;">--<?php echo $rows['name'];?></small></li>
                    <?php } 
                }?>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>

    
<?php }
?>
<?php include('../User/sfooter.php'); ?>