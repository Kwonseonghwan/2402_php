-- 1
INSERT INTO employees (emp_no, birth_date, FIRST_name, last_name, gender, hire_date)
VALUES(500000, 20000101, 'as', 'ss', 'M', DATE(NOW()));
-- 2
INSERT INTO salaries (emp_no, salary, from_date, to_date)
VALUES(500000, 30000, DATE(NOW()), 99990101);
INSERT INTO titles (emp_no, title, from_date, to_date)
VALUES(500000, 'staff', DATE(NOW()), 99990101);
INSERT INTO dept_emp (emp_no, dept_no, from_date, to_date)
VALUES(500000, 'd001', DATE(NOW()), 99990101);
-- 3
UPDATE dept_emp
SET to_date = DATE(NOW())
WHERE emp_no IN (500000, 500001, 500002)
;
INSERT INTO dept_emp (emp_no, dept_no, from_date, to_date)
(500000, 'd009', DATE(NOW()), 99990101)
,(500001, 'd009', DATE(NOW()), 99990101)
,(500002, 'd009', DATE(NOW()), 99990101)
;
-- 4
DELETE FROM titles WHERE emp_no IN(500001, 500002);
DELETE FROM salaries WHERE emp_no IN(500001, 500002);
DELETE FROM dept_emp WHERE emp_no IN(500001, 500002);
DELETE FROM employees WHERE emp_no IN(500001, 500002);
-- 5
UPDATE dept_manager
SET to_date = DATE(NOW())
WHERE dept_no = 'd009'
AND to_date >= DATE(NOW())
;
INSERT INTO dept_manager(dept_no, emp_no, from_date, to_date)
VALUES('d009', 500000, DATE(NOW()), 99990101)
;
-- 6
UPDATE titles
SET to_date = DATE(NOW())
WHERE emp_no = 500000
;
INSERT INTO titles(emp_no, title, from_date, to_date)
VALUES(500000, 'Senior Engineer', DATE(NOW()),99990101)
;
-- 7
SELECT 
	emp_no
	,first_name
FROM employees
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND sal.to_date > DATE(NOW())
		AND sal.salary IN (
		(SELECT MAX(salary) FROM salaries WHERE to_date > DATE(NOW()))
		,(SELECT min(salary) FROM salaries WHERE to_date > DATE(NOW()))
	)
;
-- 8
SELECT
	AVG(salary) avg_sal
FROM salaries
WHERE to_date > DATE(NOW())
;
-- 9
SELECT
	AVG(salary) avg_sal
FROM salaries
WHERE emp_no = 499975
;

-- 1
CREATE TABLE users (
	userid 		INT 				PRIMARY KEY auto_increment
	,username 	VARCHAR(30) 	NOT NULL 
	,authflg 	CHAR(1)			DEFAULT '0'
	,birthday	DATE				NOT NULL 
	,created_at	DATETIME 		DEFAULT CURRENT_TIMESTAMP()
);
-- 2
INSERT INTO users (username, authflg, birthday, created_at)
VALUES ('그린', '0', 20240126, NOW());
-- 3
UPDATE users
SET
	username = '테스터'
	,authflg = '1'
	,birthday = 20070301
WHERE userid = 1;
-- 4
DELETE FROM users
WHERE userid = 1;
-- 5
ALTER TABLE users ADD COLUMN addr VARCHAR(100) NOT NULL DEFAULT '-';
-- 6
DROP TABLE users;
-- 7
select
	usr.username
	,usr.birthday
	,rmg.rankname
FROM users usr
	JOIN rankmanagement rmg
		ON usr.userid = rmg.userid
;


