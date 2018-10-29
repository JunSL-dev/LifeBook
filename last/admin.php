<?php
    require_once("dbConnect.php");

    $sql = "SELECT * FROM book ORDER BY no DESC";
    $result = mysqli_query($conn, $sql);

    $cnt = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>3625 이승준</title>
</head>
<body>
    <table border="1">
        <thead>
            <th>번호</th>
            <th>도서명</th>
            <th>저자</th>
            <th>유형</th>
            <th>등록시간</th>
        </thead>
        <?php
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>".$row['no']."</td>";
                echo "<td>".$row['title']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['content']."</td>";
                echo "<td>".$row['date']."</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <form action="admin_process.php" method="post">
        <input type="number" name="DelNumber">
        <input type="submit" value="삭제하기">
    </form>
</body>
</html>