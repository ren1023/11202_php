<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 會員註冊 </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</head>

<div id=app class="container">

    <body>
        <h2> 會員註冊 </h2>
        <form action="./add_user.php" method="post">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="acc" class="form-label"> 帳號：</label>
                        <input class="form-control" type="text" name="acc" id="acc">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="pw" class="form-label"> 密碼：</label>
                        <input class="form-control" type="password" name="pw" id="pw">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-log-12">
                    <div class=" mb-3">
                        <label for="name" class="form-label"> 姓名：</label>
                        <input class="form-control" type="text" name="name" id="name">
                    </div>

                </div>
            </div>








            <div class="input-group mb-3">
                <label class="input-group-text"> 電子郵件：</label>
                <input class="form-control" type="text" name="email" id="email">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text"> 居住地：</label>
                <input class="form-control" type="text" name="address" id="address">
            </div>
            <div class="input-group mb-3">
                <input type="submit" value="送出">
                <input type="reset" value="重置">
            </div>
        </form>
    </body>
</div>

</html>