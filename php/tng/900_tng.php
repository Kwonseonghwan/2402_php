<?php
// 1~100까지의 숫자
// 3의 배수를 제외
// ex
// 1입니다
// 2입니다
// 4입니다
// ...
// 100입니다.


for($i = 1; $i < 101; $i++) {
  if($i %3 == 0) {
    continue; 
}
  echo $i."입니다\n";
}




$arr = range(1, 100);
foreach($arr as $val) {
  if(($val % 3) === 0) {
    continue;
  }
  echo $val."입니다\n";
}








