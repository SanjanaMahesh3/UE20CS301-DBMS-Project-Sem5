<html>
<body>
  <link href = "style3.css" type = "text/css" rel = "stylesheet" />
  <h1 class="head1">Delete Branch</h1>
  <form class="form1" method="post">
    Enter the Company ID:<input type="number" name="id" value="">
    <br><br>
    Enter the Branch Name:<input type="text" name="branch" value="">
    <br><br>
    Enter the Branch ID:<input type="number" name="brid" value="">
    <br><br>
    <input type="submit" name="submit" value="submit">
  </form>
  <?php
  include "connection.php";
  if(isset($_POST["submit"]))
  {
    $compid=$_POST["id"];
    $brn=$_POST["branch"];
    $brid=$_POST["brid"];
    $sql="delete from branch where Branch_id=$brid";
    mysqli_query($conn,$sql) or die($sql."Cannot Insert");
    $max="select * from company where Company_id=$compid";
    $max_res=mysqli_query($conn,$max);
    $row = mysqli_fetch_object($max_res);
    $sql1="update company set Total_branches=$row->Total_branches-1 where Company_id=$compid";
    mysqli_query($conn,$sql1) or die($sql1."Not Able");
  }
   ?>
