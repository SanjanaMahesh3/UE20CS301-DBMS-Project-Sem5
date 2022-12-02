<html>
<head>
  <body>
    <link href = "style.css" type = "text/css" rel = "stylesheet" />
    <h1 class="head1">Update User details</h1>
    <div class="div1">
      <form class="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="d2">Name: <input type="text" name="name" value="">
        <br><br>
        Customer ID: <input type="text" name="cust_id" value="">
        <br><br>
        Date Of Birth:<input type="date" name="date" value="date" >
        <br><br>
        <div class="d3">E-mail: <input type="text" name="email" value="">
        <br><br>
        Marital Status:<input id="m1" type="radio" name="mar" value="M" >
        <label for "m1">Married</label>
        <input id="m2" type="radio" name="mar" value="NM" >
        <label for "m2">Not Married</label>
        <br><br>
        Address:<input type="text" name="addr" value="" >
        <br><br>
        Gender:<input id="g1" type="radio" name="gen" value="Male" >
        <label for "g1">Male</label>
        <input id="g2" type="radio" name="gen" value="Female" >
        <label for "g2">Female</label>
        <input id="g3" type="radio" name="gen" value="Others" >
        <label for "g3">Others</label>
        <br><br>
        <div class="d1"><input type="submit" name="Update" value="Upadate"></div>
      </form>
    </div>
    <?php
    if(isset($_POST["Update"]))
    {
    include "connection.php";
    $name=$_POST["name"];
    $dob=$_POST["date"];
    $mar=$_POST["mar"];
    $add=$_POST["addr"];
    $gen=$_POST["gen"];
    $em=$_POST["email"];
    $cust=$_POST["cust_id"];
    $sql="update customer set Customer_name='$name',DOB='$dob',Marital_status='$mar',Address='$add',Gender='$gen',Email_id='$em' where Customer_id=$cust";
    mysqli_query($conn,$sql) or die($sql."Cannot Update");
    echo "Succesful";
  }
  else {
    echo "Unsuccessful";
  }
     ?>
