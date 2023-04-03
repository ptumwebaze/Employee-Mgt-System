<?php
include "../includes/db.php";
include "../includes/sessions.php";
  $id=$_GET['salary_id'];
  $emp_id= mysqli_fetch_array(mysqli_query($con, "SELECT emp_id FROM salaries where salary_id='$id'"))['emp_id'];
  $name = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_employee where id='$emp_id'"))['name'];
$query= "DELETE FROM `salaries` WHERE salary_id=$id";
$query1= "DELETE FROM `salary` WHERE salary_id=$id";
$result = mysqli_query($con,$query);
$result1 = mysqli_query($con,$query1);
if($result){
  $activity = "Deleted salary details for $name";
  $que1=mysqli_query($con,"INSERT into logs (`activity`, `user`)values('$activity','$uid')");
echo"<script>alert('Salary detail successfully deleted')
window.location='../salary.php'
</script>";
}
else
echo"The operation is unsuccessful. Please try again ".mysqli_error($con);
?>