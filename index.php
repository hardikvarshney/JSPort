<!--Add Dynamic URL in Category-->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!--Font Awesome CSS-->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Custom CSS contact us-->
    <!-- <link rel="stylesheet" href="css/contact_style.css"> -->
    <title>JSP</title>
  </head>
  <body>
  <!--Navbar Starts -->


 <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand " href="index.php" id="example">
          <img src="images/logo.png" width="80" height="50" class="d-inline-block align-top mt-1 " alt="Brand Logo" loading="lazy">
          Journal Submission Portal
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto ">                           
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about_us.php" id="aboutus">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact_us.php" id="contactus">Contact Us</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categories
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li> 
          </ul>
          <form action="" method="POST" class="d-flex">
          <button class="btn btn-outline-success me-2" type="submit">Login</button>
            <button class="btn btn-success " type="button">Register<i class="fas fa-sign-in-alt ms-2"></i></button>
          </form>
        </div>
      </div>
    </nav>  -->

<?php define('PAGE', 'index');
require("includes/pnavbar.php");?>
    
  <!--Navbar Ends -->

<!-- Corusal Starts -->
<section style="margin-top:80px;">
<div id="carouselExampleFade" class="carousel slide carousel-fade " data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="5000">
      <img src="images/img4.jpg" class="d-block w-100" alt="Journal Image" style="height:540px; opacity:0.7">
    </div>
    <div class="carousel-item" data-bs-interval="5000">
      <img src="images/img2.jpg" class="d-block w-100" alt="Journal Images" style="height:540px; opacity:0.7">
    </div>
    <div class="carousel-item" data-bs-interval="5000">
      <img src="images/img3.jpg" class="d-block w-100" alt="Journal Images" style="height:540px; opacity:0.7">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>
</section>
<!-- Courasal Ends -->

<!-- Content Section Starts-->
<section class="mt-3">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-9 col-sm-12">
        <h1 class="text-center text-secondary" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;font-weight:bold;">Latest Publications</h1>
        <hr>
        <div class="row">
        <?php
          include('db_connection.php');
          $sql="select * from posts order by id desc limit 3";
          $res=$con->query($sql);
          if($res->num_rows > 0)
          {
            while($row=$res->fetch_assoc())
            {  ?>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card mt-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                  <img src="images/img1.jpg" class="card-img-top" alt="image">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row['title'];?></h5>
                    <p class="card-text text-justify" style="font-size:15px;"><?php echo $row['short_desc']; ?></p>
                    <form action="view_post.php" method="get">
                      <input type="hidden" name="view" value='<?php echo $row['title']; ?>' class="btn btn-primary">
                      <button class="btn btn-primary" type="submit">View<i class="fas fa-eye ms-2"></i></button>
                    </form>
                    
                  </div>
                </div>
              </div>
         <?php   }
          }
        ?>
        
        
        </div>
        
      </div> 
      <div class="col-lg-3 col-sm-12 mt-2">
        <div class="card w-100 ">
          <div class="card-body ">
          <h2 class="card-title">Search</h2>
          <form class="d-flex mt-4" action="search_res.php" method="get">
            <input class="form-control me-2" type="search" name="cat_name" placeholder="Title of Post" aria-label="Search">
            <button class="btn btn-outline-secondary" type="search"><i class="fas fa-search"></i></button>
          </form>
        </div>
      </div>
      <div class="card w-100 mt-3" >
        <div class="card-header text-center bg-secondary text-white" style="font-weight:bold; font-size:22px">
          Categories
        </div>
        <ul class="list-group list-group-flush" style="overflow-y: scroll; height:300px;">
        <?php 
          $sqli="Select * from category";
          $rest=$con->query($sqli);
          if($rest->num_rows > 0)
          {
            while($rows=$rest->fetch_assoc())
            {  ?>                   <!--Add Dynamic URL in Category-->
                <a href="post_acc_cat.php?cat=<?php echo $rows['category_name']; ?>" class="nav-link"><li class="list-group-item" style="font-size:18px; font-weight:bold;color:brown"><?php echo $rows['category_name'];?></li></a> 
<?php       }
          }
        ?>
        
          
          <!-- <li class="list-group-item">Dapibus ac facilisis in</li>
          <li class="list-group-item">Vestibulum at eros</li>
          <li class="list-group-item">Cras justo odio</li>
          <li class="list-group-item">Dapibus ac facilisis in</li>
          <li class="list-group-item">Vestibulum at eros</li> -->
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- Content Section Ends -->

<!-- Footer Section Starts -->
  <?php require("includes/pfooter.php"); ?>
    <!-- Option 1: Bootstrap Bundle with Popper -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/all.min.js"></script>
  </body>
</html> -->

<!-- Footer Section Ends -->


    