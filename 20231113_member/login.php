<?php
include_once "../20231113_member/include/connect.php";

$acc=$_POST['acc'];
$pw=$_POST['pw'];



$sql="select * from users where `acc`='$acc' && `pw`='$pw'";

// $user=$pdo-> query($sql)->fetch();
$user=$pdo->query($sql)->fetchColumn();


// echo $user=$pdo->query($sql)->fetchColumn();//for debug
// exit();//for degup

// if($user['acc']== $acc && $user['pw']==$pw){
    if ($user){
   
    $_SESSION['user']=$acc;
    header("location:./index.php");
    

}else{
    header ('location:./login_form.php?error = 帳號密碼錯誤 ');
}
?>