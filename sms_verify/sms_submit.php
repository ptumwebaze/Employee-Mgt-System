<?php include "../includes/sessions.php" ?>
 <?php include "../includes/db.php" ?>


<div class="container">
<div class="error"></div>
<div class="success"></div>
<form id="frm-mobile-verification" class="login-form" method="POST" action="send_link.php">
  <div class="login-wrap">
    <p class="login-img"><i class="icon_lock_alt"></i></p>
    <div class="input-group">
      <span class="input-group-addon"><i class="icon_profile"></i></span>
      <input type="tel" id="mobileOtp" class="form-control" name="email" placeholder="Enter OPT" required>
    </div>
   
    <button id="verify" name="opt" class="btn btn-primary btn-lg btn-block" value="Verify" onClick="verifyOTP();" type="submit">Submit</button>
		
	</div>
    </form>
</div>
<script src="verification.js"></script>
