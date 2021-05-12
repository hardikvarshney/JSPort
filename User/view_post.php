
<?php
include('../db_connection.php');
session_start();
define('TITLE','View Post');
define('PAGE','posts');
include('header.php');
if($_SESSION['is_login'])
{
    $rEmail=$_SESSION['mail'];
}
else
{
    echo "<script>location.href='login_form_user.php'</script>";
}
if(isset($_POST['view']))
{
    $sql="select title, category, content from posts where id={$_REQUEST['id']}";
    $res=$con->query($sql);
    $row=$res->fetch_assoc();  ?>

            <div class="col-lg-7">
            
                <h1 class="display-3 text-center"><?php echo $row['title']; ?></h1>
                <hr>
                <h5 class="mb-3" style="text-align: justify;"><?php echo $row['content']; ?></h5>
            </div>
            <?php }
            $sqli="select * from comments where post_id={$_REQUEST['id']}";
            $rest=$con->query($sqli);  ?>
            <div class="col-lg-3 col-sm-12">
                <div class="card">
                    <div class="card-header text-center text-secondary" style="font-weight:bold;font-size:20px;">
                        Comments
                    </div>
                    <ul class="list-group list-group-flush">
     <?php  if($rest->num_rows > 0)
            { 
                while($rows=$rest->fetch_assoc())
                {
                    ?>
                    <li class="list-group-item"><?php echo $rows['comment'];?> <small class="text-secondary " style="padding-left:100px;">--<?php echo $rows['name'];?></small></li>

    <?php       }

            }
?>
            <!-- <div class="col-lg-3 col-sm-12">
                <div class="card">
                    <div class="card-header text-center text-secondary" style="font-weight:bold;font-size:20px;">
                        Comments
                    </div>
                    <ul class="list-group list-group-flush"> -->
                        <!-- <li class="list-group-item"><?php ?> <small class="text-secondary " style="padding-left:100px;">--<?php ?></small></li> -->
                        
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>



<?php include('sfooter.php'); ?>

