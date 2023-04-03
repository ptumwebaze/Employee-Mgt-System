<?php include "includes/head.php" ?>
<?php include "includes/db.php" ?>
<?php include "includes/sessions.php" ?>
<body>
  <!-- container section start -->
  <section id="container" class="">


    <?php include "includes/nav.php" ?>
    <!--header end-->

    <!--sidebar start-->
    <?php include "includes/sidebar.php" ?> 
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 style="color:green" class="page-header text-center"><b>User Activity</b></h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
              <li><i class="fa fa-laptop"></i>Logs</li>
            </ol>
          </div>
        </div>

<!-- filter-start -->
<div class="row">
  <form method="POST">
  <div class="col-md-6">
    <div class="row">
    <div class="col-md-6">
      <div class="form-group">
          <label for="recipient-name" class="control-label">From:</label>
          <input type="date" name="from_date" class="form-control" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
          <label for="recipient-name" class="control-label">To:</label>
          <input type="date" name="to_date" value="<?php echo date("Y-m-d"); ?>" class="form-control" required>
      </div>
    </div>

    </div>
  </div>
  <button type="submit" style="margin-top:25px;" name="filter" class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button>
</form>
</div>

<!-- filter-end -->
<table id="sort" class="table table-striped table-bordered" style="width:100%">
  <thead>
    <tr>
      <th class="text-center">ID</th>
      <th class="text-center">Activity</th>
      <th class="text-center">User</th>
      <th class="text-center">Date-Time</th>
    </tr>
  </thead>
  <tbody>
  <?php
if(isset($_POST['filter'])){
  $fr_date = $_POST['from_date'];
  $to_date = $_POST['to_date'];

  $query = "SELECT * FROM logs where DATE(date_time) >= '$fr_date' && DATE(date_time) <= '$to_date'";
}
else{
  $query = "SELECT * FROM logs";
}
$number = 0;
if ($result = mysqli_query($con, $query)) {
    while ($row = mysqli_fetch_array($result)){
      $number++;
      $id=$row['login_id'];
      $activ=$row['activity'];
      $user=$row['user'];
      $da=$row['date_time'];
      
      $name1 = mysqli_fetch_array(mysqli_query($con, "SELECT user FROM logs where login_id='$id'"))['user'];
      $name = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_employee where id='$name1'"))['name'];
?>
        <tr> 
                  <td><?php echo $number; ?></td>
                  <td><?php echo $activ; ?></td> 
                  <td><?php echo $name; ?></td> 
                  <td><?php echo $da; ?></td> 
                  
        </tr>
        <?php
    }
}
?>
  </tbody>
 
 
</table>

      </section>
      <?php include "includes/footer.php" ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.0/moment.min.js'></script>
<script>
$(document).ready(function() {
    $("#sort").DataTable({
       columnDefs : [
     { type : 'date', targets : [3] }
 ],  
    });
});
</script>

    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
<?php include "includes/scripts.php" ?>

</body>