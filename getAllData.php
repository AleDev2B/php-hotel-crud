<?php

header('Content-Type: application/json');
$server = 'localhost';
$username = 'root';
$password = 'root';
$dbName = 'HotelDB';
$conn = new mysqli($server, $username, $password, $dbName);
if ($conn -> connect_errno) {
   echo $conn -> connect_errno;
   return;
}
$sql = '
   SELECT price, prenotazione_id, pagante_id FROM `pagamenti` WHERE status LIKE "accepted"
   ';
$results = $conn -> query($sql);
if ($results -> num_rows < 1) {
   echo "no result";
   return;
}
$res = [];
while ($row = $results -> fetch_assoc()) {
   $res[] = $row['price'] . " " . $row['prenotazione_id'] . " ". $row['pagante_id']. " ";
}
$conn -> close();

echo json_encode($res);

 ?>
