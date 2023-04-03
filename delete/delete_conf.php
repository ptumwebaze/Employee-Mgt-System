<?php
echo"
<script>
    var qn = confirm('Are you sure you want to delete this advance?');
if(qn==true){
window.location='delete_adv.php?advance_id=".$_GET['advance_id']."';
}
else{
window.location='advances.php';
}
</script>"
?>