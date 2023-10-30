<?php
    include_once("connect.php");
    if($_POST['cvc'] && $_POST['period'] && $_POST['card'] && $_POST['cardpw'] && $_POST['cardtype'] && $_GET['membership']) {
        $membership = $_GET['membership'];
        $cvc = $_POST['cvc'];
        $expiration_period = $_POST['period'];
        $cardnumber = $_POST['card'];
        $cardpw = $_POST['cardpw'];
        $cardtype = $_POST['cardtype'];
        $membership = $_GET['membership'];
        $sql = "INSERT INTO card (`cvc`, `password`, `expiration_period`, `card_number`, `type`) 
            VALUES ($cvc, $cardpw,  $expiration_period, $cardnumber, $cardtype);";
        $result = mysqli_query($con, $sql);
        if($result) {
            ?> <script> alert('카드 정보 추가 완료!'); </script> <?php  
        } else {
            echo "데이터 입력 실패 !";
        }
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
    </style>
</head>
<body>
    <h1>&emsp;NETFLIX</h1>
    <h2>유저 정보를 입력하세요.</h2><br><br>
    <form action="result.php?membership=<?=$membership?>" method="post">
    <input type="text" placeholder="아이디" name="id" required><br><br>
    <input type="email" placeholder="이메일" name="mail" required><br><br>
    <input type="password" placeholder="비밀번호" name="pw" required><br><br>
    <input type="tel" placeholder="전화번호" name="tel" required><br><br>
    <input type="submit" value="가입하기">
    </form>
</body>
</html>