<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOP 10 시리즈</title>
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
        h3 {
            text-align: left;
            color: white;
        }
        table {
            float: left;
            margin-left: 3%;
        }
    </style>
</head>
<body>
    <h2>&emsp;&emsp;TOP 10 영화</h2> <br>&emsp;&emsp;&emsp;
    <?php 
        include_once("connect.php");
        $profile_id = $_GET['user_id'];
        $sql = "CREATE OR REPLACE VIEW top_movie AS
        select c.content_id, c.title, AVG(ec.evaluate) AS '평균 평점', c.count AS '조회수'
            from content c, evaluate_content ec
            where (c.content_id=ec.content_content_id)AND(c.type='영화')
            group by c.title
            having avg(ec.evaluate) > 4.0
            order by c.count desc limit 10;
        
        TRUNCATE top10_movie;
        INSERT INTO top10_movie (content_content_id)
        SELECT content_id FROM top_movie;
        
        select top10_movie.TOP10_movie_ranking, content.title, content.thumbnail, content.url, content.content_id 
        from top10_movie
        join content on top10_movie.content_content_id=content.content_id
        order by TOP10_movie_ranking;";
        
        if(mysqli_multi_query($con, $sql)) {
            do {
            $result = mysqli_store_result($con);
            } while(mysqli_more_results($con) && mysqli_next_result($con));

            while($row = mysqli_fetch_array($result)) {
                ?>  
                <table border="0"><tr><td><h2><?=$row['TOP10_movie_ranking']?></h2></td></tr
                ><tr><td><a href="content.php?content_id=<?=$row['content_id']?>&profile_id=<?=$profile_id?>"><img src="<?=$row['thumbnail']?>"></a></td></tr>
                <?php echo "<tr><td><h3>{$row['title']}</h3><td></tr></table>"; 
            } 
        }
        
        //mysqli_close($con);
    ?>   
</body>
</html>