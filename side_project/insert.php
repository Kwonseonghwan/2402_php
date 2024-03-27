<?php

require_once( $_SERVER["DOCUMENT_ROOT"]."/config.php"); 
require_once(FILE_LIB_DB); 

if(REQUEST_METHOD === "POST") {
    try {
        
        $title = isset($_POST["title"]) ? trim($_POST["title"]) : ""; 
        $content = isset($_POST["content"]) ? trim($_POST["content"]) : ""; 
        
        
        $arr_err_param = [];
        if($title === "") {
            $arr_err_param[] = "title";
        }
        if($content === "") {
            $arr_err_param[] = "content";
        }
        if(count($arr_err_param) > 0) {
           
            throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
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
        
        
        header("Location: main.php");
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
    <link rel="stylesheet" href="./main.css">
    <title>작성 페이지</title>
</head>
<body>
   
    <main>
      <form action="./insert.php" method="post">
        
          <div class="line-item">
            <label class="line-title" for="title">
              <div>제목</div>
            </label>
              <div class="line-content">
                <input type="text" name="title" id="title">
              </div>
          </div>
          <div class="line-item">
            <label class="line-title" for="content">
              <div class="line-title-textarea">내용</div>
            </label>
              <div class="line-content">
                <textarea name="content" id="content" rows="10"></textarea>
              </div>
          </div>
      
      
          <button type="submit" class="a-button">작성</button>
          <button type="button">
            <a href="./index.php" class="a-button">취소</a>
          </button>
      
      </form>        
    </main>
</body>
</html>