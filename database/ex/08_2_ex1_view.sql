-- 뷰(view)
-- 가상 테이블로, 보안과 함께 사용자의 
-- 편의성을 높이기 위해서 사용
-- 장점 : 복잡한 SQL을 편하게 조회 할 수 있다.
-- 단점 : INDEX를 사용 할 수 없어 조회 속도 느림

-- 사원의 사번, 생년월일, 이름, 성, 성별, 입사일
-- 현재 급여, 현재 직책을 출력해 주세요.
SELECT
	employees.emp_no, 
	employees.birth_date, 
	employees.first_name, 
	employees.last_name, 
	employees.gender, 
	employees.hire_date,
	salaries.salary,
	titles.title
FROM employees 
	JOIN salaries
		ON employees.emp_no = salaries.emp_no
		AND salaries.to_date >= NOW()
	JOIN titles
		ON employees.emp_no = titles.emp_no
		AND titles.to_date >= NOW()
;
-- 위의 쿼리를 뷰로 작성
CREATE VIEW view_emp_info
AS 
	SELECT
	employees.emp_no, 
	employees.birth_date, 
	employees.first_name, 
	employees.last_name, 
	employees.gender, 
	employees.hire_date,
	salaries.salary,
	titles.title
FROM employees 
	JOIN salaries
		ON employees.emp_no = salaries.emp_no
		AND salaries.to_date >= NOW()
	JOIN titles
		ON employees.emp_no = titles.emp_no
		AND titles.to_date >= NOW()
;

SELECT * FROM view_emp_info;

