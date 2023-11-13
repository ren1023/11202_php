<?php

// 設置資料庫連接
$dsn = "mysql:host=127.0.0.1;charset=utf8;dbname=school";
$pdo = new PDO($dsn, 'root', ''); // 使用 PDO 創建資料庫連接

// 將新增資料，到資料表
$sql="update `dept` set `code`= '901', `name`='演藝科' where `id`='9';";

// $pdo -> query($sql);//不會有回傳任何值
echo $pdo -> exec($sql);







?>