<?php

require_once( $_SERVER["DOCUMENT_ROOT"]."/1config.php"); 
require_once(FILE_LIB_DB); 

if(REQUEST_METHOD === "POST") {
    try {
        
        $title = isset($_POST["title"]) ? trim($_POST["title"]) : ""; 
        $content = isset($_POST["content"]) ? trim($_POST["content"]) : ""; 
        
        $arr_err_param = [];
        if($title === "") {
            $arr_err_param[] = "제목도 쓰세요";
        }
        if($content === "") {
            $arr_err_param[] = "내용도 쓰세요";
        }
        if(count($arr_err_param) > 0) {
           
            throw new Exception("에러: ".implode(", ", $arr_err_param));
        }

        $conn = my_db_conn(); 

        $conn->beginTransaction();
        
        $arr_param = [
            "title" => $title
            ,"content" => $content
        ];
        $result = db_insert_boards($conn, $arr_param);

        if($result !== 1) {
            throw new Exception("Insert Boards count");
        }

        $conn->commit();
        
        header("Location: 1main.php");
        exit;
    } catch (\Throwable $e) {
        if(!empty($conn)) {
            $conn->rollBack();
        }
        echo $e->getMessage();
        exit;
    } finally {
        if(!empty($conn)) {
            $conn = null;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./1main.css">
  <title>작성 페이지</title>
</head>
<body>
    <main>
      <div class="main-top">
           작성
      </div>
      <div class="main-middle">
      <form action="./1insert.php" method="post">
          <div class="line-item">
            <label class="insert-title" for="title">
            <div>제목</div>
            </label>
            <div class="line-content">
            <input type="text" name="title" id="title">
            </div>
            </div>
            <div class="line-item">
            <label class="insert-title" for="content">
            <div class="insert-title-textarea">내용</div>
            </label>
            <div class="line-content">
            <textarea name="content" id="content" rows="10"></textarea>
            </div>
          </div>
          </div>
      <div class="main-bottom">
          <button type="submit" class="a-button small-button">작성</button>
          <button type="button">
          <a href="./1insert.php" class="a-button small-button">취소</a>
          </button>
          <button type="button">
          <a href="./1main.php" class="a-button small-button">홈</a>
          </button>
      </div>
      </form>        
    </main>
</body>
</html>