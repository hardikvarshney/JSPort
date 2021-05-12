<?php
include('../db_connection.php');
session_start();
define('TITLE','Edit Post');
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
if(isset($_POST['update']))
{
    $title=$_POST['title'];
    $category=$_POST['category'];
    $content=$_POST['editor'];
    $sqli="Update posts set title='$title', category='$category', content='$content' where id={$_REQUEST['id']}";
    $res=$con->query($sqli);
    if($res==1)
    {
        $msg='<div class="alert alert-success text-center mt-2" role="alert">***Update Successful***</div>';
    }
    else
    {
        $msg='<div class="alert alert-warning  text-center mt-2" role="alert">***Something Went Wrong.***.</div>';
    }
}
$id=$_REQUEST['id'];
if(isset($_GET['edit']))
{
    $sql="select title, category, content from posts where id='$id'";
    $result=$con->query($sql);
    $row=$result->fetch_assoc();
    
    ?>
    <script type="text/javascript">
      function val()
      {
        if(form.category.selectedIndex==0)
        {
          alert("Please select valid Category");
          form.category.focus();
          return false;
        }
        return true; 
      }
    </script>
    <script src="ckeditor/ckeditor.js"></script>
    <div class="col-lg-10">
        <?php if(isset($msg)){echo $msg; } ?>
    <script src="ckeditor/ckeditor.js"></script>
      <form action="" method="POST" name="form">
        <input class="form-control mb-3" type="text" name="title" value=<?php echo $row['title']; ?> required>
        
        <select class="form-control mb-3 " type="text" id="category" name="category" >
          <option value="">-- Select Category --</option>
          <option value="science">Science</option>
          <option value="mathematics">Mathematics</option>
          <option value="commerce">Commerce</option>
          <option value="business">Business</option>
        </select>
        <textarea name="editor" id="editor"><?php echo $row['content']; ?></textarea>
        <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg mt-3" onclick="return val();">
      </form>
      <script>
        CKEDITOR.replace('editor')
      </script>
    </div>   
<?php 
}
?>





























<footer class="container-fluid bg-dark mt-5" style="position: fixed;left: 0;bottom: 0;width: 100%;background-color: red;color: white;text-align: center;">
        <div class="container">
            <div class="row py-3">
                <div class="col-md-6 mt-2">
                    <span class="pr-2 text-white ">Follow Us:</span>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
                    <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus"></i></a>
                </div>
                <div class="col-md-6 ">
                    <small class="text-white">Developed By Hardik Varshney &copy; <?php echo date("Y"); ?></small>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>
</html>
