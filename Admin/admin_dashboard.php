
<?php 
include("../db_connection.php");
session_start();
define('TITLE','Admin Dashboard');
define('PAGE','admin_dashboard');
include("header.php");
if($_SESSION['is_adminlogin'])
{
   $rEmail=$_SESSION['mail'];
}
else
{
    echo "<script>location.href='admin_login.php'</script>";
}
if(isset($_POST['submit']))
  {

  }
?>
<!-- <h5 class="text-center text-primary"><?php //echo "Welcome,  $rEmail"; ?></h5> -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="col-lg-3 mt-3" style="height:120px;">
    <div class="card text-white bg-success mb-3">
        <div class="card-header text-center text-dark" style="font-size:20px; font-weight:bold"><i class="fas fa-clipboard me-3"></i>No. of Journal</div>
        <div class="card-body">
        <?php 
            $sql1="select count(id) from posts";
            $res1=$con->query($sql1);
            $row1=$res1->fetch_row();
            $submitrequest1 = $row1[0];
        ?>
            <h5 class="card-title text-center" id="counter1" style="font-size:26px;"></h5>
            <script>
            var counter = document.getElementById('counter1');
            let count1 = 0;
            setInterval( () => {
                if(count1 < <?php echo $submitrequest1; ?>)
                {
                    count1++;
                    counter1.innerHTML = count1;
                }
        }, 100);
        </script>
        </div>
    </div> 
</div>

<div class="col-lg-4 mt-3" style="height:120px;">
    <div class="card text-white bg-danger mb-3">
        <div class="card-header text-center text-dark" style="font-size:20px; font-weight:bold"><i class="fas fa-users me-3"></i>No. of Users</div>
        <div class="card-body">
        <?php 
            $sql2="select count(id) from user_login";
            $res2=$con->query($sql2);
            $row2=$res2->fetch_row();
            $submitrequest2 = $row2[0];
        ?>
            <h5 class="card-title text-center" id="counter2" style="font-size:26px;"></h5>
            <script>
            var counter = document.getElementById('counter2');
            let count2 = 0;
            setInterval( () => {
                if(count2 < <?php echo $submitrequest2; ?>)
                {
                    count2++;
                    counter2.innerHTML = count2;
                }
        }, 100);
        </script>
        </div>
    </div> 
    
  
    <?php
    $str="select count(category) as tcategory, category from posts group by category";
    $res=$con->query($str);
    $res->num_rows;  ?>    
    
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
    <?php  while($row=$res->fetch_assoc())
      { ?>
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Category', 'Total Posts'],
          <?php while($row = $res->fetch_assoc())
          {       ?>
          ['<?php echo $row['category']; ?>', <?php echo $row['tcategory']; ?>],
          <?php } ?>
        ]);
<?php    } ?>
        var options = {
          title: 'Journals according to categories',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  
  
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
 



</div>

<div class="col-lg-3 mt-3" style="height:120px;">
    <div class="card text-white bg-primary mb-3">
        <div class="card-header text-center text-dark" style="font-size:20px; font-weight:bold"><i class="fas fa-align-center me-3"></i>Categories</div>
        <div class="card-body">
        <?php 
            $sql3="select count(id) from category";
            $res3=$con->query($sql3);
            $row3=$res3->fetch_row();
            $submitrequest3 = $row3[0];
        ?>
        <script>
            var counter = document.getElementById('counter3');
            let count3 = 0;
            setInterval( () => {
                if(count3 < <?php echo $submitrequest3; ?>)
                {
                    count3++;
                    counter3.innerHTML = count3;
                }
        }, 100);
        </script>
            <h5 class="card-title text-center" id="counter3"style="font-size:26px;"></h5>
            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
        </div>
    </div> 
    
</div>


</div>
</div>


  
<?php include("../User/sfooter.php"); ?>
