<?php
include "../includes/db.php";
include "../includes/sessions.php";
  $id=$_GET['advance_id'];

$emp_id= mysqli_fetch_array(mysqli_query($con, "SELECT emp_id FROM advances where advance_id='$id'"))['emp_id'];
$name = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_employee where id='$emp_id'"))['name'];
$query= "DELETE FROM `advances` WHERE advance_id=$id";
$result = mysqli_query($con,$query);
if($result){
  $activity = "Deleted an advance for $name";
  $que1=mysqli_query($con,"INSERT into logs (`activity`, `usertype`,`user`)values('$activity','$type','$id')");
echo"<script>
window.location='../advances.php'</script>";
}
else
echo"The operation is unsuccessful. Please try again ".mysqli_error($con);
?>