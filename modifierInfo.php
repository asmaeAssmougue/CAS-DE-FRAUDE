
<?php
 
 include("connexion.php");

 session_start(); // ready to go!

$now = time();
if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
    // this session has worn out its welcome; kill it and start a brand new one
    session_unset();
    session_destroy();
    session_start();
}

// either new or old, it should live at most for another hour
$_SESSION['discard_after'] = $now + 3600;
  $numApogee=$_SESSION['numApogee'];
        $sql1="SELECT etudiant.numApogee, etudiant.numEtd, etudiant.nom, etudiant.prenom, etudiant.filliere, etudiant.semestre, fraude.description, fraude.anneeUniversitaire, fraude.session, fraude.loginR, conseildiscipline.loginS, conseildiscipline.date, conseildiscipline.PV
        FROM etudiant 
        INNER JOIN conseildiscipline ON conseildiscipline.numApogee = etudiant.numApogee 
        INNER JOIN fraude ON fraude.numApogee = etudiant.numApogee
            WHERE  etudiant.numApogee = '$numApogee'
            ORDER BY etudiant.numEtd ASC;";
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
           $fill=addslashes(htmlspecialchars($filliere));
           $sqlF="SELECT `codeF` FROM `filliere` WHERE lib_fill = '$fill';";
          $resltF=mysqli_query($link, $sqlF);
          $dataF=mysqli_fetch_assoc($resltF);
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
         
          <?php if(isset($_GET['error'])){ ?>
          
          <p class="error"><?php echo $_GET['error']; ?></p><div class="dec"><a href="deconnexion.php" class="button">خروج</a></div>
            <?php } ?>
             <?php if(isset($_GET['inscrire'])){ ?>
          
          <p class="error"><?php echo $_GET['inscrire']; ?></p><div class="dec"><a href="deconnexion.php" class="button">خروج</a></div>
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
                  <option value="<?php echo $dataF['codeF'] ?>" selected ><?php echo "$filliere";?></option>
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
    
  </body>
 
</html>
