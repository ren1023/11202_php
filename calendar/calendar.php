<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>線上月曆</title>
    <style>
        table {
            width: 50%;
            border: 3px double black;
        }

        td {
            border: 1px solid black;
            padding: 5px 10px;
            text-align: center;
            font-family: Cambria, Cochin;
            font-size: 30px;
        }

        tr>td {
            background-color: #dedbdb;
        }

        .td1 {
            background-color: pink;
        }

        .td2 {
            background-color: pink;
        }
    </style>
</head>

<body>
    <?php

    // $month=9;

    if (isset($_GET['month']) && isset($_GET['year'])) {
        $month = $_GET['month'];
        $year=$_GET['year'];
    } else {
        $month = date('m');
        $year=date('Y');
    }

    // if (isset($_GET['month'])) {
    //     $month = $_GET['prev'];
    // }
    // $year = 2023;
    echo "<h3>";
    echo "西元 {$year} 年 {$month} 月";
    echo "</h3>";

    $thisMonth = date("$month"); //當月份
    $thisFirstDay = date("$year-$month-1"); //該月的第一天
    $thisFirstDate = date("w", strtotime($thisFirstDay)); //該月的第一天是星期幾。
    // $thisMonthDays=date("t",$month);//該月的最後一天是30或31。
    $thisMonthDays = date('t', strtotime("$year-$month")); //該月的最後一天是30或31。
    $thisLastDay = date("$year-$month-$thisMonthDays"); //該月的最後一天日期是幾月幾號。
    $weeks = ceil(($thisMonthDays + $thisFirstDate) / 7); //每個月占幾週，也就是i要印幾列
    $firstCell = date("$year-m-d", (strtotime("-$thisFirstDate days", strtotime($thisFirstDay)))); //計算每月第一個欄位：月的第一天日期 - 月的第一個是星期幾幾(若為星期四，就減4)
    ?>
    <div class="container">
        <?php
        $nextYear=$year;
        $prevYear=$year;
        if(($month+1)>12){
            $next=1;
            $nextYear=$ear+1;
        }else{
            $next=$month+1;
            // $nextYear=$year;
        }

        if(($month-1)<1){
            $prev=12;
            $prevYear=$year-1;
        }else{
            $prev=$month-1;
            // $prevYear=$year;
        }


        ?>
        <a href="?<?=$prevYear;?>&month=<?= $prev; ?>">上一個月</a>
        <a href="?<?=$nextYear;?>&month=<?= $next; ?>">下一個月</a>
        <table>
            <tr>
                <td>日</td>
                <td>一</td>
                <td>二</td>
                <td>三</td>
                <td>四</td>
                <td>五</td>
                <td>六</td>
    </div>
    <?php
    for ($i = 0; $i < $weeks; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 7; $j++) {

            $addDays = 7 * $i + $j; //第一列的第一天，啟始累加的天數
            $thisCellDate = strtotime("+$addDays days", strtotime($firstCell)); //這一天的日期=第一格+累加的天數

            if (date('w', $thisCellDate) == 0 || date('w', $thisCellDate) == 6) { //星期天和星期六，印粉行色
                echo "<td style='background:pink'>";
            } else {
                echo "<td>";
            }
            if (date("m", $thisCellDate) == date("m", strtotime($thisFirstDay))) { //同月則顯示
                echo date("j", $thisCellDate);
            }
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>


</body>

</html>