<?php
    $conn = mysqli_connect("localhost","root","leesj5108","library");

    if($conn == false){
        echo "db connection is error!";
    } else{
        echo "db connection is success";
    }  
?>