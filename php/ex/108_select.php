<?php
require_once("./lib_db.php");
$limit = 5;
try {
    $conn = db_conn(); // PDO객체 리턴 함수 호출
    
    // 쿼리작성
    // placeholder 셋팅이 없는 경우
    // $sql = " SELECT * FROM employees LIMIT 5 ";
    // $stmt = $conn->query($sql); // 쿼리 준비 + 실행
    // $result = $stmt->fetchAll(); // 질의 결과 패치

    // placeholder 셋팅이 필요한 경우
    $sql = " SELECT * FROM employees LIMIT :limit OFFSET :offset  ";
    $arr_prepare = [
        "limit" => $limit
        ,"offset" => 10
    ];
    $stmt = $conn->prepare($sql); // 쿼리 준비
    $stmt->execute($arr_prepare); // 쿼리 실행
    $result = $stmt->fetchAll(); // 질의 결과 패치 
    
    print_r($result);
} catch (Throwable $e) {
    echo "예외 발생 : ".$e->getMessage()."\n";
} finally {
    $conn = null; // PDO 파기
}
echo "-------------------------------\n";

// 사번 10001, 10002의 현재 연봉과 사번, 생일을 가져오는 쿼리를 작성해서 출력
// prepared statment 이용해서 작성
$arr_emp_no = [10003, 10004];
try {
$conn = db_conn();
$sql = " SELECT " 
            ." emp.emp_no, "
            ." emp.birth_date, "
            ." sal.salary "
        ." FROM " 
            ." employees emp "
        ." JOIN " 
            ." salaries sal "
        ." ON " 
            ." emp.emp_no = sal.emp_no "
        // ." AND " 
        //     ." sal.emp_no IN(10003, 10004) "
        ." AND " 
            ." to_date >= DATE(NOW()) "
        ." WHERE "
            ." emp.emp_no IN(:emp_no1, :emp_no2) " 
;
$arr_prepare = [
    "emp_no1" => $arr_emp_no[0]
    ,"emp_no2" => $arr_emp_no[1]
    // "emp_no" => implode(",",$arr_emp_no)
];
$stmt = $conn->prepare($sql);
$stmt->execute($arr_prepare);
$result = $stmt->fetchAll();
print_r ($result);
} catch (\Throwable $e) {
     echo "예외 발생 : ".$e->getMessage();
} finally {
     $conn = null;
}











