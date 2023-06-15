<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "資料";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("連接數據庫失敗：" . $conn->connect_error);
}
$query = "select * from 氣候";

$stmt = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($stmt,MYSQLI_ASSOC)){
    echo $row['城市'].'</br>';
}
?>