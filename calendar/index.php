<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>線上月曆</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
        }

        body {
            background: url('./bg_coffee.avif') no-repeat center center fixed;
            background-size: cover;
            animation: fadeInOut 10s linear infinite;
            transition: background-image 20s ease-in-out;
            /* 過渡效果 */
        }

        /* 過渡效果 */
        @keyframes fadeInOut {
            0% {
                /* opacity: 1; */
                /* 初始透明度 */
                /* filter: blur(5px); */
                /* 初始模糊程度為 0 */
            }

            50% {
                /* opacity: 0; */
                /* 透明度設置為 0，達到淡出效果 */
                /* filter: blur(10px); */
                /* 中間模糊程度設置為 5px */
            }

            100% {
                /* opacity: 1; */
                /* 透明度回到初始狀態，圖片回到完全顯示狀態 */
                /* filter: blur(5px); */
                /* 模糊程度為 0 */
            }
        }

        .header {
            /* background-color: lightsalmon; */
            height: 10vh;
        }

        .container {
            /* background-color: lightblue; */
            display: flex;
            justify-content: center;
            align-items: 20px auto;
            width: 70%;
            margin: auto;

        }

        .calendar {
            /* background-color: cadetblue; */
            width: 95%;
            border-radius: 20px 0px 0px 20px;
            height: 70vh;
            background: linear-gradient(to bottom, #c4620a, #ff9933);
            /* border: 1px solid black; */

        }

        .title {
            /* background-color: green; */
            width: 50%;
            text-align: center;
            margin: 30px auto;
            font-size: 30px;
            font-family: Verdana;
            color: wheat;
        }

        .sub_calendar{
            width:95%;
            display: flex;
            justify-content: space-around;
            margin: 20px auto;
            font-size: 20px;
            /* background-color: red; */
            align-items: center;
            margin-top: 60px;
        }

        .alink {
            background-color: lightgoldenrodyellow;

            
        }

        .tableall {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        table {
            /* width: 50%; */
            /* border: 3px double black; */
            margin-bottom: 15px;
        }

        td {
            /* border: 1px solid black; */
            /* padding: 20px 20px; */
            width: 70px;
            height: 70px;
            text-align: center;
            font-family: Verdana;
            font-size: 20px;
            /* text-align-last: auto; */
            text-align: left;
            vertical-align: top;
            background-color: lightpink;
            border-radius: 15px;
            background: linear-gradient(to bottom, #ff9933, #ffcc99);
            

        }

        td:hover { 
            background-color: gray;
         } 

        /* td:hover:nth-child(1),
        td:hover:nth-child(7) {
            background-color: red;
        } */


        .picture {
            /* background-color: blueviolet; */
            border-radius: 0px 20px 20px 0px;
            margin: auto;


        }

        img {
            /* text-align: center; */
            border-radius: 0px 20px 20px 0px;
            height: 70vh;

        }

        .dateheader{
            text-align: center;
            vertical-align: middle;
            color:red;
            font-weight:bolder;
        }

        .datedata{
            color:red;
            background: linear-gradient(to bottom,#FF8080, #FFEBB4);
        }


    </style>
</head>

<body>
    <div class="header">
        bar
    </div>
    <div class="container">

        <div class="calendar">
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
            echo date("{$year}年{$month}月");
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
            <div class="sub_calendar">
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
                <!-- next and last -->
                <!-- <div class="month"> -->
                    <div class="alink">
                        <a href="?year=<?= $prevYear; ?>&month=<?= $prev; ?>">上一個月</a>
                    </div>
                    <div class="tableall">
                    <table>
                        <tr>
                            <td class="dateheader">日</td>
                            <td class="dateheader">一</td>
                            <td class="dateheader">二</td>
                            <td class="dateheader">三</td>
                            <td class="dateheader">四</td>
                            <td class="dateheader">五</td>
                            <td class="dateheader" >六</td>
                        </tr>
                        <?php
                        for ($i = 0; $i < $weeks; $i++) {
                            echo "<tr>";
                            for ($j = 0; $j < 7; $j++) {
                                $addDays = 7 * $i + $j; //第一列的第一天，啟始累加的天數
                                $thisCellDate = strtotime("+$addDays days", strtotime($firstCell)); //這一天的日期=第一格+累加的天數
                                if (date('w', $thisCellDate) == 0 || date('w', $thisCellDate) == 6) { //星期天和星期六，印粉紅色
                                    echo "<td class='datedata'>";
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
                    <div class="alink">
                        <a href="?year=<?= $nextYear; ?>&month=<?= $next; ?>">下一個月</a>
                    </div>
                <!-- </div> -->
                <!-- next and last -->


            </div>
        </div>
        <div class="picture">
            <img src="./coffe.avif" alt="">
        </div>
    </div>

</body>

</html>