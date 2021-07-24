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
    <link rel="stylesheet" href="style3.css">
    <title>ResetPassword</title>
</head>
<body>
    <section>
      <?php 
       $selector = $_GET["selector"];
       $validator = $_GET["validator"];
       if(empty($selector) || empty($validator)){
           echo "Could not validate your request!";
       }
       else{
           if(ctype_x($digit($selector) !== false && ctype_xdigit($validator) !== false){
               ?>
               <form action="reset-password.php" method="post" class="container">
                   <div class="input-group">
                        <input type="hidden" name="selector" value="<?php echo $selector ?>">;

                   </div>
                    <div class="input-group">
                         <input type="hidden" name="selector" value="<?php echo $validator ?>">;   
                    </div>    
                      <div class="input-group">
                          <input type="password" name="pwd" placeholder="Enter a new password..">;
                      </div>                        
                        <div class="input-group">
                              <input type="password" name="pwd-repeat" placeholder="Repeat a new password..">;
                        </div> 
                          <div class="input-group">
                                  <button type="submit" name="reset-password-submit" class="btn">Reset password</button>
                          </div>
                          
                         

               </form>

            <?php
           }
       }
      ?>
      
      
    </section>
</body>
</html>