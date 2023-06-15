<?php
    $servername = "localhost";
    $username = "root";
    $password = "123";
    $database = "資料";

    // 创建数据库连接
    $conn = new mysqli($servername, $username, $password, $database);

    // 检查连接是否成功
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } else {
        echo "连接成功！";
    }

    // 关闭数据库连接
    $conn->close();
?>
