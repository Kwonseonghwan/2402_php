CREATE DATABASE test;

USE test;

CREATE TABLE users (
    id 			INT 				PRIMARY KEY AUTO_INCREMENT,
    NAME 		VARCHAR(50) 	NOT NULL,
    email 		VARCHAR(100) 	NOT NULL UNIQUE,
    created_at DATE 				NOT NULL DEFAULT CURRENT_DATE,
    updated_at DATE 				NOT NULL DEFAULT CURRENT_DATE,
    deleted_at DATE
);

CREATE TABLE boards (
    id 			INT 				PRIMARY KEY AUTO_INCREMENT,
    user_id 	INT				NOT NULL,
    title 		VARCHAR(100) 	NOT NULL,
    content 	VARCHAR(1000) 	NOT NULL,
    created_at DATE 				NOT NULL DEFAULT CURRENT_DATE,
    updated_at DATE 				NOT NULL DEFAULT CURRENT_DATE,
    deleted_at DATE
);

CREATE TABLE wishlists (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    board_id INT,
    created_at DATE NOT NULL DEFAULT CURRENT_DATE,
    updated_at DATE NOT NULL DEFAULT CURRENT_DATE,
    deleted_at DATE
);

ALTER TABLE boards ADD CONSTRAINT fk_boards_user_id FOREIGN KEY (user_id) REFERENCES users(id);
ALTER TABLE wishlists ADD CONSTRAINT fk_wishlists_user_id FOREIGN KEY (user_id) REFERENCES users(id);
ALTER TABLE wishlists ADD CONSTRAINT fk_wishlists_board_id FOREIGN KEY (board_id) REFERENCES boards(id);

-- boards 테이블에 아래 컬럼을 추가
ALTER TABLE boards ADD COLUMN views INT NOT NULL DEFAULT 0;

-- users 테이블에 아래 3명의 정보를 작성
INSERT INTO users (name, email) 
VALUES
('홍길동', 'hong@naver.com'),
('갑돌이', 'dol@naver.com'),
('갑순이', 'soon@naver.com');

-- boards 테이블에 아래 데이터 작성
INSERT INTO boards (user_id, title, content)
VALUES
(1, '홍길동1', '홍길동내용1'),
(1, '홍길동2', '홍길동내용2'),
(1, '홍길동3', '홍길동내용3'),
(1, '홍길동4', '홍길동내용4'),
(2, '갑돌이1', '갑내용1'),
(2, '갑돌이2', '갑내용2'),
(2, '갑돌이3', '갑내용3'),
(3, '갑순이1', '갑순내용1'),
(3, '갑순이2', '갑순내용2');

-- wishlists 테이블에 아래 데이터 작성
INSERT INTO wishlists (user_id, board_id)
VALUES
(1, 5),
(1, 8),
(2, 4),
(2, 1),
(2, 3),
(2, 9),
(2, 6),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9)
;

-- 홍길동 유저의 탈퇴 처리
DELETE FROM users set deleted_at = NOW() WHERE id = 1;

TRUNCATE TABLE users;

DROP TABLE users, boards, wishlists;


