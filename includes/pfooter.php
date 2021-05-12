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
    <title>JSP</title>
  </head>
  <body>

<footer class="container-fluid bg-dark mt-5">
        <div class="container px-0">
            <div class="row py-3">
                <div class="col-md-4 mt-2">
                    <span class="pr-2 text-white ">Follow Us:</span>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus"></i></a>
                </div>
                <div class="col-lg-2 text-end">
                  <a href="index.php"><img src="images/logo.png" alt="" height="40px"></a>
                </div>
                <div class="col-md-6 text-end">
                    <small class="text-white">Developed By Hardik Varshney &copy; <?php echo date("Y"); ?></small>
                    <small class="ms-2"><a href="Admin/admin_login.php" class="btn btn-danger">Admin Login</a></small>
                </div>
            </div>
        </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/all.min.js"></script>
  </body>
</html>