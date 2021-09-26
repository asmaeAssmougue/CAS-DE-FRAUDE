<?php
 
 include("connexion.php");
 session_start();
 $loginS = $_GET['loginS'];
 
     if(isset($_POST['submit'])){
    if(empty($_POST['anneeUnv'])||empty($_POST['session'])||empty($_POST['date'])){
    
        header("Location: formSansPV.php?error=المرجو ملىء  جميع الخانات&loginS=$loginS");
        exit(); 
    }else{
      $anneeUnv=addslashes(htmlspecialchars($_POST['anneeUnv']));
      $session=addslashes(htmlspecialchars($_POST['session']));
      switch ($session) {
                case 'hiverAutomne':
                    $session="خريف-شتاء";
                    break;
                case 'etePrint':
                    $session="ربيع-صيف";
                    break;
               
                default:
                    header("Location: formSansPV.php?error1=المرجو الاختيار من الائحة&loginS=$loginS");
                    exit();
            }
      $date=addslashes(htmlspecialchars($_POST['date']));
      //$loginS=$_SESSION['loginS'];
    
      $_SESSION['session']=$session;
      $_SESSION['anneeUnv']=$anneeUnv;
      $_SESSION['date']=$date;
      header("Location: listeSansPV2.php?succes=1&loginS=$loginS");
      exit();  
 }
}
 
?>

<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/712b6663e3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style7.css">
    <title>FormFraude</title>
  </head>
  <body>
    <div class="container">
        <form action="" method="POST" class="fraude">
          <div class="logo">
                  <img src="images/logo3.png" alt="logo">
          </div>
           <?php if(isset($_GET['error1'])){ ?>
          
          <p class="error"><?php echo $_GET['error1']; ?></p>
            <?php } ?>
          <?php if(isset($_GET['error'])){ ?>
          
          <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
       

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
             <div class="input-group" style="display:flex; flex-direction: row;">

               <label for="date" style="position:relative; left:350px;">:تاريخ الجلسة</label>
               <input type="text" name="date" id="date">
           </div>
                

           <div class="input-group">
               <button type="submit" class="btn btn-primary" name="submit">حفظ</button>
               <button  class="btn waves-effect waves-light reset" type="reset" value="Reset" >الغاء</button>
               <button type="submit" class="btn btn-primary"><a href="modifierFraude.php?loginS=<?php echo $loginS; ?>">رجوع</a></button>
           </div>
           
           
         </form>
    </div>
  </body>
</html>