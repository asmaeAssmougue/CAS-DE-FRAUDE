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
      
      
      <form action="send_link.php" method="post">
          <h1  class="login">Reset your password</h1>
          <p>An e-mail will be send to you with instructions on how to reset password</p>
          <div class="input-group">
                 <input type="email" name="email" placeholder="Enter your e-mail address..">
          </div>
          <div class="input-group">
               <button  name="submit_email"  class="btn">Receive new password by e-mail</button>
           </div>
      </form>
       <?php
         if(isset($_GET['reset']) == "success"){
             echo '<p class="succes">Check your e-mail</p>';
         }
       ?>
    </section>
</body>
</html>