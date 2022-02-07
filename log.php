<html>
     <head>
         <title>登入</title>
         <style>
             h1{
                 color: red;
                 }
         </style>
     </head>
     <body>
         <h1 align = "center">線上購物</h1>
         <p align = "center">
             <?php
             //連接資料庫，未連接會顯示錯誤
             require_once("conn.php");
             //帳號
             $userid = $_POST["userid"];
             //密碼
             $pssw = $_POST["pssw"];
             //查詢資料庫
             $qry = mysqli_query($con, "select * from admin where user = '$userid'");
             $row = mysqli_fetch_array($qry, MYSQLI_ASSOC);
             //驗證使用者
             if($userid == $row["user"] && $pssw == $row["pwd"] && $userid!= null && $pssw != null){
                 session_start();
                 $_SESSION["login"] = $userid;
                 header("Location:menu.php");
                 }else{
                 echo "無效的帳號密碼!";
                 header("refresh:1; url = index.php");
                 }
             ?>
         </p>
     </body>
</html>
