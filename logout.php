<?php include "includes/db.php";
include "includes/sessions.php";
      $activity = "Successfully logged out of the system";
      $que1=mysqli_query($con,"INSERT into logs (`activity`,`role`,`user`)values('$activity','$roles','$uid')");
      session_destroy();
      ?>

      <script>window.location='index.php'</script>
      <?php
?>