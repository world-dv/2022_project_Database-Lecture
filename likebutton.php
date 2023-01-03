<?php
include_once("connect.php");
if($_GET['content_id'] && $_GET['profile_id']) {
    $content_id = $_GET['content_id'];
    $profile_id = $_GET['profile_id'];
    
    $sql="select * from save_content where profile_profile_id=$profile_id and content_content_id=$content_id;";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) == null) {
        $sql = "INSERT INTO save_content (`profile_profile_id`, `content_content_id`) VALUES ($profile_id, $content_id);";
        $result = mysqli_query($con, $sql);
        if($result) {
            ?> <script> alert("찜 목록에 추가되었습니다!"); history.back(); </script> <?php
        } else {
        ?> <script> alert("찜 목록 추가 실패"); history.back(); </script> <?php
        }
    } else {
        ?> <script> alert("이미 찜한 컨텐츠 입니다!"); history.back(); </script> <?php
    }
} else {
    echo "데이터 조회 오류";
}

?>