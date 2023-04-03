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
            <h3 style="color:green" class="page-header text-center"><b>Salaries</b></h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
              <li><i class="fa fa-laptop"></i>Salary Payments</li>
            </ol>
            <?php 
              if($sel['add_salary']||$rolex=="0"){
            ?>
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" 
            data-target="#salary" data-whatever="@mdo"><i class="fa fa-plus" aria-hidden="true"></i>New Pay</button>
          <?php } ?>
          </div>
        </div>
<!-- filter-start -->
<div class="row">
  <form method="POST">
  <div class="col-md-6">
      <div class="form-group">
        <div class="col-md-4" >
            <label for="recipient-name" class="control-label">For the Month of:</label></b>
            <select name="month" class="form-control selectpicker" data-live-search="true">
              <option value="">Specify the month</option>
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
      <div class="col-md-2">
      <button type="submit" style="margin-top:25px;" name="filter" class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button>
      </div>
    </div>
    </div>
</form>
</div>

<!-- filter-end -->
<!-- start_advance_list -->
<table class="table table-striped table-advance table-hover" style = "table td:empty:: before (content: '0')">
  <tr>
    <th class="text-center">S/No.</th>
    <th class="text-center">Name</th>
    <th class="text-center">Salary</th>
    <th class="text-center">Advance</th>
    <th class="text-center">Amount Paid</th>
    <th class="text-center">Balance</th>
    <th class="text-center">Month</th>
    <th class="text-center">Year</th>
    <th class="text-center"><i class="icon_pin_alt"></i>Action</th>
  </tr>
 
 <?php

if(isset($_POST['filter'])){
  $mon= $_POST['month'];


  $query = "SELECT * FROM salary where month = '$mon'";
}
else{
  $query = "SELECT * FROM salary";
}
$number = 0;
if ($result = mysqli_query($con, $query)) {
    while ($row = mysqli_fetch_array($result)){
      $number++;
      $salary_id=$row['salary_id'];
      $emp_id=$row['emp_id'];
      $name = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_employee where id='$emp_id'"))['name'];
      $amo=$row['amount'];
      $bal=$row['balance'];
      $mon=$row['month'];
      $yr=$row['year'];
      $sal = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_employee where id='$emp_id'"))['salary'];
      $adv = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM advances where emp_id='$emp_id'"))['amount'];
      if($adv==""){$adv=0;}
?>
        <tr class="text-center"> 
                  <td><?php echo $number; ?></td>
                  <td><?php echo $name; ?></td> 
                  <td><?php echo $sal; ?></td> 
                  <td ><?php echo $adv; ?></td>
                  <td><?php echo $amo; ?></td>
                  <td><?php echo $bal; ?></td>  
                  <td><?php echo $mon; ?></td>
                  <td><?php echo $yr; ?></td> 
                  <td>
                  <div class="btn-group">
                  <?php 
              if($sel['edit_salary']||$rolex=="0"){
            ?>
                    <a class="btn btn-success" href="#" data-toggle="modal" data-target="#upsalary<?php echo $salary_id; ?>" data-whatever="@mdo"><i class="fa fa-edit"></i></a><?php } ?>
                    <?php 
              if($sel['delete_salary']||$rolex=="0"){
            ?>
                    <a onclick = "confirmationDelete(this); return false;" class="btn btn-danger" href="delete/delete_sal.php?salary_id=<?php echo $salary_id;?>"><i class="icon_close_alt2"></i></a><?php } ?>
                  </div>
                  </td>
        </tr>
<div class="modal fade" id="upsalary<?php echo $salary_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <form method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-primary" id="exampleModalLabel"><b>Update Salary details for <?php echo $name; ?></b></h4>
      </div>
      <div class="modal-body">
        
        <div class="form-group">
            <label class="control-label">Name:</label>
            <select name="emp_id" class="form-control" required>
            <?php 
              $result23 = mysqli_query($con, "SELECT * FROM add_employee");
               while($row23 = mysqli_fetch_array($result23)){
              ?>
              <option data-tokens="<?php echo $row23['id'] ?>" <?php if($row23['id']==$emp_id){echo "selected";} ?>><?php echo $row23['name'] ?></option> 
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label class="control-label">Amount:</label>
            <input type="text" name="amount" value="<?php echo $row['amount'] ?>" class="form-control" required>
            <input type="hidden" name="id" value="<?php echo $salary_id ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label class="control-label">Balance:</label>
            <input type="text" name="balance" value="<?php echo $row['balance']?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label class="control-label">Month:</label>
            <select name="month"  class="form-control" required>
            <option value="<?php echo $row['month'] ?>"><?php echo $row['month'] ?></option>
            <?php
                for ($i=1; $i<=12; $i++)
                {
                    ?>
                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                    <?php
                }
            ?>
            </select> </div>
          <div class="form-group">
            <label class="control-label">Year:</label>
            <select class="form-control" name="year" required>
              <?php $years = range(2010, strftime("%Y", time())); ?>
              <option value="<?php echo $row['year'] ?>"><?php echo $row['year'] ?></option>
              <?php foreach($years as $year) : ?>
                <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label class="control-label">Payment Date:</label>
            <input type="date" max="<?php echo date("Y-m-d"); ?>"  name="pydate" value="<?php echo $row['pydate'] ?>" class="form-control" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="up_sal" class="btn btn-primary">Update</button>
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
if(isset($_POST['up_sal'])){ 
  $salary_id=$_POST['id'];
  // var_dump($_POST);
  $emp_id=$_POST['emp_id'];
  $amo=$_POST['amount'];
  $bal=$_POST['balance'];;
  $mon=$_POST['month'];
  $yr=$_POST['year'];
  $pydate=$_POST['pydate'];
  $name1 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_employee where id='$emp_id'"))['name'];
  $rec=$uid;
  
  $edit = mysqli_query($con,"UPDATE salaries SET emp_id='$name1', amount='$amo', balance='$bal', month='$mon', year='yr', pydate='$pydate', rec='$rec'
  ,where salary_id='$salary_id'");
  $edit1 = mysqli_query($con,"UPDATE salary SET emp_id='$name1', amount='$amo', balance='$bal', month='$mon', year='yr' where salary_id='$salary_id'");
	
    if($edit1)
    {
      echo"<script>alert('Salary successfully updated')
      window.location='salary.php'
      </script>";
    }
    else
    {
        echo"The operation is unsuccessful. Please try again ".mysqli_error($con);
    }
  }    	
?>


</table>
<!-- end_advance_list -->

<!-- modal_start -->
<div class="modal fade" id="salary" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-primary" id="exampleModalLabel"><b>Salary details</b></h4>
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
              
              echo "<option value='". $row['id'] ."'>" .$row['name'] ."</option>"; 
              
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label  class="control-label">Amount:</label>
            <input type="text" name="amount" class="form-control"  placeholder="Enter Amount" required>
            <input type="hidden" value="<?php echo $bal?>" name="balance" class="form-control" required>
          </div>
          <div class="form-group">
            <label  class="control-label">Month:</label>
        
            <select name="month" class="form-control selectpicker" data-live-search="true" required>
            <option value="">Select month to be paid</option>
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
            <label  class="control-label">Year:</label>
            <select class="form-control selectpicker" data-live-search="true" name="year" required>
              <?php $years = range(2010, strftime("%Y", time())); ?>
              <option value="0">Select Year</option>
              <?php foreach($years as $year) : ?>
                <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label  class="control-label">Payment Date:</label>
            <?php
            $que32 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_employee where id='$emp_id'"))['appoint']; ?>
            <input type="date" max="<?php echo date("Y-m-d"); ?>" min="<?php echo $que32 ?>" name="pydate" class="form-control" required>
            <php
            ?>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="salary" class="btn btn-primary">Add</button>
      </div>

      
    </form>
    </div>
    
  </div>
</div>

<!-- modal_end -->
<?php
      if(isset($_POST['salary'])){ 
        $emp_id=$_POST['emp_id'];
        $amo=$_POST['amount'];
        $mon=$_POST['month'];
        $yr=$_POST['year'];
        $pydate=$_POST['pydate'];
        $rec=$uid;
        $amountpaid = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(amount) as paid FROM `salaries` WHERE emp_id='$emp_id' && month='$mon' && year='$yr'"))['paid'];
        $salary = mysqli_fetch_array(mysqli_query($con, "SELECT salary FROM `add_employee` WHERE id='$emp_id'"))['salary'];
        $advancepaid = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(amount) as advance FROM `advances` WHERE emp_id='$emp_id' && month='$mon' && year='$yr'"))['advance'];
        $bal=$salary-($amo+$amountpaid+$advancepaid);
        $que1 = mysqli_query($con,"INSERT into salaries (`emp_id`, `amount`, `balance`, `month`, `year`, `pydate`, `rec`) 
        values('$emp_id','$amo','$bal', '$mon','$yr','$pydate','$rec')");
        $last_id = $con->insert_id;
        $que2 = mysqli_query($con, "SELECT * from salary where emp_id='$emp_id' && month='$mon' && year='$yr'");
        $count  = mysqli_num_rows($que2);
        if($count==0){
        $que3 = mysqli_query($con,"INSERT into salary (`emp_id`, `amount`, `balance`, `month`, `year`) 
        values('$emp_id','$amo','$bal', '$mon','$yr')");
        
        }
        else{
          $que3 = mysqli_query($con, "UPDATE salary SET amount='$amo'+'$amountpaid',balance='$bal', month='$mon', year='$yr' where emp_id='$emp_id' && month='$mon' && year='$yr' ");
        }
        if($que3){?>
          
          <script>alert('Pay has been added successfully')
        window.location='print.php?salary_id=<?php echo $last_id ?>'
        </script>
        <?php }
      else{
      echo"The operation is unsuccessful. Please try again ".mysqli_error($con);
      }
      }
      ?>
      </section>
      <?php include "includes/footer.php" ?>
      <script type = "text/javascript">
            function confirmationDelete(anchor){
            var conf = confirm("Are you sure you want to delete this salary detail?");
            if(conf){
                window.location = anchor.attr("href");
            }
            }
      </script>
      <script type = "text/javascript">
            function confirmationPrint(anchor){
            var conf = confirm("Are you sure you want to delete this salary detail?");
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

