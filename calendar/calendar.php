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
            /* border: 1px solid black; */
            padding: 5px 5px;
            text-align: center;
            font-family:Verdana;
            font-size: 30px;
        }

        .title {
            background-color: green;
            width: 50%;
            text-align: center;
            margin: auto;
            font-size: 40px;
            font-family:Verdana;

        }
        .month{
            width: 50%;
            display:flex;
            margin:auto;
            justify-content:space-between;
            align-items: center;
            margin: 20px auto;
            font-size: 25px;
            background-color: lightgreen;
        }

        .tableall{
            display:flex;
            justify-content:center;
            align-items: center;
        }
        .alink{
            background-color: lightgoldenrodyellow;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_GET['month']) && isset($_GET['year'])) {
        $month = $_GET['month'];
        $year = $_GET['year'];
    } else {
        $month = date('m');
        $year = date('Y');
    }
    echo "<div class='title'>";
    echo "<h3>";
    echo date("西元{$year}年 {$month}月");
    echo "</h3>";
    echo "</div>";
    // $thisMonth = date("$month"); //當月份
    $thisFirstDay = date("$year-$month-1"); //該月的第一天
    $thisFirstDate = date("w", strtotime($thisFirstDay)); //該月的第一天是星期幾。
    // $thisMonthDays=date("t",$month);//該月的最後一天是30或31。
    $thisMonthDays = date('t', strtotime("$year-$month")); //該月的最後一天是30或31。
    $thisLastDay = date("$year-$month-$thisMonthDays"); //該月的最後一天日期是幾月幾號。
    $weeks = ceil(($thisMonthDays + $thisFirstDate) / 7); //每個月占幾週，也就是i要印幾列
    $firstCell = date("Y-m-d", (strtotime("-$thisFirstDate days", strtotime($thisFirstDay)))); //計算每月第一個欄位是星期幾：月的第一天日期 - 月的第一個是星期幾(若為星期四，就減4天)
    ?>
    <div >
        <?php
        $nextYear = $year;
        $prevYear = $year;
        if (($month + 1) > 12) {
            $next = 1;
            $nextYear = $year + 1;
        } else {
            $next = $month + 1;
            // $nextYear=$year;
        }
        if (($month - 1) < 1) {
            $prev = 12;
            $prevYear = $year - 1;
        } else {
            $prev = $month - 1;
            // $prevYear=$year;
        }
        ?>
        
        <div class="month">
            <div class="alink">
                <a href="?year=<?= $prevYear; ?>&month=<?= $prev; ?>">上一個月</a>
            </div>
            <div class="alink">
                <a href="?year=<?= $nextYear; ?>&month=<?= $next; ?>">下一個月</a>
            </div>
        </div>

        <div class="tableall">

            <table>
                <tr>
                    <td>日</td>
                    <td>一</td>
                    <td>二</td>
                    <td>三</td>
                    <td>四</td>
                    <td>五</td>
                    <td>六</td>
                </tr>
                <?php
            for ($i = 0; $i < $weeks; $i++) {
                echo "<tr>";
                for ($j = 0; $j < 7; $j++) {
                    $addDays = 7 * $i + $j; //第一列的第一天，啟始累加的天數
                    $thisCellDate = strtotime("+$addDays days", strtotime($firstCell)); //這一天的日期=第一格+累加的天數
                    if (date('w', $thisCellDate) == 0 || date('w', $thisCellDate) == 6) { //星期天和星期六，印粉紅色
                        echo "<td style='background:pink'>";
                    } else {
                        echo "<td>";
                    }
                    // 這個條件是只有在 thisCellDate與當前月份相同時才顯示日期
                    if (date("m", $thisCellDate) == date("m", strtotime($thisFirstDay))) {
                        echo date("j", $thisCellDate); // 顯示日期的數字部分
                    }
                    echo "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            ?>
            </div>

    </div>
</body>

</html>