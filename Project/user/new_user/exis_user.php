<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<link href = "style1.css" type = "text/css" rel = "stylesheet" />
<?php
include "connection.php";
// define variables and set to empty values
$nameErr = $custiderr=$passerr="";
$name = $cust_id=$pass="";

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
  $sql = "select * from customer where Customer_name='".$_POST["name"]."'";
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

<h1 class="head1">Please Login to Continue</h1>
<div class="div1">
<p><span class="error">* required field</span></p>
<form class="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="d2">Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span></div>
  <br><br>
  <div class="d3">Password: <input type="password" name="pass" value="<?php echo $pass;?>">
  <span class="error">* <?php echo $passerr;?></span></div>
  <br><br>
  Customer Id:<input type="text" name="cust_id" value="<?php echo $cust_id;?>" >
  <span class="error">* <?php echo $custiderr;?></span>
  <br><br>
  <div class="d1"><input type="submit" name="Login" value="Login"></div>
</form>
</div>
<?php
  session_start();
  $cust=$_SESSION['cust_id'];
  echo $cust;
  if(isset($_POST["Login"]))
  {
  error_reporting(0);
  $name=$row->Customer_name;
  $cust=$row->Customer_id;
  $pass=$row->Password;
  $get_name=$_POST["name"];
  $get_cust=$_POST["cust_id"];
  $get_pass=$_POST["pass"];
  if($name==$get_name && $pass==$get_pass && $cust==$get_cust)
  {
    session_start();
    $_SESSION['sess_user']=$name;
    header("Location: succ.php");
  }
  else{
    echo "Not a valid user";
  }
}
?>
</body>
</html>
