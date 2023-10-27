<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員中心</title>
</head>
<body>
    <h2>歡迎您登入成功</h2>
    <?php
    if($_GET['login']== 1){
        echo "<h3>歡迎您登入成功</h3>";
        echo "<a href='login.php?login=1'>回登入頁</a>";
    }else{
        header("location:login.php");
        // echo "沒有登入相關驗證，非法登入";
    }



    ?>
</body>
</html>