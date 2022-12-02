<html>
<body>
  <link href = "style1.css" type = "text/css" rel = "stylesheet" />
  <h1 class="head1">Payment Page</h1>
    <form method="post">
  Amount you wish to pay: <input type="number" name="amnt" value="">
  <input type="submit" name="Card" value="Card" class="b1">
  <input type="submit" name="UPI" value="UPI" class="b2">

</form>
  <?php
  include "connection.php";
  session_start();
  $cust=$_SESSION['cust_id'];
  $max="select * from payment where Customer_id=$cust";
  $max_res=mysqli_query($conn,$max);
  $row = mysqli_fetch_object($max_res);
  echo '<h1>Amount remaining and to be paid = '.$row->Amount_remaining.'</h1>';
  echo '<h1>Fine to be paid = '.$row->Fine.'</h1>';
  if(isset($_POST['Card']))
  {
    $val=$_POST['amnt'];
    if(($val)>($row->Amount_remaining))
    {
      echo "Cannot";
    }
    else{
      $tots=($row->Amount_remaining);
      $val1=($tots)-($val);
      $fine=($row->Fine)-(0.05*$row->Fine);
      $amp=($row->Amount_payed)+($val);
      $sql="update payment set Amount_remaining=$val1,Amount_payed=$amp,Fine=$fine where Customer_id=$cust";
      mysqli_query($conn,$sql) or die($sql."Cannot Update");
      echo '<h3>Successfully Updated</h3>';
    }
  }
  if(isset($_POST['UPI']))
  {
    echo "Not Implemented Currently";
  }
   ?>
