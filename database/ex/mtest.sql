-- 사원 정보테이블에 자신의 정보를 적절하게 넣어주세요. 
INSERT INTO employees (
			emp_no,
			birth_date,
			first_name,
			last_name,
			gender,
			hire_date
)
VALUES (
			121111
			19990722,
			'kwon',
			'seonghwan',
			'm',
			20240311
);
-- 월급, 직책, 소속부서 테이블에 자신의 정보를 적절하게 넣어주세요.
INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	121111
	,'staff'
	,DATE(NOW())
	,99990101
);
INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	121111
	,1000000
	,DATE(NOW())
	,99990101
);
INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	121111
	,d001
	,20240311
	,20240311
);
-- 짝궁의 [1,2]것도 넣어주세요.
-- 나와 짝궁의 소속 부서를 d009로 변경해 주세요. 
-- 짝궁의 모든 정보를 삭제해 주세요.
DELETE FROM employees
WHERE emp_no = ;
-- 'd009'부서의 관리자를 나로 변경해 주세요.
-- 오늘 날짜부로 나의 직책을 'Senior Engineer'로 변경해 주세요.
UPDATE titles
SET title = 'Senior Engineer'
WHERE title = ;
-- 최고 연봉 사원과 최저 연봉 사원의 사번과 이름을 출력해 주세요.
SELECT
	emp.emp_no
	,CONCAT_WS(' ', first_name, last_name) FULL_name
	,RANK() OVER(ORDER BY sal.salary DESC) sal_rank
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND sal.to_date >= NOW()
;
-- 전체 사원의 평균 연봉을 출력해 주세요.
SELECT
	AVG(sal.salary) avg_sal
FROM salaries sal
	JOIN titles tit
		ON sal.emp_no = tit.emp_no
;
-- 사번이 499,975인 사원의 지금까지 평균 연봉을 출력해 주세요.
SELECT
	AVG(sal.salary) avg_sal
FROM salaries sal
	JOIN employees emp
		ON sal.emp_no = emp.emp_no
		AND sal.emp_no = 499975
;
CREATE DATABASE test;
CREATE TABLE users (
	userid 				INT 				PRIMARY KEY AUTO_INCREMENT 
	,username 			VARCHAR(30) 	NOT NULL 
	,authflg 	      CHAR(1) 	      DEFAULT '0' 
	,birthday  	      DATE 				NOT NULL
	,created_at 		DATETIME 		DEFAULT current_date
);
INSERT INTO users (
			user_id,
			user_name,
			authflg,
			birth_date,
			from_date
)
VALUES (
			AUTO_INCREMENT,
			'그린',
			'0',
			20240126,
			20240312
);
UPDATE test
SET 	user_name = '테스터',
		authflg = '1',
		birth_date = 20070301
WHERE user_name = '그린',
		authflg = '0',
		birth_date = 20240126
;
DELETE FROM test
WHERE user_name = '테스터',
		authflg = '1',
		birth_date = 20070301
;
ALTER TABLE users ADD addr, VARCHAR(100), NOT NULL DEFAULT '-';		
		DROP TABLE users;
		
		
		
		
		 
		
		
		
		
		
		
		
		
