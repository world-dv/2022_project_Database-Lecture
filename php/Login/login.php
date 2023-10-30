<?php
    include_once("connect.php");

    if(isset($_POST['id']) && $_POST['pw']) {
        $id = $_POST["id"];
        $pw = $_POST["pw"];
        $sql = "SELECT password from user where user_id='$id';";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) == 1) {
            $array = mysqli_fetch_array($result);
            $user_pw = $array["password"];
            if($pw == $user_pw) {
                $check = 0;
            } else {
                $check = 1;
            }
        } else {
            $check = 1;
        }
    }
    //mysqli_close($con);
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
            background-color: black;
        }
        h2 {
            color: white;
        }
        a {
            color: white;
        }
    </style>
</head>
<body>
    <h1>&emsp;NETFLIX</h1>
    <h2>Login</h2>
    <form name="loginform" method="post">    
        <input name="id" type="text" placeholder="Input your ID" required />
        <br>
        <input name="pw" type="password" placeholder="Input your PW" required />
        <br> <br> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <input type="submit" value="로그인"/>
        <?php
            if($check == 1) {
                 ?> <script> alert("로그인 실패");
                    </script> <?php
            } else { 
                ?> <script> alert("로그인 성공");
                location.href="profile.php?user_id=<?=$id?>";
                </script> <?php 
            } 
        ?>
    </form>
    <br>&emsp;&emsp;&emsp;
    <a href="signup.php">지금 가입하세요.</a>
</body>
</html>