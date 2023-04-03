<?php include "includes/head.php" ?>


<?php include "includes/db.php" ?>

<div class="container">

<form class="login-form" method="POST" action="send_link.php">
  <div class="login-wrap">
    <p class="login-img"><i class="icon_lock_alt"></i></p>
    <div class="input-group">
      <span class="input-group-addon"><i class="icon_profile"></i></span>
      <input type="email" class="form-control" name="email" placeholder="Enter Your Email Address" required>
    </div>
   
    <button name="reset" class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
    
  </div>
</form>
</div>



<?php include "includes/scripts.php" ?>

