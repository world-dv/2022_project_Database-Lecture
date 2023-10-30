<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>추천</title>
    <style>
        h1 {
            color: red;
            text-align: left;
        }
        body {
            background-color: black;
        }
        h2 {
            text-align: left;
            color: white;
        }
        img {
            width: 150px;
        }
    </style>
</head>
<body>
    <h1>&emsp;NETFLIX</h1>
    <h2>&emsp;&emsp;장르 별 컨텐츠</h2> <br>&emsp;&emsp;&emsp;
    <?php
        include_once("connect.php");
        $sql = ";"; //홈-> 홈 카테고리 / 영화 -> 영화 카테고리 / 시리즈 -> 시리즈 카테고리 ->> 다 다른 페이지?
        $result = mysqli_query($con, $sql);
        if($result) {
            $count = mysqli_num_rows($result);
        } else {
            echo "데이터 조회 실패";
        }
        
        //content_id -> 컨텐츠 조회 시 사용 >> GET값으로 넘김 -> 
        while($row = mysqli_fetch_array($result)) {
            $con_id = $row['content_id']; //content_id, name, url(세로형 포스터)
            $con_name = $row['name'];
            $thumbnail = $row['url']; 
            ?>
            <table border="0"><tr><td><img src="<?=$row['url']?>"></td></tr>
            <?php echo "<tr><td><h3>{$row['title']}</h3><td></tr></table>"; ?> 
            &emsp;&emsp;        
            <?php  
        } 
        mysqli_close($con);
        ?> 
</body>
</html>