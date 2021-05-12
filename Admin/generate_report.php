<?php
include('../db_connection.php');
session_start();
define('TITLE','Generate Report');
define('PAGE','generate_report');
include('header.php');
if($_SESSION['is_adminlogin'])
{
   $rEmail=$_SESSION['mail'];
}
else
{
    echo "<script>location.href='admin_login.php'</script>";
}
?>


<div class="col-lg-10">
    <form action="" method="post" class="d-print-none">
        <div class="row">
            <div class="col-lg-2">
                <div class="mb-3">
                <label for="start_date" class="form-label" style="font-size:18px;"><i class="fas fa-calendar-alt me-2"></i>From:</label>
                <input type="date" class="form-control" id="start_date" name="start_date" required>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="mb-3">
                <label for="end_date" class="form-label" style="font-size:18px;"><i class="fas fa-calendar-alt me-2"></i>To:</label>
                <input type="date" class="form-control" id="end_date" name="end_date" required>
                </div>
            </div>
            <div class="col-lg-3 mt-3">
                <button type="submit" name="generate" class="btn btn-outline-success mt-3" style="font-size:18px;font-weight:bold;"><i class="fas fa-table me-3"></i>Generate</button>
            </div>
        </div>
        <!-- <div class="d-grid gap-2" >
          <button type="submit" name="generate" class="btn btn-outline-success mt-3" style="font-size:18px;font-weight:bold;"><i class="fas fa-table me-3"></i>Generate</button>
        </div> -->
    </form>
    <?php
        if(isset($_POST['generate']))
        {
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $sql="select * from posts where date between '$start_date%' and '$end_date%'";
            $res=$con->query($sql);
            if($res->num_rows > 0)
            { ?>
                <h4 class="bg-dark text-white text-center p-2 mt-4">Report from : <span class="text-info"><?php echo $start_date." to ".$end_date; ?></span></h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>User Id</th>
                            <th>User Name</th>
                            <th>User E-Mail</th>
                            <th>Instution</th>
                            <th>Country</th>
                            <th>Title of Post</th>
                            <th>Category of Post</th>
                            <th>Date</th>
                        </tr>
                    </thead>
<?php       while($row = $res->fetch_assoc())
            {  ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['user_name'];?></td>
                            <td><?php echo $row['user_email'];?></td>
                            <td><?php echo $row['instution'];?></td>
                            <td><?php echo $row['country'];?></td>
                            <td><?php echo $row['title'];?></td>
                            <td><?php echo $row['category'];?></td>
                            <td><?php echo $row['date'];?></td>
                        </tr>
                    </tbody>
   <?php    }  ?> </table>
                  <button type="submit" class="btn btn-danger btn-lg d-print-none" name="print" onClick="window.print()"><i class="fas fa-print me-3"></i>Print</button>
     <?php       }
            else
            {
                $msg="";
            }
        }
    ?>
</div>





<?php include('../User/sfooter.php'); ?>