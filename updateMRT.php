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

## 捷運
$城市 = $_POST['城市'];
$路線數量 = $_POST['路線數量'];
$平均日運輸量 = $_POST['平均日運輸量'];
$捷運站數量 = $_POST['捷運站數量'];
$路網長度 = $_POST['路網長度'];




// 構建 SQL 查詢語句


$sql = "UPDATE 捷運 SET ";
if($平均日運輸量 !== "a")
{
  $sql .= "平均日運輸量='$平均日運輸量', ";
}
if($路線數量 !== "a")
{
  $sql .= "路線數量='$路線數量', ";
}
if($捷運站數量 !== "a")
{
  $sql .= "捷運站數量='$捷運站數量', ";
}
if($路網長度 !== "a")
{
  $sql .= "路網長度='$路網長度', ";
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