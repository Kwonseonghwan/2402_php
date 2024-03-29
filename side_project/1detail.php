<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/1config.php"); 
require_once(FILE_LIB_DB); 

try {
   
    $conn = my_db_conn(); 

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

} catch (\Throwable $e) {
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
    <title>상세페이지</title>
</head>
<body>
    <main>
        <div class="main-top">
          상세
        </div>
        <div class="main-middle">
            <div class="line-item">
                <div class="insert-title">게시글 번호</div>
                <div class="line-content"><?php echo $item["no"] ?></div>
            </div>
            <div class="line-item">
                <div class="insert-title">제목</div>
                <div class="line-content"><?php echo $item["title"] ?></div>
            </div>
            <div class="line-item">
                <div class="insert-title">내용</div>
                <div class="line-content"><?php echo $item["content"] ?></div>
            </div>
            <div class="line-item">
                <div class="insert-title">작성 일자</div>
                <div class="line-content"><?php echo $item["created_at"] ?></div>
            </div>
        </div>
        <div class="main-bottom">
            <a href="./1update.php?no=<?php echo $no ?>&page=<?php echo $page ?>" class="a-button small-button">수정</a>
            <a href="./1main.php?page=<?php echo $page ?>" class="a-button small-button">이전</a>
            <a href="./1delete.php?no=<?php echo $no ?>&page=<?php echo $page ?>" class="delete-button">삭제</a>
        </div>
    </main>
</body>
</html>
