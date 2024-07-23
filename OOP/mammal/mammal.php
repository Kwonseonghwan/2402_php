<?php
namespace mammal;

abstract class Mammal {
    protected string $name; //이름
    
    public function __construct($name) {
        $this->name = $name;
    }

    // abstract : 추상 메소드
    abstract public function printRegidence();
}