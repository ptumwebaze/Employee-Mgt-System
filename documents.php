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
            <h3 style="color:green" class="page-header text-center"><b>Employee Documents</b></h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="home.php">Home</a></li>
              <li><i class="fa fa-laptop"></i>Add</li>
            </ol>
            <?php 
            if($sel['add_document']||$rolex=="0"){
          ?>
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add_doc" data-whatever="@mdo">
            <i class="fa fa-plus" aria-hidden="true"></i>Add Document</button><?php } ?>
          </div>
        </div>
<!-- add_doc start -->
<div class="modal fade" id="add_doc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-primary" id="exampleModalLabel"><b>Add Document</b></h4>
      </div>
    <form method="POSt" enctype='multipart/form-data'>
      <div class="modal-body">
          <div class="form-group">
            <label class="control-label">Employee:</label>
            <select name="emp_id"class="form-control selectpicker" data-live-search="true" required>
              <option value="">Choose Employee</option>
              <?php 
              $result1 = mysqli_query($con, "SELECT * FROM add_employee");
               while($row1 = mysqli_fetch_array($result1)){
            ?>
              <option value="<?php echo $row1['id'] ?>"><?php echo $row1['name'] ?></option> 
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label  class="control-label">Document Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Document Name"  required>
          </div>
          <div class="form-group">
            <label class="control-label">Document:</label>
            <input type="file" id="file-upload" name="doc" class="form-control" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" onclick = "return VerifyUploadSizeIsOK()" name="document_add" class="btn btn-primary">Add</button>
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
    <th class="text-center">Employee Name.</th>
    <th class="text-center">Document Name</th>
    <th class="text-center">Document</th>
    <th class="text-center">Added On</th>
    <th class="text-center">Added By</th>
    <th class="text-center"><i class="fa fa-tasks"></i>Action</th>
  </tr>
 
 <?php
$query = "SELECT * FROM documents";
$number = 0;
if ($result = mysqli_query($con, $query)) {
    while ($row = mysqli_fetch_array($result)){
      $number++;
      $doc_id=$row['doc_id'];
      $emp_id=$row['emp_id'];
      $name = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_employee where id='$emp_id'"))['name'];
      $nam=$row['name'];
      $doc=$row['doc'];
      $on=$row['addedon'];
      $by=$row['addedby'];
      $name1 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_employee where id='$by'"))['name'];
?>
        <tr> 
                  <td><?php echo $number; ?></td>
                  <td><?php echo $name; ?></td> 
                  <td><?php echo $nam; ?></td>
                  <td><?php echo $doc; ?></td>  
                  <td><?php echo $on; ?></td>
                  <td><?php echo $name1; ?></td> 
                  <td>
                  <div class="btn-group">
                  <?php 
                    if($sel['edit_document']||$rolex=="0"){
                  ?>
                    <a class="btn btn-success" data-toggle="modal" data-target="#updoc<?php echo $doc_id; ?>" data-whatever="@mdo"><i class="fa fa-edit"></i></a><?php } ?>
                    <?php 
                      if($sel['view_document']||$rolex=="0"){
                    ?>
                    <a target="_blank" class="btn btn-primary" href="<?php echo "documents/".$doc; ?>" data-whatever="@mdo"><i class="fa fa-eye"></i></a><?php } ?>
                    <?php 
                      if($sel['delete_document']||$rolex=="0"){
                    ?>
                    <a onclick = "confirmationDelete(this); return false;" class="btn btn-danger" href="delete/delete_doc.php?doc_id=<?php echo $doc_id;?>"><i class="icon_close_alt2"></i></a><?php } ?>
                  </div>
                  </td>
        </tr>
<div class="modal fade" id="updoc<?php echo $doc_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-success" id="exampleModalLabel"><b>Update Document details for <?php echo $name; ?></b></h4>
      </div>
      <form method="POST" enctype='multipart/form-data'>
      <div class="modal-body">
        <div class="form-group">
            <label class="control-label">Employee Name:</label>
            <select name="emp_id" class="form-control" required>
            <option value="">Select Employee</option>
              <?php 
              $result23 = mysqli_query($con, "SELECT * FROM add_employee");
               while($row23 = mysqli_fetch_array($result23)){
              ?>
              <option value="<?php echo $row23['id'] ?>"><?php echo $row23['name'] ?></option> 
              <?php
              }
              ?>
            </select>
         </div>
         <div class="form-group">
            <label for="message-text" class="control-label">Document Name:</label>
            <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control" required>
            <input type="hidden" name="id" value="<?php echo $doc_id ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Document:</label>
            <input type="file" name="doc" id="file-upload" value="<?php echo $row['doc']?>" class="form-control" required>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" onclick = "return VerifyUploadSizeIsOK()" name="up_document" class="btn btn-primary">Update</button>
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
if(isset($_POST['up_document'])){ 
  $folder="documents/".basename($_FILES['doc']['name']);  
  $id=$_POST['id'];
  $emp_id=$_POST['emp_id'];
  $nam=$_POST['name'];
  $doc=$_FILES['doc']['name'];
  $by=$uid;
  
  $edit = mysqli_query($con,"UPDATE documents SET emp_id='$emp_id', name='$nam', doc='$doc', addedby='$by' where doc_id='$id'");
	$name = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_employee where id='$emp_id'"))['name'];
    if($edit)
    {
        $activity = "Updated documents for $name";
        $que1=mysqli_query($con,"INSERT into logs (`activity`, `user`)values('$activity','$by')");
      echo"<script>alert('Document successfully updated')
      window.location='documents.php'
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
      if(isset($_POST['document_add'])){
        $folder="documents/".basename($_FILES['doc']['name']);  
        $id=$_POST['emp_id'];
        $nm=$_POST['name'];
        $doc=$_FILES['doc']['name'];
        $by=$uid;
        $que1=mysqli_query($con,"INSERT into documents (`emp_id`, `name`, `doc`,`addedby`) 
        values('$id','$nm','$doc','$by')");
        
        $que2=move_uploaded_file($_FILES['doc']['tmp_name'], $folder);

        if($que1)
        echo '<script>alert("Document has been Uploaded successfully")
        window.location="documents.php"</script>';
        else
        echo"The operation is unsuccessful. Please try again ".mysqli_error($con);
      }
      ?>
    


      </section>
      <?php include "includes/footer.php" ?>
      <script type = "text/javascript">
            function confirmationDelete(anchor){
            var conf = confirm("Are you sure you want to delete this document?");
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

    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
<?php include "includes/scripts.php" ?>
</body>

</html>
