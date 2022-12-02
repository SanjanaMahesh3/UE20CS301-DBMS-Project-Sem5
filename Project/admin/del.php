<html>
<body>
  <link href = "style1.css" type = "text/css" rel = "stylesheet" />
  <h1 class="head1">Delete User</h1>
  <div class="div1">
  <form method="post">
    Customer ID :<input type="text" name="cust_id" value="">
    <br><br>
    Name of the customer :<input type="text" name="name" value="">
    <br><br>
    <p class="p1"><input type="submit" name="Delete" value="Delete"></p>
    <?php
    include "connection.php";
    if(isset($_POST["Delete"]))
    {
    $name=$_POST["name"];
    $cust=$_POST["cust_id"];
    $max="select * from customer where Customer_id=$cust";
    $max_res=mysqli_query($conn,$max);
    $row = mysqli_fetch_object($max_res);
    if($row->Customer_name==$name)
    {
      $sql="delete from customer where Customer_id=$cust";
      $sql1="delete from payment where Customer_id=$cust";
      $sql2="delete from policy where Customer_id=$cust";
      mysqli_query($conn,$sql) or die($sql."Cannot Delete");
      mysqli_query($conn,$sql1) or die($sql1."Cannot Delete");
      mysqli_query($conn,$sql2) or die($sql2."Cannot Delete");
      echo "Delete Succesfull";
    }
    else{
      echo "error";
    }

  }
  else{
    echo "error";
  }
    ?>
