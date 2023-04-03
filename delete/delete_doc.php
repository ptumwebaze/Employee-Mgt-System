<?php
include "../includes/db.php";
include "../includes/sessions.php";
  $id=$_GET['doc_id'];
  $name = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_employee where id='$id'"))['name'];
$query= "DELETE FROM `documents` WHERE doc_id=$id";
$result = mysqli_query($con,$query);
if($result){
  $activity = "Deleted document with name $name";
  $que1=mysqli_query($con,"INSERT into logs (`activity`, `user`)values('$activity','$uid')");
echo"<script>alert('Document successfully deleted')
window.location='../documents.php'
</script>";
}
else
echo"The operation is unsuccessful. Please try again ".mysqli_error($con);
?>