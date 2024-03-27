<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>상세</title>
</head>
<body>
    <div class="main-middle">
        <div class="line-item">
            <div class="line-title">게시글 번호</div>
            <div class="line-content"><?php echo $item["no"] ?></div>
        </div>
        <div class="line-item">
            <div class="line-title">제목</div>
            <div class="line-content"><?php echo $item["title"] ?></div>
        </div>
        <div class="line-item">
            <div class="line-title">내용</div>
            <div class="line-content"><?php echo $item["content"] ?></div>
        </div>
        <div class="line-item">
            <div class="line-title">작성 일자</div>
            <div class="line-content"><?php echo $item["created_at"] ?></div>
        </div>
    </div>
    <div class="main-bottom">
        <a href="./update.php?no=<?php echo $no ?>&page=<?php echo $page ?>" class="a-button small-button">수정</a>
        <a href="./list.php?page=<?php echo $page ?>" class="a-button small-button">취소</a>
        <a href="./delete.php?no=<?php echo $no ?>&page=<?php echo $page ?>" class="a-button small-button">삭제</a>
    </div>
</body>
</html>