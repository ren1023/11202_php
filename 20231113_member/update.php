<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=member";
$pdo=new PDO($dsn,'root','');
// 使用 trim 函數刪除用戶輸入數據的開頭和結尾的空格（以確保數據的一致性）
// 使用 htmlspecialchars 函數對用戶輸入數據進行 HTML 轉義，以防止跨站腳本攻擊（XSS 攻擊）
$acc=htmlspecialchars(trim($_POST['acc']));



$sql = "update `users` set `pw`='{$_POST['pw']}',`name`='{$_POST['name']}',`email`='{$_POST['email']}',`address`='{$_POST['address']}' where `acc`='{$_POST['acc']}'";
                    

// 將新增資料，到資料表
// $sql="update`dept`set`code`= '901',`name`=' 演藝科 ' where`id`='9';";

$result=$pdo-> exec($sql);
echo "$result";


if($result==1){
    header("Location:./index.php");
    echo "更新成功";
exit();

}else{
    echo "請確認資料後，再重新送出";
    header("Location:update.php");
}
?>