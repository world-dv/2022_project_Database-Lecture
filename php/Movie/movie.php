<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOVIE</title>
    <style>
        h1 {
            color: red;
            text-align: left;
        }
        body {
            background-color: black;
        }
        img {
            width: 100%;
        }
        table {
            float: left;
            margin-left: 3%;
            color: white;
            font-size: 15px;
        }
    </style>
</head>
<body>
    <?php 
        include_once("connect.php");
        $content_id = $_GET['content_id'];
        $profile_id = $_GET['profile_id'];
        $sql = "select title, thumbnail_row, url, information, 
        opening_year, age, type, playtime, quality from content where content_id='$content_id';";
        $result = mysqli_query($con, $sql);
        if($result) {
            $row = mysqli_fetch_array($result);
            ?>
            <table border="0">
                <td colspan = "5"><a href="<?=$row['url']?>"><img src=<?=$row['thumbnail_row']?>></a></td>
                <tr>
                    <td colspan = "5"> <?=$row['title']?></td>
                </tr>
                <tr>
                    <td> <?=$row['type']?></td>
                    <td> <?=$row['playtime']?></td>
                    <td> <?=$row['opening_year']?></td> 
                    <td> <?=$row['age']?></td>
                    <td> <?=$row['quality']?></td>
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
            <?php
        }

        //mysqli_close($con);
    ?>
</body>
</html>