<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>카테고리</title>
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
    <?php 
        include_once("connect.php");
        $choose = $_GET['choose'];
        $profile_id = $_GET['profile_id'];
        ?>
        <h2>&emsp;&emsp;<?=$choose?> 관련 시리즈 컨텐츠</h2> <br>&emsp;&emsp;&emsp; 
        <?php
        $sql = "SELECT c.content_id, ca.type, c.title, c.thumbnail, c.url, c.content_id
        FROM content c
            JOIN content_series_category csc
                ON csc.content_content_id=c.content_id
            JOIN series_category sc
                ON sc.series_category_id=csc.series_category_series_category_id
            JOIN category ca
                ON ca.category_id=sc.category_category_id
            WHERE ca.type=('$choose')
            order by c.count desc;";
        $result = mysqli_query($con, $sql);
        if($result) {
            while($row = mysqli_fetch_array($result)) {     
                ?>  
                <table border="0"><tr><td><a href="content.php?content_id=<?=$row['content_id']?>&profile_id=<?=$profile_id?>"><img src="<?=$row['thumbnail']?>"></a></td></tr>
                <?php echo "<tr><td><h3>{$row['title']}</h3><td></tr>";
            } 
        } else {
            echo "데이터 조회 실패";
        }
        mysqli_close($con);
    ?>
    </form>
</body>
</html>
