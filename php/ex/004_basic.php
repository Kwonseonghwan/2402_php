<?php
// 변수(Variable)
// $str = "안녕 php";
// echo $str;

// 한글로도 설정이 가능하나, 사용하지 말자
// $숫자1 = 1;
// echo $숫자1;

// $suer_name;

// $Num = 1;
// $num = 2;
// echo $Num, $num;

// 네이밍 기법
// 스네이크 기법
$user_name;

// 카멜 기법
$userName;

// echo "\n";
// 상수 : 절대 변하지 않는 값
// define("USER_AGE", 20);

// define("USER_AGE", 30); // 이미 선언된 상수이므로 워닝 일어나고 값이 바뀌지 않음

// echo USER_AGE;

// 점심메뉴
$menu = "점심메뉴\n";

$tang = "탕수육 9000원\n";

$hamburger = "햄버거 10000원\n";

$bread = "빵 9000원";
echo $menu, $tang, $hamburger, $bread;

define("MENU", "점심메뉴\n");
echo MENU;

// 스왑 
$swap1 = "곤드레밥";
$swap2 = "짜장면";
$tmp = "";

$tmp = $swap1;
$swap1 = $swap2;
$swap2 = $tmp;

echo $swap1;
echo $swap2;

