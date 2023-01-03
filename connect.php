<?php
    $server = "localhost";
    $user = "root";
    $password = "root";
    $dbname = "mydb";

    $con = mysqli_connect($server, $user, $password, $dbname) or die("접속 실패");
?>