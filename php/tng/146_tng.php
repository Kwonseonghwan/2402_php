<?php
$q = isset($_GET["a"]) ? $_GET["a"] : "";
$qu = isset($_GET["b"]) ? $_GET["b"] : "";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/146_tng.php" method="get">
        <fieldset>
            <legend><h1>검색어를 입력하세요</h1></legend>
                <input type="text" name="a">
                <br>
                <input type="password" name="b">
                <button type="submit">로그인</button>
        </fieldset>
    </form>
    <br>
    <br>
    <?php
        if($q !== "") {
            echo "당신의 ID는 $q 입니다.<br>";
        }
        if($qu !== "") {
            echo "당신의 PW는 $qu 입니다.";
        }
    ?>    
</body>
</html>

