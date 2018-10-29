<?php
    require_once("dbConnect.php");
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
    <form action="">
        <table>
            <tr>
                <td><label for="book_name">도서명</label></td>
                <td><input type="text" id="book_name" name="book_name"></td>
            </tr>
            <tr>
                <td><label for="writer">저자</label></td>
                <td><input type="text" id="writer" name="writer"></td>
            </tr>
            <tr>
                <td><label for="type">유형</label></td>
                <td>
                    <select name="type" id="type">
                        <option value="기타">기타</option>
                        <option value="자기계발">자기계발</option>
                        <option value="IT">IT</option>
                        <option value="소설">소설</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="추가"></td>
            </tr>
        </table>
    </form>
    
</body>
</html>

<?php

    if($_GET['book_name'] != null && $_GET['writer'] != null){
        $name = $_GET['book_name'];
        $writer = $_GET['writer'];
        $type = $_GET['type'];
    
        $date = date("Y-m-d h:i:s",time());
    
        $sql = "INSERT INTO book(title, name, content, date) VALUES('".$name."','".$writer."', '".$type."', '".$date."')";
        echo $sql;
        $result = mysqli_query($conn,$sql);
    
        if($result == true){
            ?>
            <script>
                alert("도서 추가되었습니다.");
            </script>
            <?php
        }
    }

?>