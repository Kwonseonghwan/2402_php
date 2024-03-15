<?php

for($a = 1; $a < 6; $a++) {
    for($b = 1; $b < 6;$b++){
    echo "*";} echo "\n";
} 
echo "\n";

for($a = 1; $a < 7; $a++) {
    for($b = 1; $b < $a; $b++) {
        echo "*";   
    } 
    echo "\n";
}

// if문
$num = 5;
for($a = 1; $a <= $num; $a++) {
    $cnt_space = $num - $a;
    for($b = 1; $b <= $num; $b++) {
        if($b <= $cnt_space) {
            echo " ";
        }
        else {
            echo "*";
        }
    }
    echo "\n";
}
// for문
for($a = 0; $a < $num; $a++) {
    for($b = 1; $b < $num - $a; $b++) {
        echo " ";
    }
    // 별찍는 for문
    for($c = 0; $c <= $a; $c++) {
        echo "*";
    }
    echo "\n";
}

