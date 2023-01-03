<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>홈 카테고리</title>
    <style>
        div {
            margin-left: 20px;
        }
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
    </style>
</head>
<body>
    <h1>&emsp;NETFLIX</h1>
    <h2>&emsp;&emsp;장르 선택</h2><br><br>
    <div>
    <?php 
        include_once("connect.php");
        $profile_id = $_GET['profile_id'];
        $sql = "select ca.type 
            from category ca
            join home_category hc
                on hc.category_category_id=ca.category_id;"; 
        $result = mysqli_query($con, $sql);
        if($result) {
            $count = mysqli_num_rows($result);
            while($row = mysqli_fetch_array($result)) {
                $choose = $row['type'];
            ?>  
                <button type="button" name="home" onclick="location.href='home_choose.php?choose=<?=$choose?>&profile_id=<?=$profile_id?>'"><?=$choose?></button>&emsp;
                &emsp;&emsp;        
                <?php  
            } 
        } else {
            echo "데이터 조회 실패";
        }
        mysqli_close($con);
        ?> 
    </div>
</body>
</html>