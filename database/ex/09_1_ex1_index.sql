-- Index

-- Index 확인
SHOW INDEX FROM titles;

-- Index 생성

-- 0.125 초
SELECT * FROM employees WHERE first_name = 'saniya';

-- Index 생성
ALTER TABLE employees ADD INDEX idx_employees_first_name (first_name);

-- Index 삭제
DROP INDEX idx_employees_first_name ON employees;





