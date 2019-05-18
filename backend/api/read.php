<?php
/**
 * Returns the list of objects.
 */
require 'database.php';

$table = $_GET["resource"];
$objects = [];
$sql = "SELECT * FROM $table";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $objects[$i]    = $row;

    $i++;
  }

  echo json_encode($objects);
}
else
{
  http_response_code(404);
}