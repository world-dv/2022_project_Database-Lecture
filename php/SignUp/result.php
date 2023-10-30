<?php
    include_once("connect.php");
    if($_POST['id'] && $_POST['pw'] && $_POST['mail'] && $_POST['tel'] && $_GET['membership']) {
        $userid = $_POST['id'];
        $userpw = $_POST['pw'];
        $useremail = $_POST['mail'];
        $userphone = $_POST['tel'];
        $membership = $_GET['membership'];

        $sql = "select password from user where user_id='$userid';";
        $result = mysqli_query($con, $sql);
        if($result) {
            while($array = mysqli_fetch_array($result)) {
                $user_pw = $array["password"];
                if($userpw == $user_pw) {
                    $check = 1;
                } else {
                    $check = 0;
                }
            }
        }
    }
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
    <?php
     if ($check != 1) {
        $sql = "select card_id from card order by card_id desc limit 1;";
        $result = mysqli_query($con, $sql);
        if($result) {
            $row = mysqli_fetch_array($result);
            $card_id = $row['card_id'];
            $sql = "insert into user (`user_id`, `password`, `phone`, `email`, `card_card_id`, `membership_membership_id`) 
                values ($userid, $userpw, $userphone, '$useremail', $card_id, $membership);";
            $result = mysqli_query($con, $sql);
                
            if($result) {
                ?> <script> alert('회원 가입 완료\n로그인 페이지로 이동합니다.'); location.href="login.php"; </script> <?php  
            } else {
                ?> <script> alert('유저 정보 입력 실패 !\n이전 페이지로 이동합니다.'); </script> <?php
                $sql="delete from card order by card_id desc limit 1;";
                $result = mysqli_query($con, $sql);
                ?> <script> history.back(); </script> <?php
            }
        } else {
            echo "데이터 조회 실패!";
        }
        echo "카드 정보 조회 실패!";
    }  else {
        ?> <script> alert('유저 정보 입력 실패 !\n이전 페이지로 이동합니다.'); </script> <?php
        $sql="delete from card order by card_id desc limit 1;";
        $result = mysqli_query($con, $sql);
        ?> <script> history.back(); </script> <?php
    }
    mysqli_close($con);  
    ?>
</body>
</html>