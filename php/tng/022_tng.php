<?php

$num = 5; // 점수 저장용

// if($num === 100) {
//     echo "당신의 점수는".$num."입니다.<A+>";
// }
// else if($num >= 90 && $num < 100) {
//     echo "당신의 점수는".$num."입니다<A>";
// }
// else if($num >= 80 && $num < 90) {
//     echo "당신의 점수는".$num."입니다<B>";
// }
// else if($num >= 70 && $num < 80) {
//     echo "당신의 점수는".$num."입니다<C>";
// }
// else if($num >= 60 && $num < 70) {
//     echo "당신의 점수는".$num."입니다<D>";
// }
// else if($num >= 0 && $num < 60) {
//     echo "당신의 점수는".$num."입니다<F>";
// }
// else {
//     echo "잘못된 값을 입력 했습니다";
// }
$grade = ""; // 등급 저장용
$str_print = "당신의 점수는 %u점 입니다. <%s>"; // 정상 출력 포맷
$str_print_err = "잘못된 값을 입력 했습니다.";
if($num >= 0 && $num <= 100) {
    if($num === 100) {
        $grade = "A+";
    }
    else if($num >= 90) {
        $grade = "A";
    } 
    else if($num >= 80) {
        $grade = "B";
    }
    else if($num >= 70) {
        $grade = "C";
    }
    else if($num >= 60) {
        $grade = "D";
    }
    else {
        $grade = "F";
    }
    $msg = sprintf($str_print, $num, $grade);
}
// echo sprintf($str_print, $num, "F");





echo $msg;



