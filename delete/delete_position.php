<?php
include "../includes/db.php";
include "../includes/sessions.php";
  $id=$_GET['pos_id'];
  $name = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM positions where pos_id='$id'"))['pos_name'];
$query= "DELETE FROM `positions` WHERE pos_id=$id";
$result = mysqli_query($con,$query);
if($result){
  $activity = "Deleted Position $name";
  $que1=mysqli_query($con,"INSERT into logs (`activity`, `user`)values('$activity','$uid')");
echo"<script>alert('Position successfully deleted')
window.location='../position.php'
</script>";
}
else
echo"The operation is unsuccessful. Please try again ".mysqli_error($con);
?>