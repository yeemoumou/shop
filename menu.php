<?php
//開啟session
session_start();
include ("conn.php");
?>

<html>
     <head>
         <meta http-equiv = "Content-Type" content = "text/html; charset = utf-8" />
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
         <br/><br/><br/><br/><br/><br/><br/><br/>
         <div id = "contain">
             <div id = "contain-left">
                 <?php   
                 //搜尋product中的所有資料
                 $result = mysqli_query($con, "select * from product");
                 while($row = mysqli_fetch_row($result)){
                 ?>
                 <table width = "543" border = "0">
                     <tr>
                         <td width = "173" rowspan = "2">  <!--顯示圖片-->
                             <img src = "uploads/<?php echo $row[4]?>" width = "400px" height = "500px" alt = "big" >
                         </td>
                         <td display : "inline-block" > <!--刪除商品-->
                             <?php
                             if(true){
                                 echo '【<a href = "del.php?id = '.$row[0].'" onclick = return(confirm("你確定要刪處此商品嗎？"))
                                 <font color = #FF00FF>刪除商品</font>
                                 </a>】' . "<br/>";
                                                                    }
                             ?>
                                 商品名稱：<?php echo $row[1]?>
                         </td>
                     </tr>
                     <tr>
                         <td>價格：
                             <span color = "#FF0000";>
                                 <?php echo $row[2]?>
                             </span>
                         </td>
                     </tr>
                 </table>
                 <td bgColor = "#ffffff"><br/>
                 </td>
                 <?php    }
                 mysqli_free_result($result);
                 ?>
             </div>
         </div>
     </body>
     <footer>
         <h6>圖片取自：變種吉娃娃<br/> IG:godgwawa</h6>
     </footer>                                                             
</html>
