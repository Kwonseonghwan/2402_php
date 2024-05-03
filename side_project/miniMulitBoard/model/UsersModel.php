<?php

namespace model;

class UsersModel extends Model {
    // 특정 유저를 조회하는 메소드
    public function getUserInfo($paramArr) {
    try {
        $sql = " SELECT * "
            ." FROM users "
            ." WHERE ";

        // WHERE 절 동적 생성
        $arrWhere = [];
        foreach($paramArr as $key => $val) {
            $arrWhere[] = $key." = :".$key;
        }

        // WHERE절 추가
        $sql .= implode(" and ", $arrWhere);

        // 데이터 획득
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($paramArr);
        $result = $stmt->fetchAll();

        return count($result) > 0 ? $result[0] : $result;
    } catch (\Throwable $th) {
        echo "UsersModel -> getUserInfo(), ".$th->getMessage();
        exit;
    }
}

// 회원 정보 인서트
public function addUserInfo($paramArr) {
    try {
        $sql =
            " INSERT INTO users( "
            ." u_email "
            ." ,u_pw "
            ." ,u_name "
            ." ) "
            ." VALUES( "
            ." :u_email "
            ." ,:u_pw "
            ." ,:u_name "
            ." ) "
            ;
            
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($paramArr);

        return $stmt->rowCount();
    } catch (\Throwable $th) {
        echo "UsersModel -> addUserInfo(), ".$th->getMessage();
        exit;
    }
}
}
