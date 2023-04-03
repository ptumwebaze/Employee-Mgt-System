<?php include "includes/db.php" ?>
<?php 
$sel = mysqli_fetch_array(mysqli_query($con, "SELECT * from permissions WHERE role_id='$rolex'"));
?>
<header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="" class="logo">e m<span class="lite"> system</span></a>
<div class="navbar1" id="mega-nav">
  <a class="anchor" href="#home">Home</a>
  <a class="anchor" href="#news">News</a>
  <div class="dropdown1">
    <button class="dropbtn">Contact Us
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <div class="row">
        <div class="column">
          <h3>Contacts</h3>
          <a href="info@nugsoft.com">Email</a>
          <a href="+256776468124">Phone</a>
          <a href="nugsoft.com">Website</a>
        </div>
        <div class="column">
          <h3>Feedback</h3>
          <a href="#">Appreciation</a>
          <a href="#">Advice</a>
          <a href="#">Other</a>
        </div>
        <div class="column">
          <h3>Report Issue</h3>
          <a href="#">System</a>
          <a href="#">Company</a>
          <a href="#">Other</a>
        </div>
      </div>
    </div>
  </div>
  <!--  search form end -->
      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">
          
          <!-- alert notification end-->
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="icon_profile">
                                <img alt="" src="#">
                            </span>
                            <span class="username"><?php echo $fname ?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="user.php"><i class="icon_profile"></i> My Profile</a>
              </li>
              <li>
                <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
              </li>
                            
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
      </div>
    </header>
    <script>
    function myFunction() {
  var x = document.getElementById("mega-nav");
  if (x.className === "navbar1") {
    x.className += " responsive";
  } else {
    x.className = "navbar1";
  }
}
</script>