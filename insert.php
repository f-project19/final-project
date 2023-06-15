<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "資料";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("連接數據庫失敗：" . $conn->connect_error);
}

// 從POST請求中獲取要插入的資料
$Name = $_POST['Name'];
$Region = $_POST['Region'];

// 建立INSERT語句
$sql = "INSERT INTO 餐廳(餐廳名稱, 城市) VALUES ('$Name', '$Region')";

// 執行INSERT語句
if ($conn->query($sql) === TRUE) {
    echo "資料插入成功";
} else {
    echo "插入資料失敗: " . $conn->error;
}
// 關閉資料庫連接
$conn->close();
?>