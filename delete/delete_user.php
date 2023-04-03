<?php
include "../includes/db.php";
include "../includes/sessions.php";
    $id=$_GET['register_id'];
    $name= mysqli_fetch_array(mysqli_query($con, "SELECT name FROM register where register_id='$id'"))['name'];
    $update = "UPDATE `register` SET `status`=0 WHERE register_id=$id";
    $result2 = mysqli_query($con,$update);
    if($result2){
        $activity = "Deleted details for User with the name $name";
        $que1=mysqli_query($con,"INSERT into logs (`activity`, `user`)values('$activity','$uid')");
    echo"<script>alert('User has been successfully deactivated')
    window.location='../view_user.php'
    </script>";
    }
    else
    echo"The operation is unsuccessful. Please try again ".mysqli_error($con);
?>