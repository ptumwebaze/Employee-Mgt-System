<?php
include 'includes/db.php';
session_start();

$id=$_GET['perm'];
$column=$_GET['colum'];

$check=mysqli_fetch_array(mysqli_query($con,"SELECT sum(".$column.") as col FROM permissions where perm_id='$id'"));
	if ($check['col']==1) {
$sql = "UPDATE permissions SET ".$column."= 0 where perm_id='$id'";
		$act="Permission Deactivated";
	}else{
$sql = "UPDATE permissions SET ".$column."= 1 where perm_id='$id'";
   $act="Permission Activated";
	}


$ss=mysqli_query($con,$sql);
  
  if ($ss) {
  	echo $act;
  }else{
  	echo "Failed";
  }


?>