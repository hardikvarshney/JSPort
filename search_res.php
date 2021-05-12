<?php
include('db_connection.php');
define('TITLE','Search Result');
include('includes/pnavbar.php');
$title=$_REQUEST['cat_name'];
$sql="select * from posts where title like '%$title%'";
$res=$con->query($sql);  ?>
<div class="container" style="margin-top:100px;">
    <div class="row">
<?php if($res->num_rows > 0)
{
    while($row=$res->fetch_assoc())
    {  ?>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card">
              <img src="images/img1.jpg" class="card-img-top " alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['title']; ?></h5>
                <p class="card-text"><?php echo $row['short_desc'];?></p>
                <form action="view_post.php" method="get">
                    <input type="hidden" name="view" value='<?php echo $row['title']; ?>' class="btn btn-primary">
                    <button class="btn btn-primary" type="submit">View<i class="fas fa-eye ms-2"></i></button>
                </form>
                <!-- <a href="view_post.php" class="btn btn-primary">View<i class="fas fa-eye ms-2"></i></a> -->
              </div>
            </div>
        </div>
<?php    }
}
?>

        <!-- <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card" >
              <img src="images/img1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">View<i class="fas fa-eye ms-2"></i></a>
              </div>
            </div>
        </div> -->
    </div>
</div>


<div class="fixed-bottom">
    <?php include('includes/pfooter.php'); ?>
</div>
