<html>
<body>
  <link href = "style3.css" type = "text/css" rel = "stylesheet" />
  <h1 class="head1">Payment Page</h1>
  <div class="div1">
  <form class="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Enter The Customer ID to proceed : <input type="text" name="cust_id" value="">
    <h3> Click the button to Check Details <h3>
    <input type="submit" name='Click' value='Click for details'>
    <input type="button" name="Payment" value='Payment' onclick="document.location.href='payment.php'">
  </div>
  </form>
  <?php
  include "connection.php";
  if(isset($_POST['Click']))
  {
    session_start();
    $get_cust=$_POST["cust_id"];
    $cust=$_SESSION['cust_id'];
    if ($cust==$get_cust)
    {
      $max="select * from payment where Customer_id=$cust";
      $max_res=mysqli_query($conn,$max);
      $row = mysqli_fetch_object($max_res);
      echo '<h1>Amount remaining and to be paid = '.$row->Amount_remaining.'</h1>';
    }
    else {
      echo "<h1>Can't access others details</h1>";
    }
  }
   ?>
