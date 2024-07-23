<?php
namespace mammal;

require_once('./Swim.php');
require_once('./mammal/Mammal.php');

use mammal\Mammal;
use inf\Swim;

// 고래 클래스
class Whale extends Mammal implements Swim {
    // private string $name; //이름
    // public function __construct($name) {
    //     $this->name = $name;
    // }
    // 부모에서 abstract로 만들었기 때문에 자식에서 무조건 재정의를 해야됨.
    public function printRegidence(){
        echo $this->name . '는 바다에 삽니다.';
    }

    public function swimming(){
        echo $this->name . '가 헤엄칩니다.';
    }
}