<?php
include_once("connect.php");
$content_id = $_GET['content_id'];
$profile_id = $_GET['profile_id'];

$sql="select * from download_content where profile_profile_id=$profile_id and content_content_id=$content_id;";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result) == null) {
    $sql = "INSERT INTO download_content (`profile_profile_id`, `content_content_id`) VALUES ($profile_id, $content_id);";
    $result = mysqli_query($con, $sql);
    if($result) {
        ?> <script> alert("다운로드 목록에 추가되었습니다!"); history.back(); </script> <?php
    } else {
    ?> <script> alert("다운로드 목록 추가 실패"); history.back(); </script> <?php
    }
} else {
    ?> <script> alert("이미 다운로드한 컨텐츠 입니다!"); history.back(); </script> <?php
}
?>