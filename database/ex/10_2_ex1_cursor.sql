-- 커서(cursor)

-- 1001 사원의 모든 급여를 더한 값을 출력하는 프로시저
delimiter $$
CREATE PROCEDURE test()
BEGIN 
	DECLARE sum_sal INT DEFAULT 0;
	DECLARE row_sal INT DEFAULT 0;
	DECLARE cur_sal INT DEFAULT 0;
	DECLARE end_row BOOLEAN DEFAULT FALSE;
	
	-- 커서 생성
	DECLARE cur_sal CURSOR FOR
		SELECT salary FROM salaries WHERE emp_no = 10001;
	 	
	-- 행이 끝나면 end_row에 true 를 대입
	DECLARE CONTINUE handler FOR NOT FOUND SET end_row = TRUE;
	
	-- 커서 오픈
 	OPEN cur_sal;
 	
 	-- loop 시작
 	cursor_loop: loop
 		-- 커서가 선택하고 있는 데이터 가져오기
 		fetch cur_sal INTO row_sal;
 		
 		-- 마지막 행이면 루프 종료
 		if end_row then
 			leave cursor_loop;
 		END if;
 		
 		SET sum_sal = sum_sal + row_sal;
 	END loop cursor_loop;
 	
 	SELECT sum_sal;
END $$
delimiter ;



