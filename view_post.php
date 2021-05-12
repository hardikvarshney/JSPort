<?php
include('db_connection.php');
define('TITLE','View Post');
include('includes/pnavbar.php');
$title=$_REQUEST['view'];
$sql="Select title, short_desc, content, user_name from posts where title='$title'";
$res=$con->query($sql);
$row=$res->fetch_assoc();
?>

<div class="container" style="margin-top:100px;margin-bottom:100px;">
    <div class="row">
        <div class="col-lg-12 text-center">  
            <h1 class="display-4"><?php echo $row['title'];?></h1><small>By <?php echo $row['user_name'];?></small>
            <h4><?php echo $row['short_desc']; ?></h4>
            <hr>
            <h5 style="text-align:justify;"><?php echo $row['content']; ?></h5>
        </div>
    </div>
</div>


<div class="fixed-bottom">
<?php include('includes/pfooter.php'); ?>
</div>


