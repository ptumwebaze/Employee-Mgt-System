
<?php include "./includes/head.php";
session_start();
?>
<?php include "includes/db.php"?>
<body class="login-img3-body">

  <div class="container">

    <form class="login-form" method="POST">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i> E.M.S</p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="email" class="form-control" name="email" placeholder="Email Address" required>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a target="_blank" href="sms_verify/sms.php"> Forgot Password?</a></span>
            </label>
        <button name="login" class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
        
      </div>
    </form>
  </div>
    <?php
    if(isset($_POST['login'])){ 
      $email=$_POST['email'];
      $password=md5($_POST['password']);
      $check = mysqli_query($con,"SELECT * FROM register WHERE email='$email' and password='$password'");
      $count  = mysqli_num_rows($check);
      if($count==1){
    
        $usedet = mysqli_fetch_array($check);
        $uid = $usedet['name'];
        $uname = $usedet['name'];
        $usedet1 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_employee where id='$uname'"));
        $usedet2= $usedet1['name'];
        $usedet3= $usedet1['id'];
        $activity = "Successfully logged into the system";
        $que1=mysqli_query($con,"INSERT into logs (`activity`, `user`)values('$activity','$uid')");
        $_SESSION['fullname']=$usedet2;
        $_SESSION['e_id']=$usedet3;
        $_SESSION['id']=$uid;
        $_SESSION['role']=$usedet['role'];

        echo "<script>
        window.location='home.php'
        </script>";
           
      }
            
      else {
        echo "<script>alert('Invalid Login credentials. Please check them and try again ')
        window.location='index.php'
        </script>"; 
      }
    }
      
    
    ?>
    <?php include "includes/footer.php" ?>
</body>



 



