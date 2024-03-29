<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/1config.php"); 
require_once(FILE_LIB_DB); 
$list_cnt = 5; 									
$page_num = 1; 									
try {

    $conn = my_db_conn(); 

    $page_num = isset($_GET["page"]) ? ($_GET["page"]) : $page_num;   

    $result_board_cnt = db_select_boards_cnt($conn);

    $max_page_num = ceil($result_board_cnt / $list_cnt);
    $offset = $list_cnt * ($page_num - 1); 
    $prev_page_num = ($page_num - 1) < 1 ? 1 : ($page_num - 1); 
    $next_page_num = ($page_num + 1) > $max_page_num ? $max_page_num : ($page_num + 1); 

    $arr_param = [
        "list_cnt"  => $list_cnt
        ,"offset"   => $offset 
    ];
    $result = db_select_boards_paging($conn, $arr_param);
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
    <title>메인페이지</title>
</head>
<body>
    <main>
        <div class="main-top">
           <a href="./1main.php" class="top-button">TO DO LIST</a>
        </div>
        <div class="main-middle">
            <a href="./1insert.php"><div class="write">작성</div></a>
                <?php
                foreach($result as $item) {
                ?>
                    <div class="item">
                    <div class="item-no"><?php echo $item["no"] ?></div>
                    <div class="item-title"><a class="b-button" href="./1detail.php?no=<?php echo $item["no"]?>&page=<?php echo $page_num ?>"><?php echo $item["title"] ?></a></div>
                    <div class="item-createdate"><?php echo $item["created_at"] ?></div>
                    </div>
                <?php
                }
                ?>          
        </div>
        <div class="main-bottom">
            <a href="./1main.php?page=<?php echo $prev_page_num ?>" class="a-button small-button">이전</a>
            <?php
            for($num = 1; $num <= $max_page_num; $num++){
            ?>
            <a href="./1main.php?page=<?php echo $num ?>" class="a-button small-button <?php echo ($num == $page_num) ? "selected" : ""; ?>"><?php echo $num ?></a>
            <?php
            }
            ?>
            <a href="./1main.php?page=<?php echo $next_page_num ?>" class="a-button small-button">다음</a>
        </div>
    </main>
</body>

<!-- 스크롤을 원하는 요소 
<div id="bottom"></div>
     스크롤을 원하는 링크
<a href="#bottom">하단으로 이동</a> -->

</html>