<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>찜</title>
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
        h3 {
            text-align: left;
            color: white;
        }
        h4 {
            text-align: left;
            color: white;
        }
        img {
            width: 150px;
        }
        table {
            float: left;
            margin-left: 3%;
        }
    </style>
</head>
<body>
    <h1>&emsp;NETFLIX</h1>
    <h2>&emsp;&emsp;NEW</h2> <br>&emsp;&emsp;&emsp;
    <?php 
        include_once("connect.php");
        $profile_id = $_GET['profile_id'];
        $sql = "SELECT n.open_date, c.thumbnail, c.age, c.content_id, c.title, c.information, g.type, f.type
        FROM content c
            JOIN NEW n
                ON n.content_content_id=c.content_id
            JOIN content_genre cg
                ON cg.content_content_id=c.content_id
            JOIN genre g
                ON g.genre_id=cg.genre_genre_id
            JOIN content_feature cf
                ON cf.content_content_id=c.content_id
            JOIN feature f
                ON f.feature_id=cf.feature_feature_id
            group by title;";
        $result = mysqli_query($con, $sql);
        if($result) {
            while($row = mysqli_fetch_array($result)) {
                ?>  
                <table border="0"><tr><td><a href="content.php?content_id=<?=$row['content_id']?>&profile_id=<?=$profile_id?>"><img src="<?=$row['thumbnail']?>"></a></td></tr>
                <?php echo "<tr><td><h3>{$row['title']}</h3><h4>공개 예정일 : {$row['open_date']}</h4><td></tr></table>"; 
            } 
        } else {
            echo "데이터 조회 실패";
        }
        mysqli_close($con);
    ?>   
</body>
</html>