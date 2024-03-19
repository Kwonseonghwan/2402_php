<?php
// 쿠키 삭제 : 유효시간을 과거로 다시 세팅
setcookie("my_cookie2", "쿠키2", time() - 10);