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
    <title>ResetPassword</title>
</head>
<body>
    <section class="container">
      
      
      <form action="" method="post">
          <h1  class="login">إعادة تعيين كلمة المرور</h1>
        
          <div class="input-group">
                 <input type="email" name="email" placeholder="e-mail">
          </div>
          <div class="input-group">
               <button  name="submit_email"  class="btn">تلقي كلمة المرور الجديدة عن طريق البريد الإلكتروني</button>
           </div>
            <p class="forgetP"><a href="acceuil.php">خروج</a></p>
      </form>
       <?php
         if(isset($_GET['reset']) == "success"){
             echo '<p class="succes">Check your e-mail</p>';
         }
       ?>
    </section>
</body>
</html>