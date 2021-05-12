<?php
include('../db_connection.php');
if(isset($_POST['comment_post']))
{
    $id=$_REQUEST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $comment=$_POST['comment'];
    $sqli="Insert into comments (post_id, name, email, comment) Values ('$id', '$name', '$email', '$comment')";
    if($rest=$con->query($sqli))
    {  ?><script>
            alert("Comment Posted");
            window.location = "view_all.php";
        </script>
  <?php      
        
    }
    else
    {
        echo "Something Went Wrong"; 
    }

}


?>