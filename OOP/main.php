<?php

require_once('./mammal/Whale.php');
require_once('./mammal/FlyingSquirrel.php');
require_once('./Swim.php');
require_once('./Breath.php');
require_once('./fish/saba.php');
use inf\Swim;
use inf\Breath;
use mammal\Whale;
use mammal\FlyingSquirrel;
use fish\Saba;

$WhaleInstance = new Whale('고래');
$WhaleInstance->swimming();

$flyingSquirrelInstance = new FlyingSquirrel('날다람쥐');
$flyingSquirrelInstance->printRegidence();

$sabaInstance = new Saba('고등어');

test($sabaInstance);

function test(Swim $instance) {
    $instance->swimming();
}