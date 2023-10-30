<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTENT</title>
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
    
    <?php 
        include_once("connect.php");
        if(isset($_GET['content_id'])) {
            $content_id = $_GET['content_id'];
            $sql = "select type from content where content_id='$content_id';";
            $result = mysqli_query($con, $sql);
            if($row = mysqli_fetch_array($result)) {
                if($row['type'] == '영화') {
                    include_once("movie.php");
                } else if($row['type'] == '시리즈') {
                    include_once("series.php");
                }
            }
        }
        mysqli_close($con);
    ?>
    
    <h2>&emsp;&emsp;</h2> <br>&emsp;&emsp;&emsp;
</body>
</html>