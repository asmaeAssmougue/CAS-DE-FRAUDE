
<?php
 
 include("connexion.php");
 session_start();
  $numApogee=$_SESSION['numApogee'];
        $sql1="SELECT etudiant.numApogee, etudiant.numEtd, etudiant.nom, etudiant.prenom, etudiant.filliere, etudiant.semestre, fraude.idFraude, fraude.description, fraude.anneeUniversitaire, fraude.session, fraude.loginR, conseildiscipline.idConseil, conseildiscipline.loginS, conseildiscipline.date, conseildiscipline.PV
        FROM etudiant 
        INNER JOIN conseildiscipline ON conseildiscipline.numApogee = etudiant.numApogee 
        INNER JOIN fraude ON fraude.numApogee = etudiant.numApogee
            WHERE  etudiant.numApogee = '$numApogee'
            ORDER BY fraude.idFraude ASC;";
          $reslt1=mysqli_query($link, $sql1);
          $data=mysqli_fetch_assoc($reslt1);
          $numEtd=$data['numEtd'];
          $Apogee=$data['numApogee'];
          $_SESSION['numApogee']=$data['numApogee'];
           $nom=$data['nom'];
           $prenom=$data['prenom'];
           $semestre=$data['semestre'];
           $filliere=$data['filliere'];
           $_SESSION['filliere']=$data['filliere'];
           $description=$data['description'];
           $anneeUniversitaire=$data['anneeUniversitaire'];
           $session=$data['session'];
           $_SESSION['session']=$data['session'];
           $date=$data['date'];
           $PV=$data['PV'];
          
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
    <title>setting</title>
  </head>
  <body>
     
    <div class="container">
        <form action="setting.php" method="POST" class="fraude">
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
               <input type="text" name="numEtd" id="numEtd" value="<?php echo "$numEtd";?>">
           </div>
           <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="numApogee" style="position:relative; left: 350px;">:رقم الطالب</label>
               <input type="text" name="numApogee" placeholder="Numero Apogee" id="numApogee" value="<?php echo "$Apogee";?>">
           </div>
           <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="nom" style="position:relative; left:350px;">:الاسم العائلي</label>
               <input type="text" name="nom" id="nom" value="<?php echo "$nom";?>">
           </div>
           <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="prenom" style="position:relative; left:340px;">:الاسم الشخصي</label>
               <input type="text" name="prenom" id="prenom" value="<?php echo "$prenom";?>">
           </div>
             <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="filliere" style="position:relative; left:390px;">:المسلك</label>
               <select name="filliere">
                  <option value="" selected ><?php echo "$filliere";?></option>
                  <option value="arabe">قانون بالعربية </option>
                  <option value="francais">Droit en Français</option>
                  <option value="economie">Economie de Gestion</option>
                   <option value="politique">Sciences Politiques</option>
                  
                   <option value="LSEG">Licence D'études Fondamentales en Sciences Economiques et Gestion</option>
                   <option value="LDF">Licence D'études Fondamentales en Droit Français</option>
                   <option value="LDA">الاجازة في القانون بالعربية</option>
                   <option value="LSEG">Licence D'études Fondamentales en Sciences Economiques et Gestion</option>
                   <option value="LSG">Licence D'études Fondamentales D'exellence en Sciences de Gestion</option>
                   <option value="LSP">Licence D'études Fondamentales D'exellence en Sciences de Politique</option>
                   <option value="LPM">Licence Professionnelle en Management PME-PMI</option>

                    <option value="juridique">العلوم القانونية</option>
                   <option value="droit"> القانون العام والعلوم السياسية</option>
                   <option value="DSP">Droit Publiques et Sciences Politique</option>
                   <option value="ET">Economie des Territoires</option>
                      <option value="SG">Sciences de Gestion</option>
                         <option value="SE">Sciences Economiques</option> 
                    <option value="FP">Finance Publiques et Fiscalité(MS)</option> 
                    <option value="SJ">Sciences Juridiques</option> 
                    <option value="MS">Migration et Societés(MS)</option> 
                    <option value="GPP">Genre et Politiques Publiques(MS)</option> 
                    <option value="FI">Finance Islamiques</option> 
                    <option value="AI">Administration Internationale et Gestion des partenariats dans l'espace Euro Mediterranee(MS)</option> 
                    <option value="DHL">(ماستر متخصص)حقوق الانسان القانون الدولي الانساني</option> 
                    <option value="EE">Economie de l'environnement</option> 
                    <option value="EEP">Economie et Evaluation des Politiques Publiques</option> 
                     <option value="GFC">Gestion Finance Comptable et Fiscale(MS)</option>
                   <option value="MSRH">Management Stratégiques des Ressources Humaines</option>



                  
            </select>
           </div>
             <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="optionF" style="position:relative; left:340px;">: الفصل الدراسي</label>
               <input type="text" name="optionF" id="optionF" value="<?php echo "$semestre";?>">
           </div>
               <label for="description" style="position:relative; left:350px;">: طبيعة الغش</label>
              <div class="text" style="display:flex; flex-direction: row;">

              
               <textarea name="description" id="description" class="ui-autocomplete-input" cols="70" rows="6" autocomplete="off"><?php echo "$description";?></textarea>
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
               <input type="text" name="anneeUnv" id="anneeUnv" value="<?php echo "$anneeUniversitaire";?>">
           </div>
             <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="session" style="position:relative; left:390px;">:الدورة</label>
               <select name="session" class="form-select">
                   <option value=""><?php echo "$session";?></option>
                  <option value="hiverAutomne" >خريف-شتاء</option>
                  <option value="etePrint">ربيع-صيف</option>
                  
            </select>
           </div>
            <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="date" style="position:relative; left:350px;">:تاريخ الجلسة</label>
               <input type="text" name="date" id="date" value="<?php echo "$date";?>">
           </div>
           <label for="PV" style="position:relative; left:350px;">:قرار المجلس</label>
              <div class="text" style="display:flex; flex-direction: row;">

              
               <textarea name="PV" id="PV" class="ui-autocomplete-input" cols="70" rows="6" autocomplete="off"><?php echo "$PV";?></textarea>
           </div>
             <script  type="text/javascript">
        $(document).ready(function() {
  $("#PV").autocomplete({
    source: [
      "إلغاء نتائج دورة خريف -شتاء",
      "إلغاء نتائج دورة ربيع-صيف",
      "تسجل في دورة خريف-شتاء",
      "يسجل في دورة خريف-شتاء",
      "يسجل في دورة ربيع-صيف",
      "تسجل في دورة ربيع-صيف",
    "إلغاء نتائج دورة خريف-شتاء2021/2020 تسجل في دورة خريف-شتاء2022/2021",
      "إلغاء نتائج دورة خريف-شتاء2021/202 يسجل في دورة خريف-شتاء2022/2021",
        "إلغاء نتائج دورة خريف-شتاء2021/2020 تسجل في دورة ربيع-صيف 2022/2021",
         "إلغاء نتائج دورة خريف-شتاء2021/2022 يسجل في دورة ربيع-صيف 2022/2021",
    ],
    minLength: 1
  });
});
    </script>
           <div class="input-group">
               <button type="submit" class="btn btn-primary" name="submit">حفظ التغييرات</button>
               <button  class="btn waves-effect waves-light reset" type="reset" value="Reset" >الغاء</button>
               <button type="submit" class="btn btn-primary" id="retour" width="30%;"><a href="recherListeEtd.php" style="text-decoration:none;color:#000;">رجوع</a></button>
           </div>
           
           
         </form>
    </div>
    

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
  </body>
 
</html>