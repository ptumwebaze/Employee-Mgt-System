<?php
include "../includes/db.php";
include "../includes/sessions.php";
  $id=$_GET['id'];
  $name = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_employee where id='$id'"))['name'];
$query= "DELETE FROM `add_employee` WHERE id=$id";
$result = mysqli_query($con,$query);
if($result){
  $activity = "Deleted an employee with name $name";
  $que1=mysqli_query($con,"INSERT into logs (`activity`, `user`)values('$activity','$uid')");
echo"<script>alert('Employee successfully deleted')
window.location='../employees.php'
</script>";
}
else
echo"The operation is unsuccessful. Please try again ".mysqli_error($con);
?>