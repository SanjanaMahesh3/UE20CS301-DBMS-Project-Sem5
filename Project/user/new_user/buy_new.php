<html>
<body>
  <link href = "style2.css" type = "text/css" rel = "stylesheet" />
  <?php
  include "connection.php";
  // define variables and set to empty values
  $nameErr = $custiderr=$passerr=$marerr="";
  $name = $cust_id=$pass=$mar="";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["cust_id"])){
      $custiderr="Customer ID is required";
    }else {
      $cust_id=test_input($_POST["cust_id"]);
      if (!preg_match("/^[0-9]*$/",$cust_id)){
        $custiderr="Customer ID can only be numbers";
      }
    }
    if (empty($_POST["pass"])){
      $passerr="Password is required";
    }else{
      $pass=test_input($_POST["pass"]);
    }
    if(is_numeric($_POST["cust_id"])){
    $sql = "select * from policy";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_object($result);
  }
  }
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>

  <h1 class="head1">Proceed with buying</h1>
  <div class="div1">
  <p><span class="error" >* required field</span></p>
  <form class="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Customer Id:<input type="text" name="cust_id" value="<?php echo $cust_id;?>" >
    <span class="error">* <?php echo $custiderr;?></span>
    <br><br>
    Policy Type:<input id="m1" type="radio" name="mar" value="General Health" >
    <span class="error">* <?php echo $marerr;?></span>
    <label for "m1">General Health</label>
    <input id="m1" type="radio" name="mar" value="Vehical Insurance" >
    <span class="error">* <?php echo $marerr;?></span>
    <label for "m1">Vehical Insurance</label>
    <br><br>
    <div class="dee1"><input type="submit" name="Click" value="Click here for More information"></div>
    <div class="d2"><input type="submit" name="reg" value="Register"></div>
    </div>
  </form>
  <?php
    if(isset($_POST["Click"]))
    {
    error_reporting(0);
    $cust=$row->Customer_id;
    $get_cust=$_POST["cust_id"];
    $get_mar=$_POST["mar"];
    if($get_mar=='General Health')
    {
      echo "The sum assured is Rs 32000.00";
      echo "The cost of buying is Rs 18000.00";
    }
    else{
      echo "The sum assured is Rs 30000.00";
      echo "The cost of buying is Rs 15000.00";
    }
  }
  ?>
  <?php
  if(isset($_POST["reg"])){
    $get_mar=$_POST["mar"];
    if($get_mar=='General Health')
    {
    $cust=$_POST["cust_id"];
    $max="select * from policy order by Policy_number desc limit 1";
    $max_res=mysqli_query($conn,$max);
    $row = mysqli_fetch_object($max_res);
    $max_val=$row->Policy_number;
    $sum_a=32000;
    $price=18000;
    $pol=$_POST["mar"];
    $sql="insert into policy (Customer_id,Policy_number,Policy_name,Sum_assured,Price_to_buy) values ($cust,$max_val+1,'$pol',$sum_a,$price)";
    mysqli_query($conn,$sql) or die($sql."Cannot Insert");
    session_start();

  }

  else{
    $cust=$_POST["cust_id"];
    $max="select * from policy order by Policy_number desc limit 1";
    $max_res=mysqli_query($conn,$max);
    $row = mysqli_fetch_object($max_res);
    $max_val=$row->Policy_number;
    $sum_a=30000;
    $price=15000;
    $pol=$_POST["mar"];
    $sql="insert into policy (Customer_id,Policy_number,Policy_name,Sum_assured,Price_to_buy) values ($cust,$max_val+1,'$pol',$sum_a,$price)";
    mysqli_query($conn,$sql) or die($sql."Cannot Insert");
    session_start();
  }
  }
  ?>
