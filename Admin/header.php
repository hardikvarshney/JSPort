<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!--Font Awesome CSS-->
    <link rel="stylesheet" href="../css/all.min.css"> 
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="header.css">
    <title><?php echo TITLE; ?></title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">
      <img src="../images/logo.png" alt="" width="80" height="50" class="d-inline-block align-top">
      JSPORT<small style="font-size:12px;font-style:italic;" class="text-secondary"><span class="text-primary">J</span>ournal <span class="text-primary">S</span>ubmission <span class="text-primary">Port</span>al</small>
    </a>
    
  </div>
</nav>
<div class="container-fluid">
  <div class="row mt-2">
    <div class="col-sm-2 bg-light sidebar d-print-none">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item "><a href="admin_dashboard.php" class="nav-link <?php if(PAGE=='admin_dashboard'){echo 'active';} ?>"><i class="fas fa-tachometer-alt "></i> Dashboard</a></li>
          <li class="nav-item"><a href="profile.php" class="nav-link <?php if(PAGE=='profile'){echo 'active';} ?>"><i class="fas fa-id-card-alt "></i> Profile</a></li>
          <li class="nav-item"><a href="view_user.php" class="nav-link <?php if(PAGE=='view_user'){echo 'active';} ?>"><i class="fas fa-eye "></i></i> View Users</a></li>
          <li class="nav-item"><a href="add_category.php" class="nav-link <?php if(PAGE=='add_category'){echo 'active';} ?>"><i class="fas fa-sitemap "></i></i> Add Category</a></li>
          <li class="nav-item"><a href="generate_report.php" class="nav-link <?php if(PAGE=='generate_report'){echo 'active';} ?>"><i class="fas fa-clipboard "></i> Generate Report</a></li>
          <li class="nav-item"><a href="view_all.php" class="nav-link <?php if(PAGE=='view_all'){echo 'active';} ?>"><i class="fas fa-eye "></i> View All Posts</a></li>
          <li class="nav-item"><a href="user_request.php" class="nav-link <?php if(PAGE=='user_request'){echo 'active';} ?>"><i class="fas fa-question "></i> User Requests</a></li>
          <li class="nav-item"><a href="../logout.php" class="nav-link "><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
      </div>
    </div>



    





    <?php //include('sfooter.php'); ?>






      
  










