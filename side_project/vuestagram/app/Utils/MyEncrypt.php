<?php
namespace App\Utils;

use Illuminate\Support\Str;

class MyEncrypt {
    /**
     * base64 URL 인코드
     * 
     * @param   string $json
     * @return  string base64 URL encode
     */
    public function base64UrlEncode(string $json) {
        return rtrim(strtr(base64_encode($json), '+/', '-_'), '=');
    }

    /**
     * base64 URL 디코드
     * 
     * @return  string base64 URL encode
     * @param   string $json
     */
    public function base64UrlDecode(string $base64) {
        return base64_decode(strtr($base64, '-_', '+/'));
    }

    /**
     * 암호화한 문자열 생성
     * 
     * @param     string $alg 알고리즘명
     * @param     string $str 암호화할 문자열
     * @param     string $salt 솔트
     * @param     string 암호화 된 문자열
     */
    public function hashWithSalt(string $alg, string $str, string $salt='') {
      return hash($alg, $str).$salt;
    }

    /**
     * 특정 길이 만큼의 랜덤한 문자열 생성
     * 
     * @param     int $saltLength
     * @param     string 랜덤문자열
     */
    public function makeSalt($saltLength) {
      return Str::random($saltLength);
    }
}