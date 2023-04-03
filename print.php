<?php 
include 'includes/db.php';
include 'includes/sessions.php';
if (isset($_GET['salary_id'])) {
  $salary_id = $_GET['salary_id'];
  $details = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM salaries WHERE salary_id='$salary_id'"));
  $emp =$details['emp_id'];
  $adby =$details['rec'];
  $sal_name = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_employee WHERE id='$emp'"));
  $sal_name1 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM add_employee WHERE id='$uid'"));
  $name1 = $sal_name1['name'];
  $name = $sal_name['name'];
  // $salary_details = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM salary,staff WHERE salary.id='$salary_id' AND salary.businessId='$bid' AND staff.staff_id=salary.staff_id"));
  // $uid = $details['rec'];
  // $user_details = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM register WHERE emp_id='$emp' AND register_id='$uid'"));
  // $pmode_id = $salary_details['pmode'];
  $m = $details['month'];
  $year = $details['year'];
  if ($m=="1") {
    $month = "January";
  }
  elseif ($m=="2") {
    $month="February";
  }
  elseif ($m=="3") {
    $month="March";
  }elseif ($m=="4") {
    $month="April";
  }elseif ($m=="5") {
    $month="May";
  }elseif ($m=="6") {
    $month="June";
  }elseif ($m=="7") {
    $month="July";
  }elseif ($m=="8") {
    $month="August";
  }elseif ($m=="9") {
    $month="September";
  }elseif ($m=="10") {
    $month="October";
  }elseif ($m=="11") {
    $month="November";
  }
  else{
    $month="December";
  }
  // if ($pmode_id==0) {
  //   $mode_type = "Cash";
  //   $account_nane = "";
  //   $account_no = "";
  // }
  // else{
  //   $pmode_details = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM pmode WHERE pmode_id='$pmode_id' AND businessId='$bid'"));
  //   $mode_type = $pmode_details['mode_name'];
  //   $account_nane = $pmode_details['account_name'];
  //   $account_no = $pmode_details['account_number'];
  // }
  ?>
  <!doctype html>
<html class="no-js" lang="en">


<head>
  

<script type="text/javascript">
      window.onload = function() { window.print();
        var is_chrome = function () { return Boolean(window.chrome); }
            if(is_chrome)
            {
            setTimeout(function(){document.location.href = "documents_download";}, 0); 
            //../salaries/salaries.php
            //give them 10 seconds to print, then close
            }
            else
            {
           setTimeout(function(){document.location.href = "documents_download";}, 0);
            }
        }
   
</script>
</head>
<body style="font-family: Courier New, Courier,Lucida Sans Typewriter, Lucida Typewriter, monospace;">
<div class="row">

  <div style=" transform: scale(1,1.5); font-size: 16px; text-align: center;">
    <div style=" font-size: 20px; text-transform: uppercase;"><strong><br>NUGSOFT TECHNOLOGIES LIMITED</strong></div>
  <div><strong>Location:</strong>Kyanja</div>
  <div><strong>TEl:</strong>+256777844758</div>
  <div><strong>Email:</strong>info@nugsoft.com<br></div>
</div>
</div>
<br>
<center><h3 style="text-decoration: underline;">SALARY PAYMENT ACKNOWLEDGEMENT</h3></center>

<table style="margin: 4px; padding: 4px;">

    <p><div>Receipt No: <strong><?php echo $salary_id; ?> </strong>
    <div style="text-align:right">Payment Date: <strong><?php echo $details['pydate']; ?> </strong>
  </div></p>
  
    
  
<th>
  <td><h3>Employee Details</h3></td>
</th>
<div class="row">
  <div class="col-md-6">       
          <tr>
            <td>Employee Name: </td>
            <td><strong><?php echo $name; ?>FP</strong></td>
          </tr>
    </div>
<div class="col-md-6">
          <tr>
            <td>Position:</td>
            <td><strong><?php echo $sal_name['position']; ?> </strong></td>
          </tr>
</div>
</div>
<th>
  <td><h3>Payment Details</h3></td>
</th>
          <tr>
            <td>Amount Paid:</td>
            <td><strong><?php echo number_format($details['amount']); ?></strong></td>
          </tr>
          <tr>
            <td>Balance:</td>
            <td><strong><?php echo number_format($details['balance']); ?></strong></td>
          </tr>
          <tr>
            <td>Month Paid:</td>
            <td><strong><?php echo $month.",".$year; ?> </strong></td>
          </tr>
          <tr>
            <td>Recieved By:</td>
            <td><strong><?php echo $name1; ?></strong></td>
          </tr>
        </table>
        <div>
          <p style="text-align: center;">Thank you for working with us. For Inquiries Call: <strong>+256776468124</strong>.</p>
        </div>
        <hr style="border-style: dashed;">    
</body>
</html>
  <?php
}
else{
  echo "<script>history.go(-1)</script>";
}
?>
