<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>시청기록</title>
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
    <h2>&emsp;&emsp;History</h2> <br>&emsp;&emsp;&emsp;
    <?php 
        include_once("connect.php");
        if(isset($_GET['profile_id'])) {
        $profile_id = $_GET['profile_id'];
        $sql = "select c.content_id, c.thumbnail, c.title from content c
                join content_history ch
                    on ch.content_content_id=c.content_id
                join profile p
                    on p.profile_id=ch.profile_profile_id
                WHERE profile_id='$profile_id';";
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