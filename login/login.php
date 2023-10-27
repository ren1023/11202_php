<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>
    <style>
        .login-block {}

        .login-input {}

        .btn input[type='input'] {}
    </style>
</head>

<body>
    <h2>會員登入</h2>
    <div class="login-block">
        <?php

        if (isset($_GET['m'])) {
            echo "<span style='color:red'>" . $_GET['m'] . "</span>";
        }
        if(isset($_GET['login'])&&$_GET['login']==1){
            echo "歡迎你";
        }else{
          ?>  
        <form action="check.php" method="POST">
            <div class="login-input">
                <label for="acc">帳號：</label>
                <input type="text" name="acc" id="acc">
            </div>
            <div>
                <label for="pw">密碼：</label>
                <input type="text" name="pw" id="pw">
            </div>
            <div class="btn">
                <input type="submit" value="送出">
                <input type="reset" value="重置">
            </div>
        </form>

        <?php
        }

        ?>
    </div>
</body>

</html>