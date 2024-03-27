<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/config.php"); 
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
    <link rel="stylesheet" href="./main.css">
    <title>상세페이지</title>
</head>
<body>
    <main>
        
        
            <a href="./main.php"><div class="write">TO DO LIST</div></a>

            <?php foreach($result as $item): ?>
            <div class="item">
                <div><a href="./detail.php?no=<?php echo $item['no']; ?>" class="text"><?php echo $item['title']; ?></a></div>
               
                <div class="created_at"><?php echo $item['created_at']; ?></div> 
                <a href=""><div class="write">삭제</div></a>
            </div>
            <?php endforeach; ?>
                           
        
        
    </main>
</body>
</html>
