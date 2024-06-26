<?php
namespace App\Utils;

use App\Exceptions\MyAuthException;
use App\Models\User;
use App\Utils\MyEncrypt as UtilsMyEncrypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use MyEncrypt;
use PDOException;

class MyToken {
    /**
     * 액세스 토큰과 리프레시 토큰 생성
     * @param   App\Models\User $userinfo
     * @return  Array [$accessToken, $refreshToken]
     */
    public function createTokens(User $userInfo) {
        $accessToken = $this->createToken($userInfo, env('TOKEN_EXP_ACCESS'));
        $refreshToken = $this->createToken($userInfo, env('TOKEN_EXP_REFRESH'), false);

        return [$accessToken, $refreshToken];
    }
    /**
     * JWT 생성
     * @param   App\Models\User $userInfo
     * @param   int $ttl
     * @param   bool $accessFlg = true
     * @param   string JWT
     */
    private function createToken(User $userInfo, int $ttl, bool $accessFlg = true) {
        $header = $this->makeHeader();
        $payload = $this->makePayload($userInfo, $ttl, $accessFlg);
        $signature = $this->makeSignature($header, $payload);

        return $header.".".$payload.".".$signature;
    }
    /**
     * JWT헤더 작성
     * 
     * @return string base64Header */
    
     private function makeHeader() {
        $header = [
            'alg' => env('TOKEN_ALG'),
            'typ' => env('TOKEN_TYPE')
        ];
        return MyEncrypt::base64UrlEncode(json_encode($header));
     }

     /**
      * JWT 페이로드 작성
      *
      * @param App\Model\User $userInfo
      * @param int $ttl(초 단위)
      * @param bool $accessFlg
      * @param string base64Payload
      */
      public function makePayload(User $userInfo, int $ttl, bool $accessFlg) {
        $now = time(); // 현재시간

        $payload = [
            'idt' => $userInfo->id,
            'iat' => time(),
            'exp' => $now + $ttl, 
            'ttl' => $ttl 
        ];

        // 액세스 토큰일 경우 아래 데이터 추가
        if($accessFlg) {
            $payload['acc'] = $userInfo->account;
            $payload['name'] = $userInfo->name;
        }

        return MyEncrypt::base64UrlEncode(json_encode($payload));
      }

      /**
       * JWT 시그니처 생성
       * @param     string $header base64URL Encode
       * @param     string $payload base64URL Encode
       * @return    string base64Signature
       */
      private function makeSignature(string $header, string $payload) {
        return MyEncrypt::hashWithSalt(env('TOKEN_ALG'), $header.env('TOKEN_SECRET_KEY').$payload,
         MyEncrypt::makeSalt(env('TOKEN_SALT_LENGTH')));
      }

      /**
       * 리프레시 토큰 저장
       * 
       * @param App\Model\User $userInfo 유저정보
       * @param string $refreshToken 리프레시 토큰
       * @return bool true || false
       */
      public function updateRefreshToken(User $userInfo, string $refreshToken) {
        // 유저 모델 객체에 리프레시 토큰 추가
        $userInfo->refresh_token = $refreshToken;

        // 업설트 처리
 
        DB::begintransaction();

        if(!($userInfo->save())) {
            DB::rollBack();
            throw new PDOException();
        }
        DB::commit();
        
        return true;
      }

      /**
       * 토큰의 구조별로 분리
       * 
       * @param string|null $token 베어러 토큰
       * 
       * @return list $header, $payload, $signature
       */
      private function explodeToken($token) {
        $arrToken = explode('.', $token);

        // 토큰 분리 오류 체크
        if(count($arrToken) !== 3) {
            throw new MyAuthException('E24');
        }
        return [$arrToken[0], $arrToken[1], $arrToken[2]];
      }

      /**
       * 페이로드에서 해당하는 키의 값을 반환
       * 
       * @param string $token 토큰
       * @param string $key 키
       * 
       * @return 페이로드에서 추출한 값
       */
      public function getValueInPayload($token, $key) {
        list($header, $payload, $signature) = $this->explodeToken($token);
        $decodedPayload = json_decode(MyEncrypt::base64UrlDecode($payload));

        // 페이로드에 해당 키의 데이터가 있는지 체크
        if(empty($decodedPayload) || !isset($decodedPayload->$key)) {
            throw new MyAuthException('E24');
        }
        return $decodedPayload->$key;
      }

      /**
       * 토큰 유효성 검사
       * 
       * @param string|null $token 베어러 토큰
       * 
       * @return bool|Throwable true|Throwable
       */
      public function chkToken($token) {
        Log::debug('***** chkToken() Start *****');
        // 토큰 존재 유무
        if(empty($token)) {
            throw new MyAuthException('E22');
        }

        // 토큰 위조 검사
        list($header, $payload, $signature) = $this->explodeToken($token);
        if(MyEncrypt::subSalt($this->makeSignature($header, $payload), env('TOKEN_SALT_LENGTH'))
        !== MyEncrypt::subSalt($signature, env('TOKEN_SALT_LENGTH'))) {
            throw new MyAuthException('E23');
        }

        Log::debug($signature);
        Log::debug($this->makeSignature($header, $payload));

        // 유효시간 체크
        if($this->getValueInPayload($token, 'exp') < time()) {
            throw new MyAuthException('E26');
        }

        return true;
      }

      /**
       * DB에 저장된 리프레시 토큰 삭제
       * 
       * @param App\Model\User $userInfo 대상유저 모델객체
       * 
       * @return bool|Throwable true|Throwable
       */
      public function removeRefreshToken($userInfo) {
        DB::beginTransaction();
        $userInfo->refresh_token = null;
        $userInfo->save();
        DB::commit();

        return true;
      }
}                                                                                    
