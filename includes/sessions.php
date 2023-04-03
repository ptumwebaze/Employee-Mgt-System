
<?php
session_start();
$uid=$_SESSION['id'];
$fname=$_SESSION['fullname'];
$emp_id=$_SESSION['e_id'];
$rolex=$_SESSION['role'];
if(isset($_SESSION['id'])==0){
?>
<script>window.location='index.php'</script>

<?php
}
?>