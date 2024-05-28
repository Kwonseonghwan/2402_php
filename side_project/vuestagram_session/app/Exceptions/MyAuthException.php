<?php
namespace App\Exceptions;

use Exception;

class MyAuthException extends Exception {
    // 에러메세지 리스트
    // @return Array 에러메세지 배열
    public function context() {
        return [
            'E20' => ['status' => 401, 'msg' => '미등록 유저'],
            'E21' => ['status' => 401, 'msg' => '비밀번호 불일치'],
            'E22' => ['status' => 401, 'msg' => '미인증 유저'],
            'E23' => ['status' => 401, 'msg' => '사용 불가능 토큰'],
            'E24' => ['status' => 401, 'msg' => '토큰 정보 오류'],
            'E25' => ['status' => 401, 'msg' => '유효하지 않은 토큰'],
            'E26' => ['status' => 401, 'msg' => '만료된 토큰'],
        ];
    }
}