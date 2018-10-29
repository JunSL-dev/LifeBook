<?php
    require_once("dbConnect.php");

    $no = $_POST['DelNumber'];
    $sql = "DELETE FROM book WHERE no = ".$no;

    $result = mysqli_query($conn, $sql);

    if($result == true){
        header("Location: ./admin.php");
    } else{
        echo "<a href='./admin.php'>admin.php로 이동한다.</a>";
    }
?>