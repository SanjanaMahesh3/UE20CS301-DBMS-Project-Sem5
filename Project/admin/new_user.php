<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<link href = "style2.css" type = "text/css" rel = "stylesheet" />
<?php
include "connection.php";
// define variables and set to empty values
$nameErr = $emailErr = $generr  = $doberr=$pass=$mar=$addr=$agent="";
$name = $email = $gen  = $date=$passerr=$marerr=$adderr=$agenterr="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  if (empty($_POST["date"])){
    $doberr="";
  }else{
    $date=test_input($_POST["date"]);
  }
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }



  if (empty($_POST["gen"])) {
    $generr = "";
  } else {
    $gen = test_input($_POST["gen"]);
  }

if (empty($_POST["mar"])) {
  $marerr = "";
} else {
  $mar = test_input($_POST["mar"]);
}
}
if (empty($_POST["addr"])) {
  $adderr = "";
} else {
  $addr = test_input($_POST["addr"]);
}

if (empty($_POST["agent"])){
  $agenterr="";
}else {
  $agent=test_input($_POST["agent"]);
  if (!preg_match("/^[0-9]*$/",$agent)){
    $agenterr="Agent ID can only be numbers";
  }
}
if (empty($_POST["pass"])) {
  $passerr = "";
} else {
  $pass = test_input($_POST["pass"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h1 class="head1">Welcome to Registration</h1>
<div class="div1">
<p><span class="error">* required field</span></p>
<form class="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="d2">Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span></div>
  <br><br>
  Date Of Birth:<input type="date" name="date" value="date" >
  <span class="error">* <?php echo $doberr;?></span>
  <br><br>
  <div class="d3">E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span></div>
  <br><br>
  Password:<input type="text" name="pass" value="" >
  <span class="error">* <?php echo $passerr;?></span>
  <br><br>
  Marital Status:<input id="m1" type="radio" name="mar" value="M" >
  <span class="error">* <?php echo $marerr;?></span>
  <label for "m1">Married</label>
  <input id="m2" type="radio" name="mar" value="NM" >
  <span class="error">* <?php echo $marerr;?></span>
  <label for "m2">Not Married</label>
  <br><br>
  Address:<input type="text" name="addr" value="" >
  <span class="error">* <?php echo $adderr;?></span>
  <br><br>
  Gender:<input id="g1" type="radio" name="gen" value="Male" >
  <span class="error">* <?php echo $generr;?></span>
  <label for "g1">Male</label>
  <input id="g2" type="radio" name="gen" value="Female" >
  <span class="error">* <?php echo $generr;?></span>
  <label for "g2">Female</label>
  <input id="g3" type="radio" name="gen" value="Others" >
  <span class="error">* <?php echo $generr;?></span>
  <label for "g3">Others</label>
  <br><br>
  Agent Code:<input type="text" name="agent" value="" >
  <span class="error">* <?php echo $agenterr;?></span>
  <br><br>
  <div class="d1"><input type="submit" name="Register" value="Register"></div>
</form>
</div>
<?php
if(isset($_POST["Register"]))
{
error_reporting(0);
$name=$_POST["name"];
$dob=$_POST["date"];
$mar=$_POST["mar"];
$add=$_POST["addr"];
$gen=$_POST["gen"];
$em=$_POST["email"];
$ag=$_POST["agent"];
$pas=$_POST["pass"];
$max="select * from customer order by Customer_id desc limit 1";
$max_res=mysqli_query($conn,$max);
$row = mysqli_fetch_object($max_res);
$max_val=$row->Customer_id;
$sql="insert into customer (Customer_name,DOB,Marital_status,Address,Gender,Email_id,Agent_code,Password,Customer_id) VALUES ('$name','$dob','$mar','$add','$gen','$em',$ag,'$pas',$max_val+1)";
mysqli_query($conn,$sql) or die($sql."Cannot Insert");
session_start();
$_SESSION['cust_id']=$max_val+1;
echo "User Registration Succesfull";
}
?>
</body>
</html>
