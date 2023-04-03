<?php
include "../includes/db.php";
include "../includes/sessions.php";
  $id=$_GET['role_id'];
  $name = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM roles where role_id='$id'"))['role_name'];
$query= "DELETE FROM `roles` WHERE role_id=$id";
$query1= "DELETE FROM `permissions` WHERE role_id=$id";
$result = mysqli_query($con,$query);
$result2 = mysqli_query($con,$query1);
if($result){
  $activity = "Deleted Role $name";
  $que1=mysqli_query($con,"INSERT into logs (`activity`, `user`)values('$activity','$uid')");
echo"<script>alert('Role successfully deleted')
window.location='../roles.php'
</script>";
}
else
echo"The operation is unsuccessful. Please try again ".mysqli_error($con);
?>