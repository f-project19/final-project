<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "資料";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("連接數據庫失敗：" . $conn->connect_error);
}
echo `term`;
$term = $_GET["term"];

$sql = "SELECT * FROM 氣候 WHERE 城市 LIKE '%$term%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "降雨量 ";
    echo $row["降雨量"];
    echo "<br><br>"."平均氣溫 ";
    echo $row["平均氣溫"];
    echo "<br><br>"."降雨天數 ";
    echo $row["降雨天數"];
    echo "<br><br>";
  }
} else {
  echo "無查詢結果";
}

$sql = "SELECT * FROM 捷運 WHERE 城市 LIKE '%$term%'";
$result = $conn->query($sql);

if($result->num_rows>0)
{
  while($row=$result->fetch_assoc())
  {
    echo "運輸量 ";
    echo $row["平均日運輸量"];
    echo "<br><br>"."路線數量";
    echo $row["路線數量"];
    echo "<br><br>"."路網長度";
    echo $row["路網長度"];
    echo "<br><br>"."捷運站數量";
    echo $row["捷運站數量"];
  }
}
else
{
  echo "所在城市目前沒有捷運運輸系統 ";
}

$sql = "SELECT * FROM 暴力犯罪 WHERE 城市 LIKE '%$term%'";
$result = $conn->query($sql);

if($result->num_rows>0)
{
  while($row=$result->fetch_assoc())
  {
    echo "<br><br>"."暴力犯罪 ";
    echo $row["暴力案件"];
    echo "<br><br>"."平均幾個人會出現一起暴力案件 ";
    echo $row["平均幾人一個暴力案件"];
    echo "<br><br>";

  }
  
}
else
{
  echo "資料庫中無暴力犯罪相關資料";
}
$sql = "SELECT * FROM 公車 WHERE 城市 LIKE '%$term%'";
$result = $conn->query($sql);

if($result->num_rows>0)
{
  while($row=$result->fetch_assoc())
  {
    echo "公車站牌數 ";
    echo $row["公車站牌數"];
    echo "<br><br>"."縣市面積 ";
    echo $row["縣市面積"];
    echo "<br><br>"."公車密度 ";
    echo $row["公車密度"];
    echo "<br><br>";
  }
}
else
{
  echo "無此城市的公車資訊";
}

echo "餐廳";
$sql = "SELECT * FROM 餐廳 WHERE 城市 LIKE '%$term%'";
$result = $conn->query($sql);

if($result->num_rows>0)
{
  while($row=$result->fetch_assoc())
  {
    echo "<br><br>"."餐廳名稱 ";
    echo $row["餐廳名稱"];
  }
}
else
{
  echo "查無此城市餐廳";
}

$conn->close();
?>
