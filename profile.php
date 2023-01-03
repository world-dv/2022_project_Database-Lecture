<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFILE</title>
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
        form {
            color : white;
        }
    </style>
</head>
<body>
    <h1>&emsp;NETFLIX</h1>
    <h2>프로필을 선택하세요.</h3>
        <button type="button" onclick="location.href='addprofile.html'">프로필 추가</button>
        &emsp; &emsp;

        <?php 
        include_once("connect.php");
        if($_GET['user_id']) {
            $user_id = $_GET['user_id'];
            $sql = "select * from profile where user_user_id=$user_id;";
            $result = mysqli_query($con, $sql);
            if($result) {
                $count = mysqli_num_rows($result);
            } else {
                echo "데이터 조회 실패";
            }
            
            while($row = mysqli_fetch_array($result)) {
                $pro_id = $row['profile_id'];
                $pro_name = $row['name'];
            ?>  
                <button type="button" name="like" onclick=
                "location.href='main.php?user_id=<?=$pro_id?>'"><?=$pro_name?></button>&emsp;
                &emsp;&emsp;        
                <?php  
            } 
        }
        mysqli_close($con);
        ?>

</body>
</html>