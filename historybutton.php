<?php
include_once("connect.php");
$content_id = $_GET['content_id'];
$profile_id = $_GET['profile_id'];
$sql="select * from content_history where profile_profile_id=$profile_id and content_content_id=$content_id;";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result) < 1) {
    $sql = "INSERT INTO content_history (`profile_profile_id`, `content_content_id`) VALUES ($profile_id, $content_id);";
    $result = mysqli_query($con, $sql);
    if($result) {
        ?> <script> alert("시청 목록에 추가되었습니다! 포스터를 눌러 컨텐츠를 감상하세요 !"); </script>
        <? $sql = "select count from content where content_id=$content_id;";
        $result = mysqli_query($con, $sql);
        if($result) {
            $row = mysqli_fetch_array($result);
            $count = $row['count'];
            $count+=1;
            $sql = "UPDATE content SET `count` = $count WHERE (`content_id` = $content_id);" ;
            $result = mysqli_query($con, $sql);
        }
        ?>
        <script> history.back(); </script> <?php
    } else {
    ?> <script> alert("시청 목록 추가 실패"); history.back(); </script> <?php
    }
} else {
     $sql = "select count from content where content_id=$content_id";
        $result = mysqli_query($con, $sql);
        if($result) {
            $row = mysqli_fetch_array($result);
            $count = $row['count'];
            $count+=1;
            $sql = "UPDATE content SET `count`=$count WHERE (`content_id`=$content_id);" ;
            $result = mysqli_query($con, $sql);
        }
        ?> <script> alert("이미 시청한 컨텐츠 입니다! 포스터를 눌러 컨텐츠를 감상하세요 !"); history.back(); </script> 
        <?php
}
?>