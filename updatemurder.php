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
$暴力案件 = $_POST['暴力案件'];
$平均幾人一個暴力案件 = $_POST['平均幾人一個暴力案件'];




// 構建 SQL 查詢語句


$sql = "UPDATE 暴力犯罪 SET ";
if($暴力案件 !== "a")
{
  $sql .= "暴力案件= '$暴力案件', ";
}
if($平均幾人一個暴力案件 !== "a")
{
  $sql .= "平均幾人一個暴力案件= '$平均幾人一個暴力案件', ";
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