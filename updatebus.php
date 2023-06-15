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
$城市 = $_POST['城市'];
$公車站牌數 = $_POST['公車站牌數'];
$縣市面積 = $_POST['縣市面積'];
$公車密度 = $_POST['公車密度'];

// 構建 SQL 查詢語句
$sql = "UPDATE 公車 SET ";

if($公車站牌數 !== "a")
{
  $sql .= "公車站牌數= '$公車站牌數', ";
}
if($縣市面積 !== "a")
{
  $sql .= "縣市面積='$縣市面積', ";
}
if($公車密度 !== "a")
{
  $sql .= "公車密度= '$公車密度', ";
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