<?php
//fetch.php
include("db.php");
$connect = $conn;
$request = mysqli_real_escape_string($connect, $_POST["query"]);
$query = "
 SELECT * FROM lawyers WHERE city LIKE '%".$request."%'
";

$result = mysqli_query($connect, $query);

$data = array();

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row["city"];
 }
 echo json_encode($data);
}

?>
