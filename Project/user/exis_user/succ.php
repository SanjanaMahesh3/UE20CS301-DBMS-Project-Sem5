<html>
<body>
  <link href = "style1.css" type = "text/css" rel = "stylesheet" />
  <h1 class="head1">Welcome User</h1>
  <h4 class="head4">What would you like to do?</h4>
  <button class="b1" onclick="document.location.href='buy_new.php'">Buy new Insurance</button>
  <button class="b2" onclick="document.location.href='pay.php'">Pay remaining amount</button>

<?php
include "connection.php";
session_start();
$cust=$_SESSION['cust_id'];
$max="select * from payment where Customer_id=$cust";
$max_res=mysqli_query($conn,$max);
$row = mysqli_fetch_object($max_res);
echo '<script>alert("'.$row->Amount_remaining.' Is your remaining amount to pay");</script>';
 ?>
