<?php
 
 include("connexion.php");
 session_start();
  if(isset($_POST['submit'])){
    if(empty($_POST['anneeUnv'])||empty($_POST['session'])||empty($_POST['date'])){
    
        header("Location: formSansPV.php?error=المرجو ملىء  جميع الخانات");
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
                    header("Location: formSansPV.php?error1=المرجو الاختيار من الائحة");
                    exit();
            }
      $date=addslashes(htmlspecialchars($_POST['date']));
      $loginS=$_SESSION['loginS'];
    
      $_SESSION['session']=$session;
      $_SESSION['anneeUnv']=$anneeUnv;
      $_SESSION['date']=$date;
      header('Location: listeSansPV2.php?succes=1');
      exit();  
 }
}
  
?>
