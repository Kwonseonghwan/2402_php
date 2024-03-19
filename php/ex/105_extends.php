<?php
// 상속 : 부모클래스의 자원을 자식클래스가 물려받아 사용하거나 재정의

class Parents {
    protected $name;

    public function __construct() {
        echo "부모 클래스 생성자 실행\n";
    }

    private function home() {
        echo "집은 부모님 거";
    }
    public function car () {
        echo "차는 부모님 자식 다.\n";
    }
}
class Child extends Parents {

    public function __construct($name) {
        $this->name = $name;
        echo "자식 클래스\n";
    }

    public function dog() {
        echo "강아지는 제거\n";
    }

    // 오버라이딩
    public function car() {
        echo "자동차는 제거\n";
    }

    public function getName() {
        echo $this->name;
    }
}

$obj = new Child("홍길동");
$obj->car();
$obj->getName();