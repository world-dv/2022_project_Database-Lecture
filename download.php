<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>다운로드</title>
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
    <h2>&emsp;&emsp;Download</h2> <br>&emsp;&emsp;&emsp;
    <?php 
        include_once("connect.php");
        if(isset($_GET['profile_id'])) {
        $profile_id = $_GET['profile_id'];
        $sql = "SELECT c.content_id, c.thumbnail, c.title FROM content c
            JOIN download_content dc
                ON dc.content_content_id=c.content_id
            JOIN profile p
                ON p.profile_id=dc.profile_profile_id
            WHERE profile_id = $profile_id;";
        $result = mysqli_query($con, $sql);
        if($result) {
            while($row = mysqli_fetch_array($result)) {
                ?>  
                <table border="0"><tr><td><a href="content.php?content_id=<?=$row['content_id']?>&profile_id=<?=$profile_id?>"><img src="<?=$row['thumbnail']?>"></a></td></tr>
                <?php echo "<tr><td><h3>{$row['title']}</h3><td></tr></table>"; 
            } 
        } else {
            echo "데이터 조회 실패";
        }
        mysqli_close($con);
    }
    ?>   
</body>
</html>