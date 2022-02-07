<?php
//開啟session
session_start();
include("conn.php");
$id = $_GET["id_"];
//print_r($_GET);
?>

<!DOCTYPE html>
<html>
     <head>
      <meta http-equiv = "Content-Type" content = "text/html; charset = utf-8">  <!--http-equiv告訴content這是什麼資訊-->
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
                 <li><a href = "#">首頁</a></li>
             </ul>
             <ul style = "float:left; margin-left:30px; font-size:20px;">
                 <li><a href = "add.html">增加商品</a></li>
             </ul>
             <ul style = "float:left; margin-left:30px; font-size:20px;">
                 <li><a href = "search.php">訂單查詢</a></li>                
             </ul>
         </div>
         <br/><br/><br/><br/><br/><br/>
         <div id = "contain">
             <div id = "contain-left">
                 <form style = "margin-left:45%" name = "state" method = "post" action = 'editDo.php?id= <?php echo "$id"; ?>'> <!--$id透過GET傳遞，要用echo變成文字傳回html-->
                     <p>修改狀態：<br/>
                         <input name = "state" type = "radio" id = "0"value = "0" >
                         <label for = "0">已經提交！<br/></label>
                         <input name = "state" type = "radio" id = "1" value = "1" >
                         <label for = "1">已經接納！<br/></label>
                         <input name = "state" type = "radio" id = "2" value = "2" >
                         <label for = "2">正在派送！<br/></label>
                         <input name = "state" type = "radio" id = "3" value = "3" >
                         <label for = "3">已經簽收！<br/></label>
                         <input name = "state" type = "radio" id = "4"value = "4" >
                         <label for = "4">意外，不能供應！<br/></label>
                     </p> 
                     <button name = "botton"  type = "submit">提交</button>
                 </form>
             </div>
         </div>
     </body>
</html>



