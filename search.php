<?php
//開啟session
session_start();
include("conn.php");
?>
<html>
     <head>
         <meta http-quiv = "Content-Type" content = "text/html; charset = utf-8">
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
             <div id = "contain-left">
                 <?php
                 $result = mysqli_query($con, "select * from form order by oid desc");
                    //確認查詢是否成功
                    // if($result){
                    //     echo "資料查詢成功";
                    // }else{
                    //     echo "資料查詢失敗";
                    // }
                 while($row = mysqli_fetch_row($result)){
                     $x = $row[0];
                 ?>
                     <table width = "900" border = "1" cellspacing = "0" cellpadding = "3" class = "gridtable">
                         <tr>
                             <td width = "116">
                                 編號： <?php echo $row[0] ?>
                             </td>
                             <td width = "82">
                                 暱稱：<?php echo $row[1] ?>
                             </td>
                             <td width = 135">
                                 商品種類：<?php echo $row[2]?>
                             </td>
                             <td width = "300">
                                 下單時間： <?php echo $row[9]?>
                             </td>
                         </tr>
                         <tr>
                             <td colspan = "2">
                                 商品名稱：<?php echo $row[3]?>
                             </td>
                             <td>
                                 價格：<?php echo $row[4]?>元
                             </td>
                             <td>
                                 數量：<?php echo $row[5]?>
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 總價：<?php echo $row[4]*$row[5]?>
                             </td>
                             <td>
                                 聯繫電話： <?php echo $row[6] ?>
                             </td>
                             <td colspan = "3" bgcolor = "#EEEEEE">
                                 下單IP： <?php echo $row[8] ?>
                             </td>
                         </tr>
                         <tr>
                             <td colspan = "4" bgcolor = "#EEEEEE">
                                 附加說明： <?php echo $row[10]?>
                             </td>
                         </tr>
                         <tr>
                             <td colspan = "4" bgcolor = "#EEEEEE">
                                 地址：<?php echo $row[7]?>
                             </td>
                         </tr>
                         <tr>
                            <td bgcolor = "#EEEEEE">
                                 下單狀態： <?php switch ($row[11]){
                                         case "0" : 
                                             echo "已經下單";
                                             break;
                                         case "1" : 
                                             echo "已經接納";
                                             break;
                                         case "2" : 
                                             echo "正在派送";
                                             break;
                                         case "3" : 
                                             echo "已經簽收";
                                             break;
                                         case "4" : 
                                             echo "意外，不能供應！";
                                             break;
                                         }?>
                             </td>
                                <td>
                                <?php echo "<a href = 'edit.php?id =".$x."'>修改狀態</a>";?>   
                                </td>
                         </tr>
                     </table>
<hr/> 
<?php }
    mysqli_free_result($result);
?>

</div>
</div>
</html>


