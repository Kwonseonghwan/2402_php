<?php
// trim(문자열) : 공백 제거 함수
$str = "   홍길동 ";
echo trim($str);

// strtoupper(문자열) : 영어 대문자 출력
echo strtoupper("asd");
// strtolower(문자열) : 영어 소문자 출력
echo strtolower("ASD");
echo "\n";
// str_replace(대상문자열, 변경문자열) : 특정 문자를 치환
echo str_replace("c","","abc");

// mb_substr(문자열, 시작위치, 출력할 개수) : 문자열을 시작위치에서 종료위치까지 잘라서 반환
$str = "홍길동갑순이";
echo mb_substr($str, 2, 2)."\n";
echo mb_substr($str, 2);

// mb_strpos(대상 문자열, 검색할 문자열) : 검색할 문자열이 있는 위치(int)가 반환
$str = "나는 홍길동 입니다";
echo mb_strpos($str, "홍")."\n";

if(mb_strpos($str, "ㅁ")) {
    echo "포함됨";
}
else {
    echo "없어";
}

// sprintf(포맷문자열, 대입 문자열1, 대입 문자열2...
$base_msg = "%s가 틀렸습니다.";
$print_msg = sprintf($base_msg, "아이디");
echo $print_msg."\n";

// isset(변수) : 변수의 설정 여부 확인 true/false 리턴
$ans1 = "";  // 들어있는
$ans2 = NULL; // 비어있는
$ans3 = 0;
$ans4 = [];
var_dump(isset($ans1), isset($ans2), isset($ans3), isset($ans4),isset($ans5));

// empty(변수) : 변수의 값이 비어있는지 확인, true/false 리턴

var_dump("--",empty($ans1),empty($ans2),empty($ans3),empty($ans4),empty($ans5));

// gettype(변수) : 데이터 타입을 문자열로 반환
$str1 = "abc";
$int1 = 5;
$arr = [];
$double1 = 1.4;
$boo = true;
$null1 = NULL;
$obj = new datetime();
// var_dump(gettype($str1),gettype($int1),gettype($arr1),gettype($double1),gettype($boo),gettype($null1),gettype($obj));

$i = 3;
$i2 = (string)$i;
var_dump($i, $i2);

// settype(변수) : 변수의 데이터 형을 변환, 원본 변수 자체가 변경되므로 주의
$i = 3;
$i2 = settype($i, "string");
var_dump($i, $i2);

// time() : 유닉스 타임스탬프
// echo time();
// echo time()-86400; // 하루전 날짜 획득

// date(포맷형식, 타임스탬프값) : 타임스탬프 값을 날짜 포맷 형식으로 변환해서 반환
echo date("Y-m-d H:i:s", time()); // 2000-01-01 13:50:06 

// ceil(숫자), round(숫자), floor(숫자)
var_dump(ceil(1.4), round(2.5), floor(1.9));

// random_int(시작값, 마지막값) : 시작값~마지막값 범위의 랜덤한 숫자를 반환
echo random_int(1, 10);








