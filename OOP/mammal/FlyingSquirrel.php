<?php
namespace mammal;

require_once('./mammal/Mammal.php');

use mammal\Mammal;

// 날다람쥐 클래스
class FlyingSquirrel extends Mammal {
    // private string $name; //이름
    // public function __construct($name) {
    //     $this->name = $name;
    // }
    // 부모에서 abstract로 만들었기 때문에 자식에서 무조건 재정의를 해야됨.
    public function printRegidence(){
        echo $this->name . '는 산에 삽니다.';
    }
    
    public function flying(){
        echo $this->name . '가 날아갑니다.';
    }
}