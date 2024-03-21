<?php
print_r($_POST);
print_r($_POST["chk"]);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/146_http_method_post.php" method="post">
        <fieldset>
            <legend><h1>검색어를 입력하세요</h1></legend>
                <input type="hidden" name="hidden" value="숨겨졌다">
                <input type="text" name="a">
                <br>
                <input type="password" name="b">
                <br>
                <label for="subway">SubWay</label>
                <input type="checkbox" name="chk[]" id="subway" value="subway">
                <label for="pan">빵</label>
                <input type="checkbox" name="chk[]" id="pan" value="빵">
                <label for="do">도삭면</label>
                <input type="checkbox" name="chk[]" id="do" value="도삭면">
                <br>
                <br>
                <label for="m">남자</label>
                <input type="radio" name="radio" id="m" value="남자">
                <label for="f">여자</label>
                <input type="radio" name="radio" id="f" value="여자">
                <br>
                <button type="submit">로그인</button>
        </fieldset>
    </form>
   
</body>
</html>



