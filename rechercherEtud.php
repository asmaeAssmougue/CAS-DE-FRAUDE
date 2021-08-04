<?php

 include("connexion.php");
 session_start();
   
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/712b6663e3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style7.css">
    <title>rechercherEtudiant</title>
  </head>
  <body>
    <div class="container">
        <form action="testR.php" method="POST" class="fraude">
          <div class="logo">
                  <img src="images/logo3.png" alt="logo">
          </div>
          <?php if(isset($_GET['recupId'])){ ?>
          
          <p class="error"><?php echo $_GET['recupId']; ?></p>
            <?php } ?>
           <?php if(isset($_GET['error1'])){ ?>
          
          <p class="error"><?php echo $_GET['error1']; ?></p>
            <?php } ?>
            <?php if(isset($_GET['error4'])){ ?>
          
          <p class="error"><?php echo $_GET['error4']; ?></p>
            <?php } ?>
          <?php if(isset($_GET['error'])){ ?>
          
          <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <?php if(isset($_GET['error2'])){ ?>
          
          <p class="error"><?php echo $_GET['error2']; ?></p>
            <?php } ?>
           <?php if(isset($_GET['inscrire'])){ ?>
          
          <p class="error"><?php echo $_GET['inscrire']; ?></p>
            <?php } ?>
             <?php if(isset($_GET['update'])){ ?>
          
          <p class="error"><?php echo $_GET['update']; ?></p>
            <?php } ?>
            
             <?php if(isset($_GET['fraudeSave'])){ ?>
          
          <p class="error"><?php echo $_GET['fraudeSave']; ?></p>
            <?php } ?>
           
             <?php if(isset($_GET['fraudeSave2'])){ ?>
          
          <p class="error"><?php echo $_GET['fraudeSave2']; ?></p>
            <?php } ?>
           <?php if(isset($_GET['succes2'])){ ?>
          
          <p class="succes"><?php echo $_GET['succes2']; ?></p>
            <?php } ?>
           
             <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="date" style="position:relative; left:350px;">:رقم الطالب</label>
               <input type="text" name="numApogee" id="date" placeholder="numApogee/CNE/CIN">
           </div>
           
           <div class="input-group">
               <button type="submit" class="btn btn-primary" name="submit">بحث</button>
               <button  class="btn waves-effect waves-light reset" type="reset" value="Reset" >إلغاء</button>
                <button type="submit" class="btn btn-primary"><a href="acceuil.php">رجوع</a></button>
           </div>
          
         </form>
    </div>

  </body>
</html>