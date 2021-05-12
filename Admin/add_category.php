<?php
include('../db_connection.php');
session_start();
define('TITLE','Add Category');
define('PAGE','add_category');
include('header.php');
if($_SESSION['is_adminlogin'])
{
    $rEmail=$_SESSION['mail'];
}
else
{
    echo "<script>location.href='admin_login.php'</script>";
}
$sql="select * from category";
$res=$con->query($sql);
if($res->num_rows > 0)
{ ?>
    <div class="col-lg-6">
        <form action="" method="POST" class="mb-2">
            <div class="d-grid gap-2">
                <button class="btn btn-outline-secondary" type="submit" style="font-weight:bold;font-size:20px;" name="add"><i class="fas fa-plus me-2"></i>Add New Category</button>
             </div>
        </form>  
        <table class="table table-striped text-center table-hover">
            <thead>
                <tr class="bg-dark text-white">
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead> <?php
    while($row=$res->fetch_assoc())
    {  ?>
        <tbody>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['category_name']; ?></td>
                    <td>
                        <form action="" method="POST" class="d-inline">
                            <button class="btn btn-primary" name="edit" value="Edit" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fas fa-edit"></i></button>   
                            <input type="hidden" name="id" value='<?php echo $row['id']; ?>'>
                        </form>
                        <form action="" method="POST" class="d-inline">
                            <button class="btn btn-danger" name="delete" value="Delete" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="fas fa-trash-alt"></i></button>   
                            <input type="hidden" name="id" value='<?php echo $row['id']; ?>'>
                        </form>
                    </td>
                </tr>
            </tbody>

<?php    } ?></table> 
                 <!-- <form action="" method="POST" class="mb-5">
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-success" type="submit" style="font-weight:bold;font-size:20px;" name="add">Add New Category</button>
                    </div>
                 </form>    -->
                
            </div> <?php
}
if(isset($_POST['edit']))
{ 
    $sqlp="select * from category where id={$_REQUEST['id']}";
    $resu=$con->query($sqlp);
    if($resu->num_rows == 1)
    {
        $rows=$resu->fetch_assoc();  ?>
        <div class="col-lg-3">
            <?php if(isset($msg)) { echo $msg; } ?>
            <?php if(isset($_SESSION['Msg'])) { echo $_SESSION['Msg'] ; } unset($_SESSION['Msg']); ?>
            <form action="" method="POST" class="mt-4">  
                <div class="mb-3">
                    <label for="id" class="form-label">Category Id</label>
                    <input type="number" class="form-control" value='<?php echo $rows['id']; ?>' readonly>
                </div>
                <div class="mb-3">
                    <label for="category_name" class="form-label">Category Name</label>
                    <input type="text" class="form-control" name="category" value='<?php echo $rows['category_name']; ?>'>
                </div>
                <button class="btn btn-primary" name="update" value="Update" type="submit"><i class="fas fa-edit"></i> Update</button>   
                <input type="hidden" name="id" value='<?php echo $rows['id']; ?>'>
            </form>     
        </div>
<?php    }
    ?>


<?php 
}
if(isset($_POST['update']))
{
    $name=$_POST['category'];
    $sqlu="update category set category_name='$name' where id={$_REQUEST['id']}";
    if($resul=$con->query($sqlu))
    { ?>
        <meta http-equiv="refresh" content= "0;URL=?closed" />  <?php
    }

}
if(isset($_POST['delete']))
{
    $sql="delete from category where id={$_REQUEST['id']}";
    $result=$con->query($sql);
    if($result == TRUE)
    { ?>
        <meta http-equiv="refresh" content= "0;URL=?closed" />
<?php   
    }
}
?>
<?php
if(isset($_POST['add']))
{ ?>
    <div class="col-lg-4 mt-4">
        <?php if(isset($msg)) {echo $msg; }?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="new_category">Enter new Category:</label>
                <input type="text" class="form-control" name="category" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2" name="addi">Add</button>
        </form>
    </div>
<?php } 
    if(isset($_POST['addi']))
    {
        $category=$_POST['category'];
        $sqla="select category_name from category where category_name='$category'";
        $result=$con->query($sqla);
        if($result->num_rows==1)
        {  ?>
            <script>alert ("Category already Present"); </script>  <?php
        }
        else
        {
            $sql="insert into category (category_name) values ('$category')";
            if($con->query($sql))
            { ?>
                <meta http-equiv="refresh" content= "0;URL=?closed" />
<?php       }
            else
            {
                $msg='<div class="alert alert-warning  text-center mt-2" role="alert">***Something went Wrong.***.</div>';
            }
        }
    }
?>

<?php include('../User/sfooter.php'); ?>