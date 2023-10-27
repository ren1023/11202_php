<?php
//get的方式接資料
//表單傳資料，預設是傳srting
// $weight=$_GET['weight'];//接收網頁的體重資料(name)
// $height=$_GET['height'];//接收網頁的身高資料(name)
if (!empty($_GET)) {

    $weight = (!empty($_GET['weight']))?$_GET['weight']:0;//為真：$_GET['weight']，為假：則為'0'
    $height = (!empty($_GET['height']))?$_GET['height']:0;
    
    if($weight > 0 && $height > 0 ){
        $bmi =round($weight/($height*$height),2);
        header("location:bmi.php?w=$weight&h=$height&bmi=$bmi");//回到bmi的頁面
    }else{
        header("location:bmi.php?m=請輸入合法的身高和體重資訊");//回到bmi的頁面，產生錯誤訊息
    }

    
    // echo "體重：" . $weight;
    // echo "身高：" . $height;
    // echo "<br>";
    // echo "&nbsp";
    // echo "BMI：".$bmi;

    // header("location:bmi.php?w=$weight&h=$height&bmi=$bmi");//回到bmi的頁面

} else {

    header("location:bmi.php?m=請輸入必要的資訊");//回到bmi的頁面，產生錯誤訊息
    // echo "請輸入必要的資訊";
}







// $height=0/100;

// $bmi=0;
// //BMI＝體重(公斤)÷身高(公尺)÷身高(公尺).

// $weight/height/100
