
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" />
   
    <link rel="stylesheet" href="style5.css">
    <title>enregistrerFraude</title>
  </head>
  <body>
     
    <div class="container">
        <form action="validationEnvoie.php" method="POST" class="fraude">
          <div class="logo">
              <img src="images/logo3.png" alt="logo">
              
          </div>
         <?php if(isset($_GET['succes'])){ ?>
          
          <p class="succes"><?php echo $_GET['succes']; ?></p><div class="dec"><a href="deconnexion.php" class="button">خروج</a></div>
            <?php } ?>
          <?php if(isset($_GET['error1'])){ ?>
          
          <p class="error"><?php echo $_GET['error1']; ?></p><div class="dec"><a href="deconnexion.php" class="button">خروج</a></div>
            <?php } ?>
          <?php if(isset($_GET['error'])){ ?>
          
          <p class="error"><?php echo $_GET['error']; ?></p><div class="dec"><a href="deconnexion.php" class="button">خروج</a></div>
            <?php } ?>
             <?php if(isset($_GET['inscrire'])){ ?>
          
          <p class="error"><?php echo $_GET['inscrire']; ?></p><div class="dec"><a href="deconnexion.php" class="button">خروج</a></div>
            <?php } ?>
             <?php if(isset($_GET['fraudeSave'])){ ?>
          
          <p class="error"><?php echo $_GET['fraudeSave']; ?></p><div class="dec"><a href="deconnexion.php" class="button">خروج</a></div>
            <?php } ?>
            <?php if(isset($_GET['errorEnvoie'])){ ?>
          
          <p class="error"><?php echo $_GET['errorEnvoie']; ?></p><div class="dec"><a href="deconnexion.php" class="button">خروج</a></div>
            <?php } ?>
            

             <?php if(isset($_GET['success'])){ ?>
          
          <p class="succes"><?php echo $_GET['success']; ?></p><div class="dec"><a href="deconnexion.php" class="button">خروج</a></div>
            <?php } ?>
            
           <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="numEtd" style="position:relative; left:390px;">:الرقم</label>
               <input type="text" name="numEtd" id="numEtd">
           </div>
           <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="numApogee" style="position:relative; left: 350px;">:رقم الطالب</label>
               <input type="text" name="numApogee" placeholder="Numero Apogee" id="numApogee">
           </div>
           <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="nom" style="position:relative; left:350px;">:الاسم العائلي</label>
               <input type="text" name="nom" id="nom">
           </div>
           <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="prenom" style="position:relative; left:340px;">:الاسم الشخصي</label>
               <input type="text" name="prenom" id="prenom">
           </div>
             <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="filliere" style="position:relative; left:390px;">:المسلك</label>
               <select name="filliere">
                  <option value="" selected >اختر شعبة</option>
                  <?php 
                  $query="SELECT * FROM `filliere`;";
                  $reslt=mysqli_query($link, $query);
                  while($fetch=mysqli_fetch_assoc($reslt)){
                    ?>
                    <option value="<?php echo $fetch['codeF'] ?>"><?php echo $fetch['lib_fill'] ?></option>

               <?php
                  }
                  ?>
                  



                  
            </select>
           </div>
             <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="optionF" style="position:relative; left:340px;">: الفصل الدراسي</label>
               <input type="text" name="optionF" id="optionF">
           </div>
               <label for="description" style="position:relative; left:350px;">: طبيعة الغش</label>
              <div class="text" style="display:flex; flex-direction: row;">

              
               <textarea name="description" id="description" class="ui-autocomplete-input" cols="70" rows="6" autocomplete="off"></textarea>
           </div>
                
          <script  type="text/javascript">
        $(document).ready(function() {
  $("#description").autocomplete({
    source: [
      "استعمال السماعات",
      "استعمال ساعة ذكية",
      "ضبطت بحوزته ورقة يستعملها للغش في الامتحان",
      "محاولة الغش بواسطة الهاتف المحمول مشغل دون وضعه في محفظته و عدم تسليمه",
      "محاولة الغش بواسطة الهاتف المحمول مشغل دون وضعه في محفظته ",
      "محاولة الغش بواسطة الهاتف المحمول مشغل دون وضعه في محفظتها ",
      "استعمال الهاتف المحمول",
      "استعمال ورقة",
      " ضبطت بحوزتها ورقة تستعملها للغش في الامتحان",
      

    ],
    minLength: 1
  });
});
    </script>
            <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="anneeUnv" style="position:relative; left:350px;">:السنة الجامعية</label>
               <input type="text" name="anneeUnv" id="anneeUnv">
           </div>
             <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="session" style="position:relative; left:390px;">:الدورة</label>
               <select name="session" class="form-select">
                  <option value="hiverAutomne" >خريف-شتاء</option>
                  <option value="etePrint">ربيع-صيف</option>
                  
            </select>
           </div>
           <div class="input-group">
               <button type="submit" class="btn btn-primary" name="submit">ارسال</button>
               <button  class="btn waves-effect waves-light reset" type="reset" value="Reset" >الغاء</button>
           </div>
           
           
         </form>
    </div>   
  </body>
 
</html>
