<?php

// 設置資料庫連接
$dsn = "mysql:host=127.0.0.1;charset=utf8;dbname=school";
$pdo = new PDO($dsn, 'root', ''); // 使用 PDO 創建資料庫連接

// 準備 SQL 查詢語句
$sql = "select * from `students`";

// 使用 PDO 執行 SQL 查詢並獲取所有結果行
$rowsall = $pdo->query($sql)->fetchAll();

// 將sql查詢結果的陣列資料，存到$source裡
$source=$pdo->query($sql);
// 只會撈到一筆資料，fetch表示取得已存在的資料
$rows1 = $source->fetch();
// 下第二次，會撈到下一筆資料，fetch表示取得已存在的資料
$rows2 = $source->fetch();
// 輸出結果，使用 <pre> 標籤格式化輸出，方便閱讀
echo "<pre>";
print_r($rows1); // 將查詢結果第一筆輸出到網頁上
print_r($rows2); // 將查詢結果第二筆輸出到網頁上
echo "</pre>"; // 關閉 <pre> 標籤

echo "-------";

echo "<pre>";
echo "fetchALL的結果：";
print_r($rowsall[0][2]);
print_r($rowsall[0]['parents']); 
echo "</pre>"; 
// 






?>