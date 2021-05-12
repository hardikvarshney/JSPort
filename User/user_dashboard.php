<!-- Validation of Select Category is to be done -->

<?php 
include("../db_connection.php");
session_start();
define('TITLE','User Dashboard');
define('PAGE','user_dashboard');
include("header.php");
if($_SESSION['is_login'])
{
   $rEmail=$_SESSION['mail'];
}
else
{
    echo "<script>location.href='login_form_user.php'</script>";
}

if(isset($_POST['submit']))
  {

    $sql="Select * from user_login where email='$rEmail'";
    $res=$con->query($sql);
    $row=$res->fetch_assoc();

    $name=$row['name'];
    $email=$row['email'];
    $contact=$row['contact'];
    $instution=$row['instution'];
    $country=$row['country'];
    $title=$_POST['title'];
    $short_desc=$_POST['short_desc'];
    $category=$_POST['category'];
    
    $content=$_POST['editor'];
    $added_on=date('Y-m-d h:i:s');

    $sqli="Insert into posts (user_name, user_email, user_contact, instution, country, title, short_desc, category, content,date) VALUES 
    ('$name', '$email', '$contact', '$instution', '$country', '$title', '$short_desc', '$category', '$content', '$added_on')";
    if($con->query($sqli)===TRUE)
    {
      $_SESSION['Msg']='<div class="alert alert-success text-center mt-2" role="alert">***Submission Successful***</div>';
      header('location:user_dashboard.php');
      die();
    }
    else
    {
      $msg='<div class="alert alert-warning  text-center mt-2" role="alert">***Something Went Wrong.***.</div>';
    }
  }
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
    
    <div class="col-sm-10">
      <h5 class="text-center text-primary"><?php echo "Welcome,  $rEmail"; ?></h5>
      <?php if(isset($msg)) { echo "$msg" ; } ?>
      <?php if(isset($_SESSION['Msg'])) { echo $_SESSION['Msg'] ; } unset($_SESSION['Msg']); ?>

      <script src="ckeditor/ckeditor.js"></script>
      <form action="" method="post" name="form">
        <input class="form-control mb-3" type="text" name="title" placeholder="Enter Title of Post" required>
        <input class="form-control mb-3" type="text" name="short_desc" placeholder="Outline of Post" required>
        <?php
          $sqli="Select * from category";
          $rest=$con->query($sqli);
          if($rest->num_rows > 0)
          {
            ?>
            <select class="form-control mb-3 " type="text" id="category" name="category" >
              <option value="">-- Select Category --</option>
              <?php 
                while($rows=$rest->fetch_assoc())
                {
              ?>
              <option ><?php echo $rows['category_name']; ?></option>
      <?php     }  ?>
            </select>
<?php     }

          
        ?>
        
        <textarea name="editor" id="editor"></textarea>
        <input type="submit" name="submit" class="btn btn-primary btn-lg mt-3 mb-3" onclick="return val();">
      </form>
      <script>
        CKEDITOR.replace('editor')
      </script>
      
      
    </div>
  </div>
</div>  
              
  
<?php include("sfooter.php"); ?>









