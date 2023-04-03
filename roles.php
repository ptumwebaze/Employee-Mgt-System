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
            <div style="color:green" class="text-center"><h3 class="page-header "><i></i><b>User Roles</b></h3></div>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
              <li><i class="fa fa-laptop"></i>View Roles</li>
            </ol>
            <?php if($sel['add_roles']||$rolex=="0"){ ?>
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" 
            data-target="#role" data-whatever="@mdo"><i class="fa fa-plus" aria-hidden="true"></i>New role</button>
            <?php }?>
          </div>
        </div>
        <?php include "includes/head.php" ?>

<table class="table table-striped table-advance table-hover">
  <thead>
    <tr>
      <th class="text-center">S/No.</th>
      <th class="text-center">Role</th>
      <th class="text-center">Added By</th>
      <th class="text-center">Added On</th>
      <th class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
$query = "SELECT * FROM roles";
$number = 0;
if ($result = mysqli_query($con, $query)) {
    while ($row = mysqli_fetch_array($result)){
      $number++;
      $id=$row['role_id'];
      $name=$row['role_name'];
      $by=$row['added_by'];
      $da=$row['added_on'];
      
      $name1 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_employee where id='$by'"))['name'];
      $name2 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM register"))['register_id'];
?>
        <tr> 
                  <td><?php echo $number; ?></td>
                  <td><?php echo $name; ?></td> 
                  <td><?php echo $name1; ?></td> 
                  <td><?php echo $da; ?></td>
                  <td>
                  <div class="btn-group">
                  <?php if($sel['edit_roles']||$rolex=="0"){ ?>
                    <a class="btn btn-success" href="#" data-toggle="modal" data-target="#up_role<?php echo $id; ?>" data-whatever="@mdo"><i class="fa fa-edit"></i></a><?php } ?>
                    <?php if($sel['delete_roles']||$rolex=="0"){ ?>
                    <a onclick = "confirmationDelete(this); return false;" class="btn btn-danger" href="delete/delete_role.php?role_id=<?php echo $id;?> "><i class="icon_close_alt2"></i></a><?php } ?>
                  </div>
                  </td> 
                  
        </tr>
        <div class="modal fade" id="up_role<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
    <form method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-success text-center" id="exampleModalLabel"><b>Edit Employee details</b></h4>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
            <label for="recipient-name" class="control-label">Role Name:</label>
            <input type="text" name="role_name" value="<?php echo $row['role_name'] ?>"  class="form-control" required>
            <input type="hidden" name="id" value="<?php echo $row['role_id'] ?>">
          </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
      </div>

    </div>
    </form>
  </div>
</div>
        <?php
    }
}
?>
  </tbody>
 
 
</table>

<!-- modal-start -->
<div class="modal fade" id="role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-primary" id="exampleModalLabel"><b>New Role</b></h4>
      </div>
    <form method="POST">
      <div class="modal-body">
          
          <div class="form-group">
            <label  class="control-label">Role Name:</label>
            <input type="text" name="role_name" placeholder="Enter Role Name" class="form-control" required>
          </div>
        
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="roles" class="btn btn-primary">Submit</button>
      </div>


    </form>
    </div>
    
  </div>
</div>

<!-- modal_end -->
<?php
if(isset($_POST['roles'])){ 
    $name=$_POST['role_name'];
    $by=$uid;
    $check = mysqli_query($con,"SELECT * FROM roles WHERE role_name='$name'");
    $count  = mysqli_num_rows($check);
    if($count==0){
      $activity = "Added new position $name";
      $que2=mysqli_query($con,"INSERT into roles (`role_name`, `added_by`)values('$name','$uid')");
      $que3 = mysqli_fetch_array(mysqli_query($con, "SELECT * from roles ORDER BY role_id DESC LIMIT 1"))['role_id'];
      $que4 = mysqli_query($con, "INSERT into permissions (`role_id`)values('$que3')");
      $que1=mysqli_query($con,"INSERT into logs (`activity`, `user`)values('$activity','$uid')");
      
      echo "<script>alert('Role added successfully')
      window.location='roles.php'
      </script>";
    }
    else{
      echo "<script>alert('Role already exists')
      window.location='roles.php'
      </script>";
    }
 
// else{
// echo"The operation is unsuccessful. Please try again ".mysqli_error($con);
// }
}
?>
<?php
if(isset($_POST['update'])){
  $id=$_POST['id']; 
  $name=$_POST['role_name'];
  $by=$uid;
  $check = mysqli_query($con,"SELECT * FROM roles WHERE role_name='$name'");
  $count  = mysqli_num_rows($check);
  if($count==0){
    $activity = "Udated a new Role $name";
    $edit=mysqli_query($con,"UPDATE roles SET role_name='$name' where role_id='$id' ");
    $que1=mysqli_query($con,"INSERT into logs (`activity`, `user`)values('$activity','$by')");
    echo "<script>alert('Role Updated successfully')
    window.location='roles.php'
    </script>";
  }
  else{
    echo "<script>alert('Role already exists')
    window.location='roles.php'
    </script>";
  }

}
?>

      </section>
      <?php include "includes/footer.php" ?>
      <script type = "text/javascript">
            function confirmationDelete(anchor){
            var conf = confirm("Are you sure you want to delete this Role?");
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
