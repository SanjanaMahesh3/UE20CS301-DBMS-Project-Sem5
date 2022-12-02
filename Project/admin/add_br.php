<html>
<body>
  <link href = "style3.css" type = "text/css" rel = "stylesheet" />
  <h1 class="head1">Add Branch</h1>
  <form class="form1" method="post">
    Enter the Company ID:<input type="number" name="id" value="">
    <br><br>
    Enter the Branch Name:<input type="text" name="branch" value="">
    <br><br>
    Enter the Branch ID:<input type="number" name="brid" value="">
    <br><br>
    Enter Branch Phone number:<input type="number" name="phone" value="">
    <br><br>
    Enter Total Agents working in the branch:<input type="number" name="agents" value="">
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
    $ph=$_POST["phone"];
    $ag=$_POST["agents"];
    $sql="insert into branch(Branch_id,Branch_name,Phone_number,Total_agents,Company_id) VALUES($brid,'$brn','$ph',$ag,$compid)";
    mysqli_query($conn,$sql) or die($sql."Cannot Insert");
    $max="select * from company where Company_id=$compid";
    $max_res=mysqli_query($conn,$max);
    $row = mysqli_fetch_object($max_res);
    $sql1="update company set Total_branches=$row->Total_branches+1 where Company_id=$compid";
    mysqli_query($conn,$sql1) or die($sql1."Not Able");
  }
   ?>
