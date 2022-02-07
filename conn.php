<?php
//建立資料庫連接
     $con = mysqli_connect('localhost:8889', 'yimou', 'aaaaaaaa')or die('無法連接到資料庫');
     mysqli_select_db($con, 'goods') or die(mysqli_error($con));
     mysqli_query($con, 'set NAMES utf8');
?>
