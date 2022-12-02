<html>
<body>
  <link href = "style.css" type = "text/css" rel = "stylesheet" />
  <h1 >SQL execution window</h1>
  <form class="form1" method="post">
    Enter the sql statement:<input type="text" name="sql" val="">
    <br><br>
    <input type="submit" name="submit" value="submit">
  </form>
  <?php
  include "connection.php";
  if(isset($_POST["submit"]))
  {
    $sql=$_POST["sql"];
    $result = mysqli_query($conn, $sql); 
    echo "<br>";
    echo "<table border='1'>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $field => $value) {
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
  }
   ?>
