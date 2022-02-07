<?php
    session_start();
include("conn.php"); 
    $cid = $_GET["id_"];
    $sql = "delete from product where cid = '$cid'";
    $result = mysqli_query($con, $sql);
    //資料刪除是否成功
    if($result){
        $result1= "刪除資料成功";
     }else{
        $result1= "刪除資料失敗";
     }

?>

<!DOCTYPE html>
<html>
     <head>
         <meta http-equiv = "Content-Type" content = "text/html; charset = utf-8" />
         <title>線上購物</title>
     </head>
     <body>
         <h1 align = "center">線上購物</h1>
             <p style = "margin-left:50%"><?php echo "$result1" ?></p><br/>
             <a href = "menu.php" style = "margin-left:50%" >回首頁</a>
     </body>
</html>
