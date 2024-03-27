<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>삭제</title>
</head>
<body>
    <main>
        <div class="main-top center">
          <p>
            삭제하면
          </p>
        </div>
          <div class="main-middle">
              
              <div class="line-item">
                  <div class="line-title">내용</div>
                  <div class="line-content"><?php echo $item["content"]; ?></div>
              </div>
              <div class="line-item">
                  <div class="line-title">작성 일자</div>
                  <div class="line-content"><?php echo $item["created_at"]; ?></div>
              </div>
          </div>
          <div class="main-bottom">
              <form action="./delete.php" method="post">
                  <input type="hidden" name="no" value="<?php echo $no; ?>">
                  <button type="submit" class="a-button small-button">O</button>
              <a href="./detail.php?no=<?php echo $no ?>&page=<?php echo $page ?>" class="a-button small-button">X</a>
              </form>
</body>
</html>