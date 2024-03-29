<?php
$btn_page_cnt = 5;  // 한페이지 버튼 숫자
$max_page_num = 30; // 총 페이지
$now_page = 30;     // 현재 페이지
$start_page = ceil($now_page / $btn_page_cnt) * $btn_page_cnt - ($btn_page_cnt - 1);
$end_page = $start_page + ($btn_page_cnt - 1);
$end_page = $end_page > $max_page_num ? $max_page_num : $end_page;
for($i = $start_page; $i <= $end_page; $i++) {
    echo "$i page\n";
}