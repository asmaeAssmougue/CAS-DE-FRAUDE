<?php
 
 include("connexion.php");
 session_start();


  if(isset($_POST['submit'])){
    if(empty($_POST['anneeUnv'])||empty($_POST['session'])||empty($_POST['date'])){
    
        header("Location: listeFraudePV.php?error=veuillez remplir tous les champs");
        exit(); 
    }else{
      $anneeUnv=$_POST['anneeUnv'];
      $session=$_POST['session'];
      switch ($session) {
                case 'hiverAutomne':
                    $session="خريف-شتاء";
                    break;
                case 'etePrint':
                    $session="ربيع-صيف";
                    break;
               
                default:
                    header("Location: listeFraudePV.php?error1=choisissez une valeur valide!");
                    exit();
            }
      $date=$_POST['date'];
      $loginS=$_SESSION['login'];
      $numApogee=$_SESSION['numApogee'];
      $_SESSION['session']=$session;
      $_SESSION['anneeUnv']=$anneeUnv;
      $_SESSION['date']=$date;
      header('Location: listeFraudePV.php?succes=1');
      exit();

      
 }
}
  
?>
