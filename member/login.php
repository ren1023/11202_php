<?php include_once "session.php";?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>
    <style>
        .login-block {
            /* display:flex;
            justify-content: center;
            align-items: baseline; */
            padding: 30px 40px;
            border: 2px solid #999;
            box-shadow: 2px 2px 15px #999;
            border-radius: 10px;
            margin: 10px auto;
            width:280px;

        }

        .login-input {
            margin: 10px;

        }

        .login-input input[type='text']{
            border: 1px solid blue;
            /* margin-bottom: 20px; */
        }

        .login-input input,.login-input label{
            font-size: 20px;
            /* margin-bottom: 20px; */
            padding: 5px;
        }



        .btn{
            text-align: center;
            margin-top: 15px;
        }

        .btn input[type='submit'],
        input[type='reset'] {
            padding: 5px 10px;
            border: 1px solid green;
            border-radius: 5px;
            margin: 5px;

        }

    </style>
</head>

<body>
    <?php include_once "header.php";?>
    <div class="login-block">
        <?php
        if (isset($_SESSION['error'])) {
            echo "<span style='color:red'>" . $_SESSION['error'] . "</span>";//在client端顯示
            unset($_SESSION['error']);//刪除server端的session

        }
        if(isset($_SESSION['login'])&& !empty($_SESSION['login'])){
            
            echo $_SESSION['login']."歡迎你";
            // echo "<a href ='logout.php'>登出 </a>";

        }else{
          ?>  
        <form action="check.php" method="POST">
            <div class="login-input">
                <label for="acc">帳號：</label>
                <input type="text" name="acc" id="acc">
            </div>
            <div class="login-input">
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