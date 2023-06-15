<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "資料";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("連接數據庫失敗：" . $conn->connect_error);
}

// 從表單中獲取要更新的資料
$降雨量 = $_POST['降雨量'];
$城市 = $_POST['城市'];
$降雨天數 = $_POST['降雨天數'];
$平均氣溫 = $_POST['平均氣溫'];


// 構建 SQL 查詢語句
$sql = "UPDATE 氣候 SET ";
if ($降雨量 !== "a") {
  $sql .= "降雨量='$降雨量', ";
}
if ($降雨天數 !== "a") {
  $sql .= "降雨天數='$降雨天數', ";
}
if ($平均氣溫 !== "a") {
  $sql .= "平均氣溫='$平均氣溫', ";
}


// 移除 SQL 查詢語句末尾的逗號和空格
$sql = rtrim($sql, ", ");

// 添加 WHERE 條件
$sql .= " WHERE 城市='$城市'";

// 執行更新操作
if ($conn->query($sql) === true) {
  echo '資料更新成功！';
} else {
  echo '資料更新失敗：' . $conn->error;
}

$conn->close();
?>