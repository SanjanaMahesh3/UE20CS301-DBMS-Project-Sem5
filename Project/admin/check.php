<html>
<body>
  <link href = "style1.css" type = "text/css" rel = "stylesheet" />
  <h1 class="head1">User details</h1>
  <div class="div1">
  <form method="post">
    Customer ID :<input type="text" name="cust_id" value="">
    <br><br>
    Name of the customer :<input type="text" name="name" value="">
    <br><br>
    <p class="p1"><input type="submit" name="proceed" value="proceed"></p>
    <?php
    include "connection.php";
    if(isset($_POST["proceed"]))
    {
    $name=$_POST["name"];
    $cust=$_POST["cust_id"];
    $max="select * from customer where Customer_id IN (select Customer_id from customer where Customer_name='$name')";
    $max_res=mysqli_query($conn,$max);
    $row = mysqli_fetch_object($max_res);
    echo nl2br("Customer ID:$row->Customer_id\nName:$row->Customer_name\nDate Of Birth:$row->DOB\nMarital Status:$row->Marital_status\nAddress:$row->Address\nGender:$row->Gender\nEmail ID:$row->Email_id\n");
    $max1="select * from payment where Customer_id=$cust";
    $max2="select * from policy where Customer_id=$cust";
    $max_res1=mysqli_query($conn,$max1);
    $row1 = mysqli_fetch_object($max_res1);
    $max_res2=mysqli_query($conn,$max2);
    $row2 = mysqli_fetch_object($max_res2);
    echo nl2br("Receipt Number:$row1->Receipt_number\nAmount Payed:$row1->Amount_payed\nAmount Remaining:$row1->Amount_remaining\nFine:$row1->Fine\nPolicy Number:$row1->Policy_number\nPayment Method:$row1->Payment_method\nPolicy Name:$row2->Policy_name");
  }
  else{
    echo "error";
  }
    ?>
