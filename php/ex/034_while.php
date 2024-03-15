<?php
// while 문
$cnt = 0;
while($cnt < 3) {
    echo "count : $cnt \n";
    $cnt++;
}

$cnt = 0;
while(true) {
    $cnt++;
    if($cnt === 3) {
        break;
    }
}

// while 이용해서 2단 출력
// 2 X 1 = 2
// 2 X 2 = 4


$num = 0;
while($num < 9) {
    $num++;
   echo "2 x ".$num." = ".(2*$num)."\n";
}


$dan = 2;
$multi_num = 1;
while($dan < 10) {
    echo $dan."단\n";
    $multi_num = 1;
    while($multi_num < 10) {
        echo $dan." X ".$multi_num." = ".($dan * $multi_num)."\n";
        $multi_num++;
    }
    $dan++;
}
















