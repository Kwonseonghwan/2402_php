<?php
// int : 숫자, 정수
var_dump(123);

// double : 실수
var_dump(3.14);

// string : 문자열
var_dump("abcd");
var_dump('efgh');

// boolean : 논리
var_dump(true, false);

// NULL
var_dump(NULL);

// array : 배열
var_dump([1,2,3]);

// object : 객체
$obj = new Datetime();
var_dump($obj);

// 형변환 : 변수 앞에 (데이터타입) 작성
var_dump((int)'123');
var_dump((string)456);
var_dump((int)"abc"); // 하면 안됨


