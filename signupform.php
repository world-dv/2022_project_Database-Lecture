<?php
    include_once("connect.php");
    if(isset($_GET['membership'])) {
         $membership = $_GET['membership'];
    } else {
        echo "데이터 조회 실패!";
    }
    mysqli_close($con);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NETFLIX</title>
    <style>
        h1 {
            color: red;
            text-align: left;
        }
        body {
            text-align: center;
            background-color: white;
            margin-left: 20px;
        }
        h2 {
            color: black;
            text-align: center;
        }
        input {
            width: 200px;
            height: 30px;
        }
        select {
            width: 200px;
            height: 30px;
        }
    </style>
</head>
<body>
    <h1>&emsp;NETFLIX</h1>
    <h2>카드 정보를 입력하세요.</h2><br><br>
    <form action="loginform.php?membership=<?=$membership?>" method="post">
    <input type="text" placeholder="cvc" name="cvc" required><br><br>
    <input type="text" placeholder="만료 날짜(00/00)" maxlength="4" name="period" required><br><br>
    <input type="text" placeholder="카드번호" name="card" maxlength="15" required><br><br>
    <input type="password" placeholder="카드 비밀번호" name="cardpw" required><br><br>
    <select name="cardtype" size="1">
            <option value="1"selected>체크카드</option>
            <option value="2">신용카드</option>
    </select><br><br>
    <input type="submit" value="다음">
    </form>
</body>
</html>