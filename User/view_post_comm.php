<?php
include('../db_connection.php');
session_start();
define('PAGE','view_all');
define('TITLE','View All Post With Comments');
include('header.php');
if($_SESSION['is_login'])
{
    $rEmail=$_SESSION['mail'];
}
else
{
    echo "<script>location.href='login_form_user.php'</script>";
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

    <div class="container">
        <div class="row">
        <div class="col-lg-3"></div>
            <div class="col-lg-6 col-sm-12 mb-5">
                <div class="card bg-secondary">
                <?php
                    $str="select name from user_login where email='$rEmail'";
                    $result=$con->query($str);
                    if($result->num_rows == 1)
                    {
                        $rowss=$result->fetch_assoc();
                    }
                ?>
                    <div class="card-body">
                        <h4 class="card-title text-center">Your Comments</h4>
                        <form action="post_comment.php" method="post" class="py-3 px-3">
                            <div class="mb-3">
                                <input type="text" name="name" class="form-control form-control-sm" value='<?php echo $rowss['name']; ?>' readonly>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="email" class="form-control form-control-sm" value='<?php echo $rEmail; ?>' readonly>
                            </div>
                            <?php }
?>
                            <div class="mb-3">
                                <textarea name="comment" name="comment" class="form-control form-control-sm" id="comment" cols="65" rows="5" placeholder="Your Comments"></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="hidden" name="id" value='<?php echo $_REQUEST['id']; ?>'>
                                <button type="submit" name="comment_post" class="btn btn-success">Comment <i class="fas fa-paper-plane"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





<?php include('sfooter.php'); ?>