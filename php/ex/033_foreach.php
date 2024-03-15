<?php
// foreach : 배열을 루프하는데 특화된 반복문, 배열의 길이만큼 루프
// $arr = [9, 8, 7, 6, 5];

// 배열의 값만 이용할 경우
// foreach($arr as $val) {
//     echo $val."\n";
// }







// 배열의 키와 값 모두 이용할 경우
// foreach($arr as $key => $val) {
//     echo "key : $key, value: $val\n"; 
// }

// $arr = [
//     ["name" => "홍길동", "age" => 20,"gender" => "남자"]
//     ,["name" => "갑돌이", "age" => 30,"gender" => "남자"]
//     ,["name" => "갑순이", "age" => 40,"gender" => "여자"]
// ];
// $msg_fomat = "<h3>%s<h3>의 나이는 %d이고, 성별은 %s입니다.<br>";
// name의 나이는 age이고, 성별은 gender입니다.
// foreach($arr as $item) {
//     echo $item["name"]."의 나이는 ".$item["age"]."이고, 성별은 ".$item["gender"]."입니다.\n";
// }

$arr = [
    ["id" => "ID List", "pw" => "php504"]
    ,["id" => "meerkat1", "pw" => "php504"]
    ,["id" => "meerkat2", "pw" => "php504"]
    ,["id" => "meerkat3", "pw" => "php504"]
];

foreach($arr as $val) {
    echo $val["id"] ."\n";
}

$arr = [4,5,7,3,2,9];
$max_num = 0;
$min_num = $arr[0];
foreach($arr as $val) {
    if($max_num < $val) {
        $max_num = $val;
    }
    if($min_num > $val) {
        $min_num = $val;
    }
}
echo $max_num." ".$min_num;


// &arr[id]
// $arr2 = [
//     "name" => "홍길동"
//     ,"age" => "20"
//     ,"gender" => "남자"
// ];








