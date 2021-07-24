
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
    <link rel="stylesheet" href="style5.css">
    <title>Fraude</title>
  </head>
  <body>
    <div class="container">
        <form action="validationEnvoie.php" method="POST" class="fraude">
          <div class="logo">
              <img src="images/logo.png" alt="logo">
          </div>
          <?php if(isset($_GET['error1'])){ ?>
          
          <p class="error"><?php echo $_GET['error1']; ?></p>
            <?php } ?>
          <?php if(isset($_GET['error'])){ ?>
          
          <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
             <?php if(isset($_GET['inscrire'])){ ?>
          
          <p class="error"><?php echo $_GET['inscrire']; ?></p>
            <?php } ?>
             <?php if(isset($_GET['fraudeSave'])){ ?>
          
          <p class="error"><?php echo $_GET['fraudeSave']; ?></p>
            <?php } ?>
            <?php if(isset($_GET['errorEnvoie'])){ ?>
          
          <p class="error"><?php echo $_GET['errorEnvoie']; ?></p>
            <?php } ?>
            

             <?php if(isset($_GET['success'])){ ?>
          
          <p class="succes"><?php echo $_GET['success']; ?></p>
            <?php } ?>

           <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="numEtd" style="position:relative; left:390px;">:الرقم</label>
               <input type="text" name="numEtd" id="numEtd" value="<?php 
        
           echo (isset($row['numEtd'])) ? $row['numEtd'] : '';
         ?>" >
           </div>
           <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="numApogee" style="position:relative; left:350px;">:رقم الطالب</label>
               <input type="text" name="numApogee" id="numApogee" value="<?php 
        
           echo (isset($row['numApogee'])) ? $row['numApogee'] : '';
         ?>" >
           </div>
           <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="nom" style="position:relative; left:390px;">:النسب</label>
               <input type="text" name="nom" id="nom" value="<?php 
        
           echo (isset($row['nom'])) ? $row['nom'] : '';
         ?>" >
           </div>
           <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="prenom" style="position:relative; left:390px;">:الاسم</label>
               <input type="text" name="prenom" id="prenom" value="<?php 
        
           echo (isset($row['prenom'])) ? $row['prenom'] : '';
         ?>" >
           </div>
             <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="filliere" style="position:relative; left:390px;">:الشعبة</label>
               <select name="filliere" class="form-select">
                  <option value="" selected >اختر شعبة</option>
                  <option value="arabe">قانون عربية</option>
                  <option value="francais">قانون فرنسية</option>
                  <option value="economie">اقتصاد</option>
                  
            </select>
           </div>
             <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="optionF" style="position:relative; left:390px;">: المسلك</label>
               <input type="text" name="optionF" id="optionF" value="<?php 
        
                echo (isset($row['optionFill'])) ? $row['optionFill'] : '';
         ?>" >
           </div>
               <label for="description" style="position:relative; left:350px;">: طبيعة الغش</label>
              <div class="text" style="display:flex; flex-direction: row;">

              
               <textarea name="description" id="description" cols="70" rows="6"></textarea>
           </div>
                

           <div class="input-group">
               <button type="submit" class="btn btn-primary" name="submit">ارسال</button>
               <button  class="btn waves-effect waves-light reset" type="reset" value="Reset" >الغاء</button>
           </div>
           
           
         </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
