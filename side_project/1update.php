<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/1config.php"); 
require_once(FILE_LIB_DB); 

try {
   
    $conn = my_db_conn(); 

    if(REQUEST_METHOD === "GET") {
        
        $no = isset($_GET["no"]) ? $_GET["no"] : ""; 
        $page = isset($_GET["page"]) ? $_GET["page"] : ""; 

        $arr_err_param = [];
        if($no === "") {
            $arr_err_param[] = "no";
        }
        if($page === "") {
            $arr_err_param[] = "page";
        }
        if(count($arr_err_param) > 0) {
            throw new Exception("parameter Error : ".implode(", ", $arr_err_param));
        }

        $arr_param = [
            "no" => $no
        ];
        $result = db_select_boards_no($conn, $arr_param);
        if(count($result) !== 1) {
            throw new Exception("Select Boards no count");
        }

        
        $item = $result[0];
    } else if(REQUEST_METHOD === "POST") {
       
        $no = isset($_POST["no"]) ? $_POST["no"] : ""; 
        $page = isset($_POST["page"]) ? $_POST["page"] : ""; 
        $title = isset($_POST["title"]) ? $_POST["title"] : ""; 
        $content = isset($_POST["content"]) ? $_POST["content"] : "";

        $arr_err_param = [];
        if($no === "") {
            $arr_err_param[] = "no";
        }
        if($page === "") {
            $arr_err_param[] = "page";
        }
        if($page === "") {
            $arr_err_param[] = "title";
        }
        if($page === "") {
            $arr_err_param[] = "content";
        }
        if(count($arr_err_param) > 0) {
            throw new Exception("parameter Error : ".implode(", ", $arr_err_param));
        }

        $conn->beginTransaction();

        $arr_param = [
            "no" => $no
            ,"title" => $title
            ,"content" => $content
        ];
        $result = db_update_boards_no($conn, $arr_param);

        if($result !== 1) {
            throw new Exception("Update Boards no count");
        }

        $conn->commit(); 

        header("Location: 1detail.php?no=".$no."&page=".$page);
        exit;
    }
} catch (\Throwable $e) {
    if(!empty($conn) && $conn->inTransaction()) {
        $conn->rollBack();
    }
    echo $e->getMessage();
    exit;
} finally {
  
    if(!empty($conn)) {
        $conn = null;
    }
}

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./1main.css">
    <title>수정 페이지</title>
</head>
<body>
    <main>
      <form action="./1update.php" method="post">
        <input type="hidden" name="no" value="<?php echo $item["no"];?>">
        <input type="hidden" name="page" value="<?php echo $page; ?>">
        
          <div class="line-item">
            <div class="insert-time">게시글 번호</div>
            <div class="line-content"><?php echo $item["no"]; ?></div>
          </div>
          <div class="line-item">
            <label class="insert-time" for="title">
              <div>제목</div>
            </label>
              <div class="line-content">
                <input type="text" name="title" id="title" value="<?php echo $item["title"]; ?>">
              </div>
          
          <div class="line-item">
            <label class="insert-time" for="content">
              <div class="line-title-textarea">내용</div>
            </label>
              <div class="line-content">
                <textarea name="content" id="content" rows="10"><?php echo $item["content"]; ?></textarea>
              </div>
          </div>
      </div>
      
          <button type="submit" class="a-button small-button">완료</button>
            <a href="./1detail.php?no=<?php echo $no ?>&page=<?php echo $page; ?>" class="a-button small-button">취소</a>
      
      </form>
    </main>
</body>
</html>
