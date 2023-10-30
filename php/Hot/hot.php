<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOT</title>
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
    <h2>&emsp;&emsp;HOT</h2> <br>&emsp;&emsp;&emsp;
    <?php 
        include_once("connect.php");
        $profile_id = $_GET['profile_id'];
        $sql = "select content_id, title, thumbnail from content where count != 0 order by count desc limit 10;";
        $result = mysqli_query($con, $sql);
        if($result) {
            $count = mysqli_num_rows($result);
        } else {
            echo "데이터 조회 실패";
        }
        while($row = mysqli_fetch_array($result)) {
            ?>  
            <table border="0"><tr><td><a href="content.php?content_id=<?=$row['content_id']?>&profile_id=<?=$profile_id?>"><img src="<?=$row['thumbnail']?>"></a></td></tr>
            <?php echo "<tr><td><h3>{$row['title']}</h3><td></tr></table>"; 
        } 
        //mysqli_close($con);
    ?>   
</body>
</html>