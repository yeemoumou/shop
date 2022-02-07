<?php
    session_start();
//上傳圖片
     if(isset($_POST['submit'])){
         $file = $_FILES["file"]; //file 是一個陣列 有五個值
         $fileName = $_FILES["file"]["name"];
         $fileTmpName = $_FILES["file"]["tmp_name"];
         $fileSize = $_FILES["file"]["size"];
         $fileError = $_FILES["file"]["error"];
         $fileType = $_FILES["file"]["type"];    
         $fileExt = explode('.', $fileName);  //ext = extenion 副檔名
         $fileActualExt = strtolower(end($fileExt));    //擷取副檔名變成小寫    
         $allowed = array('jpg', 'jpeg', 'png', 'pdf');  //允許的副檔名
    
         if(in_array($fileActualExt, $allowed)){        //擷取副檔名，確認是否在允許的副檔名中
             if($fileError === 0){               //確認錯誤訊息是否為0，才是成功上傳
                 if($fileSize < 1000000){        //確認檔案大小會不會太大
                     $fileNameNew = uniqid('', true) . "." . $fileActualExt;  //為上傳的檔案創造一個新檔名
                     $fileDestination = 'uploads/' . $fileNameNew;       //為上傳的檔案找個新的位置
                     $res = move_uploaded_file($fileTmpName, $fileDestination);  //移動上傳的檔案，從暫時的位置，移到新的位置
                     echo "上傳圖片成功<br/>";
                     //print_r($_POST);  //名字價錢變數
                     $cname = $_POST["cname"];
                     $cprice = $_POST["cprice"];                   
                     }else{
                     echo "Your file is too big!";
                     }
                 }else{
                 echo "There is an error uploading your file!";
                 }
             }else{
             echo "you cannot upload files of this type!";}    
             }
     //連接資料庫
     include("conn.php");
     if(mysqli_connect_error()){
         echo "資料庫連線失敗<br/>" . mysqli_connect_error;
         exit();
         }else{
         echo "資料庫連線成功<br/>";
         }

//插入資料庫
$sql = "insert into product (cid, cname, cprice, cspic, cpicpath) values (NULL, '$cname', '$cprice', '', '$fileNameNew')";
$result = mysqli_query($con, $sql);
     if($result){
         echo "資料插入成功<br/>";
        }else{
         echo "資料插入失敗<br/>";
         }
//確認是否上傳資料庫成功
if($result){
     echo "上傳資料庫成功！";
     }else{
     echo "上傳資料庫失敗！";
     }
?>

<html>
    <a href = "menu.php">回首頁</a>
</html>