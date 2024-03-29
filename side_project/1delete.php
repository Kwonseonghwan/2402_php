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
    }
    else if(REQUEST_METHOD === "POST") {
        
        $no = isset($_POST["no"]) ? $_POST["no"] : "";

        $arr_err_param = [];
        if($no === "") {
            $arr_err_param[] = "no";
        }
        if(count($arr_err_param) > 0) {
            throw new Exception("parameter Error : ".implode(", ", $arr_err_param));
        }

        $conn->beginTransaction();

        $arr_param = [
            "no" => $no
        ];
        $result = db_delete_boards_no($conn, $arr_param);

        if($result !== 1) {
            throw new Exception("Delete Boards no count");
        }

        $conn->commit();

        header("Location: 1main.php");
        exit;
    }
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
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./1main.css">
    <title>삭제페이지</title>
</head>
<body>
    <main>
    <div class="main-top center">
        <p>
          삭제?
        </p>
    </div>
    <div class="main-middle">
        <div class="line-item">
            <div class="insert-title">게시글 번호</div>
            <div class="line-content"><?php echo $item["no"] ?></div>
        </div>
        <div class="line-item">
            <div class="insert-title">제목</div>
            <div class="line-content"><?php echo $item["title"]; ?></div>
        </div>
        <div class="line-item">
            <div class="insert-title">내용</div>
            <div class="line-content"><?php echo $item["content"]; ?></div>
        </div>
        <div class="line-item">
            <div class="insert-title">작성 일자</div>
            <div class="line-content"><?php echo $item["created_at"]; ?></div>
        </div>
    </div>
    <div class="main-bottom">
        <form action="./1delete.php" method="post">
            <input type="hidden" name="no" value="<?php echo $no; ?>">
            <button type="submit" class="delete-button">동의</button>
        <a href="./1detail.php?no=<?php echo $no ?>&page=<?php echo $page ?>" class="a-button small-button">이전</a>
        </form>
    </div>
    </main>
</body>
</html>
