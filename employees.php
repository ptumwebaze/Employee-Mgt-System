<?php include "includes/head.php" ?>
<?php include "includes/db.php"?>
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
            <h3 style="color:green" class="page-header text-center"><b>Employees</b></h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
              <li><i class="fa fa-laptop"></i>View</li>
              
            </ol>
            <?php 
            if($sel['add_employees']||$rolex=="0"){
          ?>
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" 
            data-target="#exampleModal" data-whatever="@mdo"><i class="fa fa-plus" aria-hidden="true"></i>Add Employee</button>
          <?php } ?>
          </div>
        </div>

<table id="page" class="table table-striped table-bordered" style="width:100%">
<thead>
  <tr>
    <th class="text-center">S/No.</th>
    <th class="text-center">Name</th>
    <th v>Email</th>
    <th v>Phone Number 1</th>
    <th class="text-center">Phone Number 2</th>
    <th class="text-center">Address</th>
    <th class="text-center">Position</th>
    <th class="text-center">Salary</th>
    <th class="text-center"><i class="fa fa-tasks"></i>Action</th>
  </tr>
</thead>
<tbody>
 <?php
$query = "SELECT * FROM add_employee";
$number=0;
if ($result = mysqli_query($con, $query)) {
 
    while ($row = mysqli_fetch_array($result)){
        $number++;
        $id = $row["id"];
        $fnm = $row["name"];
        $lnm = $row["email"];
        $ctc = $row["phone1"];
        $em = $row["phone2"];
        $pass = $row["address"]; 
        $positn = $row["position"];
        $pos = mysqli_fetch_array(mysqli_query($con, "SELECT pos_name FROM `positions` WHERE pos_id='$positn'"))['pos_name'];
        $saly = $row["salary"]; 

        $sal = mysqli_fetch_array(mysqli_query($con, "SELECT salary FROM `positions` WHERE pos_id='$positn'"))['salary'];
        $appo = $row["appoint"];
        $contr = $row["contract"];
        $nok = $row["nok"];
        $nokc = $row["nokc"]; 
        $nin = $row["nin"];
        $brt = $row["birth"];
        $pho = $row["photo"];  
?>
        <tr class="text-center"> 
                  <td><?php echo $number; ?></td>
                  <td><?php echo $fnm; ?></td> 
                  <td><?php echo $lnm; ?></td> 
                  <td><?php echo $ctc; ?></td> 
                  <td><?php echo $em; ?></td> 
                  <td><?php echo $pass; ?></td> 
                  <td><?php echo $pos; ?></td> 
                  <td><?php echo $saly; ?></td> 
                  <td>
                 
                  <div class="btn-group">
                  <?php 
            if($sel['view_employee_details']||$rolex=="0"){
          ?>
                    <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#view<?php echo $id; ?>" data-whatever="@mdo"><i class="fa fa-eye"></i></a><?php } ?>
                    <?php 
            if($sel['edit_employees']||$rolex=="0"){
          ?>
                    <a class="btn btn-success" href="#" data-toggle="modal" data-target="#update<?php echo $id; ?>" data-whatever="@mdo"><i class="fa fa-edit"></i></a><?php } ?>
                    <?php 
            if($sel['delete_employees']||$rolex=="0"){
          ?>       
                    <a onclick = "confirmationDelete(this); return false;" class="btn btn-danger" href="delete/delete.php?id=<?php echo $id; ?>"><i class="icon_close_alt2"></i></a><?php } ?>
                  </div>
         
                  </td>
          </tr>


<!-- start_view_data -->
<div class="modal fade" id="view<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <form method="POST">
    <div class="modal-content ">
      <div class="modal-header pull-center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title text-center text-primary" id="exampleModalLabel"><b>Details for <?php echo $fnm; ?></b></h2>
      </div>
      <div class="modal-body ">
      <center><img src="images_upload/<?php echo $pho;?>" width="85px" height="85px"></center><br>
        <div class="row">
        <div class="col-md-6">
        <div class="row">
        <div class="col-md-4">
        <h5>Name</h5>
        <h5>Email</h5>
        <h5>Phone 1</h5>
        <h5>Phone 2</h5>
        <h5>Address</h5>
        <h5>Position</h5>
        <h5>Salary</h5>
        <h5>Photo</h5>
        </div>
        <div class="col-md-8">
        <h5><?php echo $fnm; ?></h5>
        <h5><?php echo $lnm; ?></h5>
        <h5><?php echo $ctc; ?></h5>
        <h5><?php echo $em; ?></h5>
        <h5><?php echo $pass; ?></h5>
        <h5><?php echo $positn; ?></h5>
        <h5><?php echo $saly; ?></h5>
        <h5><?php echo $pho; ?></h5>
        </div>
        </div>        
        </div>
        <div class="col-md-6">
        <div class="row posit">
        <div class="col-md-5">
        <h5>Next of Kin</h5>
        <h5>Next of Kin Contact</h5>
        <h5>Date of Birth</h5>
        <h5>NIN Number</h5>
        <h5>Date of Appointment</h5>
        <h5>Contract type</h5>
        
        </div>
        <div class="col-md-7">
        <h5><?php echo $nok; ?></h5>
        <h5><?php echo $nokc; ?></h5>
        <h5><?php echo $brt; ?></h5>
        <h5><?php echo $nin; ?></h5>
        <h5><?php echo $appo; ?></h5>
        <h5><?php echo $contr; ?></h5>
        
        </div>
        </div>        
        </div>
        
        </div>
      </div>
    </div>
    </form>
  </div>
</div>
<!-- end_view_data -->

<!-- start_update -->

<div class="modal fade" id="update<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <form method="POST" enctype='multipart/form-data'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-success text-center" id="exampleModalLabel"><b>Edit Employee details</b></h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
            <label for="recipient-name" class="control-label">Name:</label>
            <input type="text" name="name1" value="<?php echo $row['name'] ?>"  class="form-control" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Email:</label>
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>" class="form-control" required>
            <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Phone 1:</label>
            <input type="text" name="phone1" value="<?php echo $row['phone1'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Phone 2:</label>
            <input type="text" name="phone2" value="<?php echo $row['phone2'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Address:</label>
            <input type="text" name="address" value="<?php echo $row['address'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Date of Birth:</label>
            <input type="date" name="birth" value="<?php echo $row['birth'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">NIN:</label>
            <input type="text" name="nin" value="<?php echo $row['nin'] ?>" class="form-control" required>
          </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label for="message-text" class="control-label">Position:</label>
            <select name="position" class="form-control" value="<?php echo $row['pos_name'] ?>" required>
            <option value="">Select</option>
            <?php 
              $result20 = mysqli_query($con, "SELECT * FROM positions");
               while($row20 = mysqli_fetch_array($result20)){
              ?>
              <option value="<?php echo $row20['pos_id'] ?>" <?php if($row20['pos_id']==$positn){echo "selected";} ?>><?php echo $row20['pos_name'] ?></option> 
              <?php
              }
            ?>
            
            </select>
        </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Salary:</label>
            <input type="text" name="salary" value="<?php echo $row['salary'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Date of Appointment:</label>
            <input type="date" name="appoint" value="<?php echo $row['appoint'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Contract type:</label>
            <select name="contract" class="form-control" required>
            <option value="<?php echo $row['contract'] ?>"><?php echo $row['contract'] ?></option>
            <option value="part-time">Part-time</option>
            <option value="full-time">Full-time</option>
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Photo:</label>
            <input type="file" id="file-upload" name="photo" value="<?php echo $row['photo'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Next of Kin:</label>
            <input type="text" name="nok" value="<?php echo $row['nok'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Next of Kin Contract:</label>
            <input type="text" name="nokc" value="<?php echo $row['nokc'] ?>" class="form-control" required>
          </div>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" onclick = "return VerifyUploadSizeIsOK()" name="update" class="btn btn-primary">Update</button>
      </div>

    </div>
    </form>
  </div>
</div>

<!-- end_update -->

<!-- add_doc start -->
<div class="modal fade" id="del" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content fa fa-exclamation-circle">
    <script>echo alert('Are you sure you want to delete this Employee')</script>
    </div>
    
  </div>
</div>

<!-- add_doc_end -->
<?php
    }
}
?>

<!-- start_update -->
<?php
if(isset($_POST['update'])){ 
    $folder="images_upload/".basename($_FILES['photo']['name']); 
    $id = $_POST['id'];
    $fnm=$_POST['name1'];
    $lnm=$_POST['email'];
    $ctc=$_POST['phone1'];
    $em=$_POST['phone2'];
    $pass=$_POST['address'];
    $brt=$_POST['birth'];
    $nin=$_POST['nin'];
    $posit=$_POST['position'];
    $sal=$_POST['salary'];
    $appo=$_POST['appoint'];
    $contr=$_POST['contract'];
    $pho=$_FILES['photo']['name'];
    $nok=$_POST['nok'];
    $nokc=$_POST['nokc'];
	
    $edit = mysqli_query($con,"UPDATE add_employee SET name='$fnm', email='$lnm', phone1='$ctc', phone2='$em', address='$pass', birth='$brt', 
    nin='$nin', position='$posit', salary='$sal', appoint='$appo', contract='$contr', photo='$pho', nok='$nok', nokc='$nokc'  where id='$id'");
	
    if($edit){
    $activity = "Updated details for $fnm with email $lnm";
    $que1=mysqli_query($con,"INSERT into logs (`activity`, `user`)values('$activity','$uid')");
    
      echo"<script>alert('Employee successfully deleted')
      window.location='employees.php'
      </script>";
    }
    else
    {
        echo mysqli_error();
    }
  }    	
?>

</tbody>
</table>
<!-- add_employee- start -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <form method="POST" enctype='multipart/form-data'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-success text-center" id="exampleModalLabel"><b>Add Employee</b></h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
            <label for="recipient-name" class="control-label">Name:</label>
            <input type="text" name="name" class="form-control" placeholder=" Enter Full Name" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Email:</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Phone 1:</label>
            <input type="tel" name="phone1" class="form-control" placeholder="Enter Phone Contact 1" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Phone 2:</label>
            <input type="tel" name="phone2" class="form-control" placeholder="Enter Phone Contact 2" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Address:</label>
            <input type="text" name="address" class="form-control" placeholder="Enter Address" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Date of Birth:</label>
            <input type="date" name="birth" class="form-control" placeholder="Enter Date of Birth" required>
          </div>
          
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label for="message-text" class="control-label">Position:</label>
            <select name="position"  class="form-control selectpicker" data-live-search="true" required>
            <option value="">Select</option>
           
              <?php 
              $result4 = mysqli_query($con, "SELECT * FROM positions");
               while($row4 = mysqli_fetch_array($result4)){
            ?>
              <option value="<?php echo $row4['pos_id'] ?>"><?php echo $row4['pos_name'] ?></option> 
              <?php
              }
              ?>
          </select>
        </div>
        
            <input type="hidden" name="salary" required>
      
          
          <div class="form-group">
            <label for="message-text" class="control-label">Date of Appointment:</label>
            <input type="date" name="appoint" placeholder="Enter Date of Appointment" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Contract type:</label>
            <select type="text" name="contract" class="form-control selectpicker" data-live-search="true" required>
            <option value="">Select</option>
            <option value="part-time">Part-time</option>
            <option value="full-time">Full-time</option>
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Photo:</label>
            <input type="file" id="file-upload" name="photo" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">NIN:</label>
            <input type="text" name="nin" class="form-control" placeholder="Enter NIN" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Next of Kin:</label>
            <input type="text" name="nok" class="form-control" placeholder="Enter NOK Names" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Next of Kin Contract:</label>
            <input type="tel" name="nokc" class="form-control" placeholder="Enter NOK Contact" required>
          </div>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" onclick = "return VerifyUploadSizeIsOK()" name="add_button" class="btn btn-primary">Add</button>
      </div>

    </div>
    </form>
  </div>
</div>
<!-- end_employee-add -->
<?php
if(isset($_POST['add_button'])){
  $folder="images_upload/".basename($_FILES['photo']['name']);  
  $fnm=$_POST['name'];
  $lnm=$_POST['email'];
  $ctc=$_POST['phone1'];
  $em=$_POST['phone2'];
  $pass=$_POST['address'];
  $brt=$_POST['birth'];
  $nin=$_POST['nin'];
  $posit=$_POST['position'];
  $sal = mysqli_fetch_array(mysqli_query($con, "SELECT salary FROM `positions` WHERE pos_id='$posit'"))['salary'];
  $appo=$_POST['appoint'];
  $contr=$_POST['contract'];
  $pho=$_FILES['photo']['name'];
  $nok=$_POST['nok'];
  $nokc=$_POST['nokc'];
  $que1=mysqli_query($con,"INSERT into add_employee (`name`, `email`, `phone1`, `phone2`, `address`, `birth`, `nin`, `position`, `salary`, `appoint`, `contract`, `photo`, `nok`, `nokc`) 
  values('$fnm','$lnm','$ctc','$em', '$pass','$brt','$nin','$posit','$sal', '$appo','$contr','$pho','$nok','$nokc')");
  
  $que2=move_uploaded_file($_FILES['photo']['tmp_name'], $folder);

  if($que1){
  $activity = "Added Employee with name $fnm and email $lnm";
  $que1=mysqli_query($con,"INSERT into logs (`activity`, `user`)values('$activity','$uid')");
  echo "<script>alert('Employee has been added successfully')
  window.location='employees.php'
  </script>";
  }
  else
  echo"The operation is unsuccessful. Please try again ".mysqli_error($con);
  
}

?>

      </section>
      <?php include "includes/footer.php" ?>
      <script type = "text/javascript">
            function confirmationDelete(anchor){
            var conf = confirm("Are you sure you want to delete this Employee?");
            if(conf){
                window.location = anchor.attr("href");
            }
            }
      </script>
      <script type="text/javascript">
        function VerifyUploadSizeIsOK()
        {
          
          var UploadFieldID = "file-upload";
          var MaxSizeInBytes = 2097152;
          var fld = document.getElementById(UploadFieldID);
          if( fld.files && fld.files.length == 1 && fld.files[0].size > MaxSizeInBytes )
          {
              alert("The file size must be no more than " + parseInt(MaxSizeInBytes/1024/1024) + "MB");
              return false;
          }
          return true;
        } 
      </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.0/moment.min.js'></script>
<script>
$(document).ready(function() {
    $("#page").DataTable({
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

</html>
