<?php

include('connexion.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css">
    <title>resetPasswordS</title>
</head>
<body>
    <section class="container">
      
      
      <form action="send_linkS.php" method="post">
           

          <h1  class="login">إعادة تعيين كلمة المرور</h1>
             <?php
           if(isset($_GET["errorSend"])){
              
                   echo '<p class="error">'.$_GET["errorSend"].'</p>';
               
           }
           if(isset($_GET["echec2"])){
              
                   echo '<p class="error">'.$_GET["echec2"].'</p>';
               
           }
            if(isset($_GET["echec3"])){
              
                   echo '<p class="error">'.$_GET["echec3"].'</p>';
               
           }
            if(isset($_GET["echec"])){
              
                   echo '<p class="error">'.$_GET["echec"].'</p>';
               
           }
            if(isset($_GET["error"])){
              
                   echo '<p class="error">المرجو ملىء  جميع الخانات</p>';
               
           }
             if(isset($_GET["succes"])){
              
                   echo '<p class="success">'.$_GET["succes"].'</p>';
               
           }
           ?>
          <div class="input-group">
               <input type="text" name="username" placeholder="username" required="required">
           </div>
          <div class="input-group">
                 <input type="email" name="email" placeholder="e-mail" required="required">
          </div>
          <div class="input-group">
               <button  name="submit_email"  class="btn">تلقي كلمة المرور الجديدة عن طريق البريد الإلكتروني</button>
           </div>
            <p class="forgetP"><a href="acceuil.php">خروج</a></p>
      </form>
       
    </section>
</body>
</html>