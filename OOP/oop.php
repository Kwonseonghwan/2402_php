<?php
class Mammal {
    protected $name;
    protected $residence;

    // 생성자
    public function __construct(string $name, string $residence) {
        $this->name = $name;
        $this->residence = $residence;
    }

    final public function breath() {
        echo $this->name."는 폐호흡을 합니다.\n";
    }
}

class Whale extends Mammal {
    public function __construct() {
        echo "고래 클래스 입니다.\n";
        parent::__construct("고래", "바다");
    }

    public function swimming() {
        echo $this->name."가 헤엄을 칩니다.\n";
    }
    // public function breath() {
    //     echo $this->name."는 폐호흡을 하고 숨을 잘 참습니다.";
    // }
}

class FlyingSquirrel extends Mammal {
    public function flying() {
        echo $this->name."가 날아갑니다.\n";
    }
}

$WhaleInstance = new Whale();

$WhaleInstance->breath();

// ---------------------------------------------------------

class Fish {
    protected $name;
    protected $residence;

    // 생성자
    public function __construct(string $name, string $residence) {
        $this->name = $name;
        $this->residence = $residence;
    }

    final public function breath() {
        echo $this->name."는 아가미 호흡을 합니다.\n";
    }

    public function swimming() {
        echo $this->name."가 헤엄을 칩니다.\n";
    }
}

class Saba extends Fish {
}

class FlyingFish extends Fish {
    public function flying() {
        echo $this->name."가 날아갑니다.\n";
    }
}

$sabaInstance = new Saba("고등어", "바다");
$sabaInstance->breath();