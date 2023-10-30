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
        h3 {
            color: white;
            text-align: left;
        }
        body {
            background-color: black;
            text-align: center;
        }
        table {
            float: left;
            margin-left: 10%;
            margin-right: 10%;
        }
    </style>
</head>
<body>
    <h1>&emsp;NETFLIX</h1><br>
   
    <?php 
        include_once("connect.php");
        $profile_id = $_GET['user_id'];
        $sql = "select name from profile where profile_id='$profile_id';";
        $result = mysqli_query($con, $sql);
        if($result) {
            $row = mysqli_fetch_assoc($result) ?>
            <input type="button" name="user" style="float:right" value=<?=$row['name']?> />
            <?php 
        } else { 
            echo "데이터 조회 실패";
        }
        
    ?>
    <br><br><br><br>
    <div >
    <table style="float: left; margin-left: 10%;">
    <td><button type="button" name="home" onclick="location.href='home_category.php?profile_id=<?=$profile_id?>'">홈</button>&emsp;</td>
    <td><button type="button" name="serise" onclick="location.href='series_category.php?profile_id=<?=$profile_id?>'">시리즈</button>&emsp;</td>        
    <td><button type="button" name="movie" onclick="location.href='movie_category.php?profile_id=<?=$profile_id?>'">영화</button>&emsp;</td>
    <td><button type="button" name="recommend" onclick="location.href='recommend.php?profile_id=<?=$profile_id?>'">추천</button>&emsp;</td>
    <td><button type="button" name="new" onclick="location.href='new.php?profile_id=<?=$profile_id?>'">NEW</button>&emsp;</td>
    </table>
    </div>
    <br><br>
    
    <div>
    <?php
    $sql="select c.title, c.information, c.url, c.thumbnail_row from content c order by rand() limit 1;";
    $result = mysqli_query($con, $sql);
    if($result) {
        $row = mysqli_fetch_assoc($result) ?>
        <table style="width: 70%;" border="0"><td><a href="<?=$row['url']?>"> <img style="width: 400px; height: 200px;" 
        src="<?=$row['thumbnail_row']?>" width="70%"></a></td>
        <?php echo "<td><h3>{$row['title']}<br>{$row['information']}</h3><td></table>";
    }
    ?>
    </div>

    <div style="float: right; margin-right: 10%">
    <table style="margin: auto;">
    <td><button type="button" name="like" onclick="location.href='like.php?profile_id=<?=$profile_id?>'">찜</button>&emsp;</td>
    <td><button type="button" name="download" onclick="location.href='download.php?profile_id=<?=$profile_id?>'">다운로드</button>&emsp;</td>
    <td><button type="button" name="recode" onclick="location.href='history.php?profile_id=<?=$profile_id?>'">시청 기록</button>&emsp;</td>
    </table>
    </div>
    <?php
         mysqli_close($con);
    ?>
    </body>
</html>