<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>카테고리</title>
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
    <?php 
        include_once("connect.php");
        $choose = $_GET['choose'];
        $profile_id = $_GET['profile_id'];
        ?>
        <h2>&emsp;&emsp;<?=$choose?> 관련 홈 컨텐츠</h2> <br>&emsp;&emsp;&emsp; 
        <?php
        $sql = "SELECT ca.type, c.title, c.thumbnail, c.url, c.content_id
            FROM content c
            JOIN content_home_category chc
                ON chc.content_content_id=c.content_id
            JOIN home_category hc
                ON hc.home_category_id=chc.home_category_home_category_id
            JOIN category ca
                ON ca.category_id=hc.category_category_id
            WHERE ca.type=('$choose')
            order by c.count desc;";
        $result = mysqli_query($con, $sql);
        if($result) {
            while($row = mysqli_fetch_array($result)) {     
                ?>  
                <table border="0"><tr><td><a href="content.php?content_id=<?=$row['content_id']?>&profile_id=<?=$profile_id?>">
                <img src="<?=$row['thumbnail']?>"></a></td></tr>
                <?php echo "<tr><td><h3>{$row['title']}</h3><td></tr>";
            } 
        } else {
            echo "데이터 조회 실패";
        }
        mysqli_close($con);
    ?>
    </form>
</body>
</html>

<!--홈 카테고리 -> 장르 선택 -> 관련 전체 컨텐츠 -->
<!-- 영화 카테고리 -> 장르 선택 -> 관련 영화 -->
<!-- 시리즈 카테고리 -> 장르 선택 -> 관련 드라마 -->
<!-- new -> 새로 추가될 콘텐츠 목록 -> 정보 제공(개봉 예정/방송 예정) -->
<!-- 관리자 모드 -> 컨텐츠 추가 / 컨텐츠 삭제 / 컨텐츠 정보 수정 / 유저 정보 관리 -->
<!-- 멀티 프로필 유저 추가 -->
<!-- 회원 가입 -> 카드 정보, 가입 정보 입력 --> 
