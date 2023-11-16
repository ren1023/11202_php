<?php
session_start();
$acc=$_POST['acc'];
$pw=$_POST['pw'];

$dsn="mysql:host=localhost;charset=utf8;dbname=member";
$pdo=new PDO($dsn,'root','');

$sql="select * from users where `acc`='$acc' && `pw`='$pw'";

// $user=$pdo-> query($sql)->fetch();
$user=$pdo->query($sql)->fetchColumn();

// if($user['acc']== $acc && $user['pw']==$pw){
    if ($user){
   
    $_SESSION['user']=$acc;
    header("location:./index.php");
    

}else{
    header('location:./login_form.php?error=帳號密碼錯誤');
}
?>