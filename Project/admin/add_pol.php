<html>
<body>
  <h1 class="head1">Add Policy</h1>
  <link href = "style3.css" type = "text/css" rel = "stylesheet" />
  <form class="form1" method="post">
    Enter the Policy you want to add:<input type="text" name="type" value="">
    <br><br>
    <input type="submit" name="submit" value="submit">
  </form>

  <?php
  include "connection.php";
  if(isset($_POST["submit"]))
  {
    $name=$_POST["type"];
    $max="select * from types";
    $max_res=mysqli_query($conn,$max);
    $row = mysqli_fetch_object($max_res);
    if($row->Availability=='No' && $row->Name==$name)
    {
      $ans='Yes';
      $sql="update types set Availability='$ans' where Name='$name'";
      mysqli_query($conn,$sql) or die($sql."Cannot Update");
      echo "Policy Adding success";
    }
    else{
      echo "Policy Already Available";
    }
  }
   ?>
