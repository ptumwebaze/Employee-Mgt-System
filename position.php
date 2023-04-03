<?php include "includes/head.php" ?>
<?php include "includes/sessions.php" ?>
<body>
  <!-- container section start -->
  <section id="container" class="">


    <?php include "includes/nav.php" ?>
    <?php include "includes/db.php" ?>
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
            <h3 style="color:green" class="page-header text-center"><b>Positions</b></h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
              <li><i class="fa fa-laptop"></i>Add</li>
            </ol>
            <?php 
            if($sel['add_position']||$rolex=="0"){
          ?>
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add_doc" data-whatever="@mdo">
            <i class="fa fa-plus" aria-hidden="true"></i>Add Position</button><?php } ?>
          </div>
        </div>
<!-- add_doc start -->
<div class="modal fade" id="add_doc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-primary" id="exampleModalLabel"><b>Add Position</b></h4>
      </div>
    <form method="POSt" >
      <div class="modal-body">
          <div class="form-group">
            <label  class="control-label">Position Name:</label>
            <input type="text" name="pos_name" class="form-control" placeholder="Enter Position Name"  required>
          </div>
          <div class="form-group">
            <label  class="control-label">Salary:</label>
            <input type="text" name="salary" class="form-control" placeholder="Enter Salary Pay"  required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="pos_add" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
    
  </div>
</div>

<!-- add_doc_end -->

<!-- star_doc_view  -->
<table class="table table-striped table-advance table-hover">
  <tr>
    <th class="text-center">S/No.</th>
    <th class="text-center">Position Name</th>
    <th class="text-center">Salary</th>
    <th class="text-center">Added On</th>
    <th class="text-center">Added By</th>
    <th class="text-center"><i class="fa fa-tasks"></i>Action</th>
  </tr>
 
 <?php
$query = "SELECT * FROM positions";
$number = 0;
if ($result = mysqli_query($con, $query)) {
    while ($row = mysqli_fetch_array($result)){
      $number++;
      $pos_id=$row['pos_id'];
      $nam=$row['pos_name'];
      $salary=$row['salary'];
      $on=$row['added_on'];
      $by=$row['added_by'];
      $name1 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_employee where id='$by'"))['name'];
      
?>
        <tr class="text-center"> 
                  <td><?php echo $number; ?></td> 
                  <td><?php echo $nam; ?></td>
                  <td><?php echo $salary; ?></td> 
                  <td><?php echo $on; ?></td>
                  <td><?php echo $name1; ?></td>
                  
                  <td>
                  <div class="btn-group">
                  <?php 
                    if($sel['edit_position']||$rolex=="0"){
                  ?>
                    <a class="btn btn-success" data-toggle="modal" data-target="#uppos<?php echo $pos_id; ?>" data-whatever="@mdo"><i class="fa fa-edit"></i></a><?php } ?>
    
                    <?php 
                      if($sel['delete_position']||$rolex=="0"){
                    ?>
                    <a onclick = "confirmationDelete(this); return false;" class="btn btn-danger" href="delete/delete/delete_position.php?pos_id=<?php echo $pos_id;?>"><i class="icon_close_alt2"></i></a><?php } ?>
                  </div>
                  </td>
        </tr>
<div class="modal fade" id="uppos<?php echo $pos_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-success" id="exampleModalLabel"><b>Update Position details for <?php echo $nam; ?></b></h4>
      </div>
      <form method="POST">
      <div class="modal-body">
         <div class="form-group">
            <label for="message-text" class="control-label">Position Name:</label>
            <input type="text" name="pos_name" value="<?php echo $row['pos_name'] ?>" class="form-control" required>
            <input type="hidden" name="id" value="<?php echo $pos_id ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Salary:</label>
            <input type="text" name="salary" value="<?php echo $row['salary'] ?>" class="form-control" required>
          
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="up_pos" class="btn btn-primary">Update</button>
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
if(isset($_POST['up_pos'])){ 
  $id=$_POST['id'];
  $nam=$_POST['pos_name'];
  $salary=$_POST['salary'];
  $by=$uid;
  
  $edit = mysqli_query($con,"UPDATE positions SET pos_name='$nam', salary='$salary', added_by='$by' where pos_id='$id'");
    if($edit)
    {
        $activity = "Updated position for $nam";
        $que1=mysqli_query($con,"INSERT into logs (`activity`, `user`)values('$activity','$by')");
      echo"<script>alert('Position successfully updated')
      window.location='position.php'
      </script>";
    }
    else
    {
        echo"The operation is unsuccessful. Please try again ".mysqli_error($con);
    }
  }    	
?>


</table>
<!-- end_doc_view -->


      <?php
      if(isset($_POST['pos_add'])){
        $nm=$_POST['pos_name'];
        $sal=$_POST['salary'];
        $by=$uid;
        $check = mysqli_query($con,"SELECT * FROM positions WHERE pos_name='$nm'");
        $count  = mysqli_num_rows($check);
        if($count==0){
        $que1=mysqli_query($con,"INSERT into positions ( `pos_name`,`salary`, `added_by`) 
        values('$nm','$sal','$by')");
        echo '<script>alert("Position has been addeded successfully")
        window.location="position.php"</script>';
        }
        else{
        echo'<script>alert("Position already exists")
        window.location="position.php"</script>'.mysqli_error($con);
        }
      }
      // else{
      //   echo'<script>alert("Operation unsuccessfull, Please try again")
      //   window.location="position.php"</script>';
      // }

      ?>
    


      </section>
      <?php include "includes/footer.php" ?>
      <script type = "text/javascript">
            function confirmationDelete(anchor){
            var conf = confirm("Are you sure you want to delete this position?");
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
