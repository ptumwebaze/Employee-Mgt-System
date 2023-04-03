<?php include "includes/db.php" ?>
<?php
if(isset($_POST['submit_password']) && $_POST['key'] && $_POST['reset'])
{
  $email=$_POST['email'];
  $pass=$_POST['password'];
  mysql_select_db('sample');
  $select=mysql_query("UPDATE register SET password='$pass' where email='$email'");
}
?>