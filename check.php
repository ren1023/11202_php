<?php
if(($_POST['acc']=='admin') && ($_POST['pw']=='1234')) {
    header("location:member.php?login=1");
    echo "登入成功";
}else{
    header("location:login?m=帳號或密碼錯誤，請重新登入");
    // echo "帳號或密碼錯誤，請重新登入";
}
// print_r($_POST);
?>
