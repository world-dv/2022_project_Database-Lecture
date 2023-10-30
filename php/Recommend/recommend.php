<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>추천</title>
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
        div {
            clear: both;
            width: 100%;
            height: 500px;
        }
    </style>
</head>
<body>
    <h1>&emsp;NETFLIX</h1>
    <h2>&emsp;&emsp;Recommand</h2> <br>&emsp;&emsp;&emsp;

    <div>
    <?php
    include_once("hot.php");
    ?>   
    </div> 
    
    <div>
    <?php
    include_once("top10_movie.php");
    ?>   
    </div> 

    <div>
    <?php
    include_once("top10_series.php");
    ?>   
    </div> 
    
    <div>
    <h2>&emsp;&emsp;최근 본 장르 컨텐츠</h2> <br>&emsp;&emsp;&emsp; 
    <?php
        include_once("connect.php");
        $profile_id = $_GET['profile_id'];
        ?><div><?php
        include("recommend_genre.php");
        ?></div><?php
        ?><div><?php
        include("recommend_feature.php");
        ?></div><?php
        
    ?> 
    </div>
</body>
</html>