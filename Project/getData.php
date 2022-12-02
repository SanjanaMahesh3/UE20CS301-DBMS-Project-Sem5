<?php
include "connection.php";

$sql = "select * from customer group by Agent_code";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($connection));

$array = array();
$i = 0;
while($row = mysqli_fetch_assoc($result))
{
    $orgname = $row['Agent_code'];
    $count = $row['Customer_id'];
    $array['cols'][] = array('type' => 'string');
    $array['rows'][] = array('c' => array( array('v'=> $orgname), array('v'=>(int)$count)) );
}
$data = json_encode($array);
echo $data;
?>
