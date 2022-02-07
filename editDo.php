<?php
//開啟session
session_start();
include("conn.php");
$state = $_POST['state'];
$id = $_GET["id"];
//print_r($_POST);
//print_r($_GET);
?>
<!DOCTYPE html>
<html>
    <head>
         <meta http-equiv = "Content-Type" content = "text/html"; charset = utf-8">
         <style type = "text/css">
            table.gridtable{
            font-family: verdana,arial,sans-serif; <!--照順序試ok的字體-->
            font-size: 11px;
            color:#333333;
            border-width: 1px;
            border-color: #666666;
            border-collapse: collapse;
            }
            table.gridtable th{
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #666666;
            background-color: #dedede;
            }
            table.gridtable td{
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #666666;
            background-color: #ffffff;
            }
         </style>
         <title>線上購物</title>
    </head>
    <body>
         <h1 align = "center">線上購物</h1>
         <div style = "margin-left:30%; margin-top:20px;">
             <ul style = "float:left; margin-left:30px; font-size:20px;">
                 <li><a href = "menu.php">首頁</a></li>
             </ul>
             <ul style = "float:left; margin-left:30px; font-size:20px;">
                <li><a href = "add.html">增加商品</a></li>
             </ul>
             <ul style = "float:left; margin-left:30px; font-size:20px;">
                <li><a href = "search.php">訂單查詢</a></li>    
             </ul>
         </div>
         <div id = "contain">
            <div style = "margin-left:45%" id = "contain-left">
                <?php
                if(''== $state or null == $state){
                    echo "請選擇訂單狀態!"; 
                    header("refresh:1; url = edit.php");
                    }else{
                    $state = $_POST["state"];
                    //echo $id . "<br/>";  //查看送出的id
                    $sql = "update form set state = '$state' where oid = '$id'";
                    $result = mysqli_query($con, $sql);
                     //print_r($result);
                     echo " <br/> <br/> <br/> <br/> <br/> <br/>";
                     //if($result){     確認更新是否成功
                     //   echo "更新成功<br/>";
                     //}else{
                     //   echo "更新失敗<br/>";
                     //}
                     echo "訂單狀態修改成功。<br/>";
                     //echo "state:". $state . "<br/>"; 確認訂單狀態
                    }
                 ?>
                 <a href = "search.php" style = "margin-left:50%">回訂單狀態</a>
            </div>
         </div>
    </body>
<html>
