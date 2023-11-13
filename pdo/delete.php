<?php

// 設置資料庫連接
$dsn = "mysql:host=127.0.0.1;charset=utf8;dbname=school";
$pdo = new PDO($dsn, 'root', ''); // 使用 PDO 創建資料庫連接

// 將資料刪除，資料表
$sql="delete from `dept` where `id`='9';";

// $pdo -> query($sql);//不會有回傳任何值
echo $pdo -> exec($sql);//會有回傳影響資料的筆數








?>