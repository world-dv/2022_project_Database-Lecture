<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SERIES</title>
    <style>
        h1 {
            color: red;
            text-align: left;
        }
        body {
            background-color: black;
        }
        img {
            width: 50%;
        }
        table {
            float: left;
            margin-left: 3%;
            color: white;
            font-size: 15px;
        }
        div {
            width: 100%;
            height: 200px;
        }
    </style>
</head>
<body>
    <?php 
        include_once("connect.php");
        $content_id = $_GET['content_id'];
        $profile_id = $_GET['profile_id'];
        $sql = "select title, opening_year, age, type, playtime, quality, information, thumbnail_row 
        from content where content_id='$content_id';";

        $result = mysqli_query($con, $sql);
        if($result) {
            $row = mysqli_fetch_array($result);
            ?>
            <div>
            <table border="0">
                <td colspan = "5"><img src="<?=$row['thumbnail_row']?>"></td>
                <tr>
                    <td colspan = "5"> <?=$row['title']?></td>
                </tr>
                <tr>
                    <td> <?=$row['type']?>  <?=$row['playtime']?> <?=$row['opening_year']?>  <?=$row['age']?> <?=$row['quality']?></td>
                </tr>
                <tr>
                    <td colspan = "5"><?=$row['information']?></td>
                </tr>
                <tr>
                   <td>
                        <button type="button" name="like" onclick="location.href='likebutton.php?content_id=<?=$content_id?>&profile_id=<?=$profile_id?>'">좋아요</button>
                   </td>
                
                   <td>
                        <button type="button" name="download" onclick="location.href='downloadbutton.php?content_id=<?=$content_id?>&profile_id=<?=$profile_id?>'">다운로드</button>
                   </td>
                   <td> 
                        <button type="button" name="history" onclick="location.href='historybutton.php?content_id=<?=$content_id?>&profile_id=<?=$profile_id?>'">시청하기</button>
                   </td> 
                </tr>
            </table>
            </div>
            <?php 
            $sql="SELECT c.thumbnail_row, dc.part, dc.season, dc.url, dc.title, dc.playtime, dc.detail_information
            FROM content c
                JOIN detail_content dc
                    ON dc.content_content_id=c.content_id
            WHERE c.content_id='$content_id';";
             $result = mysqli_query($con, $sql);
             if($result) {
                 while($row = mysqli_fetch_array($result)){ 
                 ?>
                 <div>
            <table border="0">
                <td><a href="<?=$row['url']?>"><img style="width: 200px;" src="<?=$row['thumbnail_row']?>"></a></td>
                
                    <td><?=$row['season']?></td>
                    <td> <?=$row['part']?>부</td>
                    <td><?=$row['title']?></td>
                    <td> <?=$row['playtime']?></td>                    
                    <td><?=$row['detail_information']?>
                </td>
            </table>
                 </div>
            <?php
                 }
             } else {
                echo "데이터 조회 실패";
            }
        } else {
            echo "데이터 조회 실패";
        }

        //mysqli_close($con);
    ?>
</body>
</html>