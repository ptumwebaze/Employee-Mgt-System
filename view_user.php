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
            <h3 style="color:green" class="page-header text-center"><b>Users</b></h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
              <li><i class="fa fa-laptop"></i>View</li>
            </ol>
            <?php 
              if($sel['add_user']||$rolex=="0"){
            ?>
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" 
            data-target="#user" data-whatever="@mdo"><i class="fa fa-plus" aria-hidden="true"></i>New User</button>
          <?php } ?>
          <a href="export.php"><button type="button" name="export" class="btn btn-primary"><i class="fa fa-download"></i> Export</button></a>
          </div>
        </div>
        
<!-- start_advance_list -->
<table  id="page" class="table table-striped table-bordered" style="width:100%">
<thead>
  <tr>
    <th class="text-center">S/No.</th>
    <th class="text-center">Name</th>
    <th class="text-center">Contacts</th>
    <th class="text-center">Email</th>
    <th class="text-center">Role</th>
    <th class="text-center">Added By</th>
    <th class="text-center">Added On</th>
    <th class="text-center"><i class="fa fa-tasks"></i>Action</th>
  </tr>
</thead> 
<tbody>
 <?php
$query = "SELECT * FROM register where status=1";
$number=0;
if ($result = mysqli_query($con, $query)) {
    while ($row = mysqli_fetch_array($result)){
      $number++;
      $id=$row['register_id'];
      $name=$row['name'];
      $name2 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_employee where id='$name'"))['name'];
      $cont=$row['contact'];
      $email=$row['email'];
      $role=$row['role'];
      $role2 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM roles where role_id='$role'"))['role_name'];
      $by=$row['added_by'];
      $on=$row['addedon'];
      $name1 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_employee where id='$by'"))['name'];
      if($role==0){$role2= "Super User";}
?>
        <tr class="text-center"> 
                  <td><?php echo $number; ?></td>
                  <td><?php echo $name2; ?></td> 
                  <td><?php echo $cont; ?></td> 
                  <td><?php echo $email; ?></td>
                  <td><?php echo $role2; ?></td>
                  <td><?php echo $name1; ?></td> 
                  <td><?php echo $on; ?></td> 
                  <td>
                  <div class="btn-group">
                  <?php 
              if($sel['edit_user']||$rolex=="0"){
            ?>
                    <a class="btn btn-success" href="#" data-toggle="modal" data-target="#upuser<?php echo $id; ?>" data-whatever="@mdo"><i class="fa fa-edit"></i></a><?php } ?>
                    <?php 
              if($sel['delete_user']||$rolex=="0"){
            ?>
                    <a onclick = "confirmationDelete(this); return false;" class="btn btn-danger" href="delete/delete_user.php?register_id=<?php echo $id;?> "><i class="icon_close_alt2"></i></a><?php } ?>
                  </div>
                  </td>
        </tr>
  

<div class="modal fade" id="upuser<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-success" id="exampleModalLabel"><b>Update details for <?php echo $name2; ?></b></h4>
      </div>
      <form method="POST">
      <div class="modal-body">
      
          <div class="form-group">
            <label for="message-text" class="control-label">Full Name:</label>
            <input type="text" name="name" value="<?php echo $name2 ?>" class="form-control" required>
            <input type="hidden" name="register_id" value="<?php echo $id ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Contacts:</label>
            <input type="tel" name="contact" value="<?php echo $row['contact'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Email:</label>
            <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Role:</label>
            <select class="form-control" name="role" value="<?php echo $role2 ?>" required>
            <option value="0">Super User</option>
            <?php
              
                $records = mysqli_query($con, "SELECT * from roles"); 

                while($data = mysqli_fetch_array($records))
                { 
                    ?>
              <option data-tokens="<?php echo $data['role_id'] ?>" <?php if($data['role_id']==$role){echo "selected";} ?>><?php echo $data['role_name'] ?></option> 
              <?php 
                }	
            ?>  
            </select>
          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="up_user" class="btn btn-primary">Update</button>
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
if(isset($_POST['up_user'])){ 
    $id=$_POST['register_id'];
    $name=$_POST['name'];
    $cont=$_POST['contact'];
    $email=$_POST['email'];
    $role=$_POST['role'];
    $edit = mysqli_query($con,"UPDATE register SET name='$name', contact='$cont', email='$email', role='$role' where register_id='$id'");
	
    if($edit){
    $activity = "Updated user details for $name with email $email";
    $que1=mysqli_query($con,"INSERT into logs (`activity`, `user`)values('$activity','$uid')");
    
      echo"<script>alert('User details successfully updated')
      window.location='view_user.php'
      </script>";
    }
    else
    {
        echo"The operation is unsuccessful. Please try again ".mysqli_error($con);
    }
  }    	
?>
</tbody>

</table>
<!-- end_advance_list -->

<!-- modal_start -->
<div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title text-center text-primary" id="exampleModalLabel"><b>User details</b></h3>
      </div>
    <form method="POST">
      <div class="modal-body">
          
          <div class="form-group">
            <label  class="control-label">Full Name:</label>
            <select class="form-control selectpicker" data-live-search="true" name="name" required>
            <option value="">Select</option>
            <?php 
              
              $result7 = mysqli_query($con, "SELECT * FROM add_employee");
               while($row7 = mysqli_fetch_array($result7)){
                $emp_id1 = $row7['id']; 
                $result9 = mysqli_query($con, "SELECT name FROM register where name='$emp_id1'");
                if(mysqli_num_rows($result9)<1){
            ?>
              <option value="<?php echo $row7['id'] ?>"><?php echo $row7['name'] ?></option> 
              <?php
              }}
              ?>
            </select>
            <input type="hidden" name="contact" value="<?php echo $cont ?>" class="form-control" required>
            <input type="hidden" name="email" value="<?php echo $email ?>" class="form-control" required>
          </div>
               
          <div class="form-group">
            <label class="control-label">Role:</label>
            <select class="form-control selectpicker" data-live-search="true" name="role" required>
            <option value="">Select</option>
            <option value="0">Super User</option>
            <?php
              
                $records12 = mysqli_query($con, "SELECT role_name,role_id From roles"); 

                while($data12 = mysqli_fetch_array($records12))
                {
                    echo "<option value='". $data12['role_id'] ."'>" .$data12['role_name'] ."</option>";  
                }	
            ?>  
            </select>
          </div>
          <div class="form-group">
            <label class="control-label">Password:</label>
            <input type="password" name="password" class="form-control" required placeholder="Enter Password">
          </div>
          <div class="form-group">
            <label class="control-label">Confirm Password:</label>
            <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" required>
          </div>
          
      </div>
      <!-- <div class="g-recaptcha" data-sitekey="6Ldpqz0cAAAAALAKDVXoTdQzmll5tYhvezvu5C9q"></div> -->
      <br/>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="register" class="btn btn-primary">Submit</button>
      </div>


    </form>
    </div>
    
  </div>
</div>

<!-- modal_end -->
<?php
if(isset($_POST['register'])){ 
    $name=$_POST['name'];
    $cont = mysqli_fetch_array(mysqli_query($con, "SELECT phone1 from `add_employee` WHERE id='$name'"))['phone1'];
    $cont2 = mysqli_fetch_array(mysqli_query($con, "SELECT phone2 from `add_employee` WHERE id='$name'"))['phone2'];
    $email=mysqli_fetch_array(mysqli_query($con, "SELECT email from `add_employee` WHERE id='$name'"))['email'];
    $role=$_POST['role'];
    $by=$uid;
    $pass=$_POST['password'];
    $cpass=$_POST['cpassword'];
    
    // Validate password strength
    
    if($pass!=$cpass){ ?>
        <script>alert('The two passwords dont match');
        history.go(-1)
        window.location='view_user.php'
        </script>;
        <?php
    
    }
    if(strlen($pass) < 6){ 
    echo "<script>alert('Password should be at least 6 characters in length');
    history.go(-1);
    </script>";
    }
    $qemail = mysqli_query($con, "SELECT email FROM register where email='$email'");
    if(mysqli_num_rows($qemail)>0){
      echo "<script>alert('Email address already registerd, Please use another email address')
      </script>";
    }
                    
    else{

        $npass = md5($pass);
        $que1=mysqli_query($con,"INSERT into register (`name`, `contact`,`contact2`, `email`, `role`,`added_by`,`password`) 
        values('$name','$cont','$cont2','$email','$role','$by','$npass')");
    if($que1){
      $activity = "Added a user with name $name and email $email";
      $que1=mysqli_query($con,"INSERT into logs (`activity`, `user`)values('$activity','$uid')");
    echo "<script>alert('User added successfully')
    window.location='view_user.php'
    </script>";
    }
    
else{
echo"The operation is unsuccessful. Please try again ".mysqli_error($con);
}
}
}
?>
      </section>
      <?php include "includes/footer.php" ?>
      <script type = "text/javascript">
            function confirmationDelete(anchor){
            var conf = confirm("Are you sure you want to deactivate this User?");
            if(conf){
                window.location = anchor.attr("href");
            }
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
