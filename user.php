<?php include "includes/head.php" ?>
<?php include "includes/sessions.php" ?>

<body style="background-color:orange">
  <!-- container section start -->
  <section id="container">

 <?php include "includes/db.php" ?>
    <?php include "includes/nav.php" ?>
    <!--header end-->

    <!--sidebar start-->
    <?php include "includes/sidebar.php" ?> 
    <!--sidebar end-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->

<?php
$query = "SELECT * FROM add_employee where id='$uid'";
if ($result = mysqli_query($con, $query)) {
    while ($row = mysqli_fetch_array($result)){
      $name=$row['name'];
      $eml=$row['email'];
      $cont=$row['phone1'];
      $cont2=$row['phone2'];
      $nok = $row["nok"];
      $nokc = $row["nokc"]; 
      $nin = $row["nin"];
      $add = $row["address"];
      $role1 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM register where name='$uid'"))['role'];
      $role2 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM roles where role_id='$role1'"))['role_name'];
      $pass = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM register where name='$uid'"))['password'];    
      $npass = md5($pass);
      $pho = $row['photo'];
?>



<!-- start_view_data -->
  <div class="container"  >
    <form method="POST">
     <h2 class="modal-title text-center text-primary" id="exampleModalLabel"><b>Details for <?php echo $name; ?></b></h2>
    <!-- tab-start -->
<ul class="nav nav-pills pull-right">
  <li role="presentation" class="active"><a href="user.php">Profile</a></li>
  <li role="presentation"><a href="#upuser<?php echo $uid; ?>">Edit</a></li>
  <li role="presentation"><a href="#">Change Password</a></li>
</ul>
<!-- tab-end -->
      <div class="modal-body">
      
        <div class="row">
        <div class="col-md-4" style="margin-top:170px">
        <img src="images_upload/<?php echo $pho;?>" class="rounded-circle" width="250px" height="200px"><br>
        <br><br>
        <div>
        
        <button style="width:150px; height:50px; font-size:30px" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#upuser<?php echo $uid; ?>" data-whatever="@mdo"><i class="fa fa-edit">Edit</i></button>
         </div>
      </div>
        <div class="col-md-8">
        <div class="row" style="margin-top:70px">
        <table class="table table-striped table-bordered table-hover">
          <tr>
        <td><h4 style="font-weight: bold">Name</h4></td>
        <td><h4><?php echo $name; ?></h4></td>
    </tr>
    <tr>
        <td><h4 style="font-weight: bold">Contacts</h4></td>
        <td><h4><?php echo $cont/$cont2; ?></h4></td>
        </tr>
    <tr>
        <td><h4 style="font-weight: bold">Email</h4></td>
        <td><h4><?php echo $eml; ?></h4></td>
        </tr>
    <tr>
        <td><h4 style="font-weight: bold">Role</h4></td>
        <td><h4><?php echo $role2; ?></h4></td>
        </tr>
    <tr>
        <td><h4 style="font-weight: bold">Next of Kin</h4></td>
        <td><h4><?php echo $nok; ?></h4></td>
        </tr>
    <tr>
        <td><h4 style="font-weight: bold">N.O.K Contact</h4></td>
        <td><h4><?php echo $nokc; ?></h4></td>
        </tr>
    <tr>
        <td><h4 style="font-weight: bold">Address</h4></td>
        <td><h4><?php echo $add; ?></h4></td>
        </tr>
    <tr>
        <td><h4 style="font-weight: bold">NIN Number</h4></td>
        <td><h4><?php echo $nin; ?></h4></td>
        </tr>
    </table>

    
        
        
        
        
        
       
        
        
        
        
        </div>
        </div>        
        </div>      
                
    </form>
  </div>

<!-- end_view_data -->


<div class="modal fade" id="upuser<?php echo $uid; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-primary" id="exampleModalLabel"><b>Update details for <?php echo $name; ?></b></h4>
      </div>
      <form method="POST">
      <div class="modal-body">
      <center>
         <div class="form-group">
            <img src="images_upload/<?php echo $pho;?>" width="100px" height="100px">
            
          </div></center>
          <div class="form-group">
            <label for="message-text" class="control-label">Contact 1:</label>
            <input type="tel" name="contact" value="<?php echo $row['phone1'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Contact 2:</label>
            <input type="tel" name="contact2" value="<?php echo $row['phone2'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Email:</label>
            <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Address:</label>
            <input type="tel" name="address" value="<?php echo $row['address'] ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Password:</label>
            <input type="password" name="password" value="<?php echo $npass ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Confirm Password:</label>
            <input type="password" name="cpassword" value="<?php echo $npass ?>" class="form-control" required>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="up_user" class="btn btn-primary">Submit</button>
      </div>

    </div>
    </form>
  </div>
</div>
</div>
<?php
    }
} 
?>
<!-- start_update -->
<?php
if(isset($_POST['up_user'])){ 
    $cont=$_POST['contact'];
    $cont2=$_POST['contact2'];
    $email=$_POST['email'];
    $add=$_POST['address'];
    $pass=$_POST['password'];
    $cpass=$_POST['cpassword'];
    
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
    else{
      $npass = md5($pass);
      $edit = mysqli_query($con,"UPDATE register SET contact='$cont', contact2='$cont2', email='$email', password='$npass' where register_id='$uid'");
      $edit = mysqli_query($con,"UPDATE add_employee SET phone1='$cont', phone2='$cont2', email='$email' where id='$uid'");
    
    if($edit){
    
    $activity = "Updated user details for $name with email $email";
    $que1=mysqli_query($con,"INSERT into logs (`activity`, `user`)values('$activity','$uid')");
    
      echo"<script>alert('User details successfully updated')
      window.location='user.php'
      </script>";
    }
    else
    {
        echo"The operation is unsuccessful. Please try again ".mysqli_error($con);
    }
  }
  }    	
?>




        
      <script type = "text/javascript">
            function confirmationDelete(anchor){
            var conf = confirm("Are you sure you want to deactivate this User?");
            if(conf){
                window.location = anchor.attr("href");
            }
            }
      </script>
      </section>
      <?php include "includes/footer.php" ?>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
<?php include "includes/scripts.php" ?>

</body>

</html>
