<!DOCTYPE html>
<html>
<head>
    <title>오늘 날짜의 달력</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: transparent;
            padding: 10px;
            text-align: center;
        }
        a {
            text-decoration: none;
            color: black;
        }
        a:hover {
            background-color: lightgray;
        }
        .top-image {
            width: 30%;
            padding: 30px 30px;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
<h2><?php echo date('Y년 n월'); ?></h2>
<table>
    <div style="background-image: url(./mini_board/doc/ERD/image.png);" class="top-image">
    <tr>
        <th>일</th>
        <th>월</th>
        <th>화</th>
        <th>수</th>
        <th>목</th>
        <th>금</th>
        <th>토</th>
    </tr>
</div>
    <?php
    // 오늘 날짜 가져오기
    $today = date('Y-m-d');
    
    // 오늘 날짜로부터 해당 월의 첫 번째 날과 마지막 날 구하기
    $first_day = strtotime(date('Y-m-01', strtotime($today)));
    $last_day = strtotime(date('Y-m-t', strtotime($today)));

    // 첫 날의 요일 구하기 (0: 일요일, 1: 월요일, ..., 6: 토요일)
    $start_day_of_week = date('w', $first_day);

    // 마지막 날의 날짜 구하기
    $last_date = date('j', $last_day);

    // 달력 출력을 위한 행과 열의 개수 설정
    $rows = 6;
    $cols = 7;

    // 달력 출력
    $day_count = 1;
    for ($row = 1; $row <= $rows; $row++) {
        echo "<tr>";
        for ($col = 1; $col <= $cols; $col++) {
            if (($row == 1 && $col <= $start_day_of_week) || ($day_count > $last_date)) {
                echo "<td></td>";
            } else {
                // 각 날짜에 링크를 추가하여 클릭 시 해당 날짜로 이동하도록 합니다.
                echo "<td><a href='somepage.php?date={$day_count}'>{$day_count}</a></td>";
                $day_count++;
            }
        }
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>