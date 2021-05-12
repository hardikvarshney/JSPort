<?php 
include('db_connection.php');
define('TITLE', 'Posts');
include('includes/pnavbar.php');
$cat=$_REQUEST['cat'];
$sql="select * from posts where category='$cat'";
$res=$con->query($sql);
if($res->num_rows > 0)
          {  ?>
          <div class="container" style="margin-top:80px;">
            <div class="row">
            <h4 class="display-3 text-center"><?php echo $cat;?></h4>
            <hr>
            
<?php       while($row=$res->fetch_assoc())
            {  ?>
              <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                  <img src="images/img1.jpg" class="card-img-top" alt="image">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row['title'];?></h5>
                    <p class="card-text text-start" style="font-size:15px;"><?php echo $row['short_desc']; ?></p>
                    <form action="view_post.php" method="get">
                      <input type="hidden" name="view" value='<?php echo $row['title']; ?>' class="btn btn-primary">
                      <button class="btn btn-primary" type="submit">View<i class="fas fa-eye ms-2"></i></button>
                    </form>
                  </div>
                </div>
              </div>
         <?php   } ?>
         </div>
         </div>
   <?php       }
        ?>







<?php include('includes/pfooter.php'); ?>

