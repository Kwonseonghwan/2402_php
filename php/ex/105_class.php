<?php

// class : 동종의 객체들을 모아 정의한 것
// 관습적으로 파일명과 클래스명을 동일하게 지어준다.
class Whale {
    // 프로퍼티
    // 접근 제어 지시자
    // public       : class 외부, 내부 어디에서나 접근 가능
    public $str;
    // private      : class 내부에서만 접근 가능, 외부는 접근 불가능
    private $i;
    // protected    : class 내부에서만 접근 가능, 외부는 접근 불가능, 단, 상속관계에서는 접근 가능
    protected $boo;

    private $name;

    // 생성자 메소드
    public function __construct($name) {
        $this->name = $name;
    }

    // getter / setter : private이나 protected로 설정된 프로퍼티에 접근을 위해 사용하는 메소드
    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }

    // 메소드
    public function swim($opt) {
        echo $opt.$this->name." 헤엄.\n";
    }
    public function breathe() {
        echo $this->name." 호흡.\n";
    }
}
// 클래스 인스턴스 생성
$obj_whale = new Whale("고래");
$obj_whale->swim("흰 ");
echo $obj_whale->getName()."\n";
$obj_whale->breathe();

$obj_whale->setName("참새");
$obj_whale->swim("흰 ");
$obj_whale->breathe();

// shark 클래스를 만들어주세요
// 프로퍼티 : private $name
// 생성자 메소드 : Whale 클래스와 동일
// 메소드 : public swim, public breathe

class Shark {
    private $name;
    // 생성자
    public function __construct($name) {
        $this->name = $name;
    }
    // 메소드
    public function swim() {
        echo $this->name." 헤엄.\n";
    }
    public function breathe() {
        echo $this->name." 호흡.\n";
    }
    // static 메소드 : 인스턴스 생성 없이 사용할 수 있는 메소드
    public static function big() {
        echo " 매우 크다.";
    }
}
// 인스턴스 생성
$objShark = new Shark("상어");
$objShark ->breathe();
$objShark ->swim();

// static 메소드 호출
Shark::big();