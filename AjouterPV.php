<?php
 
 include("connexion.php");
 session_start();
 $loginS = $_GET['loginS'];
  if(isset($_POST['submit'])){
      if(empty($_POST['numApogee']) || empty($_POST['PV'])){     
    header("Location: AjouterPV.php?error=المرجو ملىء  جميع الخانات&loginS=$loginS");
    exit();       
   }
   else{
       $numApogee=$_POST['numApogee'];
       $queryS="SELECT * FROM `etudiant` WHERE numApogee = '$numApogee';";
       $resltS=mysqli_query($link, $queryS);
       if(mysqli_num_rows($resltS)==0){
            header("Location: AjouterPV.php?error1=رقم الطالب غير موجود ، يرجى المحاولة مرة أخرى&loginS=$loginS");
           exit();
       }
       else{
           $PV=addslashes(htmlspecialchars($_POST['PV']));
       $sql2="UPDATE `conseildiscipline` SET `PV`='$PV'  WHERE numApogee='$numApogee';";
       $reslt=mysqli_query($link, $sql2);
       if(!$reslt){
           header("Location: AjouterPV.php?update=هناك مشكلة ، حاول مرة أخرى&loginS=$loginS");
           exit();
       }
       else{
          header("Location: AjouterPV.php?succes=تم اضافة التقرير بنجاح&loginS=$loginS");
           exit();
       }
       }
       
  }
}
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
   
    <link rel="stylesheet" href="style7.css">
    <title>Ajouter PV</title>
  </head>
  <body>
    <div class="container">
        <form action="" method="POST" class="ajouPV">
            
          <div class="logo">
           <img src="images/logo3.png" alt="logo">
          </div>
          <?php if(isset($_GET['error'])){ ?>
          
          <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <?php if(isset($_GET['error1'])){ ?>
          
          <p class="error"><?php echo $_GET['error1']; ?></p>
            <?php } ?>
            <?php if(isset($_GET['update'])){ ?>
          
          <p class="error"><?php echo $_GET['update']; ?></p>
            <?php } ?>

             <?php if(isset($_GET['succes'])){ ?>
          
          <p class="succes"><?php echo $_GET['succes']; ?></p>
            <?php } ?>
          <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="numApogee" style="position:relative; left: 350px;">:رقم الطالب</label>
               <input type="text" name="numApogee" placeholder="Numero Apogee/CNE/CIN" id="numApogee">
           </div>
          
          
          
           <label for="PV" style="position:relative; left:350px;">:قرار المجلس</label>
              <div class="text" style="display:flex; flex-direction: row;">

              
               <textarea name="PV" id="PV" class="ui-autocomplete-input" cols="70" rows="6" autocomplete="off"></textarea>
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
               <button type="submit" class="btn btn-primary" name="submit">حفظ</button>
               <button  class="btn waves-effect waves-light reset" type="reset" value="Reset" >الغاء</button>
               <button type="submit" class="btn btn-primary"><a href="modifierFraude.php?loginS=<?php echo $loginS; ?>">رجوع</a></button>
           </div>
           
           
         </form>
    </div>


    
  </body>
</html>