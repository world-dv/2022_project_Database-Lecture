<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>장르 추천</title>
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
    <?php 
        include_once("connect.php");
        $profile_id = $_GET['profile_id'];    
        $sql = "CREATE OR REPLACE VIEW recommend_content_genre AS
        select g.type, COUNT(g.type) AS 'total'
            from content c
                join content_history ch
                    on ch.content_content_id=c.content_id
                join profile p
                    on p.profile_id=ch.profile_profile_id
                join content_genre cg
                    on cg.content_content_id=c.content_id
                join genre g
                    on g.genre_id=cg.genre_genre_id
                where p.profile_id=$profile_id
                group by g.type
                order by COUNT(g.type) desc limit 1;
        
        create OR REPLACE view content_history_id as
        select distinct p.profile_id, ch.content_content_id, c.title
        from content_history ch
            join content c
                on c.content_id=ch.content_content_id
            join profile p
                on p.profile_id=ch.profile_profile_id
        where p.profile_id=$profile_id;
        
        create OR REPLACE view recommend_by_genre_not_history as
        select * from recommend_by_genre rbg 
        where rbg.content_id 
        not in (select chi.content_content_id from content_history_id chi); 

        select * from recommend_by_genre_not_history rbgnh
        where rbgnh.content_id
        not in (select n.content_content_id from new n);";
        
        if(mysqli_multi_query($con, $sql)) {
            do {
            $result = mysqli_store_result($con);
            } while(mysqli_more_results($con) && mysqli_next_result($con));
        }
        $count = 0;
        while($row = mysqli_fetch_array($result)) {
            if($count == 0) {
                ?><tr><td><h3>&emsp;&emsp;<?=$row['추천']?></h3></td></tr><?php
                $count = 1;
            }
            ?>  
            <table border="0"><tr><td><a href="content.php?content_id=<?=$row['content_id']?>&profile_id=<?=$profile_id?>"><img src="<?=$row['thumbnail']?>"></a></td></tr>
            <?php echo "<tr><td><h3>{$row['title']}</h3><td></tr></table>"; 
        } 
        
        //mysqli_close($con);
    ?>   
</body>
</html>