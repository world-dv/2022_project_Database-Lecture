<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NETFLIX</title>
    <style>
        h1 {
            color: red;
            text-align: left;
        }
        body {
            text-align: center;
            background-color: white;
        }
        h2 {
            color: black;
        }
        table {
            text-align: center;
        }
        th {
            align : center;
            background-color: red;
            color : white;
            width: 500px;
            height : 70px;
        }
    </style>
</head>
<body>
    <h1>&emsp;NETFLIX</h1>
    <h2>원하는 멤버십을 선택하세요.</h2><br><br>
    <table border="0">
        <th style="background-color: white; color: black;">
            <h3>구분</h3>
        </th>
        <th><h3>베이식</h3></input></th>
        <th><h3>스탠다드</h3></th>
        <th><h3>프리미엄</h3></th>

        <tr>
            <td>월 요금</td>
            <td>9500원</td>
            <td>13500원</td>
            <td>17000원</td>
        </tr>

        <tr>
            <td>HD 화질 지원</td>
            <td>X</td>
            <td>O</td>
            <td>O</td>
        </tr>

        <tr>
            <td>UHD 화질 이용 가능</td>
            <td>X</td>
            <td>X</td>
            <td>O</td>
        </tr>

        <tr>
            <td>동시 접속 가능 인원</td>
            <td>1</td>
            <td>2</td>
            <td>4</td>
        </tr>

        <tr>
            <td>노트북, 태블릿 등 기기 시청</td>
            <td>O</td>
            <td>O</td>
            <td>O</td>
        </tr>

        <tr>
            <td>무제한 시청</td>
            <td>O</td>
            <td>O</td>
            <td>O</td>
        </tr>
        <tr>
            <td></td>
            <form action="signupform.php" method="get">
            <td><button type="submit" name="membership" value="1">선택</button></td>
            <td><button type="submit" name="membership" value="2">선택</button></td>
            <td><button type="submit" name="membership" value="3">선택</button></td>
            </form>
        </tr>
    </table>
</body>
</html>