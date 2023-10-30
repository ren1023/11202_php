<?php
if(($_POST['acc']=='admin') && ($_POST['pw']=='1234')) {
    //設定cookie時間5分鐘後過期。
   setcookie("login","mackliu",time()+300);
    //導到member頁面
    header("location:member.php");
}else{
    //設定cookie時間5秒後過期。
    setcookie("error","帳號或密碼錯誤，請重新登入",time()+5);
    // $_SESSION['error']="帳號或密碼錯誤，請重新登入";
    header("location:login.php?");

}
