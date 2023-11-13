<?php

// 設置資料庫連接
$dsn = "mysql:host=127.0.0.1;charset=utf8;dbname=school";
$pdo = new PDO($dsn, 'root', ''); // 使用 PDO 創建資料庫連接

// 將新增資料，到資料表
// $sql="insert into `dept` (`code`,`name`) values ('801','會計科');";
$sql="insert into `classes` (`code`,`name`,`tutor`) values ('111','一年十一班','林真真');";
$pdo -> query($sql);//不會有回傳任何值








?>