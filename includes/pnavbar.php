<?php require("db_connection.php"); ?>
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
    <link rel="stylesheet" href="css/contact_style.css">
    <title><?php echo TITLE; ?></title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
      <div class="container-fluid">
        <a class="navbar-brand " href="index.php" id="example">
          <img src="images/logo.png" width="80" height="50" class="d-inline-block align-top mt-1 " alt="Brand Logo" loading="lazy">
          JSPORT<small style="font-size:12px;font-style:italic;" class="text-secondary"><span class="text-primary">J</span>ournal <span class="text-primary">S</span>ubmission <span class="text-primary">Port</span>al</small>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto ">                           
            <li class="nav-item ms-3">
              <a class="nav-link <?php if(PAGE=='index'){echo 'active';} ?>" style="font-size:20px;" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item ms-3">
              <a class="nav-link <?php if(PAGE=='about_us'){echo 'active';} ?>" style="font-size:20px;" href="about_us.php" id="aboutus">About Us</a>
            </li>
            <li class="nav-item ms-3">
              <a class="nav-link <?php if(PAGE=='contact_us'){echo 'active';} ?>" style="font-size:20px;" href="contact_us.php" id="contactus">Contact Us</a>
            </li>
          </ul>
          <div class="d-flex ms-5">
            <a href="User/login_form_user.php" class="btn btn-outline-success me-2" type="submit" style="font-size:18px;">Login</a>
            <a href="User/registration_form_user.php" class="btn btn-success " type="button" style="font-size:18px;">Register<i class="fas fa-sign-in-alt ms-2"></i></a>
          </div>
        </div>
      </div>
    </nav>





