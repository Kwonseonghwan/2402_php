-- 스토어드 함수 생성 기본 구조
DELIMITER $$
CREATE FUNCTION 함수명(매개변수명 데이터타입)
	RETURNS 데이터타입
BEGIN
	RETURN 반환값;
END $$
DELIMITER ;

-- 스토어드 함수 생성 샘플
DELIMITER $$
CREATE FUNCTION my_sum(num1 INT, num2 INT)
	RETURNS INT
BEGIN
	RETURN num1 + num2;
END $$
DELIMITER ;

-- 스토어드 함수 조회
SHOW FUNCTION STATUS;

-- 스토어드 함수 실행
SELECT my_sum(100, 2);

-- 스토어드 함수 삭제
DROP FUNCTION my_sum;