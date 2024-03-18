<?php
// for 문
// 특정 처리를 반복해서 구현할때 사용하는 문법
for($i = 0; $i < 3; $i++) {
    // 반복할 처리
    echo $i."번째 루프\n";
}

// 총 10번 도는 루프문을 만들어주세요
for($r = 1; $r < 10; $r++) {
    // if($r === 3) {
    //     break;
    // }
    echo $r."\n";
}
// continue : continue 아래의 처리를 건너뛰고 다음루프로 진행
// for($r = 1; $r < 10; $r++) {
//     if($r === 3 || $r === 6 || $r === 9) {
//         continue;
//     }
//     echo $r."\n";
// }

// 배열 루프
//$arr = [1,2,3,4,5,6,7,8,9,10];
//$loop_cnt = count($arr);
//for($i = 0; $i < $loop_cnt; $i++) {
//    echo $arr[$i];
//}

// 다중루프
// for($i = 1; $i < 3; $i++) {
//     echo "1번 LOOP : ".$i."번째\n";
//     for($z = 1; $z < 3; $z++) {
//         echo "\t2번 LOOP : ".$z."번째\n";
//     }
// }

// 구구단 2단
//$dan = 2;
//for($multi_num = 1; $multi_num < 10; $multi_num++) {
//    $msg_line = $dan." X ".$multi_num." = ".($dan * $multi_num)."\n";
//    echo $msg_line;
//}

// for($dan = 2; $dan < 10; $dan++) {
//    echo "** ".$dan."단 **\n";
//    for($multi_num = 1; $multi_num < 10; $multi_num++) {
//        $msg_line = $dan." X ".$multi_num." = ".($dan * $multi_num);
//        echo $msg_line."\n";
//    }
// }



