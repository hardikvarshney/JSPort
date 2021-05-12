<?php
include('../db_connection.php');
session_start();
define('PAGE','posts');
define('TITLE','Your Posts');
include('header.php');
if($_SESSION['is_login'])
{
    $rEmail=$_SESSION['mail'];
}
else
{
    echo "<script>location.href='login_form_user.php'</script>";
}

$sql="select * from posts where user_email='$rEmail'";
$res=$con->query($sql);
if($res->num_rows > 0)
{   ?>
        <div class="col-lg-10">
        <h5 class="text-center text-primary"><?php echo "Welcome,  $rEmail"; ?></h5>
        <?php if(isset($msg)) {echo $msg;} ?>
        <table class="table table-striped text-center table-hover">
            <thead>
                <tr class="bg-dark text-white">
                    <th>Id</th>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Title of Post</th>
                    <th>Category of Post</th>
                    <th>Date of Submission</th>
                    <th>Action</th>
                </tr>
            </thead>
    <?php
    while($row=$res->fetch_assoc())
    {

?>
            <tbody>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['user_name']; ?></td>
                    <td><?php echo $row['user_email']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td>
                    <form action="edit_post.php" method="GET" class="d-inline">
                        <button class="btn btn-primary" name="edit" value="Edit" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fas fa-edit"></i></button>   
                        <input type="hidden" name="id" value='<?php echo $row['id']; ?>'>
                    </form>
                    
                    <form action="view_post.php" method="POST" class="d-inline">
                        <button class="btn btn-secondary" name="view" value="View" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="View full post and Comments"><i class="fas fa-eye"></i></button>   
                        <input type="hidden" name="id" value='<?php echo $row['id']; ?>'>
                    </form>     
                    <form action="" method="POST" class="d-inline">
                        <button class="btn btn-danger" name="delete" value="Delete" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>   
                        <input type="hidden" name="id" value='<?php echo $row['id']; ?>'>
                    </form>
                    </td>
                </tr>
            </tbody>

            <?php } ?>
        </table>
    </div>
    <?php } 
    else
    {
        $msg='<div class="alert alert-warning  text-center mt-2" role="alert">***No Post found.***.</div>';
    }
    ?>

<?php
if(isset($_POST['delete']))
{
    $sql="delete from posts where id={$_REQUEST['id']}";
    $result=$con->query($sql);
    if($result == TRUE)
    { ?>
        <meta http-equiv="refresh" content= "0;URL=?closed" />
<?php   
    }
}
include('sfooter.php');
?>