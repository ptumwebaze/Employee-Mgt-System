<?php include "includes/head.php" ?>
<?php include "includes/sessions.php" ?>
<body>
  <!-- container section start -->
  <section id="container" class="">

 <?php include "includes/db.php" ?>
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
            <h3 style="color:green" class="page-header text-center"><b>salary advances</b></h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
              <li><i class="fa fa-laptop"></i>New Salary Advances</li>
            </ol>
            <?php 
            if($sel['add_advance']||$rolex=="0"){
          ?>
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" 
            data-target="#advances" data-whatever="@mdo"><i class="fa fa-plus" aria-hidden="true"></i>New Advance</button>
          <?php } ?>
          </div>
        </div>
<!-- start_advance_list -->
<?php 
  if($sel['view_advances']||$rolex=="0"||$sel['edit_advances']||$sel['delete_advances']){
?>
<table class="table table-striped table-advance table-hover">
  <tr>
    <th class="text-center">S/No.</th>
    <th class="text-center">Name</th>
    <th class="text-center">Amount</th>
    <th class="text-center">Month</th>
    <th class="text-center">Year</th>
    <th class="text-center"><i class="fa fa-tasks"></i>Action</th>
  </tr>
 
 <?php
$query = "SELECT * FROM advances";
$number=0;
if ($result = mysqli_query($con, $query)) {
    while ($row = mysqli_fetch_array($result)){
      $number++;
      $id=$row['advance_id'];
      $emp_id=$row['emp_id'];
      $amo=$row['amount'];
      $da=$row['date'];
      $rea=$row['reason'];
      $by=$row['addedby'];
      $on=$row['addedon'];
      $month=$row['month'];
      $year=$row['year'];
      $name1 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM register where register_id='$by'"))['name'];
      $name = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_employee where id='$emp_id'"))['name'];
?>
        <tr class="text-center"> 
                  <td><?php echo $number; ?></td>
                  <td><?php echo $name; ?></td> 
                  <td><?php echo $amo; ?></td> 
                  <td><?php echo $month; ?></td> 
                  <td><?php echo $year; ?></td> 
                  <td>
                  <div class="btn-group">
                  <?php 
                    if($sel['view_advances']||$rolex=="0"){
                  ?>
                    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#viewadvance<?php echo $id; ?>" data-whatever="@mdo"><i class="fa fa-eye"></i></a><?php } ?>
                    <?php 
            if($sel['edit_advance']||$rolex=="0"){
          ?>
                    <a class="btn btn-success" href="#" data-toggle="modal" data-target="#upadvance<?php echo $id; ?>" data-whatever="@mdo"><i class="fa fa-edit"></i></a><?php } ?>
                    <?php 
            if($sel['delete_advance']||$rolex=="0"){
          ?>
                    <a onclick = "confirmationDelete(this); return false;" class="btn btn-danger" href="delete/delete_adv.php?advance_id=<?php echo $id;?>"><i class="icon_close_alt2"></i></a><?php } ?>
                  </div>
                  </td>
        </tr>
<!-- start_view_data -->
<div class="modal fade" id="viewadvance<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <form method="POST">
    <div class="modal-content">
      <div class="modal-header pull-center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title text-center text-primary" id="exampleModalLabel"><b>Salary Advance for <?php echo $name; ?></b></h2>
      </div>
      <div class="modal-body ">
        <div class="row">
        <div class="col-md-6">
        <h5>Name</h5>
        <h5>Amount</h5>
        <h5>Date</h5>
        <h5>Reason</h5>
        <h5>Added by</h5>
        <h5>Month</h5>
        <h5>Year</h5>
        </div>
        <div class="col-md-6">
        <h5><?php echo $name; ?></h5>
        <h5><?php echo $amo; ?></h5>
        <h5><?php echo $da; ?></h5>
        <h5><?php echo $rea; ?></h5>
        <h5><?php echo $name1; ?></h5>
        <h5><?php echo $month; ?></h5>
        <h5><?php echo $year; ?></h5>
        </div>      
        </div>
      </div>
    </div>
    </form>
  </div>
</div>
<!-- end_view_data -->



<div class="modal fade" id="upadvance<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <form method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-success" id="exampleModalLabel"><b>Update Salary Advance details for <?php echo $name; ?></b></h4>
      </div>
      <div class="modal-body">
        
        <div class="form-group">
            <label for="recipient-name" class="control-label">Name:</label>
            <select name="emp_id" class="form-control" required>
            <option value="">Choose Employee</option>
              <?php 
              $result23 = mysqli_query($con, "SELECT * FROM add_employee");
               while($row23 = mysqli_fetch_array($result23)){
              ?>
              <option value="<?php echo $row23['id'] ?>" <?php if($row23['id']==$emp_id){echo "selected";} ?>><?php echo $row23['name'] ?></option> 
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Amount:</label>
            <input type="text" name="amount" value="<?php echo $row['amount'] ?>" class="form-control" required>
            <input type="hidden" name="id" value="<?php echo $id ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Date:</label>
            <input type="date"  name="date" value="<?php echo $row['date'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Reason:</label>
            <input type="text" name="reason" value="<?php echo $row['reason'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Month:</label>
            <select name="month"  class="form-control" required>
            <option value=""><?php echo $row['month'] ?></option>
            <?php
                for ($i=1; $i<=12; $i++)
                {
                    ?>
                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                    <?php
                }
            ?>
            </select>
            
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Year:</label>
            <input type="text" name="year" value="<?php echo $row['year'] ?>" class="form-control" required>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="up_advance" class="btn btn-primary">Update</button>
      </div>

    </div>
    </form>
  </div>
</div>




<?php
    }
} 
?>

<!-- start_update -->
<?php
if(isset($_POST['up_advance'])){ 
  $amo=$_POST['amount'];
  $id=$_POST['id'];
  $emp_id=$_POST['emp_id'];
  $da=$_POST['date'];
  $rea=$_POST['reason'];
  $by=$uid;
  $month=$_POST['month'];
  $year=$_POST['year'];
  $name = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_employee where id='$emp_id'"))['name'];

    $edit = mysqli_query($con,"UPDATE advances SET emp_id='$emp_id', amount='$amo', date='$da', reason='$rea',
    month='$month', year='$year' where advance_id='$id'");
	
    if($edit)
    {
      $activity = "Updated an advance for staff with name $name and amount $amo ";
      $que1=mysqli_query($con,"INSERT into logs (`activity`, `user`)values('$activity','$uid')");
      echo"<script>alert('Advance successfully updated')
      window.location='advances.php'
      </script>";
    }
    else
    {
        echo"The operation is unsuccessful. Please try again ".mysqli_error($con);
    }
  }    	
?>


</table><?php } ?>
<!-- end_advance_list -->

<!-- modal_start -->
<div class="modal fade" id="advances" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-primary" id="exampleModalLabel"><b>Salary Advance details<b></h4>
      </div>
    <form method="POST">
      <div class="modal-body">
          <div class="form-group">
            <label class="control-label">Employee:</label>
            <select name="emp_id" class="form-control selectpicker" data-live-search="true" required>
              <option value="">Choose Employee</option>
              <?php 
              $result = mysqli_query($con, "SELECT * FROM add_employee");
               while($row = mysqli_fetch_array($result)){
            ?>
              <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option> 
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label  class="control-label">Amount:</label>
            <input type="text" name="amount"  placeholder="Enter Amount"class="form-control" required>
          </div>
          <div class="form-group">
            <label class="control-label">Date:</label>
            <input type="date" name="date" max="<?php echo date("Y-m-d"); ?>" placeholder="Enter Date deatails"class="form-control" required>
          </div>
          <div class="form-group">
            <label class="control-label">Reason:</label>
            <input type="text" name="reason" placeholder="Enter Reason" class="form-control" required>
          </div>
          <div class="form-group">
            <label class="control-label">Month:</label>
            <select name="month"  class="form-control selectpicker" data-live-search="true" required>
            <option value="">Select Month</option>
            <?php
                for ($i=1; $i<=12; $i++)
                {
                    ?>
                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                    <?php
                }
            ?>
            </select>
          </div>
          <div class="form-group">
            <label class="control-label">Year:</label>
            <select class="form-control selectpicker" data-live-search="true" name="year" required>
              <?php $years = range(2010, strftime("%Y", time())); ?>
              <option value="">Select Year</option>
              <?php foreach($years as $year) : ?>
                <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="advance" class="btn btn-primary">Submit</button>
      </div>

      <?php
      if(isset($_POST['advance'])){ 
        $emp_id=$_POST['emp_id'];
        $amo=$_POST['amount'];
        $da=$_POST['date'];
        $rea=$_POST['reason'];
        $by=$uid;
        $month=$_POST['month'];
        $year=$_POST['year'];
        $name = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_employee where id='$emp_id'"))['name'];
        $que1=mysqli_query($con,"INSERT into advances (`emp_id`, `amount`, `date`, `reason`,`addedby`, `month`, `year`) 
        values('$emp_id','$amo','$da','$rea','$by', '$month','$year')");
    
        if($que1){
        $activity = "Added an advance for staff with name $name and amount $amo for the month of $month";
        $que1=mysqli_query($con,"INSERT into logs (`activity`, `user`)values('$activity','$uid')");
        // echo "<script>alert('Advance has been added successfully')
        // window.location='advances.php'</script>";
        }
        else
        echo"The operation is unsuccessful. Please try again ".mysqli_error($con);
      }
      ?>
    </form>
    </div>
    
  </div>
</div>

<!-- modal_end -->
      </section>
      <?php include "includes/footer.php" ?>
      <script type = "text/javascript">
            function confirmationDelete(anchor){
            var conf = confirm("Are you sure you want to delete this Advance?");
            if(conf){
                window.location = anchor.attr("href");
            }
            }
      </script>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
<?php include "includes/scripts.php" ?>

</body>

</html>
