<?php
$resultArray = array();//array voor de query Output



//if(     isset( $_GET['q']) && trim( $_GET['q'])!=''
  // && isset( $_GET['type']) && trim( $_GET['type'])!='')
  //{
$search = $_GET['q'];
$type = $_GET['type'];
//}
//echo $type;
//cho '<br>';
//echo $search;


$connection = mysqli_connect("localhost","root","usbw","world") or die ("sql connection failed");
if (!$connection) {
  echo "connection failed";
}
mysqli_select_db($connection,"world");
$sql = "SELECT * FROM Country WHERE name LIKE '$search%' " or die ("query failed");
if ($type == "list") {
  $result = mysqli_query($connection,$sql);
  while ($row = mysqli_fetch_array($result)) {
    $resultArray[]=$row["Name"];
  }
  echo json_encode($resultArray);

}

if ($type == "answer") {
  $result = mysqli_query($connection,$sql);
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
  $resultArray[]=$row;
}
echo json_encode($resultArray);

}
mysqli_close($connection);
 ?>
