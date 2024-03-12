-- 프로시저(procedure)

-- 프로시저 정의
delimiter $$
CREATE PROCEDURE test()
BEGIN 
	SELECT * FROM employees WHERE emp_no <= 10005;
END $$
delimiter ;


-- 프로시저 호출
CALL test();

-- 프로시저 삭제
DROP PROCEDURE test;








