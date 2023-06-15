<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "資料";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("連接數據庫失敗：" . $conn->connect_error);
}

// 從 POST 請求中獲取要刪除的資料 ID
$id = $_POST['餐廳'];

// 建立 DELETE 語句
$sql = "DELETE FROM 餐廳 WHERE 餐廳名稱 = '$id'";

// 執行 DELETE 語句
if ($conn->query($sql) === TRUE) {
    echo "資料刪除成功";
} else {
    echo "沒有這筆資料: " . $conn->error;
}

// 關閉資料庫連線
$conn->close();
?>