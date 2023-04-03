
<?php include "../includes/sessions.php" ?>
 <?php include "../includes/db.php" ?>

<div class="container">
<div class="error"></div>
<form id="frm-mobile-verification" class="login-form" method="POST" action="sms_submit.php">
  <div class="login-wrap">
    <p class="login-img"><i class="icon_lock_alt"></i></p>
    <div class="input-group">
      <span class="input-group-addon"><i class="icon_profile"></i></span>
      <input type="tel" id="mobile" class="form-control" name="contact" placeholder="Enter Your Phone Number" required>
    </div>
   
    <button name="sms" class="btn btn-primary btn-lg btn-block" value="Send OTP" onClick="sendOTP();" type="submit">Submit</button>
	</div>
</form>
</div>
<script src="verification.js"></script>


